<?php /* Template Name: Pratos */ ?>
<?php get_header(); the_post(); ?>

<!-- pratos clientes -->
<section class="pratos">
	<?php include('public/inc/titulos.php'); ?>
    <div class="container py-5">
		<?php if (have_rows('pratos')) : ?>
        <div class="row">
        	<?php while(have_rows('pratos')) : the_row(); ?>
            <div class="pratos-item col-12 col-sm-3 p-0">
                <figure class="pratos-item-img">
                <a href="<?php the_sub_field('prato-link'); ?>" title="Veja no Instagram" target="_blank">
                    <img src="<?php the_sub_field('prato-foto'); ?>" alt="Veja no Instagram">
                </a>
                </figure>
            </div>
        	<?php endwhile; ?>
        </div>
    	<?php endif; ?>
    </div>
</section>
<!-- pratos clientes -->

<?php get_footer(); ?>
