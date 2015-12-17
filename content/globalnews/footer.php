<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
		<!-- Footer start -->
  <footer>
    <div class="top-sec">
      <div class="container ">
        <div class="row match-height-container">
          <div class="col-sm-6 subscribe-info wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
            <div class="row">
              <div class="col-sm-16">
                <div class="f-title"><?=$website_name;?></div>
                <p><?=$meta_description;?></p>
              </div>
              <div class="col-sm-16">
                <div class="f-title">subscribe to news letter</div>
                <form class="form-inline" method="post" action="<?=$website_url;?>/subscribe.php">
                  <input type="email" name="email_address" class="form-control" id="input-email" placeholder="Type your e-mail adress">
                  <button type="submit" name="submit" class="btn"> <span class="ion-paper-airplane text-danger"></span> </button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-5 popular-tags  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
            <div class="f-title">popular tags</div>
            <ul class="tags list-unstyled pull-left">
            <?php
              $tabletag = new PoTable('tag');
              $tags = $tabletag->findAllLimit(id_tag, DESC, '10');
              foreach($tags as $tag){
            ?>
              <li><a href="<?=$website_url;?>/search-result/<?=$tag->tag_title;?>" title=""><?=$tag->tag_title;?></a></li>
              <?php } ?>
            </ul>
          </div>
          <div class="col-sm-5 recent-posts  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
            <div class="f-title">recent posts</div>
            <ul class="list-unstyled">
            <?php
              $tablepopfoot = new PoTable('post');
              $popfoots = $tablepopfoot->findAllLimitBy(hits, active, 'Y', DESC, '3');
              foreach($popfoots as $popfoot){
            ?>
              <li> <a href="<?php echo "$website_url/detailpost/$popfoot->seotitle"; ?>">
                <div class="row">
                  <div class="col-sm-4"><img class="img-thumbnail pull-left" src="<?=$website_url;?>/po-content/po-upload/<?=$popfoot->picture;?>" width="70" height="70" alt="<?=$popfoot->title;?>"/> </div>
                  <div class="col-sm-12">
                    <h4><?=$popfoot->title;?></h4>
                    <div class="f-sub-info">
                      <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($popfoot->date);?></div>
                      <div class="comments"><span class="ion-chatbubbles icon"></span><?=$popfoot->hits;?></div>
                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                    </div>
                  </div>
                </div>
                </a> </li>
                <?php } ?>
                </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="btm-sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-16">
            <div class="row">
              <div class="col-sm-10 col-xs-16 f-nav wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10">
                <ul class="list-inline ">
                  <li> <a href="<?=$website_url;?>"> Home </a> </li>
                  <li> <a href="#"> Business </a> </li>
                  <li> <a href="#"> Science </a> </li>
                  <li> <a href="#"> Lifestyle </a> </li>
                  <li> <a href="#"> Politics </a> </li>
                  <li> <a href="#"> Sport </a> </li>
                  <li> <a href="#">short codes</a> </li>
                  <li> <a href="#"> Contact </a> </li>
                </ul>
              </div>
              <div class="col-sm-6 col-xs-16 copyrights text-right wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10">© 2015 <?=$website_name;?> - All Rights Reserved</div>
            </div>
          </div>
          <div class="col-sm-16 f-social  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="10">
            <ul class="list-inline">
              <li> <a href="#"><span class="ion-social-twitter"></span></a> </li>
              <li> <a href="#"><span class="ion-social-facebook"></span></a> </li>
              <li> <a href="#"><span class="ion-social-instagram"></span></a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer end -->
  <div id="create-account" class="white-popup mfp-with-anim mfp-hide">
    <form role="form">
      <h3>Create Account</h3>
      <hr>
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" tabindex="1">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" tabindex="2">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Display Name" tabindex="3">
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" tabindex="4">
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="5">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" tabindex="6">
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-16">
          <input type="submit" value="Register" class="btn btn-danger btn-block btn-lg" tabindex="7">
        </div>
      </div>
    </form>
  </div>
  <div id="log-in" class="white-popup mfp-with-anim mfp-hide">
    <form role="form">
      <h3>Log In Your Account</h3>
      <hr>
      <div class="form-group">
        <input type="text" name="access_name" id="access_name" class="form-control" placeholder="Name" tabindex="3">
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="4">
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-16">
          <input type="submit" value="Log In" class="btn btn-danger btn-block btn-lg" tabindex="7">
        </div>
      </div>
    </form>
  </div>
</div>
<!-- wrapper end --> 

<!-- jQuery --> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.min.js"></script> 
<!--jQuery easing--> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.easing.1.3.js"></script> 
<!-- bootstrab js --> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/bootstrap.js"></script> 
<!--style switcher--> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/style-switcher.js"></script> <!--wow animation--> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/wow.min.js"></script> 
<!-- time and date --> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/moment.min.js"></script> 
<!--news ticker--> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.ticker.js"></script> 
<!-- owl carousel --> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/owl.carousel.js"></script> 
<!-- magnific popup --> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.magnific-popup.js"></script> 
<!-- weather --> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.simpleWeather.min.js"></script> 
<!-- calendar--> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.pickmeup.js"></script> 
<!-- go to top --> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.scrollUp.js"></script> 
<!-- scroll bar --> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.nicescroll.js"></script> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/jquery.nicescroll.plus.js"></script> 
<!--masonry--> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/masonry.pkgd.js"></script> 
<!--media queries to js--> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/enquire.js"></script> 
<!--custom functions--> 
<script src="<?=$website_url;?>/po-content/<?=$folder;?>/js/custom-fun.js"></script>
</body>

<!-- Mirrored from webyzona.com//templates/themeforest/globalnews/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Sep 2015 02:34:23 GMT -->
</html>
<?php } ?>
