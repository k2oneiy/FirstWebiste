
<?php  ob_start();
include 'include/header.php';
include 'include/silder.php';
include 'include/nav.php';
include '../include/connection.php';
include 'include/header.php';


    if(isset($_POST['submit'])){
      $value = $_POST['cat-title'];
      if(empty($value)){
        echo "This filled Empty";
      }
      else{
        $gery = "INSERT INTO toptitle(cattitle) VALUES('$value')";
        $exe = mysqli_query($connection,$gery);
      }   
    }


 ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-6 col-lg-6"  style="height: 200px;">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add Categories</h6>

      </div>
      <!-- Card Body -->
      <div class="card-body">
      <form action="categrey.php" method="POST">
      <!-- <label for="cat-title">Add Categories:  </label> -->
          <input type="text" class="form-control" name="cat-title"><br>
          <input type="submit" class="btn btn-primary" value="submit" name="submit">
      </form>
      </div>
      
    </div>

  </div>

  
  <div class="col-xl-6 col-lg-6   ">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
        <div class="dropdown no-arrow">
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
          <table class="table table-bordered table-hover">
              <thead>
                  <tr>
                      <!-- <th>Id</th> -->
                      <th>Categories</th>
                      <th>Remove</th>
                      <th>Edit</th>
                      <!-- <th>Remove</th>
                      <th>Edit</th> -->
                  </tr>
                  <?php 
                        $catq = "SELECT*FROM toptitle";
                        $catqu = mysqli_query($connection,$catq);
                        while($row = mysqli_fetch_assoc($catqu)){
                          $id = $row['catid'];
                          $cattile = $row['cattitle'];
                          echo "<tr>
                          
                          <th>{$cattile}</th>
                          <th><a href='categrey.php?delete={$id}'>delete</a></th>
                          <th><a href='categrey.php?edit={$id}'>edit</a></th>
                          </tr>";
                        }

                  ?>
                  
              </thead>
              <tbody>
                  

                 
              </tbody>
          </table>
      </div>
    </div>
    
  </div>

  </div>
</div>


<?php

if(isset($_GET['edit'])){
  $edit = $_GET['edit'];
  $catq = "SELECT*FROM toptitle WHERE catid=$edit";
  $catqu = mysqli_query($connection,$catq);
  while($row = mysqli_fetch_assoc($catqu)){
    $id = $row['catid'];
    $cattile = $row['cattitle'];
    ?>
      <!-- Area Chart -->
  <div class="col-xl-6 col-lg-6"  style="height: 200px;">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Categories</h6>

      </div>
      <!-- Card Body -->
      <div class="card-body">
      <form action="categrey.php?id=<?php echo $id ?>" method="POST">
      <!-- <label for="cat-title">Add Categories:  </label> -->
          <input type="text" value="<?php echo $cattile; ?>" class="form-control" name="cat-title"><br>
          <input type="submit" class="btn btn-primary" value="Edit" name="edit">
      </form>
      </div>
      
    </div>

  </div>

  <?php }

} ?>

<?php 

if(isset($_POST['edit'])){
  $edittitle = $_POST['cat-title'];
  $updateid = $_GET['id'];
  $updatequ = "UPDATE toptitle SET cattitle='$edittitle' WHERE catid='$updateid'";
  $upres = mysqli_query($connection,$updatequ);
    if(!$upres){
      echo "update failed";
    }
    else{
      header( 'location: categrey.php');
    }
}

?>

<?php
if(isset($_GET['delete'])){
    $deleid = $_GET['delete'];
    $delete = "DELETE FROM toptitle WHERE catid = '$deleid'";
    $ree = mysqli_query($connection,$delete);
    header( 'location: categrey.php');
}
 ?>
  

 
