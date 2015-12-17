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
<?php
	$title = $val->validasi($_GET['idc'],'xss');
	$tabledcat = new PoTable('category');
	$currentDcat = $tabledcat->findByAnd(seotitle, $title, active, 'Y');
	$currentDcat = $currentDcat->current();
	$iddcat = $currentDcat->id_category;
?>
<?php if ($currentDcat != "0"){ ?>
	<div class="container"> 
    
    <!-- bage header start -->
    <div class="page-header">
      <h1>Category <?=$currentDcat->title;?></h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">pages</a></li>
        <li class="active"><?=$currentDcat->title;?></li>
      </ol>
    </div>
    
    <!-- bage header end --> 
    
  </div>
  
  <!-- data start -->
  <section>
    <div class="container ">
      <div class="row "> 
        <!-- left sec start -->
        <div class="col-md-11 col-sm-11">
          <div class="row">
          <?php
				$p = new Paging;
				$batas = 5;
				$posisi = $p->cariPosisi($batas);

				$tabledcpost = new PoTable('post');
				$dcposts = $tabledcpost->findAllLimitByAnd(id_post, id_category, active, "$iddcat", "Y", "DESC", "$posisi,$batas");
				foreach($dcposts as $dcpost){
				$tabledccom = new PoTable('comment');
				$totaldccom = $tabledccom->numRowByAnd(id_post, $dcpost->id_post, active, 'Y');
				$tableuser = new PoTable('users');
				$currentUser = $tableuser->findBy(id_user, $dcpost->editor);
				$currentUser = $currentUser->current();
			?>
            <div class="sec-topic col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s">
              <div class="row">
              
                <div class="col-sm-7"><img width="1000" height="606" alt="" src="<?=$website_url;?>/po-content/po-upload/<?=$dcpost->picture;?>" class="img-thumbnail"></div>
                <div class="col-sm-9"> <a href="<?php echo "$website_url/detailpost/$dcpost->seotitle"; ?>">
                  <div class="sec-info">
                    <h3><?=$dcpost->title;?></h3>
                    <div class="text-danger sub-info-bordered">
                      <div class="time"><span class="ion-android-data icon"></span><?=tgl_indo($dcpost->date);?></div>
                      <div class="comments"><span class="ion-chatbubbles icon"></span><?=$totaldccom;?></div>
                      <div class="stars"><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star"></span><span class="ion-ios7-star-half"></span></div>
                    </div>
                  </div>
                  </a>
                  <p><?=cuthighlight('post', $dcpost->content, '400');?>...
                  <a href="<?php echo "$website_url/detailpost/$dcpost->seotitle"; ?>">Read more</a></p>
                </div>
              </div>
            </div>
            <?php } ?>
            <div class="col-sm-16">
              <hr>
              <ul class="pagination">
              <?php
					$getpage = $val->validasi($_GET['page'],'sql');
					$jmldata = $tabledcpost->numRowByAnd(id_category, "$iddcat", active, "Y");
					$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($getpage, $jmlhalaman, $website_url, "category", $currentDcat->seotitle);
					echo "$linkHalaman";
				?>
              </ul>
            </div>
          </div>
        </div>
        <!-- left sec end --> 

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
