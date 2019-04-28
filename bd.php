<?php
	function getBD(){
		$bdd = new PDO('mysql:host=localhost:8889;dbname=paris;charset=utf8', 'root', 'root');
		return $bdd;
}
?>
