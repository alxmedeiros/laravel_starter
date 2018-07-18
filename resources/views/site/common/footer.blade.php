
    </main>
    <!-- /conteudo -->

    <!-- footer -->
    <footer id="footer" {{ isPage('site.about')?'class="page-sobre"':'' }}>
        <div class="container">
            <div class="row">
                <!-- footer menu -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <ul class="footer-menu nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/produtos">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog/sobre-a-konjac/">Sobre a Konjac</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog/">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog/faq/">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog/depoimentos/">Depoimentos</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/blog/politica-de-troca-e-devolucao/">Política de Troca e Devolução</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog/contato/">Contato</a>
                        </li>
                    </ul>
                    <h3 class="footer-titulos">Aceitamos todos os cartões</h3>
                    <span class="cartoes"></span>
                </div>
                <!-- contatos -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <h3 class="footer-titulos">Central de Atendimento</h3>
                    <p><b>Cliente Pessoa Física</b><br>
                    (83) 3507 - 1955<br>
                    
                    <span class="d-flex align-items-center">(83) 9 8113 -  2306 <img src="/site/img/ico-zap.svg" class="svg icons" alt=""></span>
                    atendimento.konjacmassamf@gmail.com</p>

                    <p><b>Cliente CNPJ</b><br>
                    <span class="d-flex align-items-center">(83) 9 8811 - 0107 <img src="/site/img/ico-zap.svg" class="svg icons" alt=""></span>
                    comercial@konjacmassamf.com.br<br>
                    konjacmassamf@gmail.com</p>
                </div>
                <!-- endereco -->
                <div class="footer-end col-12 col-sm-6 col-lg-3">
                    <h3 class="footer-titulos">Endereços</h3>
                    <p><?php /*Loja Física<br> */?>
                    Empresarial Vitrine Mar - Av. Gen. Edson Ramalho, n. 20 - Loja 3 Manaíra, João Pessoa - PB, 58038-100</p>
                    <p>Escritório Central<br>
                    Av. Minas Gerais, Bairro dos Estados</p>
                </div>
                <!-- informativo -->
                <div class="footer-infor col-12 col-sm-6 col-lg-3">
                    <h3 class="footer-titulos">Informativo</h3>
                    <p>Fique por dentro das novidades</p>

                    <form>
                        <div class="form-group">
                            <label for="nome" class="d-none">Nome</label>
                            <input type="email" class="form-control" id="nome" placeholder="Digite seu Nome">
                        </div>
                        <div class="form-group">
                        <label for="email" class="d-none">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Digite seu E-mail">
                        </div>
                        <button type="submit" class="btn btn-verde2">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    <!-- /footer -->

    <!-- modal maps -->
    <div class="modal fade" id="modal-maps" tabindex="-1" role="dialog" aria-labelledby="modal-maps" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display:block;border:0;">
                    <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.1553230965405!2d-34.83231576778224!3d-7.107991594866965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7acdd180b53c431%3A0xea331c6d191f4f46!2sKonjac+Massa+MF!5e0!3m2!1spt-BR!2sbr!4v1518174973731" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- //modal maps -->
    </div>
    <!-- /principal -->

</div>

<!-- Scripts -->
<script src="{{ asset('js/site.js') }}"></script>
<script src="/site/js/scripts.min.js"></script>
<script>
//    const updateCarShipping = function() {
//
//    };

//    $(function() {
//
//        $.fn.serializeObject = function()
//        {
//            var o = {};
//            var a = this.serializeArray();
//            $.each(a, function() {
//                if (o[this.name]) {
//                    if (!o[this.name].push) {
//                        o[this.name] = [o[this.name]];
//                    }
//                    o[this.name].push(this.value || '');
//                } else {
//                    o[this.name] = this.value || '';
//                }
//            });
//            return o;
//        };
//
//        $(document).on('click', '.update-shipping', function(event) {
//            event.preventDefault();
//
//            let cartForm = $('#cart-form');
//
//            $.get('/cart/shipping/quote/'+cartForm.find('#cep').val(), function(result) {
//
//                let elShipping = cartForm.find('#shipping');
//
//                elShipping.html('<option value="">Selecione</option>');
//
//                $.each(result, function(index, value) {
//                    elShipping.append('<option value="'+value.id+'_'+value.delivery_time+'_'+value.price+'">'+value.carrier+' ('+value.description+') '+value.price+'</option>');
//                });
//
//            });
//
//        });
//
//        $(document).on('change', '#shipping', function(e) {
//            let el = $(this);
//
//            let value = el.val().split('_');
//
//            $('input[name="shipping[id]"]').val(value[0]);
//            $('input[name="shipping[delivery_time]"]').val(value[1]);
//            $('input[name="shipping[price]"]').val(value[2]);
//
//            let total = parseFloat( $('.total').data('total').replace('.', ',').replace(',', '.') );
//
//            total = total + parseFloat(value[2]);
//
//            $('.total').html('R$ '+total);
//
//        });
//
//        $(document).on('change', '#region', function(e) {
//            let el = $(this);
//
//            let value = el.val();
//
//            let dest = $('#locality');
//
//            dest.html('<option value="">Selecione</option>');
//
//            $.getJSON('/api/region/'+value+'/localities', function(result) {
//                console.log( result );
//
//                result.forEach(function(item) {
//                    let html = '<option value="'+item.id+'">'+item.name+'</option>';
//
//                    dest.append(html);
//                });
//
//                dest.prop('disabled', false);
//
//            });
//
//        });
//
//    });
//    const addCart = function(product, qtde) {
//        $.post('/api/cart/add', {"product": product, "qtde": qtde}, function(data, textStatus, jqXHR) {
//            console.log(data, textStatus);
//        });
//    };
//
//    $(function() {
//
//        $(document).on('click', '.add-cart', function(event) {
//
//            const el = $(this);
//
//            addCart( el.data('product'), $('.product_qtde').val() );
//
//        });
//
//    })(jquery);


</script>
<!-- Start of konjacmassamf Zendesk Widget script -->
<script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(e){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var e=this.createElement("script");n&&(this.domain=n),e.id="js-iframe-async",e.src="https://assets.zendesk.com/embeddable_framework/main.js",this.t=+new Date,this.zendeskHost="konjacmassamf.zendesk.com",this.zEQueue=a,this.body.appendChild(e)},o.write('<body onload="document._l();">'),o.close()}();
/*]]>*/</script>
<!-- End of konjacmassamf Zendesk Widget script -->
<!-- Google Analytics -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-89143967-1','auto');ga('send','pageview');
</script>
</body>
</html>