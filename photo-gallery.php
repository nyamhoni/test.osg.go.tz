
<?php
 // connect to the database
require_once 'config/database.php';

$sql = "SELECT * FROM osg_gallery ORDER BY id DESC LIMIT 6";
$result = mysqli_query($con, $sql);
$number=mysqli_num_rows($result);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <!-- ##### Editorial Post Area Start ##### -->
    <div class="editors-pick-post-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <!-- Editors Pick -->
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="section-heading">
                        <h6>Photo Gallery</h6>
                    </div>

                    <div class="row">
                        <?php foreach ($rows as $row): ?>
                        <!-- Single Post -->
                        <div class="col-12 col-lg-4">
                            <div class="single-blog-post">
                                <div class="post-thumb">
                                    <a href="#"><img src="osg-admin/assets/images/gallery/<?php echo $row['image']; ?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6><?php echo $row['caption']; ?>.</h6>
                                    </a>
                                    <div class="post-meta">
                                        <div class="post-date"><a href="#">Posted on <?php echo $row['datecreated']; ?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="btn push-up-10 section-heading">
                            <span><a href="page-gallery.php"> Read more </a> <i class="fa fa-arrow-circle-right"></i></span>
                        </div>
                    </div>
                </div>
                