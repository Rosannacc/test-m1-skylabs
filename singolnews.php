<html>
	<head>    
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>News</title>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/stylenews.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	</head>
	
	<body>
		<?php
	
		include("function.php");
		
		$id_news = $_GET['id'];
		
		// Ottengo tutte le news contenute nel file 
		$get_all_news = callAPI(LOCALHOST.'news.php?type=all');
		$response_all_news = json_decode($get_all_news, true);
		
		// init dell'array che conterrà la news trovata
		$singola_news = array();
		
		// Cerco la news per avente la chiave 'indice' passata in GET
		foreach($response_all_news as $news){
			if ($news['indice'] == $id_news){
				$singola_news = $news;
			}
		}
		
		?>
			<section class="home-blog bg-sand">
			
			<div class="container">
				<!-- section title -->
				<div class="row justify-content-md-center">
					<div class="col-xl-12 col-lg-13 col-md-13">
						<div class="section-title text-center title-ex1">
							<h2>News</h2>
						</div>
					</div>
				</div>
				<!-- section title ends -->
				<div class="row ">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="media blog-media">						  
							<div class="media-body bw" >
								<a href=""><h5 class="mt-0 "><?php echo $singola_news['titolo'] ?></h5></a>
								<p><?php echo $singola_news['body'] ?></p>
								<br>
								<ul>
									<li>by: <?php echo $singola_news['autore'] ?></li>
									
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div><br>
				<div class="row ">
					<div class="col-md-10"></div>
					<div class="col-md-2"><a onclick="history.go(-1)" class="btn btn-info center-block">Go Back</a></div>
				</div>
			</div>
		</div>
	</body>