<?php 

include 'include/connection.php';

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
    <title>Blog Details</title>

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
              
              </ul>
            </div>
          </nav>
        </div>

    <!-- Blog Area -->
    <section class="blog_area section-gap single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <?php

                if(isset($_GET['post'])){
                    $postidval = $_GET['post'];
                }

                                        

                $postsel = "SELECT*FROM postcourse WHERE postid=$postidval";
                $re = mysqli_query($connection,$postsel);

                while($row = mysqli_fetch_assoc($re)){
                    // print_r($row);
                    $post_title = $row['posttile'];
                    $post_author = $row['postauthor'];
                    $post_date = $row['postdate'];
                    $post_content = $row['postcontent'];
                    $post_ima = $row['postimage'];
                    $post_tag = $row['posttags'];
                    $post_id = $row['postid'];

                }
                ?>

                    <div class="main_blog_details">
                        <img class="img-fluid" src="img/posts/<?php echo $post_ima ?>" alt="">
                        <h4><?php echo $post_title ?></h4>
                        <div class="user_details">
                           
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                        <h5><?php echo $post_author ?></h5>
                                        <p><?php echo $post_date ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <img src="img/blog/user-img.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php  echo $post_content ?>
                        
                    </div>
                    
                    <div class="comments-area">
                        <!-- <h4>05 Comments</h4> -->

                        <?php

                        $catq = "SELECT*FROM comments WHERE commentpostid=$postidval AND commentstatus=
                        'approve'";
                        $catqu = mysqli_query($connection,$catq);
                        while($row = mysqli_fetch_assoc($catqu)){
                            $commentuser = $row['commentuser'];
                            $commentcontent = $row['commentcontent'];
                            $commentdate = $row['commentdate'];
                        ?>

                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#"><?php echo $commentuser ?></a></h5>
                                        <p class="date"><?php echo $commentdate ?></p>
                                        <p class="comment">
                                            <?php echo $commentcontent ?>
                                        </p>
                                    </div>
                                </div>
                                <!-- <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div> -->
                            </div>
                        </div>
                        <?php } ?>
                      
                      
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Comment</h4>
                        <form action="blog-details.php?post=<?php echo $postidval ?>"  method="POST">
                            <div class="form-group form-inline">
                                
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control mb-10" placeholder="Username" ><br>
                                <input type="email" name="email" class="form-control mb-10" placeholder="Email  address" ><br>
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                            
                            <input type="submit" value="Send Message" name="comment" class="primary-btn submit_btn text-uppercase">
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="single-widget search-widget">
                        <form class="example" action="#" style="margin:auto;max-width:300px">
                            <input type="text" placeholder="Search Posts" name="search2">
                            <button type="submit"><i class="fa fa-search"></i></button>
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
    </section>
    <!-- Blog Area -->

    
    <!-- End footer Area -->

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

<?php 

if(isset($_POST['comment'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $commentquery = "INSERT INTO comments(commentpostid,commentuser,commentemail,commentcontent,commentstatus,commentdate) values($post_id,'$name','$email','$message','unapprove',now())";
    $commentre =  mysqli_query($connection,$commentquery);


}







?>