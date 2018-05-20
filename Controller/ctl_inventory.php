<?php
include('../Model/mod_connection.php');
include('../Model/mod_inventory.php');


if(isset($_POST['btn_save'])){
$btn=$_POST['btn_save'];
if($btn == 'Load'){
	$mobj = new Mod_inventory();
	$query = $mobj->load($con);
	echo $jsondata = json_encode($query); 
}else if($btn == 'showdetails'){
	$manufID = $_POST['manufID'];
	$modelId = $_POST['modelId'];
	$mobj = new Mod_inventory();
	$query = $mobj->loadDetails($con,$manufID,$modelId);
	echo $jsondata = json_encode($query);
}else if($btn== 'update'){
	$modelId = $_POST['modelId'];
	$mobj = new Mod_inventory();
	$query = $mobj->updateDetails($con,$modelId);
	echo $jsondata = json_encode($query);
}



}
?>