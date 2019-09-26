<?php require_once("header.php");?>
<?php require_once("navigation-nonactive.php");?>
    <!-- ##### Header Area End ##### -->
<?php
      // include database connection
      include 'config/dbconfig.php';
      // PAGINATION VARIABLES
      // page is the current page, if there's nothing set, default is page 1
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
       
      // set records or rows of data per page
      $records_per_page = 100;
       
      // calculate for the query LIMIT clause
      $from_record_num = ($records_per_page * $page) - $records_per_page;
       
      $action = isset($_GET['action']) ? $_GET['action'] : "";

      // if it was redirected from delete.php
      if($action=='deleted'){
          echo "<div class='alert alert-success'>Record was deleted.</div>";
      }
       
      // select data for current page
      $query = "SELECT id, title, description, image, created, modified FROM osg_news ORDER BY id DESC
          LIMIT :from_record_num, :records_per_page";
       
      $stmt = $con->prepare($query);
      $stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
      $stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
      $stmt->execute();

      $num = $con->query("SELECT COUNT(id) FROM  osg_news")->fetchColumn();
      
      ?>
    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8" style="background-color: #eff4f9;">
                    <div class="section-heading">
                        <h6>All News</h6>
                    </div>
                    <div class="blog-posts-area">
                        <style type="text/css">
                          .line {
                              border-bottom: 1px dashed #8c8b8b;
                            }  
                        </style>
                        
                <?php
                // this is how to get number of rows returned
                $num = $stmt->rowCount();

                //check if more than 0 record found
                if($num>0){
                 
                        // fetch() is faster than fetchAll()
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            extract($row);

                        echo"<div class='single-blog-post featured-post mb-30'>
                            <div class='post-thumb'>
                                <a href='#'><img src='osg-admin/assets/images/news/{$image}' alt=''></a>
                            </div>
                            <div class='post-data'>
                                <a href='#' class='post-title'>
                                    <h6>{$title}</h6>
                                </a>
                                <div class='post-meta'>
                                    <p class='post-author'>By <a href='#'>Office of the Solicitor General</a></p>
                                    <p class='post-excerp'>{$description}</p>
                                    <!-- Post Like & Post Comment -->
                                    <div class='d-flex align-items-center line'>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                }
                 
                // if no records found
                else{
                    echo "<div class='alert alert-danger'>No records found.</div>";
                }
                
                ?>

                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Popular News Widget -->
                        <div class="popular-news-widget mb-50">
                            <h3>4 Most Popular News</h3>

                            <!-- Single Popular Blog -->
                            <div class="single-popular-post">
                                <a href="#">
                                    <h6><span>1.</span> Amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales.</h6>
                                </a>
                                <p>April 14, 2018</p>
                            </div>

                            <!-- Single Popular Blog -->
                            <div class="single-popular-post">
                                <a href="#">
                                    <h6><span>2.</span> Consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer.</h6>
                                </a>
                                <p>April 14, 2018</p>
                            </div>

                            <!-- Single Popular Blog -->
                            <div class="single-popular-post">
                                <a href="#">
                                    <h6><span>3.</span> Adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo.</h6>
                                </a>
                                <p>April 14, 2018</p>
                            </div>

                            <!-- Single Popular Blog -->
                            <div class="single-popular-post">
                                <a href="#">
                                    <h6><span>4.</span> Eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                </a>
                                <p>April 14, 2018</p>
                            </div>
                        </div>

                        <!-- Newsletter Widget -->
                        <div class="newsletter-widget mb-50">
                            <h4>Newsletter</h4>
                            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <form action="#" method="post">
                                <input type="text" name="text" placeholder="Name">
                                <input type="email" name="email" placeholder="Email">
                                <button type="submit" class="btn w-100">Subscribe</button>
                            </form>
                        </div>

                        <!-- Latest Comments Widget -->
                        <div class="latest-comments-widget">
                            <h3>Latest Comments</h3>

                            <!-- Single Comments -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail mr-15">
                                    <img src="img/bg-img/29.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>

                            <!-- Single Comments -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail mr-15">
                                    <img src="img/bg-img/30.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>

                            <!-- Single Comments -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail mr-15">
                                    <img src="img/bg-img/31.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>

                            <!-- Single Comments -->
                            <div class="single-comments d-flex">
                                <div class="comments-thumbnail mr-15">
                                    <img src="img/bg-img/32.jpg" alt="">
                                </div>
                                <div class="comments-text">
                                    <a href="#">Jamie Smith <span>on</span> Facebook is offering facial recognition...</a>
                                    <p>06:34 am, April 14, 2018</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
    <?php require_once("footer.php");?>