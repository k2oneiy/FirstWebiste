

<?php

    if(isset($_GET['post_id'])){
        $idvalue = $_GET['post_id'];

        $catq = "SELECT*FROM postcourse WHERE postid = $idvalue";
        $catqu = mysqli_query($connection,$catq);
            while($row = mysqli_fetch_assoc($catqu)){
                $id = $row['postid'];
                $posttitle = $row['posttile'];
                $author = $row['postauthor'];
                $postcontent = $row['postcontent'];
                $postimage = $row['postimage'];
                $postdate = $row['postdate'];
                $posttags = $row['posttags'];
                $postcateid = $row['postcateid'];
                $postcommentcount = $row['postcommentcount'];
                $poststatus = $row['poststatus'];
            }
    }

include '../include/connection.php';

    if(isset($_POST['update_post'])){
            $post_title = $_POST['post_title'];
            $post_category_id = $_POST['post_category_id'];
            $post_author =  $_POST['post_author'];
            $post_status = $_POST['post_status'];

            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];

            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_date = date('d-m-y');
            $post_comment_count = 4; 
            move_uploaded_file($post_image_temp,"../img/posts/$post_image");

            if(empty($post_image)){
                $catq = "SELECT*FROM postcourse WHERE postid = $idvalue";
                $catqu = mysqli_query($connection,$catq);
                    while($row = mysqli_fetch_assoc($catqu)){
                        $post_image = $row['postimage'];
                }
            }

            $update_insert_query = "UPDATE postcourse SET posttile = '$post_title', postauthor = '$post_author',postcontent = '$post_content', postcateid = '$post_category_id', postdate = now() , poststatus = '$post_status', postcommentcount='$post_comment_count', postimage='$post_image', posttags = '$post_tags' WHERE postid = '$idvalue'";

            $insert_quer = mysqli_query($connection,$update_insert_query);
            if(!$insert_quer){
                echo "hi".mysqli_error($connection);
            }

    }

?>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-blod text-primary">Edit Post</h6>

    </div>

</div>



<div class="container">
    <div class="card-body">
<form action="posts.php?page=edit_post&post_id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
    <label for="title">Post Title</label>
    <input type="text" value="<?php echo $posttitle ?>" class="form-control" name="post_title">
    <br>
    <label for="title">Post Author</label>
    <input type="text" value="<?php echo $author ?>" class="form-control" name="post_author">
    <br>
    <label for="title">Post Category id</label><br>
    <select name="post_category_id" id="">
        <?php 

            $catidquery = "SELECT*FROM toptitle";
            $catselqu = mysqli_query($connection,$catidquery);

            while($row = mysqli_fetch_assoc($catselqu)){
                $catt = $row['cattitle'];
                $cati = $row['catid'];
                echo "<br>";
                echo "<option value='$cati'>$catt</option>";
                echo "<br>";
            }


        ?>
        <!-- <br>
        <option value="1">1</option>
        <br> -->
    </select>
    <br><br>
    <label for="title">Post Status</label>
    <input type="text" value="<?php echo $poststatus ?>" class="form-control" name="post_status">
    <br>
    <label for="title">Post Image</label>
    <div class="form-group"><br>
    <img src='../img/posts/<?php echo $postimage ?>' width=80 ><br><br>
    <input type="file" name="image" value="<?php echo $postimage ?>">
    
    </div>
    <div class="form-group">
    <label for="title">Post Tags</label>
    <input type="text" value="<?php echo $posttags ?>" class="form-control" name="post_tags">
    </div>
    <!-- <div class="form-group">
    <label for="title">Post Date</label>
    <input type="text" value="" class="form-control" name="post_date">
    </div> -->
    <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" value="" rows="10" cols="30" name="post_content"><?php echo $postcontent ?></textarea>
    </div>
    <div class="form-group">
    <input type="submit" value="Publish Post" class="btn btn-primary" name="update_post">
    </div>
</form>

</div>
          </div>
        </div>











<?php 

                // $post_title = $_POST['post_title'];
                // $post_category_id = $_POST['post_category_id'];
                // $post_author =  $_POST['post_author'];
                // $post_status = $_POST['post_status'];

                // $post_image = $_FILES['image']['name'];
                // $post_image_temp = $_FILES['image']['tmp_name'];

                // $post_tags = $_POST['post_tags'];
                // $post_content = $_POST['post_content'];
                // $post_date = date('d-m-y');
                // $post_comment_count = 4; 

?>

<?php 

    if(isset($_POST['update_post'])){
        echo "<script>alert('Update Sucessful');</script>";
    }

?>
