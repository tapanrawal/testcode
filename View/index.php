<!DOCTYPE html>
<html>
<head>
	<title>Manufacturer</title>
</head>

<link rel="stylesheet" type="text/css"  href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  

<body>
	<div class="navbar navbar-default"> 
	<div style="width: 100%; color: red; height: 30px; background-color: blue;">
		<label style=" float: right; font-size: 20px; margin-right:20px;"><?php  //echo $fname; ?>&nbsp <a href="logout.php" style="color: #fff"></a></label>
		<a style='color:red;margin-left:20px;' href="addmodel.php"><label style="font-size: 20px;">Add Model</label></a>
		<a style='color:red;margin-left:20px;' href="addmanufacturer.php"><label style="font-size: 20px;">Inventory</label></a>
	</div>
	</div> 
	
	
	
	
	<div class="container">
		<div class="row">
			<label>Manufacturer : </label>&nbsp&nbsp<input type="text" name="txt_manu" id="txt_manu">&nbsp&nbsp&nbsp&nbsp<input type="text" class="btn btn-default" onclick = "return validation()" value="Save">
		</div>
	</div>
	<div class="container"><label>List of Manufacturer </label></div>
<div class="container">
	<table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Manufacturer Name</th>
            </tr>
        </thead>
       
        <tbody id="tbodybind">
			
        </tbody>
    </table>

</div>




 
</body>

</html>
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

function validation(){
	var manufacture = $('#txt_manu').val();
	if(typeof manufacture == 'undefiened' || manufacture == ''){
		alert('Manufacturer is not blank!!');
		return false;
	}else{
		 $.ajax({
		type:'POST',
		url:'../Controller/ctl_addmanufacturer.php',
		data:{btn_save:'Save',manufacture:manufacture}
		}).done(function(response) {
			$("#tbodybind").html('');
			var response = jQuery.parseJSON(response);
			if(response.msg == 'SUCCESSFULL'){
				var j=1;
				console.log(response.data[0]['mname']);
				for(var i=0; i< response.data.length; i++){
					$('#tbodybind').append("<tr>\n\
					<td>"+j+"</td>\n\<td>"+response.data[i]['mname']+"</td>\n\</tr>");
				j++;
				}
			}else{
				alert('Somting went wrong');
			}
		});
	}
}


$(document).ready(function() {
   // $('#example').DataTable();
	
	$.ajax({
		type:'POST',
		url:'../Controller/ctl_addmanufacturer.php',
		data:{btn_save:'Load'}
	}).done(function(response) {
			var response = jQuery.parseJSON(response);
			if(response.msg == 'SUCCESSFULL'){
				$("#tbodybind").html('');
				var j=1;
				for(var i=0; i< response.data.length; i++){
					$('#tbodybind').append("<tr>\n\
					<td>"+j+"</td>\n\<td>"+response.data[i]['mname']+"</td>\n\</tr>");
				j++;
				}
			}else{
				alert('Somting went wrong');
			}
	});
	
});

</script>