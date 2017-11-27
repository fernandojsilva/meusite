<?php

// $cnx = mysql_connect('localhost', 'id3007439_bike', 'B1k3craft');
// if (!$cnx) {
// 	die('Could not connect: ' . mysql_error());
// }
// // echo 'Connected successfully';
// mysql_select_db('id3007439_bikcraft', $cnx) or die('Could not select database.');

// $result = mysql_query('SELECT * FROM produtos WHERE 1=1');
// if (!$result) {
// 	die('Invalid query: ' . mysql_error());
// }

// for($i = 0; $array[$i] = mysql_fetch_assoc($result); $i++);

	define( 'MYSQL_HOST', 'localhost' );
	define( 'MYSQL_USER', 'id3007439_bike' );
	define( 'MYSQL_PASSWORD', 'B1k3craft' );
	define( 'MYSQL_DB_NAME', 'id3007439_bikcraft' );

	try
	{
	    $cnx = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
	}
	catch ( PDOException $e )
	{
	    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
	}

	$cnx->query("SET NAMES utf8;");

	$sql = 'SELECT * FROM produtos WHERE 1=1';
	// $result = $cnx->query($sql); // 1º Modelo
	// for($i = 0; $array[$i] = $result->fetch(PDO::FETCH_ASSOC); $i++) ;		

	// 2º Modelo + seguro
	try {
		$query = $cnx->prepare($sql);
		$query->execute();
		$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}		

	foreach($resultado as $r){
	 	$array[] = array($r['modelo'],$r['descricao']);
	}		



 // print_r($array);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>bik craft</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/responsivo.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="js/animacao.js"></script>
</head>
<body>
	<header class="header">
		<div class="container">
			<a href="index.html" class="col-md-4 col-sm-4 col-xs-12">
				<img src="img/bikcraft.png" alt="Logo marca Bikcraft">
			</a>
			<nav class="col-md-8 col-sm-8 col-xs-12 header_menu">
				<ul>
					<li><a href="sobre.html">Sobre</a></li>
					<li><a href="produtos.html">Produtos</a></li>
					<li><a href="portfolio.html">Portfólio</a></li>
					<li class="contato"><a href="contato.html">Contato</a></li>
				</ul>				
			</nav>

		</div>
	</header>
	
	<section class="row introducao">
		<div class="container animated fadeInDown">
			<h1>Bicicletas Feitas a Mão</h1>
			<blockquote class="quote-externo">
				<p>"não tenha nada em sua casa que voce
				não considere útil ou acredita ser bonito"</p>
				<cite>WILLIAM MORRIS</cite>
			</blockquote>
			<a href="produtos.html" class="btn botao">Orçamento</a>
		</div>
	</section>
	<section class="container produtos animated fadeInDown">
		<h2 class="subtitulo">Produtos</h2>
		<ul class="produtos_lista">
			<li class="col-md-4 col-sm-4 col-xs-12">
				<div class="produtos_lista_icone animar-interno1">
					<div class="produtos_icone">
						<img src="img/produtos/passeio.png" alt="Bicicleta Passeio">
					</div>
					<h3><?php echo $array[0][0]; //($array[0]['modelo']); ?></h3>
					<p><?php echo ($array[0][1]); //($array[0]['descricao']); ?></p>
				</div>
			</li>
			<li class="col-md-4 col-sm-4 col-xs-12">
				<div class="produtos_lista_icone animar-interno2">
					<div class="produtos_icone">
						<img src="img/produtos/esporte.png" alt="Bicicleta Esporte">
					</div>
					<h3><?php echo $array[1][0]; //($array[1]['modelo']); ?></h3>
					<p><?php echo ($array[1][1]); //($array[1]['descricao']); ?></p>
				</div>	
			</li>
			<li class="col-md-4 col-sm-4 col-xs-12">
				<div class="produtos_lista_icone animar-interno3">
					<div class="produtos_icone">
						<img src="img/produtos/retro.png" alt="Bicicleta Retrô">
					</div>
					<h3><?php echo $array[2][0]; //($array[2]['modelo']); ?></h3>
					<p><?php echo ($array[2][1]); //($array[2]['descricao']); ?></p>
				</div>	
			</li>
		</ul>

		<div class="call">
			<p>clique aqui e veja os detalhes dos produtos</p>
			<a href="produtos.html" class="btn botao botao-preto">Produtos</a>
		</div>
	</section>	
	<section class="row portfolio">
		<div class="container">
			<h2 class="subtitulo">Portfólio</h2>
				<div class="portfolio_lista">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<img src="img/portfolio/passeio.jpg" class="img-rounded" 
						alt="Bicicleta Passeio">
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<img src="img/portfolio/retro.jpg" class="img-rounded"	
						alt="Bicicleta Retrô">
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<img src="img/portfolio/esporte.jpg" class="img-rounded" 
						alt="Bicicleta Esporte">
					</div>	
				</div>	
			<div class="call">
				<p>conheça mais o nosso portfólio</p>
				<a href="portfolio.html" class="btn botao">Portfólio</a>
			</div>
		</div>
	</section>
	<section class="qualidade container">
		<h2 class="subtitulo">Qualidade</h2>
		<img src="img/bikcraft-qualidade.png" alt="Bikcraft">
		<!-- ul.qualidade_lista>li.col-md-6*3>h3+p -->
		<ul class="qualidade_lista">
			<li class="col-md-4">
				<h3>Durabilidade</h3>
				<p>Sólida como pedra, leve como o vento e resistente como o diamante, são nossos diferenciais.</p>
			</li>
			<li class="col-md-4">
				<h3>Design</h3>
				<p>Feitas sob medida para o melhor conforto e eficiência. Adaptamos a sua Bikcraft para o seu corpo.</p>
			</li>
			<li class="col-md-4">
				<h3>Sustentabilidade</h3>
				<p>Além de ajudar a cuidar do meio ambiente, tirando carros da rua, toda a produção é sustentável.</p>
			</li>
		</ul>
			<div class="call">
				<p>conheça mais a nossa história</p>
				<a href="sobre.html" class="btn botao botao-preto">Sobre</a>
			</div>
	</section>

	<div class="quebra">
		<blockquote class="quote-externo container">
			<p>“o verdadeiro segredo da felicidade está em ter um genuíno interesse por todos os detalhes da vida cotidiana.”</p>
			<cite>WILLIAM MORRIS</cite>
		</blockquote>
	</div>

	<footer>
		<div class="footer">
			<div class="container">
				<div class="footer_historia col-md-4">
					<h3>Nossa História</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis tenetur quos quas quia assumenda, illo totam asperiores laudantium dolorem ducimus obcaecati natus ut magnam quidem! Illo adipisci autem nostrum iure.</p>
				</div>
				<div class="footer_contato col-md-4">
					<h3>Contato</h3>
					<ul>
						<li>- 21 9988-7766</li>
						<li>- contato@bikcraft.com</li>
						<li>- Botafogo - RJ</li>
					</ul>
				</div>
				<div class="footer_redes col-md-4">
					<h3>Redes Sociais</h3>
					<!-- ul>li*3>a>img -->
					<ul>
						<li><a href="#"><img src="img/redes-sociais/facebook.png" 
							alt="Facebook"></a></li>
						<li><a href="#"><img src="img/redes-sociais/instagram.png" 
							alt="Instagram"></a></li>
						<li><a href="#"><img src="img/redes-sociais/twitter.png" 
							alt="Twitter"></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="copy">
			<div class="container">
				<p>Bickcraft 2017 - Alguns direitos reservados</p>
			</div>
		</div>
	</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
</body>
</html>