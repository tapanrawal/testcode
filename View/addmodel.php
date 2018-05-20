<!DOCTYPE html>
<html>
<head>
	<title>Model</title>
</head>

<link rel="stylesheet" type="text/css"  href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  

<body>
<br>
<form enctype="multipart/form-data" id="fupForm" >

<div class="navbar navbar-default"> 
	<div style="width: 100%; color: red; height: 30px; background-color: blue;">
		<label style=" float: right; font-size: 20px; margin-right:20px;"><?php  //echo $fname; ?>&nbsp <a href="logout.php" style="color: #fff"></a></label>
		<a style='color:red;margin-left:20px;' href="inventory.php"><label style="font-size: 20px;">Inventory</label></a>
		<a style='color:red;margin-left:20px;' href="addmanufacturer.php"><label style="font-size: 20px;">Add Manufacturer</label></a>
	</div>
	</div> 
	
<br>
	
<div class="container">
	 <div class="form-group">
        <label for="name">Manufacturing</label>
        <select id="drp_manu" name="drp_manu">
			<option value ='0'>------select manufacturing --------</option>
		</select>
    </div>
	

    <div class="form-group">
        <label for="name">Model name</label>
        <input type="text" class="form-control" id="mnameval" name="mnameval" placeholder="Enter Model Name" required />
    </div>
	<div class="form-group">
        <label for="name">Color</label>
        <input type="text" class="form-control" id="Color" name="Color" placeholder="Enter Color" required />
    </div>
    <div class="form-group">
      <label for="name">Manufacturing Year</label>
        <input type="text" class="form-control" id="myear" name="myear" placeholder="Enter manufacturing year" required />
    </div>
	<div class="form-group">
      <label for="name">Registration number,</label>
        <input type="name" class="form-control" id="rno" name="rno" placeholder="Enter registration number" required />
    </div>
    <div class="form-group">
        <label for="file">File</label>
        <input type="file" class="form-control" id="file" name="file[]"  multiple="true" accepts="image/*" required />
    </div>
	<input type="hidden" name="filesize" id="filesize">
    <input type="submit" name="submit" class="btn btn-danger submitBtn" value="SAVE"/>
	</div>
</form>
</body>

</html>
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
$(document).ready(function(e){
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
		var mnameval= $('#mnameval').val();
		var Color= $('#Color').val();
		var myear= $('#myear').val();
		var rno= $('#rno').val();
		if(mnameval == ''){
			alert('Model name should not be blank');
			return false;
		}else if(Color == ''){
			alert('Color should not be blank');
			return false;
		}else if(myear == ''){
			alert('Manufacturer year should not be blank');
			return false;
		}else if(rno == ''){
			alert('Registration number should not be blank');
			return false;
		}else{
		
			$.ajax({
				type: 'POST',
				url: '../Controller/ctl_addmodel.php',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#fupForm').css("opacity",".5");
				},
				success: function(response){
					var response = jQuery.parseJSON(response);
				if(response.msg == 'SUCCESSFULL'){
					alert('Data save successfully!!');
					 $('#fupForm')[0].reset();
					 $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
				}else{
					alert('Somting went wrong');
					$('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
				}
					
					$('#fupForm').css("opacity","");
					$(".submitBtn").removeAttr("disabled");
				}
			});
		}
    });
    
    //file type validation
    $("#file").change(function() {
		$('#filesize').val(this.files.length);
		var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#file").val('');
            return false;
        }
    });
});




$(document).ready(function() {
   // $('#example').DataTable();
	
	$.ajax({
		type:'POST',
		url:'../Controller/ctl_addmodel.php',
		data:{btn_save:'Load'}
	}).done(function(response) {
		console.log(response);
			var response = jQuery.parseJSON(response);
			if(response.msg == 'SUCCESSFULL'){
				$("#drp_manu").html('');
				for(var i=0; i< response.data.length; i++){
					$('#drp_manu').append("<option value="+response.data[i]['id']+">"+response.data[i]['mname']+"</option>");
				}
			}else{
				alert('Somting went wrong');
			}
	});
	
});
</script>