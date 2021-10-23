<?php 
include 'include/connection.php';
?>

<div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View All Users</h6>
                </div>
                <div class="card-body">
                
                <table class="table table-bordered table-hover">
                      <thead >
                          <tr>
                              <th>Id</th>
                              <th>User name</th>
                              <th>First name</th>
                              <th>Last name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Admin</th>
                              <th>Subcriber</th>
                              <th>Delete</th>
                             
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                                $usersel = "SELECT*FROM users";
                                $userres = mysqli_query($connection,$usersel);
                                while($row = mysqli_fetch_assoc($userres)){
                                    $userid = $row['userid'];
                                    $username = $row['username'];
                                    $userfirstname = $row['userfirstname'];
                                    $userlastname = $row['userlastname'];
                                    $useremail = $row['useremail'];
                                    $userrole = $row['userrole'];

                                    echo "<tr>
                                    <td>{$userid}</td>
                                    <td>$username</td>
                                    <td>$userfirstname</td>";
                                    echo " <td>$userlastname</td>";
                                    echo "<td>$useremail</td>";
                                    echo "<td>$userrole</td>

                                    <td><a href='users.php?admin={$userid}'>Admin</a></td>
                                    <td><a href='users.php?sub={$userid}'>Subcriber</td>
                                    <td><a href='users.php?delete={$userid}'>Delete</td>
                                    
                                </tr>";
                            
                                ?>
                          

                          <?php } ?>
                      </tbody>
                  </table>
                  </div>
              </div>


              <?php

              if(isset($_GET['delete'])){
                  $de_user_id = $_GET['delete'];
                  $del_user_qu = "DELETE FROM users WHERE userid = $de_user_id";
                  $del_r = mysqli_query($connection,$del_user_qu);
                  header("location:users.php");
              }

              if(isset($_GET['admin'])){
                $admin_user_id = $_GET['admin'];
                $admin_user_qu = "UPDATE users SET userrole='admin' WHERE userid = $admin_user_id";
                $admin_user = mysqli_query($connection,$admin_user_qu);
                header("location:users.php");
            }

            if(isset($_GET['sub'])){
                $sub_user_id = $_GET['sub'];
                $sub_user_qu = "UPDATE users SET userrole='subcriber' WHERE userid = $sub_user_id";
                $sub_user = mysqli_query($connection,$sub_user_qu);
                header("location:users.php");
            }

              ?>