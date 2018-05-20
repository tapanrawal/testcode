<?php
/**
* 
*/
class Mod_inventory
{
	
	
	
	function load($con){
		$query = 'select a.id,a.manufactureID,b.mname,a.modelName,count(a.modelName) as mcount from tbl_modeldetail as a,tbl_manufacturer as b where a.manufactureID=b.id and a.sold=0 group by a.modelName';
		$query = mysqli_query($con, $query);
		$arr1 = array();
		$i=0;
		$message = 'SUCCESSFULL';
		while($row= mysqli_fetch_array($query)){
			$arr1[$i] = array("msg"=>$message,"mid"=>$row['id'],"id"=>$row['manufactureID'],"mname"=>$row['mname'],"modelName"=>$row['modelName'],"mcount"=>$row['mcount']);
			$i++;
		}
		$arr = array("msg"=>$message, "data"=>$arr1);
		mysqli_close($con);
        return $arr;
	}
	
	function loadDetails($con,$manufID,$modelId){
		$query = 'select id,manufactureID,modelName,color,myear,rno from tbl_modeldetail where manufactureID = '.$manufID.' and modelName = (select modelName from tbl_modeldetail where id ='.$modelId.') and sold =0';
		$query = mysqli_query($con, $query);
		$arr1 = array();
		$i=0;
		$message = 'SUCCESSFULL';
		while($row= mysqli_fetch_array($query)){
			$arr1[$i] = array("msg"=>$message,"id"=>$row['id'],"manufactureID"=>$row['manufactureID'],"modelName"=>$row['modelName'],"color"=>$row['color'],"myear"=>$row['myear'],"rno"=>$row['rno']);
			$i++;
		}
		$arr = array("msg"=>$message, "data"=>$arr1);
		mysqli_close($con);
        return $arr;

	}
	function updateDetails($con,$modelId){
		$query = "update tbl_modeldetail set sold = 1 where id =".$modelId."";
		$query = mysqli_query($con, $query);
		$message = 'SUCCESSFULL';
		
		$arr = array("msg"=>$message, "data"=>"Sold");
		mysqli_close($con);
        return $arr;
		
	}
}
?>