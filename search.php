
<?php
include 'include/connection.php'
?>

<?php
$se = $_POST['search'];

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Frankeey</title>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700|Roboto:400,500" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	
		<a class="navbar-brand" href="#">Frankeey</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item active">
			  <a class="nav-link" href="/ruft/">Home <span class="sr-only">(current)</span></a>
			</li>
			<?php

			$query = "select*from toptitle";
			$result = mysqli_query($connection,$query);

			while($row = mysqli_fetch_array($result)){
				$value = $row["cattitle"];
				echo "<li class='nav-item'>
				<a class='nav-link' href='#'>{$value}</a>
			  </li>";
			}

			?>
			<li class="nav-item">
			  <a class="nav-link" href="#">About</a>
			</li>
			
		  </ul>
		</div>
	  </nav>
	</div>

	<!-- Start main body Area -->
	<div class="main-body section-gap mt--30">
		<div class="container box_1170">
			<div class="row">
				<div class="col-lg-8 post-list">
					<!-- Start Post Area -->
					<section class="post-area">

						<?php

						$search_qu = "SELECT*FROM postcourse WHERE posttile LIKE '%$se%'";
						$res = mysqli_query($connection,$search_qu);

                        $post_count = mysqli_num_rows($res);
                        if($post_count === 0){
                            echo "<h4>No Results</h4>";
                        }

						while($row = mysqli_fetch_assoc($res)){
							// print_r($row);
							
							$post_title = $row['posttile'];
							$post_author = $row['postauthor'];
							$post_date = $row['postdate'];
							$post_content = $row['postcontent'];
							$post_ima = $row['postimage'];
							$post_tag = $row['posttags'];
						

						?>

						<div class="single-post-item">
							<figure>
								<img class="post-img img-fluid" src="img/posts/<?php echo $post_ima ?>" alt="">
							</figure>
							<h3>
								<a href="blog-details.html"><?php echo $post_title ?></a>
							</h3>
							<p><?php echo $post_content  ?></p>
							<a href="blog-details.html" class="primary-btn text-uppercase mt-15">continue Reading</a>
							<div class="post-box">
								<div class="d-flex">
									<div>
										<a href="#">
											<img src="img/author/a1.png" alt="">
										</a>
									</div>
									<div class="post-meta">
										<div class="meta-head">
											<a href="#"><?php echo $post_author ?></a>
										</div>
										<div class="meta-details">
											<ul>
												<li>
													<a href="#">
														<span class="lnr lnr-calendar-full"></span>
														<?php echo $post_date ?>
													</a>
												</li>
												<li>
													<a href="#">
											
														<?php echo $post_tag ?>
													</a>
												</li>
											
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php } ?>

					
						<nav class="blog-pagination justify-content-center d-flex">
							<ul class="pagination">
								<li class="page-item">
									<a href="#" class="page-link" aria-label="Previous">
										<span aria-hidden="true">
											<span class="lnr lnr-arrow-left"></span>
										</span>
									</a>
								</li>

								<li class="page-item">
									<a href="#" class="page-link" aria-label="Next">
										<span aria-hidden="true">
											<span class="lnr lnr-arrow-right"></span>
										</span>
									</a>
								</li>
							</ul>
						</nav>
					</section>
					<!-- Start Post Area -->
				</div>

				<div class="col-lg-4 sidebar">


					<div class="single-widget search-widget">
						<form class="example" action="#" style="margin:auto;max-width:300px">
							<input type="text" placeholder="Search Posts" name="search">
							<button type="submit" name="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>

					

					<div class="single-widget popular-posts-widget">
						<h4 class="title">Popular Posts</h4>
						<div class="blog-list ">
							<?php 

							
								$postsel = "SELECT*FROM postcourse";
								$re = mysqli_query($connection,$postsel);
								while($row = mysqli_fetch_assoc($re)){
									// print_r($row);
									$post_title = $row['posttile'];
									$post_author = $row['postauthor'];
									$post_date = $row['postdate'];
									$post_content = $row['postcontent'];
									$post_ima = $row['postimage'];
									$post_tag = $row['posttags'];

							?>


							<div class="single-popular-post d-flex flex-row">
								<div class="popular-thumb">
									<img class="img-fluid" src="img/posts/<?php echo $post_ima ?>" alt="" width="150" height="300">
								</div>
								<div class="popular-details">
									<a href="blog-details.html">
										<h4><?php echo $post_title ?></h4>
									</a>
									<p class="text-uppercase"><?php echo $post_date ?></p>
								</div>
							</div>

							<?php } ?>

							</div>
						</div>
					<!-- </div> -->

					<div class="single-widget category-widget">
						<h4 class="title">Post Categories</h4>
						<ul>
						<?php

							$query = "select*from toptitle";
							$result = mysqli_query($connection,$query);

							while($row = mysqli_fetch_array($result)){
								$value = $row["cattitle"];
								echo "<li><a href='#' class='justify-content-between align-items-center d-flex myacss ' style='color: black;'>
								{$value}</a></li>";
							}

						?>
							 
						</ul>
					</div>

					

				</div>
			</div>
		</div>
	</div>
	<!-- Start main body Area -->


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/easing.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/main.js"></script>
</body>

</html>