<?php
 // connect to the database
require_once 'config/database.php';

$sql = "SELECT * FROM osg_events ORDER BY id DESC LIMIT 3";
$result = mysqli_query($con, $sql);
$number=mysqli_num_rows($result);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!-- Hero Add -->
      <div class="col-12 col-lg-4">
          <!-- Breaking News Widget -->
          <div class="news-title">
            <p><strong style="font-size: 18px;">Events</strong> | <small style="font-size: 14px;"><span>Today is: </span> <script>document.write(new Date().getDate());</script> | <script>document.write(new Date().getMonth()+ 1);</script> | <script>document.write(new Date().getFullYear());</script> 
              <span><script>
                var currentTime = new Date(),
                    hours = currentTime.getHours(),
                    minutes = currentTime.getMinutes();

                if (minutes < 10) {
                 minutes = "0" + minutes;
                }

                document.write(hours + ":" + minutes)
              </script></span></small></p> 
          </div>
          <div class="breaking-news-area">
              <?php foreach ($files as $file): ?>
                <style type="text/css">
                  .news-text{
                    text-transform: uppercase;
                  }
                </style>
              <!-- Single Popular Blog -->
              <div class="single-popular-post d- flex">
                  <a href="events.html">
                      <h6>
                          <div class="news-image"><img src="osg-admin/assets/images/events/<?php echo $file['image']; ?>" alt=""></div><div class="news-text"><?php echo $file['event_title']; ?>.</div> <span>Read More <i class="fa fa-arrow-circle-right"></i></span>
                      </h6>
                  </a>
                <p class="post-date">Posted on: <span><?php echo $file['datecreated'];?></span></p>
              </div>
            <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Hero Area End ##### -->