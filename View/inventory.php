<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
</head>

<link rel="stylesheet" type="text/css"  href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body>
<div class="navbar navbar-default"> 
	<div style="width: 100%; color: red; height: 30px; background-color: blue;">
		<label style=" float: right; font-size: 20px; margin-right:20px;"><?php  //echo $fname; ?>&nbsp <a href="logout.php" style="color: #fff"></a></label>
		<a style='color:red;margin-left:20px;' href="addmodel.php"><label style="font-size: 20px;">Add Model</label></a>
		<a style='color:red;margin-left:20px;' href="addmanufacturer.php"><label style="font-size: 20px;">Add Manufacturer</label></a>
	</div>
	</div> 
	

	<div class="container"><label>List of Inventory </label></div>
<div class="container">
	<table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Manufacturer Name</th>
                <th>Model Name</th>
                <th>count</th>
            </tr>
        </thead>
       
        <tbody id="tbodybind">
			
        </tbody>
    </table>

</div>



<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Details</h4>
        </div>
        <div class="modal-body">
			<table class="table table-striped table-bordered" cellspacing="0" >
				<tr>
					<th>Sr.No</th>
					<th>Modal Name</th>
					<th>Color</th>
					<th>Manufacturing year</th>
					<th>Registration No.</th>
					<th></th>
				</tr>
				<tbody id="productdetail">
				</tbody>
			</table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


 
</body>

</html>
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

function showdetails(mid,modelId){
	var manufID = mid;
	var modelId = modelId;
	$('#productdetail').html('');
	$.ajax({
		type:'POST',
		url:'../Controller/ctl_inventory.php',
		data:{btn_save:'showdetails',manufID:manufID,modelId:modelId}
	}).done(function(response) {
		var response = jQuery.parseJSON(response);
			if(response.msg == 'SUCCESSFULL'){
				var j=1;
				
				for(var i=0; i< response.data.length; i++){
					$('#productdetail').append("<tr>\n\
					<td>"+j+"</td>\n\<td>"+response.data[i]['modelName']+"</td><td>"+response.data[i]['color']+"</td>\n\
					<td>"+response.data[i]['myear']+"</td>\n\<td>"+response.data[i]['rno']+"</td>\n\
					<td><button type='button' class='btn btn-default' data-dismiss='modal' onclick='return purchase("+response.data[i]['id']+")'>Purchase</button></td></tr>");
					j++;
				}
			}else{
				alert('Somting went wrong');
			}
		
	});
}

function purchase(id){
	$.ajax({
		type:'POST',
		url:'../Controller/ctl_inventory.php',
		data:{btn_save:'update',modelId:id}
	}).done(function(response) {
		var response = jQuery.parseJSON(response);
			if(response.msg == 'SUCCESSFULL'){
				alert("Sold!!");
				window.location.href= "inventory.php";
				return;
			}else{
				alert('Something went wrong!!');
			}
	})
}


$(document).ready(function() {
   // $('#example').DataTable();
	
	$.ajax({
		type:'POST',
		url:'../Controller/ctl_inventory.php',
		data:{btn_save:'Load'}
	}).done(function(response) {
	
			var response = jQuery.parseJSON(response);
			console.log(response);
			if(response.msg == 'SUCCESSFULL'){
				$("#tbodybind").html('');
				var j=1;
				for(var i=0; i< response.data.length; i++){
					$('#tbodybind').append("<tr  data-toggle='modal' data-target='#myModal' onclick = 'return showdetails("+response.data[i]['id']+","+response.data[i]['mid']+")'>\n\
					<td>"+j+"</td>\n\<td>"+response.data[i]['mname']+"</td>\n\
					<td>"+response.data[i]['modelName']+"</td>\n\
					<td>"+response.data[i]['mcount']+"</td>\n\</tr>");
				j++;
				}
			}else{
				alert('Somting went wrong');
			}
	});
	
});



</script>