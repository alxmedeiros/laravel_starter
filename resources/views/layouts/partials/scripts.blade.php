<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/site.js') }}"></script>

<!-- Core  -->
<script src="/themes/remark/assets/vendor/babel-external-helpers/babel-external-helpers.js"></script>
<script src="/themes/remark/assets/vendor/jquery/jquery.js"></script>
<script src="/themes/remark/assets/vendor/tether/tether.js"></script>
<script src="/themes/remark/assets/vendor/bootstrap/bootstrap.js"></script>
<script src="/themes/remark/assets/vendor/animsition/animsition.js"></script>
<script src="/themes/remark/assets/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="/themes/remark/assets/vendor/asscrollbar/jquery-asScrollbar.js"></script>
<script src="/themes/remark/assets/vendor/asscrollable/jquery-asScrollable.js"></script>
<script src="/themes/remark/assets/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<!-- Plugins -->
<script src="/themes/remark/assets/vendor/switchery/switchery.min.js"></script>
<script src="/themes/remark/assets/vendor/intro-js/intro.js"></script>
<script src="/themes/remark/assets/vendor/screenfull/screenfull.js"></script>
<script src="/themes/remark/assets/vendor/slidepanel/jquery-slidePanel.js"></script>

<!-- Page Plugins -->
@if(isset($pagePlugins))
    @foreach($pagePlugins as $plugin)
    <script src="{{ asset($plugin) }}"></script>
    @endforeach
@endif

<!-- Scripts -->
<script src="/themes/remark/assets/js/State.js"></script>
<script src="/themes/remark/assets/js/Component.js"></script>
<script src="/themes/remark/assets/js/Plugin.js"></script>
<script src="/themes/remark/assets/js/Base.js"></script>
<script src="/themes/remark/assets/js/Config.js"></script>
<script src="/themes/remark/assets/js/Section/Menubar.js"></script>
<script src="/themes/remark/assets/js/Section/GridMenu.js"></script>
<script src="/themes/remark/assets/js/Section/Sidebar.js"></script>
<script src="/themes/remark/assets/js/Section/PageAside.js"></script>
<script src="/themes/remark/assets/js/Plugin/menu.js"></script>
<script src="/themes/remark/assets/js/config/colors.js"></script>
<script src="/themes/remark/assets/js/config/tour.js"></script>
<script>
    Config.set('assets', '/themes/remark/assets');
</script>
<!-- Page -->
<script src="/themes/remark/assets/js/Site.js"></script>
<script src="/themes/remark/assets/js/Plugin/asscrollable.js"></script>
<script src="/themes/remark/assets/js/Plugin/slidepanel.js"></script>
<script src="/themes/remark/assets/js/Plugin/switchery.js"></script>

<!-- Page Scripts -->
@if(isset($pageScripts))
    @foreach($pageScripts as $script)
    <script src="{{ asset($script) }}"></script>
    @endforeach
@endif

<script src="/site/js/jquery.maskedinput.js"></script>

<script>
    (function(document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function() {
            Site.run();

            if ( $('.cpf_mask').length > 0 ) {
                $('.cpf_mask').mask('999.999.999-99');
            }

            if ( $('.cnpj_mask').length > 0 ) {
                $('.cnpj_mask').mask('99.999.999/9999-99');
            }

            if ( $('.fone_mask').length > 0 ) {
                $('.fone_mask').mask('(99) 9?9999-9999');
            }

            if ( $('.date_mask').length > 0 ) {
                $('.date_mask').mask('99/99/9999');
            }

            if ( $('.cep_mask').length > 0 ) {
                $('.cep_mask').mask('99999-999');
            }

        });
    })(document, window, jQuery);
</script>