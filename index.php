<?php
if (!file_exists("library/database.php")){
    echo "Konfigurasi Ke Database Tidak Ditemukan";
}else{
	ob_start();
	session_start();
	include_once 'library/database.php';
	include_once 'library/function.php';
	include_once 'library/classmenu.php';
	$mod = $_GET['mod'];
	$website_cache = 'N';
	$table = new WisasiTable('theme');
	$current = $table->findBy(active, 'Y');
	$current = $current->current();
	$folder = $current->folder;

	if (file_exists("content/$folder/$mod.php")){
		if ($website_cache == "Y"){
			$cacheuri = $_SERVER['REQUEST_URI'];
			$cachename = md5(seo_title($cacheuri));
			$cachefile = 'cache/'.$cachename.'.tmp';
			$cachetime = $website_cache_time * 60;
			if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile))) {
				include_once($cachefile);
			}else{
				ob_start();
				include_once "content/$folder/$mod.php";
				$fp = fopen($cachefile, 'w');
				fwrite($fp, ob_get_contents());
				fclose($fp);
				ob_end_flush();
			}
		}else{
			include_once "content/$folder/$mod.php";
		}
	}else{
		header('location:404.php');
	}
}
?>
