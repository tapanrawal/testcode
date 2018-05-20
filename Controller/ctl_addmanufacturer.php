<?php
include('../Model/mod_connection.php');
include('../Model/mod_addmanufacturer.php');


if(isset($_POST['btn_save'])){
$btn = $_POST['btn_save'];
if($btn =='Save'){
	if(isset($_POST['manufacture'])){
		$manufacture = $_POST['manufacture'];
		$mobj = new Mod_manufacture();
		$query = $mobj->savedata($con,$manufacture);
		echo $jsondata = json_encode($query); 
	}else{
		echo $jsondata = json_encode('Something went worng!!');
	}
	
}
if($btn == 'Load'){
	$mobj = new Mod_manufacture();
	$query = $mobj->load($con);
	echo $jsondata = json_encode($query); 
}


}
?>