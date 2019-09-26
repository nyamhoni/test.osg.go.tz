<?php
 // connect to the database
require_once 'config/database.php';

$sql = "SELECT * FROM osg_news ORDER BY id DESC LIMIT 4";
$result = mysqli_query($con, $sql);
$number=mysqli_num_rows($result);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area section-padding-80-50 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="section-heading">
                        <h6>Recent News</h6>
                    </div>

                    <div class="row">
                        <?php foreach ($files as $file): ?>
                        <!-- Single Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="#"><img src="osg-admin/assets/images/news/<?php echo $file['image']; ?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="readone-news.php?id=<?php echo $file['id'] ?>" class="post-title">
                                        <h6><?php echo $file['title']; ?>...</h6>
                                    </a>
                                    <div class="post-meta d-flex align-items-center">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="btn push-up-10 section-heading col-lg-12" style="background-color: #0a1b47; color: #fff;">
                        <span><a href="page-news.php" style="color: #fff;"> More News </a> <i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </div>