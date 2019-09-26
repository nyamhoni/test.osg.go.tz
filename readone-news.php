
        <?php require_once("header.php"); ?>
        <?php require_once("navigation-nonactive.php");?>
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
         
        //include database connection
        include 'config/dbconfig.php';
         
        // read current record's data
        try {
            // prepare select query
            $query = "SELECT id, title, description, image, created FROM osg_news WHERE id = ? LIMIT 0,1";
            $stmt = $con->prepare( $query );
         
            // this is the first question mark
            $stmt->bindParam(1, $id);
         
            // execute our query
            $stmt->execute();
         
            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
            // values to fill up our form
            $title = $row['title'];
            $description = $row['description'];
            $image = htmlspecialchars($row['image'], ENT_QUOTES);
            $created = $row['created'];

            $num = $con->query("SELECT COUNT(id) FROM  osg_news")->fetchColumn();
        }
         
        // show error
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
        ?>                                              
    <div class="hero-area">
        <div class="container">
            
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="news-title col-lg-3" style="background-color: #0a1b47;">
                        <p><strong style="color: #fff; font-size: 20px;">News</strong></p>
                    </div>
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post" style="border-bottom: 1px solid #d0d5d8;">
                            <div class="post-thumb">
                                <a href="#"><?php echo $image ? "<img src='osg-admin/assets/images/news/{$image}'/>" : "No image found.";  ?> </a>
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6><?php echo htmlspecialchars($title, ENT_QUOTES);?></h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Office of the Solicitor General</a></p>
                                    <p style="text-align: justify;"><?php echo htmlspecialchars($description, ENT_QUOTES);?></p>
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center post-like--comments">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php require_once("comments.php");?>
                    </div>
                </div>

                <?php
                require_once 'config/database.php';
                $sql = "SELECT * FROM osg_events ORDER BY id DESC LIMIT 3";
                $result = mysqli_query($con, $sql);
                $number=mysqli_num_rows($result);

                $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>
                <div class="col-12 col-lg-4">
                    <div class="news-title col-lg-4" style="background-color: #0a1b47;">
                        <p><strong style="color: #fff; font-size: 20px;">Events</strong></p>
                    </div>
                    <div class="blog-sidebar-area">

                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">
                         <?php foreach ($files as $file): ?>

                            <!-- Single Featured Post -->
                            <div class="single-blog-post small-featured-post d-flex">
                                <div class="post-thumb">
                                    <a href="#"><img src="osg-admin/assets/images/events/<?php echo $file['image']; ?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <div class="post-meta">
                                        <a href="#" class="post-title">
                                            <h6><?php echo $file['event_title']; ?>.</h6>
                                        </a>
                                        <p class="post-date"><span><?php echo $file['start_date']; ?></span></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        </div>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
        <?php include("footer.php")?>
 
                    