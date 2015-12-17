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
    <div class="page-header">
      <h1>contact us </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">pages</a></li>
        <li class="active">Contact us</li>
      </ol>
    </div>
  </div>
  <!-- bage header End --> 
  <!-- data Start -->
  <section>
    <div class="container ">
      <div class="row "> 
        <!-- left sec Start -->
        <div class="col-sm-16">
          <div class="row">
            <div id="map_canvas" class="col-sm-16"> 
              <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
              <div style="overflow:hidden;height:400px;width:100%;">
                <div id="gmap_canvas" style="height:400px;width:100%;"></div>
                <style>
                  #gmap_canvas img{max-width:none!important;background:none!important}
                </style>
                <a class="google-map-code" href="http://www.trivoo.net/gutscheine/sheego/" id="get-map-data">trivoo</a></div>
              <script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(30.0444196,31.23571160000006),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(30.0444196, 31.23571160000006)});infowindow = new google.maps.InfoWindow({content:"<b>Egypt</b><br/><br/> Cairo" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});}google.maps.event.addDomListener(window, 'load', init_map);</script> 
            </div>
            <div class="col-sm-16">
              <div class="row">
                <div class="main-title-outer pull-left">
                  <div class="main-title">Be in touch</div>
                </div>
                <div class="col-sm-11">
                  <form action="<?=$website_url;?>/contact.php" method="post" name="" class="comment-form">
                    <div class="row">
                      <div class="form-group col-xs-16 col-sm-8 name-field">
                        <input type="text" name="name_contact" id="cf_name" placeholder="Name*" required="" class="form-control">
                      </div>
                      <div class="form-group col-xs-16 col-sm-8 email-field">
                        <input type="email" name="email_contact" id="cf_email" placeholder="Email*" required="" class="form-control" >
                      </div>
                      <div class="form-group col-xs-16 col-sm-8 name-field">
                        <input type="text" name="subject_contact" id="cf_subject" placeholder="Subject*" required="" class="form-control">
                      </div>
                      <div class="form-group col-xs-16 col-sm-16">
                        <textarea name="message_contact" id="cf_message" placeholder="Your Message" rows="8" class="form-control" >                  </textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-danger" name="submit" id="cf_send" type="submit">Send Message</button>
                    </div>
                  </form>
                </div>
                <div class="col-sm-4  adress">
                  <address>
                  <strong>Adress</strong><br>
                  795 Folsom Ave, Suite 600<br>
                  San Francisco, CA 94107<br>
                  Phone: (123) 456-7890
                  </address>
                  <address>
                  <strong>Advertising mail</strong><br>
                  <a href="mailto:indojamz@gmail.com">indojamz@gmail.com</a>
                  </address>
                  <strong>Social</strong><br>
                  <ul class="list-inline">
                    <li><a href="#"><span class="ion-social-twitter"></span></a></li>
                    <li><a href="#"><span class="ion-social-facebook"></span></a></li>
                    <li><a href="#"><span class="ion-social-googleplus"></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- left sec End --> 
        
      </div>
    </div>
  </section>
			

<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php } ?>
