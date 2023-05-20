<!doctype html>
<html lang="pt-BR" data-bs-theme="auto">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.111.3">
	<title>Cadastrar vale</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
	<link href="<?php echo $URL; ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">

	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}

		.b-example-divider {
			width: 100%;
			height: 3rem;
			background-color: rgba(0, 0, 0, .1);
			border: solid rgba(0, 0, 0, .15);
			border-width: 1px 0;
			box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
		}

		.b-example-vr {
			flex-shrink: 0;
			width: 1.5rem;
			height: 100vh;
		}

		.bi {
			vertical-align: -.125em;
			fill: currentColor;
		}

		.nav-scroller {
			position: relative;
			z-index: 2;
			height: 2.75rem;
			overflow-y: hidden;
		}

		.nav-scroller .nav {
			display: flex;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: -1px;
			overflow-x: auto;
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
		}

		.btn-bd-primary {
			--bd-violet-bg: #712cf9;
			--bd-violet-rgb: 112.520718, 44.062154, 249.437846;

			--bs-btn-font-weight: 600;
			--bs-btn-color: var(--bs-white);
			--bs-btn-bg: var(--bd-violet-bg);
			--bs-btn-border-color: var(--bd-violet-bg);
			--bs-btn-hover-color: var(--bs-white);
			--bs-btn-hover-bg: #6528e0;
			--bs-btn-hover-border-color: #6528e0;
			--bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
			--bs-btn-active-color: var(--bs-btn-hover-color);
			--bs-btn-active-bg: #5a23c8;
			--bs-btn-active-border-color: #5a23c8;
		}

		.bd-mode-toggle {
			z-index: 1500;
		}
	</style>
</head>

<body class="bg-body-tertiary">

<div class="container">
		<main>
			<div class="py-5 text-center">
				<h2>Cadastrar vale</h2>
			</div>

			<div class="row g-5">
				<div class="col-md-7 col-lg-12">
					<form class="needs-validation" method="post" action="#">
						<div class="row g-3">
							<div class="col-sm-6">
								<label for="nome" class="form-label">Nome</label>
								<input type="text" class="form-control" id="nome" name="nome" placeholder="" value="" required>
							</div>

							<div class="col-sm-6">
								<label for="descricao" class="form-label">Descricao</label>
								<input type="text" class="form-control" id="descricao" name="descricao" placeholder="" value="" required>
							</div>

							<div class="col-md-12">
								<label for="quantidade" class="form-label">Quantidade</label>
								<select class="form-select" id="quantidade" name="quantidade" required>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
						</div>

						<hr class="my-4">

						<button class="w-100 btn btn-primary btn-lg" type="submit">Cadastrar vale</button>
					</form>
				</div>
			</div>
		</main>
	</div>


	<script src="<?php echo $URL; ?>/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>