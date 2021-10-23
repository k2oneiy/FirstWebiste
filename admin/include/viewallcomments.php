<div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View All Comments</h6>
                </div>
                <div class="card-body">
                
                <table class="table table-bordered table-hover">
                      <thead >
                          <tr>
                              <th>Id</th>
                              <th>Author</th>
                              <th>Comment Email</th>
                              <th>Comment</th>
                              <th> post</th>
                              <th>Comment Status</th>
                              <th>Comment date</th>
                              <th>Approve</th>
                              <th>Unapprove</th>
                             
                              <th>Delete</th>
                             
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                                $catq = "SELECT*FROM comments";
                                $catqu = mysqli_query($connection,$catq);
                                while($row = mysqli_fetch_assoc($catqu)){
                                    $commetid = $row['commetid'];
                                    $commentpostid = $row['commentpostid'];
                                    $commentuser = $row['commentuser'];
                                    $commentemail = $row['commentemail'];
                                    $commentcontent = $row['commentcontent'];
                                    $commentstatus = $row['commentstatus'];
                                    $commentdate = $row['commentdate'];
                                
                                    echo "<tr>
                                    <td>$commetid</td>
                                    <td>$commentuser</td>
                                    
                                    <td>$commentemail</td>";



                            

                                    echo " <td>$commentcontent</td>";

                                    
                                    $catidcommentquery = "SELECT*FROM postcourse WHERE postid=$commentpostid";
                                    $catselque = mysqli_query($connection,$catidcommentquery);
                                    
                                    while($row = mysqli_fetch_assoc($catselque)){
                                        $catt = $row['posttile'];
                                        $cati = $row['postid'];
                                        
                                        echo "<td><a href='../blog-details.php?post={$cati}'>$catt</a></td>";
                                        
                                    }

                                   
                                    
                                   echo "
                                    <td>$commentstatus</td>


                                    <td>$commentdate</td>
                                    
                                    <td><a href='comments.php?approve={$commetid}'>Approve</a></td>
                                    <td><a href='comments.php?unapprove={$commetid}'>Unapprove</td>
                                    
                                    <td><a href='comments.php?delete={$commetid}'>Delete</td>
                                    
                                    
                                </tr>";
                            
                                ?>
                          

                          <?php } ?>
                      </tbody>
                  </table>
                  </div>
              </div>


              <?php

                if(isset($_GET['approve'])){
                    $approve_id = $_GET['approve'];

                    $app_qu = "UPDATE comments SET commentstatus='approve' WHERE commetid = $approve_id";
                    $app_r = mysqli_query($connection,$app_qu);

                    header("location:comments.php");
                }


                if(isset($_GET['unapprove'])){
                    $unapprove_id = $_GET['unapprove'];

                    $unapp_qu = "UPDATE comments SET commentstatus='unapprove' WHERE commetid = $unapprove_id";
                    $unapp_r = mysqli_query($connection,$unapp_qu);

                    header("location:comments.php");
                }

              if(isset($_GET['delete'])){
                  $code_id = $_GET['delete'];

                  $delc_qu = "DELETE FROM comments WHERE commetid = $code_id";
                  $delc_r = mysqli_query($connection,$delc_qu);

                  header("location:comments.php");
              }

              ?>

            