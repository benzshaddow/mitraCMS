<?php

$site['structure']  	= 'Wisasi';
$site['ver']        	= '1.0';
$site['build']      	= '0';
$site['release']    	= '07 Nopember 2015';

$site['title']      	= "Wisasi Mitra";
$site['url']     	 	= "";
$site['adm']  		 	= "{$site['url']}admin/";
$site['con']     	 	= "{$site['url']}content/";
$site['lib']  		 	= "{$site['url']}library/";

$dir['root']        	= ""; 
$dir['adm']         	= "{$dir['root']}admin/";
$dir['con']         	= "{$dir['root']}content/";
$dir['lib']         	= "{$dir['root']}library/";

define('WISASI_DIRECTORY_PATH_ADM', $dir['adm']);
define('WISASI_DIRECTORY_PATH_CON', $dir['con']);
define('WISASI_DIRECTORY_PATH_LIB', $dir['lib']);

$db['host']          	= "";
$db['sock']          	= "";
$db['port']          	= "";
$db['user']          	= "";
$db['passwd']			= "";
$db['db']				= "";

define('DATABASE_HOST', $db['host']);
define('DATABASE_SOCK', $db['sock']);
define('DATABASE_PORT', $db['port']);
define('DATABASE_USER', $db['user']);
define('DATABASE_PASS', $db['passwd']);
define('DATABASE_NAME', $db['db']);

if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
	error_reporting(E_ALL & ~E_NOTICE);
  
if (file_exists( $dir['root'] . 'install' )){
$ret = <<<EOJ
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<title>Wisasi Installation</title>
			<link href="{$site['url']}install/css/bootstrap.min.css" rel="stylesheet" />
			<link href="{$site['url']}install/css/docs.css" rel="stylesheet" />
			<link href='{$site['url']}install/favicon.png' rel='icon' />
			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			  <script src="{$site['url']}install/js/html5shiv.js"></script>
			  <script src="{$site['url']}install/js/respond.min.js"></script>
			<![endif]-->
		</head>
		<body class="bs-docs-home">
			<a class="sr-only" href="#content">Skip navigation</a>
			<div id="main">
			<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
				<div class="container">
					<div class="navbar-header">
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="./" class="navbar-brand">Wisasi Mitra</a>
					</div>
					<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
						<ul class="nav navbar-nav">
							<li><a>Congratulations</a></li>
						</ul>
					</nav>
				</div>
			</header>
			<main class="bs-masthead" id="content" role="main">
				<div class="container">
					<h1>{$site['structure']} {$site['ver']}.{$site['build']}</h1>
					<h2>Release {$site['release']}</h2>
					<p>&nbsp</p>
					<h4>Anda telah berhasil menginstall Wisasi Mitra silahkan remove 'install' directory</h4>
				</div>
			</main>
			<footer class="container" role="contentinfo">
				<ul class="bs-masthead-links">
					<li class="current-version">{$site['structure']} {$site['ver']}.{$site['build']}</li>
					<li>&copy; 2013-2015. All Right Reserved</li>
					<li><a href="http://www.wisasi.com" target="_blank">Wisasi Official Website</a></li>
				</ul>
			</footer>
			<script src="{$site['url']}install/js/jquery.js"></script>
			<script src="{$site['url']}install/js/bootstrap.min.js"></script>
		</body>
	</html>
EOJ;
echo $ret;
exit();
}

class WisasiConnect {
	
	protected static $_connection;
	public static function getConnection(){
		if(!self::$_connection){
			$dbhost = DATABASE_HOST;
			$dbuser = DATABASE_USER;
			$dbpassword = DATABASE_PASS;
			$dbname = DATABASE_NAME;
			self::$_connection = @mysql_connect($dbhost, $dbuser, $dbpassword);
			if(!self::$_connection){
				throw new Exception('Gagal melalukan koneksi ke database. '.mysql_error());
			}
			$result = @mysql_select_db($dbname, self::$_connection);
			if(!$result){
				throw new Exception('Koneksi gagal: '.mysql_error());
			}
		}
		return self::$_connection;
	}

	public static function close(){
		if(self::$_connection){
			mysql_close(self::$_connection);
		}
	}
}

