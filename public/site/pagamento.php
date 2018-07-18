<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Konjac Massa MF</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="shortcut icon" href="public/img/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="public/img/apple-touch-icon-precomposed.png">
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">Você está utilizando um navegador <strong>desatualizado</strong>. Favor <a href="https://browsehappy.com/?locale=pt-br">atualizar seu navegador</a> para melhorar sua experiência.</p>
    <![endif]-->
<body>
	<div id="principal">
		<!-- topo -->
		<header id="topo-pagamento">
			<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
				<h1><a href="#" class="logo-konjac" title="Konjac Massa MF">Konjac Massa MF</a></h1>
			</nav>
		</header>
		
		<!-- conteudo -->
		<main class="content-pagamento">
			<!-- page atual -->
			<div class="container-fluid">
				<nav aria-label="breadcrumb py-3">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="#">Home</a></li>
				    <li class="breadcrumb-item"><a href="#">Library</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Data</li>
				  </ol>
				</nav>


				<div class="row">
					<!-- coluna esquerda -->
					<aside class="col-12 col-sm-6 pl-xl-5">
						<h2 class="nome">Nome da Pessoa Aqui</h2>
						<div class="alert alert-secondary" role="alert">
							<h5 class="box-titulo">Endereço para entrega</h5>
							<div class="form-check ml-4">
							  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
							  <label class="form-check-label" for="exampleRadios1">
							    Rua Loren Ipsum Dolor, 123<br>
							    João Pessoa/PB<br>
							    CEP:12345-678
							  </label>
							</div>
							<a href="" title="" class="btn btn-roxo">Adicionar outro endereço</a>
						</div>
						<div class="alert alert-secondary" role="alert">
							<h5 class="box-titulo">Dados para cobrança</h5>
							<div class="col-12 col-sm-6">
								<div class="form-group">
								    <input type="email" class="form-control" id="cpf" aria-describedby="cpfcnpb" placeholder="CPF/CNPJ">
								  </div>
							</div>
						</div>
					</aside>
					<!-- coluna direita -->
					<aside class="col-12 col-sm-6 pr-xl-5">
						<div class="alert alert-secondary" role="alert">
							<table class="sacola-table table table-responsive">
							  <thead class="thead-dark">
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
							    <tr>
							    	<td colspan="3"><h5>Subtotal</h5></td>
							    	<td>R$ 9.999,99</td>
							    </tr>
							    <tr class="bg-total">
							    	<td colspan="2"><h4>Total</h4></td>
							    	<td colspan="2 text-right"><h4 class="text-right">R$ 9.999,99</h4></td>
							    </tr>
							  </tbody>
							</table>
							<div class="row">
							<div class="form-group col-10 col-sm-6">
								<input type="text" class="form-control" placeholder="Código do cupom de desconto">
							</div>
							<div class="col-2 px-0">
								<button type="submit" class="btn btn-roxo mx-0 my-0">ok</button>
							</div>
							</div>
						</div>
					</aside>

				</div>
				<button class="btn btn-verde2 ml-xl-4">Finalizar compra</button>
			</div>
			
		</main>
		<!-- //conteudo -->

		<!-- footer -->
		<footer class="text-center py-3"><small>Konjac Massa MF</small></footer>
		<!-- //footer -->

		<!-- scripts -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</div>
</body>
</html>