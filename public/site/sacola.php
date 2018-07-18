<?php include("public/inc/header.php"); ?>

<!-- sacola -->
<section class="sacola">
	<header class="titulos-area">
		<div class="container">
			<h1 class="titulos-page">Sacola de compra</h1>
			<!-- page atual -->
			<nav aria-label="breadcrumb" role="navigation">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="#">Página principal</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Produtos</li>
			  </ol>
			</nav>
		</div>
	</header>

	<div class="sacola-content">
		<div class="container">
			<table class="sacola-table table table-responsive">
			  <thead>
			    <tr>
			      <th scope="col">Produtos</th>
			      <th scope="col">Quantidade</th>
			      <th scope="col">Valor unitário</th>
			      <th scope="col">Valor total</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>
			      	<div class="sacola-thumb">
			      		<img src="public/img/produto-tb.jpg" class="d-flex" alt="">
			      		<h6 class="d-flex">Espaguete Konjac Massa</h6>
			      	</div>
			      </td>
			      <td>
		      		<div class="sacola-qnt">
		      			<input type="text" class="form-control" id="quantidade" value="9999">
		      			<a href="" class="btn-remover" title="Retirar do carrinho">X</a>
		      		</div>
			      </td>
			      <td>
			      	<h5>R$ 22,00</h5>
			      </td>
			      <td>
			      	<h5>R$ 110,00</h5>
			      </td>
			    </tr>
			    <tr>
			      <td>
			      	<div class="sacola-thumb">
			      		<img src="public/img/produto-tb.jpg" class="d-flex" alt="">
			      		<h6 class="d-flex">Espaguete Konjac Massa Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo dolor itaque quidem expedita quas ipsam. </h6>
			      	</div>
			      </td>
			      <td>
		      		<div class="sacola-qnt">
		      			<input type="text" class="form-control" id="quantidade" value="5">
		      			<a href="" class="btn-remover" title="Retirar do carrinho">X</a>
		      		</div>
			      </td>
			      <td>
			      	<h5>R$ 22,00</h5>
			      </td>
			      <td>
			      	<h5>R$ 110,00</h5>
			      </td>
			    </tr>
			  </tbody>
			</table>
			<div class="row">
				<div class=" col-12 col-sm-6">
					<div class="sacola-frete d-flex py-4 px-5 p-sm-5">
						<p>Simule o prazo de entrega e o frete para seu CEP abaixo:</p>
						<div class="form-inline form-group">
							<input type="text" class="form-control" id="cep" value="5">
							<button type="submit" class="btn btn-roxo mx-0 my-0">ok</button>
						</div>
						<a href="" title="Não sei meu CEP">Não sei meu CEP</a>
					</div>
					<a href="" class="btn btn-lg btn-roxo" title="">Continuar comprando</a>
				</div>
				<div class="col-12 col-sm-6">
					<div class="sacola-total d-flex py-4 px-5">
						<table class="sacola-total-table table mb-0">
							<tr>
								<td>2 Produtos<br>
								Frete:</td>
								<td>R$ 110,00</td>
							</tr>
							<tr>
								<td>Total<br>
								<a href="" title="Usar cupom de desconto">Usar cupom de desconto</a></td>
								<td>R$ 110,00</td>
							</tr>
						</table>
					</div>
					<a href="" class="btn btn-lg btn-verde2 float-left float-sm-right" title="">Fechar compra</a>
				</div>
			</div>
		</div>
		
	</div>
</section>
<!-- //sacola -->

<?php include("public/inc/footer.php"); ?>
