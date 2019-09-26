<?php
if($_POST){
    // include database connection
    require_once('config/dbconfig.php');
 
    try{

        $error="";

        $name=htmlspecialchars(strip_tags($_POST['name']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
        $message=htmlspecialchars(strip_tags($_POST['message']));
        $datecreated=date('Y-m-d H:i:s');

        
        $query = "INSERT INTO `osg_comments`(`name`, `email`, `message`, `datecreated`) VALUES ('$name', '$email', '$message','$datecreated')";
         
        // prepare query for execution
        $stmt = $con->prepare($query);
         
        // bind the parameters

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        // specify when this record was inserted to the database
        $stmt->bindParam(':datecreated', $datecreated);
         
        // Execute the query
        if($stmt->execute()){
        }else{

        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
<div class="post-a-comment-area section-padding-80-0">
    <h4>Leave a comment</h4>
    
    <!-- Reply Form -->
    <div class="contact-form-area">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name*" required="">
                </div>
                <div class="col-12 col-lg-6">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email*" required="">
                </div>
                <div class="col-12">
                    <textarea type="text" name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message" required=""></textarea>
                </div>
                <div class="col-12 text-center">
                    <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                </div>
            </div>
        </form>
    </div>
</div>