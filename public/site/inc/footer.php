
	</main>
    <!-- /conteudo -->

    <!-- footer -->
	<footer id="footer" <?php if ($page=="sobre.php") {?>class="page-sobre"<?php } ?>>
		<div class="container">
			<div class="row">
				<!-- footer menu -->
				<div class="col-12 col-sm-6 col-lg-3">
					<ul class="footer-menu nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="#">Produtos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Sobre a Konjac</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Blog</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Faq</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Demoimentos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Termos Gerais de Uso</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Como Comprar</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Política de Troca e Devolução</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Contato</a>
						</li>
					</ul>
				</div>
				<!-- contatos -->
				<div class="col-12 col-sm-6 col-lg-3">
					<h3 class="footer-titulos">Aceitamos todos os cartões</h3>
					<span class="cartoes"></span>
					<h3 class="footer-titulos">Nosso Número</h3>
					<p>(83) 3507-1955</p>
					<h3 class="footer-titulos">E-mail</h3>
					<p>contato@konjacmassafm.com.br</p>
				</div>
				<!-- endereco -->
				<div class="footer-end col-12 col-sm-6 col-lg-3">
					<h3 class="footer-titulos">Endereços</h3>
					<p>Loja Física<br>
					Empresarial Vitrine Mar - Av. Gen. Edson Ramalho, n. 20 - Loja 3 Manaíra, João Pessoa - PB, 58038-100</p>
					<p>Escritório Central<br>
					Av. Minas Gerais, Bairro dos Estados</p>
					<a href="" class="btn btn-verde2" title="Ver mapa">Ver mapa</a>
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
</div>
<!-- /principal -->

<?php include("public/inc/scripts.php"); ?>
</body>
</html>