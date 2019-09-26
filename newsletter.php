<?php
// connect to the database
require_once 'config/database.php';

$sql = "SELECT * FROM osg_newsletter ORDER BY id DESC LIMIT 6";
$result = mysqli_query($con, $sql);
$number=mysqli_num_rows($result);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM osg_newsletter WHERE id=$id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'osg-admin/assets/newsletter/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('osg-admin/assets/newsletter/' . $file['name']));
        readfile('osg-admin/assets/newsletter/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE osg_newsletter SET downloads=$newCount WHERE id=$id";
        mysqli_query($con, $updateQuery);
        exit;
    }

}
?>
		<div class="col-12 col-md-7 col-lg-4 clearfix">
	            <div class="section-heading">
	                <h6>News Letter</h6>
	            </div>
	            <!-- Popular News Widget -->
	            <div class="popular-newsletter-widget mb-30">

	                <?php foreach ($files as $file): ?>
	                <!-- Single Popular Blog -->
	                <div class="single-popular-post">
	                    <a  href="newsletter.php?file_id=<?php echo $file['id']; ?>" target="_blank">
	                         <h6><span class="fa fa-file-pdf-o"></span> <?php echo $file['letter_title']; ?>.</h6>
	                    </a>
	                    <p>Posted on <?php echo $file['datecreated']; ?></p>
	                </div>
	            <?php endforeach; ?>
	            </div>
	        </div>
	    </div>
	</div>
</div>