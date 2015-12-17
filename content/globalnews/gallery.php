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
	<div class="container"> 
    
    <!-- bage header start -->
    <div class="page-header">
      <h1>Gallery</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">pages</a></li>
        <li class="active">Gallery</li>
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
            <!-- gallery start -->
            <div class="gallery">
            <?php
				$tablegal = new PoTable('gallery');
				$gallerys = $tablegal->findAllRand();
				foreach($gallerys as $gallery){
					$idalb = $gallery->id_album;
					$tablecalb = new PoTable('album');
					$currentCalb = $tablecalb->findBy(id_album, $idalb);
					$currentCalb = $currentCalb->current();
					if ($currentCalb->active == 'Y'){
					?>
              <div class="col-sm-8 wow fadeInDown animated "> <a class="gallery-item" href="<?=$website_url;?>/po-content/po-upload/<?=$gallery->picture;?>" title="<?=$gallery->title;?>" class="popup-img">
                <div class="thumb-box"><span class="ion-arrow-expand"></span>
                  <div class="carousel-caption"><?=$currentCalb->title;?> - <?=$gallery->title;?></div>
                  <img width="1600" height="972" alt="" src="<?=$website_url;?>/po-content/po-upload/<?=$gallery->picture;?>" class="img-thumbnail"></div>
                </a> </div>
                	<?php
					}
				}
				?>         
            </div>
            <!-- gallery end -->
           <!--  <div class="col-sm-16">
              <hr>
              <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div> -->
          </div>
        </div>
<?php include_once "po-content/$folder/sidebar.php"; ?>
<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>
