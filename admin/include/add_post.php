<?php

include '../include/connection.php';

if(isset($_POST['add_post'])){
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
        $post_insert_query = "INSERT INTO postcourse(posttile,postauthor,postcontent,postdate,postimage,posttags,postcateid,postcommentcount,poststatus) VALUES('$post_title','$post_author','$post_content',now(),'$post_image','$post_tags','$post_category_id','$post_comment_count','$post_status')";

        $insert_quer = mysqli_query($connection,$post_insert_query);

}

?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-blod text-primary">Add Post</h6>

    </div>

</div>

<div class="container">
    <div class="card-body">
<form action="posts.php?page=add_post" method="post" enctype="multipart/form-data">
    <label for="title">Post Title</label>
    <input type="text" value="" class="form-control" name="post_title">
    <br>
    <label for="title">Post Author</label>
    <input type="text" value="" class="form-control" name="post_author">
    <br>
    <label for="title">Post Category id</label><br>
    <select name="post_category_id" id="">
        <br>
        <option value="1">1</option>
        <br>
    </select>
    <br><br>
    <label for="title">Post Status</label>
    <input type="text" value="" class="form-control" name="post_status">
    <br>
    <label for="title">Post Image</label>
    <div class="form-group">
    <input type="file" name="image">
    </div>
    <div class="form-group">
    <label for="title">Post Tags</label>
    <input type="text" value="" class="form-control" name="post_tags">
    </div>
    <!-- <div class="form-group">
    <label for="title">Post Date</label>
    <input type="text" value="" class="form-control" name="post_date">
    </div> -->
    <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" value="" rows="10" cols="30" name="post_content"></textarea>
    </div>
    <div class="form-group">
    <input type="submit" value="Publish Post" class="btn btn-primary" name="add_post">
    </div>
</form>

</div>
          </div>
        </div>





