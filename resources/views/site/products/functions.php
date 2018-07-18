<?php
/* CARREGAMENTO DE SCRIPTS E STYLE
----------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'carrega_css_scripts' );
function carrega_css_scripts() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/public/css/style.css', '', '1.0', 'all' ); 

    wp_register_script( 'scripts', get_template_directory_uri() . '/public/js/scripts.min.js', array('jquery'),'', true );
    wp_enqueue_script( 'scripts' ); 
    
}

/* LOGO DO LOGIN PERSONALIZADO
----------------------------------------------- */
function page_login_logo(){
    echo "<style>body.login #login h1 a { background: url('".get_stylesheet_directory_uri()."/public/img/sprites.png'); width: 189px;
    height: 115px; display: block; padding: 0; margin:0;} #login h1 { margin:0 auto; display:table;}</style>\n";
}
add_action("login_head", "page_login_logo");

/* LINK DO LOGO DO LOGIN PARA PÁGINA INICIAL
----------------------------------------------- */
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

/* TITULOS DO LOGO NO LINK
----------------------------------------------- */
function my_login_logo_url_title() {
    return 'Konjac';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/* SAUDAÇÃO PERSONALIZADA
----------------------------------------------- */
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Olá', 'Bem vindo', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

/* AVISO DE ERROS NA TELA DE LOGIN
----------------------------------------------- */
function failed_login() {
 return 'Informações de login incorretas.';
}
add_filter('login_errors', 'failed_login');

/* REMOVE VERSÃO
----------------------------------------------- */
remove_action('wp_head','wp_generator');

/* REMOVE BARRA DO ADMIN
----------------------------------------------- */
add_filter( 'show_admin_bar', '__return_false' );

/* REMOVE ITENS DESNECESSARIOS
----------------------------------------------- */
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;
     //Right Now - Comments, Posts, Pages at a glance
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    //Recent Comments
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    //Incoming Links
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    //Plugins - Popular, New and Recently updated WordPress Plugins
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    //Wordpress Development Blog Feed
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    //Other WordPress News Feed
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    //Quick Press Form
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    //Recent Drafts List
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}

/* REMOVE ITENS DO HEAD
----------------------------------------------- */
remove_action('wp_head', 'rel_canonical'); //remove links canonicos
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Removes the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Removes links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link'); // Removes the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link'); // Removes the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link'); // Removes the index link
remove_action( 'wp_head', 'parent_post_rel_link'); // Removes the prev link
remove_action( 'wp_head', 'start_post_rel_link'); // Removes the start link
remove_action( 'wp_head', 'adjacent_posts_rel_link'); // Removes the relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator'); // Removes the WordPress version i.e. 
// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/* REMOVE SCRIPTS E CSS CONTACT FORM NÃO UTILIZADOS
----------------------------------------------- 
add_action( 'wp_enqueue_scripts', 'ac_remove_cf7_scripts' );
function ac_remove_cf7_scripts() {
    if ( !is_page('contato') ) {
        wp_deregister_style( 'contact-form-7' );
        wp_deregister_script( 'contact-form-7' );
    }
}*/

/* REMOVE QUERY STRING
----------------------------------------------- */
function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) ) {
        $src = esc_url( remove_query_arg( 'ver', $src ) );
    }
    return $src;
}
add_filter('style_loader_src', 'remove_cssjs_ver', 10, 2);
add_filter('script_loader_src', 'remove_cssjs_ver', 10, 2);

/* REMOVE DADOS TRANSITÓRIOS
----------------------------------------------- */
function delete_all_transients() {
    global $wpdb;
    $sql = 'DELETE FROM ' . $wpdb->options . ' WHERE option_name LIKE "_transient_%"';
    $wpdb->query($sql);
}
add_action( 'init', 'delete_all_transients' );

/* MENUS
----------------------------------------------- */
add_action( 'after_setup_theme', 'tema_setup' );

function tema_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    if ( function_exists( 'register_nav_menus' ) ) {
        register_nav_menus(
            array(
                'menu' => 'Menu',
                'menu-footer' => 'Menu Footer',
            )
        );
    }
    /* THUMBS
    ----------------------------------------------- */
    add_image_size( 'img-painel', 1920, 594, true ); // painel
    add_image_size( 'tb-digital', 280, 280, true ); // digital influencer
    add_image_size( 'tb-blog', 550, 250, true ); // blog
    add_image_size( 'img-blog', 730, 430, true ); // blog
}

/* LIMITAÇÃO DO RESUMO DOS POSTS
----------------------------------------------- */

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

/* EXIBIR CAMPO RESUMO EM PÁGINAS
----------------------------------------------- */
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

/* UTILIZA IMG DESTAQUE COMO BG
----------------------------------------------- */
function thumbnail_bg($tamanho = 'thumbnail') {
    global $post;
    $get_post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $tamanho, false, '');
    echo 'style="background-image: url(' . $get_post_thumbnail[0] . ' )"';
}

/* SELEÇÃO DE ESTADO
----------------------------------------------- 
function my_pre_get_posts( $query ) {

    // do not modify queries in the admin
    if( is_admin() ) {
        return $query;
    }
    // only modify queries for 'event' post type
    if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'event' ) {
        // allow the url to alter the query
        if( isset($_GET['city']) ) {
            $query->set('meta_key', 'city');
            $query->set('meta_value', $_GET['city']);
        }

    }

    // return
    return $query;

}

add_action('pre_get_posts', 'my_pre_get_posts');*/