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
	$title = $val->validasi($_GET['idp'],'xss');
	$tablepag = new PoTable('pages');
	$currentPag = $tablepag->findByAnd(seotitle, $title, active, 'Y');
	$currentPag = $currentPag->current();
	$idpag = $currentPag->id_pages;
	$content = $currentPag->content;
	$content = html_entity_decode($content);
?>
<?php if ($currentPag != "0"){ ?>
	<div id="content" class="container">
		<div id="main" class="row-fluid">
			  <div class="container"> 
    
    <!-- bage header start -->
    <div class="page-header">
      <h1><?=$currentPag->title;?> </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">pages</a></li>
        <li class="active"><?=$currentPag->title;?></li>
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
            <div class="col-sm-16 author-box">
              <div class="row">
                <div class=" col-xs-16 col-sm-3"><img width="128" height="128" alt="" src="<?=$website_url;?>/po-content/po-upload/<?=$currentPag->picture;?>" class="img-thumbnail"></div>
                <div class="col-xs-16 col-sm-13">
                  <h4><?=$currentPag->title;?></h4>
                  <p><?=$content;?></p>
                 
                </div>
              </div>
            </div>
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
