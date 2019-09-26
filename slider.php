<?php   
  require_once 'config/database.php';
        
  $result = mysqli_query($con, "SELECT * FROM osg_slider order by id desc limit 5")or die(mysqli_error());
  ?>
    <section id="featured">
    <div id="osgIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($result as $row) {
          $actives = "";
          if ($i == 0) {
            $actives = 'active';
          }
        ?>
        <li data-target="#osgIndicators" data-slide-to="<?= $i; ?>" class="<?= $actives ?>"></li>
        <?php $i++; } ?>
      </ol>
      <div class="carousel-inner">
        <?php
        $i = 0;
        foreach ($result as $row) {
          $actives = "";
          if ($i == 0) {
            $actives = 'active';
          }
        ?>
        <div class="carousel-item <?= $actives; ?>">
          <img class="d-block w-100" src="osg-admin/assets/images/slider/<?= $row['image']; ?>">
          <div class="carousel-caption d-none d-md-block col-md-4 captionslider" style="background-color: #0a1b47; opacity: 0.8; position: fixed;">
            <h5 style="color: #fff;"><?= $row['slider_title']; ?></h5>
            <p style="color: #fff;"><?= $row['slider_caption']; ?></p>
          </div>
        </div>
        <?php $i++; } ?>
      </div>
      <style type="text/css">
        .carousel-control-next span{
          color: #0a1b47;
        }
      </style>
      <a class="carousel-control-prev" href="#osgIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#osgIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
      <img src="img/line.png" class="img-fluid lineimage" alt="Responsive image">
    </section>