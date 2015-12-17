<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
<!-- 
*******************************************************
	Include Header Template
******************************************************* 
-->
<?php include_once "po-content/$folder/header.php"; ?>

<!-- 
*******************************************************
	Main Content Template
******************************************************* 
-->
<?php
	$title = $val->validasi($_GET['id'],'xss');
	$detail = new PoTable();
	$currentDetail = $detail->findManualQuery($tabel = "post,users,category", $field = "", $condition = "WHERE users.id_user = post.editor AND category.id_category = post.id_category AND category.active = 'Y' AND post.active = 'Y' AND post.seotitle = '".$title."'");
	$currentDetail = $currentDetail->current();
	$idpost = $currentDetail->id_post;

	if ($currentDetail > 0){
	$tabledpost = new PoTable('post');
	$currentDpost = $tabledpost->findByPost(id_post, $idpost);
	$currentDpost = $currentDpost->current();
	
	$contentdet = html_entity_decode($currentDetail->content);
	$biodet = html_entity_decode($currentDetail->bio);

	$tabledcat = new PoTable('category');
	$currentDcat = $tabledcat->findBy(id_category, $currentDetail->id_category);
	$currentDcat = $currentDcat->current();

	$p = new Paging;
	$batas = 5;
	$posisi = $p->cariPosisi($batas);
	$tabledcom = new PoTable('comment');
	$composts = $tabledcom->findAllLimitByAnd(id_comment, id_post, active, "$idpost", "Y", "ASC", "$posisi,$batas");
	$totaldcom = $tabledcom->numRowByAnd(id_post, $idpost, active, 'Y');

	mysql_query("UPDATE post SET hits = $currentDetail->hits+1 WHERE id_post = '".$idpost."'");
?>
	<div class="container">
    <div class="page-header">
      <h1>Details News</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Details</a></li>
        <li class="active">News</li>
      </ol>
    </div>
  </div>
  <!-- bage header End --> 
  <!-- data Start -->
  <section>
    <div class="container ">
      <div class="row "> 
        <!-- left sec Start -->
        <div class="col-md-11 col-sm-11">
          <div class="row"> 
            <!-- post details start -->
            <div class="col-sm-16">
              <div class="row">
                <div class="sec-topic col-sm-16  wow fadeInDown animated " data-wow-delay="0.5s">
                  <div class="row">
                    <div class="col-sm-16"> <img width="1000" height="606" alt="" src="<?=$website_url;?>/po-content/po-upload/<?=$currentDetail->picture;?>" class="img-thumbnail"> </div>
                    <div class="col-sm-16 sec-info">
                      <h3><?=$currentDpost->title;?></h3>
                      <div class="text-danger sub-info-bordered">
                        <div class="author"><span class="ion-person icon"></span>By: <?=$currentDetail->nama_lengkap;?></div>
                        <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($currentDetail->date);?></div>
                        <div class="comments"><span class="ion-chatbubbles icon"></span><?=$totaldcom;?></div>
                        <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                      </div>
                      <p><?=$contentdet;?></p>
                      <hr>
                    </div>
                  </div>
                </div>
                <div class="col-sm-16 author-box">
                  <div class="row">
                 <!-- <div class=" col-xs-4 col-sm-2"><img class="img-thumbnail" src="$website_url/po-content/po-upload/user-$currentDetail->id_user.jpg" width="128" height="128" alt=""/></div> -->
                    <div class="col-xs-12 col-sm-14">
                      <h4><a href="#"><?=$currentDetail->nama_lengkap;?></a></h4>
                      <p><?=$biodet;?></p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-16 related">
                  <div class="main-title-outer pull-left">
                    <div class="main-title">related topics</div>
                  </div>
                  <div class="row">
                  <?php
							$tablerelated = new PoTable('post');
							$tablerelateds = $tablerelated->findRelatedPost($currentDetail->tag, $idpost, id_post, "DESC", "3");
							foreach($tablerelateds as $tablerelated){
						?>
                    <div class="item topic col-sm-5 col-xs-16"> 
                    <a href="<?php echo "$website_url/detailpost/$tablerelated->seotitle"; ?>"> <img class="img-thumbnail" src="<?=$website_url;?>/po-content/po-upload/<?=$tablerelated->picture;?>" width="1000" height="606" alt="<?=$tablerelated->title;?>"/>
                      <h4><?=cuthighlight('title', $tablerelated->title, '20');?>...</h4>
                      <div class="text-danger sub-info-bordered remove-borders">
                        <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($tablerelated->date);?></div>
                        <div class="comments"><span class="ion-chatbubbles icon"></span><?=$tablerelated->hits;?></div>
                        <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                      </div>
                      </a> </div>
                      <?php } ?>
                   
                  </div>
                </div>
                <div class="col-sm-16 comments-area">
                  <div class="main-title-outer pull-left">
                    <div class="main-title"><?=$totaldcom;?>comments</div>
                  </div>
                  <?php 
					if ($totaldcom > 0){
						foreach($composts as $compost){
						$comcontent = nl2br($compost->comment);
					?>
						
							
							<div class="bypostauthor">
								<?php if ($compost->url != ''){ ?>
									<a href="<?=addhttp($compost->url);?>" target="_blank" class="fn"><span><?=$compost->name;?></span></a>
								<?php }else{ ?>
									<a href="#" class="fn"><span><?=$compost->name;?></span></a>
								<?php } ?>
							</div>
							<time><?php echo "$compost->date | $compost->time"; ?></time>
							<p class="text"><?=autolink($comcontent);?></p>
						
					<?php } ?>
						<div class="pagination magz-pagination">
							<ul class="pagination pull-right">
							<?php
								$getpage = $val->validasi($_GET['page'],'sql');
								$jmldata = $tabledcom->numRowByAnd(id_post, $idpost, active, 'Y');
								$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
								$linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "detailpost", $currentDpost->seotitle);
								echo "$linkHalaman";
							?>
							</ul>
							<div class="clearfix"></div>
						</div>
					<?php } ?>
                </div>
                <div class="col-sm-16">
                  <div class="main-title-outer pull-left">
                    <div class="main-title">leave a comment</div>
                  </div>
                  <div class="col-xs-16 wow zoomIn animated">
                    <form method="post" action="<?=$website_url;?>/po-postcom.php" class="comment-form">
                      <div class="row">
                        <div class="form-group col-sm-8 name-field">
                          <input type="text" name="name" id="cf_name" placeholder="Name*" required="" class="form-control">
                        </div>
                        <div class="form-group col-sm-8 email-field">
                          <input type="email" name="email" id="cf_email" placeholder="Email*" required="" class="form-control" >
                        </div>
                        <div class="form-group col-sm-8 email-field">
                          <input type="text" name="url" id="cf_subject" placeholder="URL*" required="" class="form-control" >
                        </div>
                        <div class="form-group col-sm-16">
                          <textarea name="comment" id="cf_message" placeholder="Your Message" rows="8" class="form-control" required >                  </textarea>
                        </div>
                      </div>
                      
                      <input type="hidden" name="id" value="<?=$idpost;?>" />
							<input type="hidden" name="seotitle" value="<?=$currentDpost->seotitle;?>" />
                      <div class="form-group">
                        <button class="btn btn-danger" type="submit" id="cf_send"> Post Reply </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- post details end --> 
            
          </div>
        </div>
			<!-- 
			*******************************************************
				Include Sidebar Template
			******************************************************* 
			-->
			<?php include_once "po-content/$folder/sidebar.php"; ?>

			<div class="clearfix"></div>
		</div><!-- #main -->
	</div><!-- #content -->
<?php }else{ ?>
	 <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-md-offset-4 col-sm-offset-4 wrong-page wow fadeInDown animated">
        <div class="text-center">
          <h1>We are sorry</h1>
          <p>Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists</p>
        </div>
        <div class="text-center"><span class="ion-sad wrong-icon "></span></div>
        <div class="text-center"><a class="btn btn-danger"  href="<?=$website_url;?>">Go to home page</a></div>
      </div>
    </div>
  </div>
<?php } ?>


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>
