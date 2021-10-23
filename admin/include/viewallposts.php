<div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View All Posts</h6>
                </div>
                <div class="card-body">
                
                <table class="table table-bordered table-hover">
                      <thead >
                          <tr>
                              <th>Id</th>
                              <th>Author</th>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Status</th>
                              <th>Image</th>
                              <th>Tags</th>
                              <th>Comments</th>
                              <th>Date</th>
                              <th>Edit Post</th>
                              <th>Delete</th>
                              <!-- <th>Edit</th>
                              <th>Delete</th> -->
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                                $catq = "SELECT*FROM postcourse";
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

                                    echo "<tr>
                                    <td>$id</td>
                                    <td>$author</td>
                                    
                                    <td>$posttitle</td>";

                                    // $catidquery = "SELECT*FROM toptitle WHERE catid=$id";
                                    // $catselqu = mysqli_query($connection,$catidquery);
                                    
                                    // while($row = mysqli_fetch_assoc($catselqu)){
                                    //     $catt = $row['cattitle'];
                                    //     $cati = $row['catid'];
                                        
                                    //     echo "<td>$catt</td>";
                                        
                                   // }

                                    echo " <td>$posttags</td>";

                                    echo "<td>$poststatus</td>
                                    
                                    <td><img src='../img/posts/$postimage' width=80 ></td>
                                    <td>$posttags</td>";

                                    $comment_count_query = "SELECT*FROM comments WHERE commentpostid=$id";
                                    $comeent_result=mysqli_query($connection,$comment_count_query);
                                    $comment_count=mysqli_num_rows($comeent_result);



                                    echo "<td>$comment_count</td>";


                                    echo "<td>$postdate</td>
                                    <td><a href='posts.php?page=edit_post&post_id={$id}'>Edit</a></td>
                                    <td><a href='posts.php?delete={$id}'>Delete</td>
                                    
                                    
                                </tr>";
                            
                                ?>
                          

                          <?php } ?>
                      </tbody>
                  </table>
                  </div>
              </div>


              <?php

              if(isset($_GET['delete'])){
                  $de_id = $_GET['delete'];

                  $del_qu = "DELETE FROM postcourse WHERE postid = $de_id";
                  $del_r = mysqli_query($connection,$del_qu);

                  header("location:posts.php");
              }

              ?>