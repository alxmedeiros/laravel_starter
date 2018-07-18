<?php /* Template Name: Contato */ ?>
<?php include("public/inc/header.php"); ?>

	<!-- contato -->
	<section class="contato">
		<header class="titulos-area card text-white">
			<div class="container">
				<h1 class="titulos-page">Contato</h1>
				<!-- page atual -->
				<nav aria-label="breadcrumb" role="navigation">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="index.php" title="">Página principal</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Contato</li>
				  </ol>
				</nav>
			</div>
		</header>

		<div class="container mb-sm-5">
			<div class="row">
				<div class="col-12 col-sm-10 mx-sm-auto col-lg-6">
					<form>
						<div class="form-group">
							<label for="nome" class="label-control">Nome</label>
							<input type="text" name="nome" class="form-control" id="nome">
						</div>
						<div class="form-group">
							<label for="email" class="label-control">E-mail</label>
							<input type="email" name="email" class="form-control" id="email">
						</div>
						<div class="form-group">
							<label for="telefone" class="label-control">Telefone</label>
							<div class="col-12 col-sm-6 row">
								<input type="tel" name="telefone" class="form-control" id="telefone">
							</div>
						</div>
						<div class="form-group">
							<label for="mensagem" class="label-control">Mensagem</label>
							<textarea class="form-control" name="mensagem" rows="6"></textarea><br>
							<div class="g-recaptcha pull-right" data-sitekey="6Ldx8BsUAAAAADqopTgEOGRxMT9xvv1SbjwW6hDs"></div>
						</div>
						<button type="submit" class="btn btn-verde2 pull-right">Enviar</button>
					</form>
				</div>
			</div>
		</div>

	</section>
	<!-- //contato -->

<?php include("public/inc/footer.php"); ?>
