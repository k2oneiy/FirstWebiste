<?php

    if(isset($_SESSION['username'])){
        $currnetusername = $_SESSION['username'];

        $userq = "SELECT*FROM users WHERE username = '$currnetusername'";
        $userqu = mysqli_query($connection,$userq);
            while($row = mysqli_fetch_assoc($userqu)){
                $username = $row['username'];
                $userfirstname = $row['userfirstname'];
                $userlastname = $row['userlastname'];
                $useremail = $row['useremail'];
                $userpassword = $row['userpassword'];
                $userrole = $row['userrole'];
               
            }
    }

include '../include/connection.php';

    if(isset($_POST['update_user'])){
            $username = $_POST['username'];
            $userfirstname = $_POST['userfirstname'];
            $userlastname =  $_POST['userlastname'];
            $useremail = $_POST['useremail'];

            // $post_image = $_FILES['image']['name'];
            // $post_image_temp = $_FILES['image']['tmp_name'];

            $userpassword = $_POST['userpassword'];
            $userrole = $_POST['userrole'];

            // $post_date = date('d-m-y');
            // $post_comment_count = 4; 

            // move_uploaded_file($post_image_temp,"../img/posts/$post_image");

            // if(empty($post_image)){
            //     $catq = "SELECT*FROM postcourse WHERE postid = $idvalue";
            //     $catqu = mysqli_query($connection,$catq);
            //         while($row = mysqli_fetch_assoc($catqu)){
            //             $post_image = $row['postimage'];
            //     }
            // }

            $update_insert_query = "UPDATE users SET username = '$username', userfirstname = '$userfirstname',userlastname = '$userlastname', useremail = '$useremail', userpassword = '$userpassword', userrole='$userrole' WHERE useremail = '$useremail'";

            $insert_quer = mysqli_query($connection,$update_insert_query);
            if(!$insert_quer){
                echo "hi".mysqli_error($connection);
            }

    }

?>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-blod text-primary">Edit Profile</h6>

    </div>

</div>

<div class="container">
    <div class="card-body">
<form action="profile.php" method="post" enctype="multipart/form-data">
    <label for="title">User name</label>
    <input type="text" value="<?php echo $username ?>" class="form-control" name="username">
    <br>
    <label for="title">Fisrt name</label>
    <input type="text" value="<?php echo $userfirstname ?>" class="form-control" name="userfirstname">
    <br>
    <label for="title"> Last name</label>
    <input type="text" value="<?php echo $userlastname ?>" class="form-control" name="userlastname">
    <br>
    <div class="form-group">
    <label for="title">User Email</label>
    <input type="text" value="<?php echo $useremail ?>" class="form-control" name="useremail">
    </div>
    <div class="form-group">
    <label for="title">User Password</label>
    <input type="password" value="<?php echo $userpassword ?>" class="form-control" name="userpassword">
    </div>
    <div class="form-group">
    <label for="title">User role</label>
    <input type="text" value="<?php echo $userrole ?>" class="form-control" name="userrole">
    </div>
    <br><br>
    <div class="form-group">
    <input type="submit" value="Update User" class="btn btn-primary" name="update_user">
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