class WisasiSelect implements Iterator{

	protected $_query;
	protected $_sql;
	protected $_pointer = 0;
	protected $_numResult = 0;
	protected $_results = array();

	function __construct($sql){
		$this->_sql = $sql;
	}

	function rewind(){
		$this->_pointer = 0;
	}

	function key(){
		return $this->_pointer;
	}

	protected function _getQuery(){
		if(!$this->_query){
			$connection = WisasiConnect::getConnection();
			$this->_query = mysql_query($this->_sql, $connection);
			if(!$this->_query){
				throw new Exception('Gagal membaca data dari database:'.mysql_error());
			}
		}
		return $this->_query;
	}

	protected function _getNumResult(){
		if(!$this->_numResult){
			$this->_numResult = mysql_num_rows($this->_getQuery());
		}
		return $this->_numResult;
	}

	function valid(){
		if($this->_pointer >= 0 && $this->_pointer < $this->_getNumResult()){
			return true;
		}
		return false;
	}

	protected function _getRow($pointer){
		if(isset($this->_results[$pointer])){
			return $this->_results[$pointer];
		}
		$row = mysql_fetch_object($this->_getQuery());
		if($row){
			$this->_results[$pointer] = $row;
		}
		return $row;
	}

	function next(){
		$row = $this->_getRow($this->_pointer);
		if($row){
			$this->_pointer ++;
		}
		return $row;
	}

	function current(){
		return $this->_getRow($this->_pointer);
	}

	function close(){
		mysql_free_result($this->_getQuery());
		WisasiConnect::close();
	}

}

class WisasiTable {

	protected $_tableName;

	function __construct($tableName){
		$this->_tableName = $tableName;
	}

	public function connect(){
		return WisasiConnect::getConnection();
	}

	public function close(){
		WisasiConnect::close();
	}

	function save(array $data){
		$sql = "INSERT INTO ".$this->_tableName." SET";
		foreach($data as $field => $value){
			$sql .= " ".$field."='".mysql_real_escape_string($value, WisasiConnect::getConnection())."',";
		}
		$sql = rtrim($sql, ',');
		$result = mysql_query($sql, WisasiConnect::getConnection());
		if(!$result){
			throw new Exception('Gagal menyimpan data ke table '.$this->_tableName.': '.mysql_error());
		}
	}

	function update(array $data, $where = ''){
		$sql = "UPDATE ".$this->_tableName." SET";
		foreach($data as $field => $value){
			$sql .= " ".$field."='".mysql_real_escape_string($value, WisasiConnect::getConnection())."',";
		}
		$sql = rtrim($sql, ',');
		if($where){
			$sql .= " WHERE ".$where;
		}
		$result = mysql_query($sql, WisasiConnect::getConnection());
		if(!$result){
			throw new Exception('Gagal mengupdate data table '.$this->_tableName.': '.mysql_error());
		}
	}

	function updateBy($field, $value, array $data){
		$where = "".$field."='".mysql_real_escape_string($value, WisasiConnect::getConnection())."'";
		$this->update($data, $where);
	}

	function updateByAnd($field, $value, $field2, $value2, array $data){
		$where = "".$field."='".mysql_real_escape_string($value)."'";
		$where .= " AND ".$field2."='".mysql_real_escape_string($value2, WisasiConnect::getConnection())."'";
		$this->update($data, $where);
	}

	function delete($where = ''){
		$sql = "DELETE FROM ".$this->_tableName."";
		if($where){
			$sql .= " WHERE ".$where;
		}
		$result = mysql_query($sql, WisasiConnect::getConnection());
		if(!$result){
			throw new Exception('Gagal menghapus data dari table '.$this->_tableName.': '.mysql_error());
		}
	}

	function deleteBy($field, $value){
		$where = "".$field."='".$value."'";
		$this->delete($where);
	}

	function findManualQuery($tabel = '', $field = '', $condition = ''){
		if($field){
			$sql = "SELECT ".$field." FROM ".$tabel."";
		}else{
			$sql = "SELECT * FROM ".$tabel."";
		}
		if($condition){
			$sql .= " ".$condition;
		}
		return new WisasiSelect($sql);
	}

