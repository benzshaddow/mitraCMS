<?php if ($mod==""){
	header('location:../../404.php');
}else{
	if ($member_register == "Y"){
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
	<div id="content" class="container">
		<div id="main" class="row-fluid">
			<div id="main-left" class="span8">
				<article id="post-206" class="post-206 page type-page status-publish hentry instock">
					<header class="entry-header">
						<h1 class="entry-title"><span>Login Member</span></h1>
					</header><!-- .entry-header -->
					<div class="span6">
						<p>Login ke profilmu dan share segala sesuatu tentangmu sekarang.</p>
						<form name="login-form" id="login-form" method="post" action="<?=$website_url;?>/po-admin/login.php" autocomplete="off">
							<div>
								<input type="text" name="username" id="username" placeholder="Username" style="width:100%;" />
							</div>
							<div>
								<input type="password" name="password" id="password" placeholder="Password" style="width:100%;" />
							</div>
							<div>
								Belum punya akun ? Klik <a href="<?=$website_url;?>/register" title="Register Member">di sini!</a><br />
								Lupa password ? Klik <a href="<?=$website_url;?>/po-admin" title="Lupa password">di sini!</a>
							</div>
							<div>
								<br /><input type="submit" value="Login" name="submit" id="cf_send_rss" />
							</div>
						</form>
					</div>
				</article>
			</div><!-- #main-left -->

			<!-- 
			*******************************************************
				Include Sidebar Template
			******************************************************* 
			-->
			<?php include_once "po-content/$folder/sidebar.php"; ?>

		</div><!-- #main -->
	</div><!-- #content -->


<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php include_once "po-content/$folder/footer.php"; ?>
<?php
	}else{
		header('location:404.php');
	}
} ?>
