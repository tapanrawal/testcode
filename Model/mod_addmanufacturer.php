<?php
/**
* 
*/
class Mod_manufacture
{
	
	function savedata($con,$manufacture)
	{
		$query = "insert into tbl_manufacturer (mname)values('".$manufacture."')";
		mysqli_query($con, 'CALL STR_SAVE("' . $query . '",@a,@b)');
        $res = mysqli_query($con, "SELECT @a,@b");
        $row = mysqli_fetch_array($res);
		
		$ret =  $row[0];
        $message =  $row[1];
		$arr = array();
		
		if($message == 'SUCCESSFULL'){
			$query = 'select * from tbl_manufacturer';
			$query = mysqli_query($con, $query);
			$arr1 = array();
			$i=0;
			while($row= mysqli_fetch_array($query)){
				$arr1[$i] = array("mname"=>$row['mname']);
				$i++;
			}

			$arr = array("msg"=>$message, "data"=>$arr1);
		}else{
			$arr = array("msg"=>$message);
		}
		
		mysqli_close($con);
        return $arr;
    }
	
	function load($con){
		$query = 'select * from tbl_manufacturer';
		$query = mysqli_query($con, $query);
		$arr1 = array();
		$i=0;
		$message = 'SUCCESSFULL';
		while($row= mysqli_fetch_array($query)){
			$arr1[$i] = array("msg"=>$message,"mname"=>$row['mname']);
			$i++;
		}
		$arr = array("msg"=>$message, "data"=>$arr1);
		mysqli_close($con);
        return $arr;
	}
}
?>