	function findAll($field, $value){
		if (empty($field) || empty($value)){
			$sql = "SELECT * FROM ".$this->_tableName."";
			return new WisasiSelect($sql);		
		}else{
			$sql = "SELECT * FROM ".$this->_tableName."";
			$sql .= " ORDER BY ".$field." ".$value."";
			return new WisasiSelect($sql);
		}
	}

	function findAllLimit($field, $value, $value2){
		if (empty($field) || empty($value)){
			$sql = "SELECT * FROM ".$this->_tableName."";
			$sql .= " LIMIT ".$value2."";
			return new WisasiSelect($sql);		
		}else{
			$sql = "SELECT * FROM ".$this->_tableName."";
			$sql .= " ORDER BY ".$field." ".$value."";
			$sql .= " LIMIT ".$value2."";
			return new WisasiSelect($sql);
		}
	}

	function findAllLimitBy($field, $field2, $value, $value2, $value3){
		if (empty($field) || empty($value2)){
			$sql = "SELECT * FROM ".$this->_tableName."";
			$sql .= " WHERE ".$field2."='".$value."'";
			$sql .= " LIMIT ".$value3."";
			return new WisasiSelect($sql);		
		}else{
			$sql = "SELECT * FROM ".$this->_tableName."";
			$sql .= " WHERE ".$field2."='".$value."'";
			$sql .= " ORDER BY ".$field." ".$value2."";
			$sql .= " LIMIT ".$value3."";
			return new WisasiSelect($sql);
		}
	}

	function findAllLimitByAnd($field, $field2, $field3, $value, $value2, $value3, $value4){
		if (empty($field) || empty($value2)){
			$sql = "SELECT * FROM ".$this->_tableName."";
			$sql .= " WHERE ".$field2."='".$value."'";
			$sql .= " LIMIT ".$value4."";
			return new WisasiSelect($sql);		
		}else{
			$sql = "SELECT * FROM ".$this->_tableName."";
			$sql .= " WHERE ".$field2."='".$value."'";
			$sql .= " AND ".$field3."='".$value2."'";
			$sql .= " ORDER BY ".$field." ".$value3."";
			$sql .= " LIMIT ".$value4."";
			return new WisasiSelect($sql);
		}
	}

	function findAllLimitByRand($field, $value, $value2){
		if (empty($field) || empty($value)){
			$sql = "SELECT * FROM ".$this->_tableName."";
			$sql .= " WHERE ".$field."='".$value."'";
			$sql .= " LIMIT ".$value2."";
			return new WisasiSelect($sql);		
		}else{
			$sql = "SELECT * FROM ".$this->_tableName."";
			$sql .= " WHERE ".$field."='".$value."'";
			$sql .= " ORDER BY RAND()";
			$sql .= " LIMIT ".$value2."";
			return new WisasiSelect($sql);
		}
	}

	function findNotAll($field, $value){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field."!='".$value."'";
		return new WisasiSelect($sql);
	}

	function findAllRand(){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " ORDER BY RAND()";
		return new WisasiSelect($sql);
	}

	function findBy($field, $value){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field."='".$value."'";
		return new WisasiSelect($sql);
	}

	function findByDESC($field, $value, $field2){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field."='".$value."'";
		$sql .= " ORDER BY ".$field2." DESC ";
		return new WisasiSelect($sql);
	}

	function findByASC($field, $value, $field2){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field."='".$value."'";
		$sql .= " ORDER BY ".$field2." ASC ";
		return new WisasiSelect($sql);
	}

	function findByAnd($field, $value, $field2, $value2){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field."='".$value."'";
		$sql .= " AND ".$field2."='".$value2."'";
		return new WisasiSelect($sql);
	}

	function findByAndDESC($field, $value, $field2, $value2, $value3){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field."='".$value."'";
		$sql .= " AND ".$field2."='".$value2."'";
		$sql .= " ORDER BY ".$value3." DESC ";
		return new WisasiSelect($sql);
	}

