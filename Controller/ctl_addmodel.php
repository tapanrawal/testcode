<?php
include('../Model/mod_connection.php');
include('../Model/mod_addmodel.php');
if(isset($_POST['btn_save'])){
if($btn = $_POST['btn_save']){
	if($btn == 'Load'){
		$mobj = new Mod_model();
	$query = $mobj->load($con);
	echo $jsondata = json_encode($query); 
	}
}
}

if(!empty($_FILES['file']['name'])){
    $uploadedFile = '';
	for($i=0; $i< $_POST['filesize']; $i++){
		$fileName = time().'_'.$_FILES['file']['name'][$i];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"][$i]);
        $file_extension = end($temporary);
        if((($_FILES["file"]["type"][$i] == "image/jpg") || ($_FILES["file"]["type"][$i] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['file']['tmp_name'][$i];
            $targetPath = '../upload/'.$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
				if($uploadedFile == ''){
					$uploadedFile = $fileName;
				}else{
					$uploadedFile = $uploadedFile.','.$fileName;
				}
                
            }
        }

	}
	$drp_manu = $_POST['drp_manu'];
	$mnameval = $_POST['mnameval'];
	$color = $_POST['Color'];
	$myear = $_POST['myear'];
	$rno = $_POST['rno'];
	$mobj = new Mod_model();
	$query = $mobj->savedata($con,$drp_manu,$mnameval,$color,$myear,$rno,$uploadedFile);
	echo $jsondata = json_encode($query); 
}

?>