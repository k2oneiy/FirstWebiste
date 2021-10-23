<?php ob_start();
include 'include/header.php';
include 'include/silder.php';
include 'include/nav.php';
include '../include/connection.php';
?>

<!-- Bar Chart -->
        <div class="card shadow mb-4">

        <?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page="";
        }

        switch($page){
            case 'add_post':
                include 'include/add_post.php';
                break;
            case 'edit_post':
                include 'include/edit_post.php';
                break; 
            default:
                include 'include/viewallusers.php';
                break;
        }


        ?>
               
        </div>


<?php
include 'include/footer.php';
?>