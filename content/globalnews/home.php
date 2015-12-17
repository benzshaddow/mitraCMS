<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
<!-- 
*******************************************************
	Include Header Template
******************************************************* 
-->
<?php include_once "content/$folder/header.php"; ?>

<!-- 
*******************************************************
	Main Content Template
******************************************************* 
-->
	<div class="container">
    <div class="row"> 
      <!-- hot news start -->
      <div class="col-sm-16 hot-news hidden-xs">
        <div class="row">
          <div class="col-sm-15"> <span class="ion-ios7-timer icon-news pull-left"></span>
            <ul id="js-news" class="js-hidden">
              <li class="news-item"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor</a></li>
              <li class="news-item"><a href="#">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</a></li>
              <li class="news-item"><a href="#">Donec quam felis, ultricies nec, pellentesque eu</a></li>
              <li class="news-item"><a href="#">Nulla consequat massa quis enim. Donec pede justo, fringilla</a></li>
              <li class="news-item"><a href="#"> Donec pede justo, fringilla vel, aliquet nec, vulputate eget ultricies nec, pellentesque</a></li>
              <li class="news-item"><a href="#">In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo</a></li>
              <li class="news-item"><a href="#">Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis </a></li>
            </ul>
          </div>
          <div class="col-sm-1 shuffle text-right"><a href="#"><span class="ion-shuffle"></span></a></div>
        </div>
      </div>
      <!-- hot news end --> 
      <!-- banner outer start -->
      <div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
        <div class="row">
          <div class="col-sm-16 col-md-10 col-lg-8"> 
            
            <!-- carousel start -->
            <div id="sync1" class="owl-carousel">
            <?php
              $tableslider = new PoTable('post');
              $sliders = $tableslider->findAllLimitBy(id_post, active, 'Y', DESC, '4');
              foreach($sliders as $slider){
            ?>
              <div class="box item"> <a href="<?php echo "$website_url/detailpost/$slider->seotitle"; ?>">
                <div class="carousel-caption"><?=$slider->title;?></div>
                <img class="img-responsive" src="<?=$website_url;?>/content/upload/<?=$slider->picture;?>" width="1600" height="972" alt=""/>
                <div class="overlay"></div>
                <div class="overlay-info">
                 <!--  <div class="cat">
                    <p class="cat-data"><span class="ion-model-s"></span>lifestyle</p>
                  </div> -->
                  <div class="info">
                    <p><span class="ion-android-data"></span><?=tgl_indo($slider->date);?><span class="ion-chatbubbles"></span><?=$slider->hits;?></p>
                  </div>
                </div>
                </a></div>
                  <?php
              }
            ?>
              
            </div>
            <div class="row">
              <div id="sync2" class="owl-carousel">
              <?php
              foreach($sliders as $slider){
                ?>
                <div class="item"><img class=" img-responsive" src="<?=$website_url;?>/content/upload/<?=$slider->picture;?>"  width="1600" height="972" alt=""/></div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-8 hidden-sm hidden-xs">
            <div class="row">
            <?php
                 $tablecon1a = new PoTable('post');
                 $con1as = $tablecon1a->findAllLimitByAnd(id_post, id_category, active, '2', 'Y', DESC, '1');
                  foreach($con1as as $con1a)
                  	$validrec = $con1a->id_category;
					$tablecatrec = new PoTable('category');
					$currentCatrec = $tablecatrec->findBy(id_category, $validrec);
					$currentCatrec = $currentCatrec->current();
                  {
                ?>
              <div class="col-lg-6 hidden-md"><a href="<?php echo "$website_url/detailpost/$con1a->seotitle"; ?>">
                <div class="box">
                  <div class=" carousel-caption"><?=$con1a->title;?></div>
                  <img class="match-height" src="<?=$website_url;?>/content/upload/<?=$con1a->picture;?>" width="236" height="480"  alt="" />
                  <div class="overlay"></div>
                  <div class="overlay-info">
                    <div class="cat">
                      <p class="cat-data"><span class="ion-model-s"></span><?=$currentCatrec->title;?></p>
                    </div>
                    <div class="info">
                      <p><span class="ion-android-data"></span><?=tgl_indo($con1a->date);?><span class="ion-chatbubbles"></span><?=$con1a->hits;?></p>
                    </div>
                  </div>
                </div>
                </a> </div>
                <?php } ?>
              <div class="col-md-16 col-lg-10">
                <div class="row">
                <?php
                 $tablecon1b = new PoTable('post');
                 $con1bs = $tablecon1a->findAllLimitByAnd(id_post, id_category, active, '4', 'Y', DESC, '1');
                  foreach($con1bs as $con1b)
                  	$validrec = $con1b->id_category;
					$tablecatrec = new PoTable('category');
					$currentCatrec = $tablecatrec->findBy(id_category, $validrec);
					$currentCatrec = $currentCatrec->current();
                  {
                    ?>
                  <div class="col-sm-16 right-img-top "> <a href="<?php echo "$website_url/detailpost/$con1b->seotitle"; ?>">
                    <div class="box">                
                      <div class="carousel-caption"><?=$con1b->title;?></div>
                      <img class="img-responsive" src="<?=$website_url;?>/content/upload/<?=$con1b->picture;?>" width="440" height="292" alt=""/>
                      <div class="overlay"></div>
                      <div class="overlay-info">
                        <div class="cat">
                          <p class="cat-data"><span class="ion-model-s"></span><?=$currentCatrec->title;?></p>
                        </div>
                        <div class="info">
                          <p><span class="ion-android-data"></span><?=tgl_indo($con1b->date);?><span class="ion-chatbubbles"></span><?=$con1b->hits;?></p>
                        </div>
                      </div>
                    </div>
                    </a> </div>
                    <?php } ?>
                      <?php
                 $tablecon1c = new PoTable('post');
                 $con1cs = $tablecon1c->findAllLimitByAnd(id_post, id_category, active, '3', 'Y', DESC, '1');
                  foreach($con1cs as $con1c)
                  	$validrec = $con1c->id_category;
							$tablecatrec = new PoTable('category');
							$currentCatrec = $tablecatrec->findBy(id_category, $validrec);
							$currentCatrec = $currentCatrec->current();
                  {
                    ?>
                  <div class="col-sm-16 right-img-btm "> <a href="<?php echo "$website_url/detailpost/$con1c->seotitle"; ?>">
                    <div class="box">                
                      <div class="carousel-caption"><?=$con1c->title;?></div>
                      <img class="img-responsive" src="<?=$website_url;?>/content/upload/<?=$con1c->picture;?>" width="440" height="292" alt=""/>
                      <div class="overlay"></div>
                      <div class="overlay-info">
                        <div class="cat">
                          <p class="cat-data"><span class="ion-model-s"></span><?=$currentCatrec->title;?></p>
                        </div>
                        <div class="info">
                          <p><span class="ion-android-data"></span><?=tgl_indo($con1c->date);?><span class="ion-chatbubbles"></span><?=$con1c->hits;?></p>
                        </div>
                      </div>
                    </div>
                    </a> </div>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- banner outer end --> 
      
    </div>
  </div>
  <!-- top sec end --> 
  
  <!-- data start -->
  
  <div class="container ">
    <div class="row "> 
      <!-- left sec start -->
      <div class="col-md-11 col-sm-11">
        <div class="row"> 
          <!-- business start -->
          <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
            <div class="main-title-outer pull-left">
              <div class="main-title">business</div>
              <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 2 days ago</span> </div>
            </div>
            <div class="row">
              <div class="col-md-11 col-sm-16">
                <div class="row">
                <?php
                 $tablecon1d = new PoTable('post');
                 $con1ds = $tablecon1d->findAllLimitByAnd(id_post, id_category, active, '4', 'Y', DESC, '1');
                  foreach($con1ds as $con1d)
                  	$validrec = $con1d->id_category;
					$tablecatrec = new PoTable('category');
					$currentCatrec = $tablecatrec->findBy(id_category, $validrec);
					$currentCatrec = $currentCatrec->current();
                  {
                ?>
                  <div class="col-md-8 col-sm-9 col-xs-16">
                    <div class="topic"> <a href="<?php echo "$website_url/detailpost/$con1d->seotitle"; ?>"><img class="img-thumbnail" src="<?=$website_url;?>/content/upload/<?=$con1d->picture;?>" width="600" height="398" alt=""/>
                      <h3><?=cuthighlight('post', $con1d->title, '50');?>...</h3>
                      <div class="text-danger sub-info-bordered">
                        <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($con1d->date);?></div>
                        <div class="comments"><span class="ion-chatbubbles icon"></span><?=$con1d->hits;?></div>
                        <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                      </div>
                      </a>
                      <p><?=cuthighlight('post', $con1d->content, '100');?>...</p>
                    </div>
                  </div>
                  <?php } ?>
                  <div class="col-md-8 col-sm-7 col-xs-16">
                  <?php
                 	$tablecon1e = new PoTable('post');
                 	$con1es = $tablecon1e->findAllLimitByAnd(id_post, id_category, active, '4', 'Y', DESC, '1,4');
                  foreach($con1es as $con1e)
                  {
                	?>
                      <ul class="list-unstyled">
                      <li> 
                      <a href="<?php echo "$website_url/detailpost/$con1e->seotitle"; ?>">
                        <div class="row">
                          <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="<?=$website_url;?>/content/upload/<?=$con1e->picture;?>" width="76" height="76" alt=""/> </div>
                          <div class="col-sm-16 col-md-16 col-lg-11">
                            <h4><?=cuthighlight('post', $con1e->title, '50');?>...</h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($con1e->date);?></div>
                              <div class="comments"><span class="ion-chatbubbles icon"></span><?=$con1e->hits;?></div>
                              <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                            </div>
                          </div>
                        </div>
                        </a> 
                        </li>
                    </ul>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-5 col-sm-16 hidden-sm hidden-xs  left-bordered">
                <div id="vid-thumbs" class="owl-carousel">
                  <div class="item">
                    <div class="vid-thumb-outer">
                      <div class="vid-thumb"><a class="popup-youtube" href="https://www.youtube.com/watch?v=TEnNaUg6Vm4">
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?=$website_url;?>/content/<?=$folder;?>/images/business/business-vid-1.jpg" width="250" height="143" alt=""/> </div>
                        <h4>Perspiciatis unde omnis iste natus</h4>
                        </a> </div>
                      <div class="vid-thumb"><a class="popup-youtube" href="http://vimeo.com/7396421">
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?=$website_url;?>/content/<?=$folder;?>/images/business/business-vid-2.jpg" width="250" height="143" alt=""/> </div>
                        <h4>Cras tincidunt enim non metus ultricies.</h4>
                        </a> </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="vid-thumb-outer">
                      <div class="vid-thumb"><a href="#">
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?=$website_url;?>/content/<?=$folder;?>/images/business/business-vid-1.jpg" width="250" height="143" alt=""/> </div>
                        <h4>Perspiciatis unde omnis iste natus</h4>
                        </a> </div>
                      <div class="vid-thumb"><a href="#">
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?=$website_url;?>/content/<?=$folder;?>/images/business/business-vid-2.jpg" width="250" height="143" alt=""/> </div>
                        <h4>Cras tincidunt enim non metus ultricies.</h4>
                        </a> </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="vid-thumb-outer">
                      <div class="vid-thumb"><a href="#">
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?=$website_url;?>/content/<?=$folder;?>/images/business/business-vid-1.jpg" width="250" height="143" alt=""/> </div>
                        <h4>Perspiciatis unde omnis iste natus</h4>
                        </a> </div>
                      <div class="vid-thumb"><a href="#">
                        <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="<?=$website_url;?>/content/<?=$folder;?>/images/business/business-vid-2.jpg" width="250" height="143" alt=""/> </div>
                        <h4>Cras tincidunt enim non metus ultricies.</h4>
                        </a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <!-- business end --> 
          
          <!-- Science & Travel start -->
          <div class="col-sm-16">
            <div class="row">
              <div class="col-xs-16 col-sm-8  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">
                <div class="main-title-outer pull-left">
                  <div class="main-title">science</div>
                  <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 2 days ago</span> </div>
                </div>
                <div class="row">
                <?php
                 $tablecon1f = new PoTable('post');
                 $con1fs = $tablecon1f->findAllLimitByAnd(id_post, id_category, active, '4', 'Y', DESC, '1');
                  foreach($con1fs as $con1f)
                  	$validrec = $con1f->id_category;
					$tablecatrec = new PoTable('category');
					$currentCatrec = $tablecatrec->findBy(id_category, $validrec);
					$currentCatrec = $currentCatrec->current();
                  {
                ?>
                  <div class="topic col-sm-16"><a href="<?php echo "$website_url/detailpost/$con1f->seotitle"; ?>"><img class=" img-thumbnail" src="<?=$website_url;?>/content/upload/<?=$con1f->picture;?>" width="600" height="227" alt=""/>
                    <h3><?=cuthighlight('post', $con1f->title, '50');?>...</h3>
                    <div class="text-danger sub-info-bordered ">
                      <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($con1f->date);?></div>
                      <div class="comments"><span class="ion-chatbubbles icon"></span><?=$con1f->hits;?></div>
                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                    </div>
                    </a>
                    <p><?=cuthighlight('post', $con1f->content, '100');?>...</p>
                  </div>
                  <?php } ?>
                  <div class="col-sm-16">
                  <?php
                 	$tablecon1g = new PoTable('post');
                 	$con1gs = $tablecon1g->findAllLimitByAnd(id_post, id_category, active, '4', 'Y', DESC, '1,3');
                  foreach($con1gs as $con1g)
                  {
                	?>
                    <ul class="list-unstyled  top-bordered ex-top-padding">
                      <li> <a href="<?php echo "$website_url/detailpost/$con1g->seotitle"; ?>">
                        <div class="row">
                          <div class="col-lg-3 col-md-4 hidden-sm  "><img width="76" height="76" alt="" src="<?=$website_url;?>/content/upload/<?=$con1g->picture;?>" class="img-thumbnail pull-left"> </div>
                          <div class="col-lg-13 col-md-12">
                            <h4><?=cuthighlight('post', $con1g->title, '50');?>...</h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($con1g->date);?></div>
                              <div class="comments"><span class="ion-chatbubbles icon"></span><?=$con1g->hits;?></div>
                              <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                            </div>
                          </div>
                        </div>
                        </a> </li>
                       </ul>
                       <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-8 col-xs-16 wow fadeInRight animated" data-wow-delay="0.5s" data-wow-offset="130">
                <div class="main-title-outer pull-left">
                  <div class="main-title">travel</div>
                  <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 2 days ago</span> </div>
                </div>
                <div class="row left-bordered">
                <?php
                 $tablecon1h = new PoTable('post');
                 $con1hs = $tablecon1h->findAllLimitByAnd(id_post, id_category, active, '4', 'Y', DESC, '1');
                  foreach($con1hs as $con1h)
                  	$validrec = $con1h->id_category;
      					$tablecatrec = new PoTable('category');
      					$currentCatrec = $tablecatrec->findBy(id_category, $validrec);
      					$currentCatrec = $currentCatrec->current();
                  {
                ?>
                  <div class="topic col-sm-16"> <a href="<?php echo "$website_url/detailpost/$con1h->seotitle"; ?>"> <img  class="img-thumbnail" src="<?=$website_url;?>/content/upload/<?=$con1h->picture;?>" width="600" height="227" alt=""/>
                    <h3><?=cuthighlight('post', $con1h->title, '50');?>...</h3>
                    <div class="text-danger sub-info-bordered">
                      <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($con1h->date);?></div>
                      <div class="comments"><span class="ion-chatbubbles icon"></span><?=$con1h->hits;?></div>
                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                    </div>
                    </a>
                    <p><?=cuthighlight('post', $con1h->content, '100');?>...</p>
                  </div>
                  <?php } ?>
                  <div class="col-sm-16">
                  <?php
                  $tablecon1i = new PoTable('post');
                  $con1is = $tablecon1i->findAllLimitByAnd(id_post, id_category, active, '4', 'Y', DESC, '1,3');
                  foreach($con1is as $con1i)
                  {
                  ?>
                    <ul class="list-unstyled top-bordered ex-top-padding">
                      <li> <a href="<?php echo "$website_url/detailpost/$con1i->seotitle"; ?>">
                        <div class="row">
                          <div class="col-lg-3 col-md-4 hidden-sm  "><img width="76" height="76" alt="" src="<?=$website_url;?>/content/upload/<?=$con1i->picture;?>" class="img-thumbnail pull-left"> </div>
                          <div class="col-lg-13 col-md-12">
                            <h4><?=cuthighlight('post', $con1i->title, '50');?>...</h4>
                            <div class="text-danger sub-info">
                              <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($con1i->date);?></div>
                              <div class="comments"><span class="ion-chatbubbles icon"></span><?=$con1i->hits;?></div>
                              <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                            </div>
                          </div>
                        </div>
                        </a> 
                        </li>
                        </ul>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <!-- Scince & Travel end --> 
          <!-- lifestyle start-->
          <div class="col-sm-16 wow fadeInUp animated " data-wow-delay="0.5s" data-wow-offset="100">
            <div class="main-title-outer pull-left">
              <div class="main-title">lifestyle</div>
              <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 3 days ago</span> </div>
            </div>
            <div class="row">
            <div id="owl-lifestyle" class="owl-carousel owl-theme lifestyle pull-left">
                   <?php
                 $tablecon1j = new PoTable('post');
                 $con1js = $tablecon1j->findAllLimitByAnd(id_post, id_category, active, '4', 'Y', DESC, '10');
                  foreach($con1js as $con1j)
                {
                ?>
               <div class="item topic">          
               <a href="<?php echo "$website_url/detailpost/$con1j->seotitle"; ?>"> <img class="img-thumbnail" src="<?=$website_url;?>/content/upload/<?=$con1j->picture;?>" width="300" height="132" alt=""/>
                  <h4><?=cuthighlight('post', $con1j->title, '50');?>...</h4>
                  <div class="text-danger sub-info-bordered remove-borders">
                    <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($con1j->date);?></div>
                    <div class="comments"><span class="ion-chatbubbles icon"></span><?=$con1j->hits;?></div>
                    <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                  </div>
                  </a> </div>
            <?php }?>
              </div>
            </div>
            <hr>
          </div>
          
          <!-- lifestyle end --> 
          
          <!--Recent videos start-->
          <div class="col-sm-16 recent-vid wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="50">
            <div class="main-title-outer pull-left">
              <div class="main-title">recent videos</div>
              <div class="span-outer"><span class="pull-right text-danger last-update"><span class="ion-android-data icon"></span>Last update: 1 day ago</span> </div>
            </div>
            <div class="row">
              <div class="col-sm-11 col-xs-16"> 
                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="vid-first" class="tab-pane embed-responsive embed-responsive-16by9 active">
                    <iframe width="514" height="289" src="http://www.youtube.com/embed/OFDAGiPJHL8?showinfo=0" frameborder="0" allowfullscreen></iframe>
                  </div>
                  <div id="vid-second" class="tab-pane embed-responsive embed-responsive-16by9">
                    <iframe width="514" height="289" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/TEnNaUg6Vm4?rel=0&amp;showinfo=0"></iframe>
                  </div>
                  <div id="vid-third" class="tab-pane embed-responsive embed-responsive-16by9">
                    <iframe width="514" height="289" src="http://www.youtube.com/embed/rDZ1AjDJjFI?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
              <div class="col-sm-5 col-xs-2"> <!-- required for floating --> 
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-right hidden-xs">
                  <li class="active"><a data-toggle="tab" href="#vid-first">
                    <div class="vid-thumb">
                      <div class="vid-box"><span class="ion-eye"></span><img class="img-thumbnail" src="<?=$website_url;?>/content/<?=$folder;?>/images/recent-videos/re-vid-1.jpg" width="234" height="87" alt=""/> </div>
                    </div>
                    </a></li>
                  <li class=""><a data-toggle="tab" href="#vid-second">
                    <div class="vid-thumb">
                      <div class="vid-box"><span class="ion-eye"></span><img class="img-thumbnail" src="<?=$website_url;?>/content/<?=$folder;?>/images/recent-videos/re-vid-2.jpg" width="234" height="87" alt=""/> </div>
                    </div>
                    </a></li>
                  <li class=""><a data-toggle="tab" href="#vid-third">
                    <div class="vid-thumb">
                      <div class="vid-box"><span class="ion-eye"></span><img class="img-thumbnail" src="<?=$website_url;?>/content/<?=$folder;?>/images/recent-videos/re-vid-3.jpg" width="234" height="87" alt=""/> </div>
                    </div>
                    </a></li>
                </ul>
              </div>
            </div>
            <hr>
          </div>
          <!--Recent videos end--> 
          <!--wide ad start-->
          <div class="col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="25"><img class="img-responsive" src="<?=$website_url;?>/content/<?=$folder;?>/images/ads/728-90-ad.gif" width="728" height="90" alt=""/></div>
          <!--wide ad end--> 
          
        </div>
      </div>
      <!-- left sec end --> 
      <!-- right sec start -->
      <?php include_once "content/$folder/sidebar.php"; ?>
      


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "content/$folder/footer.php"; ?>
<?php } ?>
