<html>
	<head>
    
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Latest News</title>
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
	
	// Ottengo tutte le news contenute nel file 
	$get_all_news = callAPI(LOCALHOST.'news.php?type=all');
	$response_all_news = json_decode($get_all_news, true);
	
	// Ottengo solo una news
	$get_one_news = callAPI(LOCALHOST.'news.php?type=one');	
	$response_one_news = json_decode($get_one_news, true);
	
		
	?>
		<section class="home-blog bg-sand">
			<div class="container">
				<!-- section title -->
				<div class="row justify-content-md-center">
					<div class="col-xl-12 col-lg-13 col-md-13">
						<div class="section-title text-center title-ex1">
							<h2>Latest News</h2>
						</div>
					</div>
				</div>
				<div class="row ">
					<?php foreach($response_all_news as $news){ ?>
					
						<div class="col-md-6">
							<div class="media blog-media">						  
								<div class="media-body">
									<h5 class="mt-0"><?php echo $news['titolo'] ?></h5>
									<?php echo substr($news['body'],0,100) ?>
									<a href="<?php echo LOCALHOST."singolnews.php?id=".$news['indice'] ?>" class="post-link">Read More</a>
									<ul>
										<li>by: <?php echo $news['autore'] ?></li>
										
									</ul>
								</div>
							</div>
						</div>
					<?php } ?>
				</div><br>
				<div class="row ">
					<div class="col-md-10"></div>
					<div class="col-md-2"><a onClick="window.location.reload();" class="btn btn-info center-block">Load News</a></div>
				</div>
			</div>			
		</div>	
	</body>