	function findByAndASC($field, $value, $field2, $value2, $value3){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field."='".$value."'";
		$sql .= " AND ".$field2."='".$value2."'";
		$sql .= " ORDER BY ".$value3." ASC ";
		return new WisasiSelect($sql);
	}

	function findByLogin($field1, $value1, $field2, $value2, $field3, $value3){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field1."='".$value1."'";
		$sql .= " AND ".$field2."='".$value2."'";
		$sql .= " AND ".$field3."='".$value3."'";
		return new WisasiSelect($sql);
	}

	function findStat($field1, $value1, $field2){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field1."='".$value1."'";
		$sql .= " GROUP BY ".$field2."";
		$result = mysql_query($sql, WisasiConnect::getConnection());
		$result = mysql_num_rows($result);
		return $result;
	}

	function findStatd($field1, $field2, $field3, $value1, $field4){
		$sql = "SELECT SUM(".$field1.") as ".$field2." FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field3."='".$value1."'";
		$sql .= " GROUP BY ".$field4."";
		$result = mysql_fetch_assoc(mysql_query($sql, WisasiConnect::getConnection()));
		$result = $result[$field2];
		return $result;
	}

	function findByPost($field, $value){
		$sql = "SELECT title, seotitle FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field."='".$value."'";
		return new WisasiSelect($sql);
	}

	function findSearchPost($value, $value2){
		$pisah_kata = explode(" ",$value);
		$jml_katakan = (integer)count($pisah_kata);
		$jml_kata = $jml_katakan-1;
		$sql = "SELECT * FROM ".$this->_tableName." WHERE ";
		for ($i=0; $i<=$jml_kata; $i++){
			$sql .= "title OR content LIKE '%$pisah_kata[$i]%'";
			if ($i < $jml_kata ){
				$sql .= " OR ";
			}
		}
		$sql .= " AND active='Y' ORDER BY id_post DESC";
		$sql .= " LIMIT ".$value2."";
		return new WisasiSelect($sql);
	}

	function findRelatedPost($value, $value2, $value3, $value4, $value5){
		$pisah_kata  = explode(",",$value);
		$jml_katakan = (integer)count($pisah_kata);
		$jml_kata = $jml_katakan-1; 
		$sql = "SELECT * FROM ".$this->_tableName." WHERE (id_post < ".$value2.") AND (id_post != ".$value2.") AND (" ;
			for ($i=0; $i<=$jml_kata; $i++){
				$sql .= "tag LIKE '%$pisah_kata[$i]%'";
				if ($i < $jml_kata ){
					$sql .= " OR ";
				}
			}
		$sql .= ") AND active='Y'";
		$sql .= " ORDER BY ".$value3." ".$value4."";
		$sql .= " LIMIT ".$value5."";
		return new WisasiSelect($sql);
	}

	function numRow(){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$result = mysql_query($sql, WisasiConnect::getConnection());
		$result = mysql_num_rows($result);
		return $result;
	}

	function numRowBy($field, $value){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field."='".$value."'";
		$result = mysql_query($sql, WisasiConnect::getConnection());
		$result = mysql_num_rows($result);
		return $result;
	}
	
	function numRowByAnd($field, $value, $field2, $value2){
		$sql = "SELECT * FROM ".$this->_tableName."";
		$sql .= " WHERE ".$field."='".$value."'";
		$sql .= " AND ".$field2."='".$value2."'";
		$result = mysql_query($sql, WisasiConnect::getConnection());
		$result = mysql_num_rows($result);
		return $result;
	}

	function numRowSearchPost($value){
		$pisah_kata = explode(" ",$value);
		$jml_katakan = (integer)count($pisah_kata);
		$jml_kata = $jml_katakan-1;
		$sql = "SELECT * FROM ".$this->_tableName." WHERE ";
		for ($i=0; $i<=$jml_kata; $i++){
			$sql .= "title OR content LIKE '%$pisah_kata[$i]%'";
			if ($i < $jml_kata ){
				$sql .= " OR ";
			}
		}
		$sql .= " AND active='Y' ORDER BY id_post DESC";
		$result = mysql_query($sql, WisasiConnect::getConnection());
		$result = mysql_num_rows($result);
		return $result;
	}
}

?>
