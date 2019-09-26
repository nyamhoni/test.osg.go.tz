<?php require_once("header.php");?>
<?php require_once("navigation-nonactive.php");?>
<?php
// connect to the database
require_once 'config/database.php';

$sql = "SELECT * FROM osg_documents ORDER BY id DESC";
$result = mysqli_query($con, $sql);
$number=mysqli_num_rows($result);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM osg_documents WHERE id=$id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'osg-admin/assets/osg-docs/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('osg-admin/assets/osg-docs/' . $file['name']));
        readfile('osg-admin/assets/osg-docs/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE osg_documents SET downloads=$newCount WHERE id=$id";
        mysqli_query($con, $updateQuery);
        exit;
    }

}
?>
    <div class="hero-area">
        <div class="container box-gray">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Breaking News Widget -->
                    <div class="news-title">
                      <p><strong style="font-size: 18px;">Documents </strong> Click to download</p> 
                    </div>
                    <div class="breaking-news-area">

                        <?php foreach ($files as $file): ?>
                        <style type="text/css">
                            .single-popular-post h6 strong a{
                                font-size: 17px;
                            }
                            .push-up-10 span a{
                                font-size: 18px;
                            }
                        </style>
                        <!-- Single Popular Blog -->
                        <div class="single-popular-post d-flex">
                              <h6><a href="documents.php?file_id=<?php echo $file['id']; ?>" target="_blank"><img src="img/news-img/icon_pdf.png" alt=""><strong><?php echo $file['docTitle']; ?></a></strong></h6></br>
                        </div>
                        <!-- Single Popular Blog -->

                        <?php endforeach;?>
                    </div>
                   
                </div>
            </div>
        </div>
<?php require_once("footer.php");?>