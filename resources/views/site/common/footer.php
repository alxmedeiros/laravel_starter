
	</main>
    <!-- /conteudo -->

    <!-- footer -->
	<footer id="footer" <?php if (is_page('sobre-a-konjac')) {?>class="page-sobre"<?php } ?>>
		<div class="container">
			<div class="row">
				<!-- footer menu -->
				<div class="col-12 col-sm-6 col-lg-3">
					<?php wp_nav_menu( array('menu' => 'menu-footer', 'menu_class' => 'footer-menu nav flex-column')); ?>
					<h3 class="footer-titulos">Aceitamos todos os cartões</h3>
					<span class="cartoes"></span>
				</div>
				<!-- contatos -->
				<div class="col-12 col-sm-6 col-lg-3">
					<h3 class="footer-titulos">Central de Atendimento</h3>
					<p><b>Cliente Pessoa Física</b><br>
					(83) 3507 - 1955<br>
					<span class="d-flex align-items-center">(83) 9 8113 -  2306 <img src="<?php bloginfo('template_url'); ?>/public/img/ico-zap.svg"  class="svg icons" alt=""></span>
					atendimento.konjacmassamf@gmail.com</p>

					<p><b>Cliente CNPJ</b><br>
					<span class="d-flex align-items-center">(83) 9 8811 - 0107 <img src="<?php bloginfo('template_url'); ?>/public/img/ico-zap.svg"  class="svg icons" alt=""></span>
					comercial@konjacmassamf.com.br<br>
					konjacmassamf@gmail.com</p>
					
					<?php /*<h3 class="footer-titulos">Nosso Número</h3>
					<p>(83) 3507-1955</p>
					<h3 class="footer-titulos">E-mail</h3>
					<p>contato@konjacmassafm.com.br</p>*/?>
				</div>
				<!-- endereco -->
				<div class="footer-end col-12 col-sm-6 col-lg-3">
					<h3 class="footer-titulos">Endereços</h3>
					<p><?php /*Loja Física<br> */?>
					Empresarial Vitrine Mar - Av. Gen. Edson Ramalho, n. 20 - Loja 3 Manaíra, João Pessoa - PB, 58038-100</p>
					<p>Escritório Central<br>
					Av. Minas Gerais, Bairro dos Estados</p>
					<?php /*<a href="#maps" class="btn btn-verde2" data-toggle="modal" data-target="#modal-maps" title="Ver mapa">Ver mapa</a>*/?>
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
<?php wp_footer(); ?>
<?php //include(TEMPLATEPATH . '/puplic/inc/scripts.php'); ?>
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