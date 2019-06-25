<!-- from https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo $newsResponse['articles'][0]['urlToImage'] ?>">
      <div class="carousel-caption">
        <h3>
          <a class="white-link" href="<?php echo $newsResponse['articles'][0]['url'] ?>">
            <?php echo $newsResponse['articles'][0]['title'] ?>
          </a>
        </h3>
      </div>
    </div>

    <div class="item">
      <img src="<?php echo $newsResponse['articles'][1]['urlToImage'] ?>">
      <div class="carousel-caption">
        <h3>
          <a class="white-link" href="<?php echo $newsResponse['articles'][1]['url'] ?>">
            <?php echo $newsResponse['articles'][1]['title'] ?>
          </a>
        </h3>
      </div>
    </div>

    <div class="item">
      <img src="<?php echo $newsResponse['articles'][2]['urlToImage'] ?>">
      <div class="carousel-caption">
        <h3>
          <a class="white-link" href="<?php echo $newsResponse['articles'][2]['url'] ?>">
            <?php echo $newsResponse['articles'][2]['title'] ?>
          </a>
        </h3>
      </div>
    </div>
  </div>


  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
