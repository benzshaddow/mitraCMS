<?php if ($mod==""){
	header('location:../../404.php');
}else{
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>
	<!-- Your Basic Site Informations -->
	<title><?php include "title.php"; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?php include "meta-desc.php"; ?>">
    <meta name="keywords" content="<?php include "meta-key.php"; ?>">
    <meta http-equiv="Copyright" content="tokecang">
    <meta name="author" content="hardiyansyah">
    <meta http-equiv="imagetoolbar" content="no">
    <meta name="language" content="Indonesia">
    <meta name="revisit-after" content="7">
    <meta name="webcrawlers" content="all">
    <meta name="rating" content="general">
    <meta name="spiders" content="all">
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width">

    <!-- Stylesheets -->
	<!-- bootstrap styles-->
<link href="<?=$website_url;?>/content/<?=$folder;?>/css/bootstrap.min.css" rel="stylesheet">
<!-- google font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
<!-- ionicons font -->
<link href="<?=$website_url;?>/content/<?=$folder;?>/css/ionicons.min.css" rel="stylesheet">
<!-- animation styles -->
<link rel="<?=$website_url;?>/content/<?=$folder;?>/stylesheet" href="css/animate.css" />
<!-- custom styles -->
<link href="<?=$website_url;?>/content/<?=$folder;?>/css/custom-red.css" rel="stylesheet" id="style">
<!-- owl carousel styles-->
<link rel="stylesheet" href="<?=$website_url;?>/content/<?=$folder;?>/css/owl.carousel.css">
<link rel="stylesheet" href="<?=$website_url;?>/content/<?=$folder;?>/css/owl.transitions.css">
<!-- magnific popup styles -->
<link rel="stylesheet" href="<?=$website_url;?>/content/<?=$folder;?>/css/magnific-popup.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Favicons -->
	<link rel="shortcut icon" href="<?=$website_url;?>/<?=$favicon;?>">
</head>

    

	
<body>
<!-- preloader start -->
<div id="preloader">
  <div id="status"></div>
</div>
<!-- preloader end --> 
<!-- style switcher start -->
<!-- <div class="switcher" style="left:-50px;"> <a id="switch-panel" class="hide-panel"> <i class="ion-gear-a"></i> </a>
  <div id="switcher">
    <ul class="colors-list">
      <li><a href="#" class="red" id="custom-red"></a></li>
      <li><a href="#" class="green" id="custom-green"></a></li>
      <li><a href="#" class="purple" id="custom-purple"></a></li>
      <li><a href="#" class="blue" id="custom-blue"></a></li>
    </ul>
  </div>
</div> -->
<!-- style switcher end --> 
<!-- wrapper start -->
<div class="wrapper"> 
  <!-- header toolbar start -->
  <div class="header-toolbar">
    <div class="container">
      <div class="row">
        <div class="col-md-16 text-uppercase">
          <div class="row">
            <div class="col-sm-8 col-xs-16">
              <ul id="inline-popups" class="list-inline">
                <li class="hidden-xs"><a href="#">advertisement</a></li>
                <li><a class="open-popup-link" href="#log-in" data-effect="mfp-zoom-in">log in</a></li>
                <li><a class="open-popup-link" href="#create-account" data-effect="mfp-zoom-in">create account</a></li>
                <li><a  href="#">About</a></li>
              </ul>
            </div>
            <div class="col-xs-16 col-sm-8">
              <div class="row">
                <div id="weather" class="col-xs-16 col-sm-8 col-lg-9"></div>
                <div id="time-date" class="col-xs-16 col-sm-8 col-lg-7"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header toolbar end --> 
  
  <!-- sticky header start -->
  <div class="sticky-header"> 
    <!-- header start -->
    <div class="container header">
      <div class="row">
        <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="index-2.html">globalnews</a></div>
        <div class="col-sm-11 col-md-11 hidden-xs text-right"><img src="<?=$website_url;?>/content/<?=$folder;?>/images/ads/468-60-ad.gif" width="468" height="60" alt=""/></div>
      </div>
    </div>
    <!-- header end --> 
    <!-- nav and search start -->
    <div class="nav-search-outer"> 
      <!-- nav start -->
      
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
          <div class="row">
            <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse">
               
                  <?php 
						$instance = new WisasiController;
						$menu = $instance->wisasi_menu(1, 'class="nav navbar-nav text-uppercase main-nav"');
					?>
					<?php echo $menu; ?>
               
              </div>
            </div>
          </div>
        </div>
        <!-- nav end --> 
        <!-- search start -->
        
        <div class="search-container ">
          <div class="container">
            <form name="form-search" method="post" action="<?=$website_url;?>/search-result/">
              <input type="text" name="search" placeholder="Search...."  />
            </form>
          </div>
        </div>
        <!-- search end --> 
      </nav>
      <!--nav end--> 
    </div>
    <!-- nav and search end--> 
  </div>
  <!-- sticky header end --> 
  <!-- top sec start -->
<?php } ?>
