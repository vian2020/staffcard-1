<?php 
session_start();
include("db_connect.php");
if(isset($_COOKIE['adminid'])&&$_COOKIE['adminemail']){
	$userid=$_COOKIE['adminid'];
  $useremail=$_COOKIE['adminemail'];
  $sqluser ="SELECT * FROM Administrator WHERE Password='$userid' && Email='$useremail'";
  $retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved)) {
      $firstname = $found['Firstname'];
		  $sirname= $found['Sirname'];
			$emails = $found['Email'];
			$id= $found['id'];			  
    }		 
}else{
	header('location:index.php');
  exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="admin/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='admin/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="admin/js/jquery-1.11.1.min.js"></script>
<script src="admin/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- chart -->
<script src="admin/js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
 <script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
 
 <!-- <script src="jquery.js"></script> -->    
<link href="css/animate.min.css" rel="stylesheet"/>   
      <link rel="stylesheet" href="css/bootstrap-dropdownhover.css">

   
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>      

   
   <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
   <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js'></script>

      <script>
      
      $(document).ready(function() {
        $('#example').DataTable( {
 
        });
      });
      
      </script>

	  <!-- Delete disciplinary record js-->
<script type="text/javascript"> 
    $(document).on("click", ".open-Delete_disciplinary", function () {
      var myValue = $(this).data('id');
      swal({
        title: "Are you sure?",
        text: "You want to remove this disciplinary record from the database!",
        type: "warning",
        showCancelButton: true,
        cancelButtonColor: "red",
        confirmButtonColor: "green",
        confirmButtonText: "Yes, remove!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false,
        buttonsStyling: false
      },
      function(isConfirm){
        if (isConfirm) {                                      	
          var vals=myValue;
          $.ajax ({
            type : 'POST',
            url: "upload.php",
            data: { disciplinary_delete: vals},
            success: function(result) {
              if(result == 1){
                swal({
                  title: "Deleted!", 
                  text: "disciplinary record has been deleted from the database.", 
                  type: "success"
                },
                function() { 
                  location.reload();
                });                               	                        
              }
            }
          }); 
        } else {
          swal("Cancelled", "This disciplinary record is safe :)", "error");
        }
      });
    });
                </script>


<!-- Delete disciplinary record js-->
<?php if(isset($_SESSION['disciplinarydeleted'])){?>
<script type="text/javascript"> 
  $(document).ready(function(){
    swal({title: "Successful!", text: "Disciplinary record deleted successful.", type: "success"});
  });
</script>
            
<?php 
	session_destroy();		
}?>

<script type="text/javascript">
  $(document).on("click", ".open-Updatepicture", function () {
    var myTitle = $(this).data('id');
    $(".modal-body #bookId").val(myTitle);
  }); 
</script>
 	<!-- requried-jsfiles-for owl -->
									<!-- //requried-jsfiles-for owl -->
</head> 

<!-- Edit disciplinary record js-->
<script type="text/javascript">
$(document).on("click", ".open-disciplinary_edit", function () {
  var discid = $(this).data('id');
  var empno = $(this).data('ie');
  var empname = $(this).data('if');
  var disctype = $(this).data('ig');
  var datecommited = $(this).data('ih');
  var datediscussed = $(this).data('ij');
  var description = $(this).data('ik');
  var actiontaken = $(this).data('il');
      
  $(".modal-title #oldempno").val(empno);
  $(".modal-body #oldempno").val(empno);
  $(".modal-body #oldempname").val(empname);
  $(".modal-body #olddisctype").val(disctype);     
  $(".modal-body #olddatecommited").val(datecommited);
  $(".modal-body #olddatediscussed").val(datediscussed);
  $(".modal-body #olddescription").val(description);
  $(".modal-body #oldactiontaken").val(actiontaken); 
  $(".modal-body #olddiscid").val(discid); 
}); 
</script>

 <!-- Add disciplinary record js-->
<?php 
  if(isset($_SESSION['disciplinaryadded'])) {
?>
  <script type="text/javascript"> 
 	  $(document).ready(function() {
 	    swal({title: "Successful!", text: "Disciplinary record added successful.", type: "success"});
    });
  </script>
<?php 
    session_destroy();		
  }
?>
<?php 
  if(isset($_SESSION['disciplinaryexist'])) {
?>
  <script type="text/javascript"> 
    $(document).ready(function(){    	
      sweetAlert("Oops...", "There is arleady a disciplinary record in the database", "error");     				              
    });
  </script>
<?php 
    session_destroy();
  }  
?>
<?php 
  if(isset($_SESSION['emptydisciplinarytextboxes'])) {
?>
  <script type="text/javascript"> 
    $(document).ready(function(){    	
      sweetAlert("Oops...", "You have unfilled textboxes on the form", "error");     				              
    });
  </script>
<?php 
  session_destroy();}  
?>
<?php 
  if(isset($_SESSION['tutor'])) {
?>
  <script type="text/javascript"> 
    $(document).ready(function(){ 
      swal({
        title: "User removed successfully",
        text: "Do you want to remove another one?",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "green",
        confirmButtonText: "OK!",
        closeOnConfirm: true,
        closeOnCancel: true,
        buttonsStyling: false
      },
      function(isConfirm) {
        if (isConfirm) {                                      	
          window.location ="administrator.php?id=2";
        } else {
          window.location ="administrator.php";
        }
      });
    });
  </script>
<?php 
    session_destroy();
  }  
?>
<?php 
  if(isset($_SESSION['cat'])) {
?>
  <script type="text/javascript"> 
    $(document).ready(function(){    	
      sweetAlert("Oops...", "This category arleady in the system", "error");     				              
    });
  </script>
<?php 
  session_destroy();}  
?>
<?php
  if(isset($_SESSION['category'])) {
?>
  <script type="text/javascript"> 
    $(document).ready(function() { 
      swal({
        title: "Category added successfully",
        text: "Do you want to add another one?",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "green",
        confirmButtonText: "OK!",
        closeOnConfirm: true,
        closeOnCancel: true,
        buttonsStyling: false
      },
      function(isConfirm){
        if (isConfirm) {                                      	
          window.location ="administrator.php?id=3";
        } else {
          window.location ="administrator.php";
        }
      });
    });
  </script>             
<?php 
    session_destroy();
  }  
?>
<?php 
  if(isset($_SESSION['del'])) {
?>
  <script type="text/javascript"> 
    $(document).ready(function() { 
      swal({
        title: "Category Deleted",
        text: "Do you want to delete another one?",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "green",
        confirmButtonText: "OK!",
        closeOnConfirm: true,
        closeOnCancel: true,
        buttonsStyling: false
      },
      function(isConfirm){
        if (isConfirm) {                                      	
          window.location ="administrator.php?id=4";
        } else {
          window.location ="administrator.php";
        }
      });
    });
  </script>
<?php 
    session_destroy();
  }  
?>
<?php
  if(isset($_SESSION['pass_disciplinary_edit'])) {
?>
  <script type="text/javascript"> 
    $(document).ready(function() {  
      swal({title: "Successful!", text: "disciplinary record edited!!.", type: "success"});
    });
  </script>
<?php
    session_destroy();
  }
?>
     
<?php 
  $sqlid ="SELECT * FROM Users Order BY id DESC";
  $ret = mysqli_query($db,$sqlid);				                
  while($found = mysqli_fetch_array($ret)) {
    $idsx=$found['id'];
  }
  $sqluse ="SELECT * FROM Inorg ORDER BY id DESC ";
  $retrieve = mysqli_query($db,$sqluse);
  while($foundk = mysqli_fetch_array($retrieve)) {
    $name = $foundk['name'];
    $website= $foundk['website'];
    $phone= $foundk['Phone'];
    $year= $foundk['year'];
    $mail= $foundk['email'];
    $idz= $foundk['id'];
  }	 
?>

 <div id="Taxreceipted" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	 PRINT IDs IN BULK
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      	     <form action="printbulk.php" method="post">
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">From</span>
    <input id="text" type="number" class="form-control" name="startpoint" >
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">To</span>
   <input type="number" class="form-control" name="endpoint" >
  </div>
  <div class="input-group">
    <span class="input-group-addon">Employee id starts @</span>
    <input id="msg" type="text" class="form-control" name="receiptrange" placeholder="" value="<?php echo$idsx; ?>" readonly="readonly">
  </div>
  

      </div>
      <div class="modal-footer">
      	<input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
      </div>
      </form> 
      </div>       
  </div>
  </div> 
 



<div id="Updatepicture" class="modal fade" role="dialog">
  <div class="modal-dialog" style="float:right;width:20%">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">        	        	
        	</h4>
      </div>
      <div class="modal-body" >
        <center><p></p>
        	<form method="post" action="upload.php" enctype='multipart/form-data'>        		
            
        	<p style="margin-bottom:10px;">
        			Select picture<input name='file2' type='file' id='file2' >
           </p>  
           <p>
        	<input name='id' type='hidden' value='' id='bookId'>
        	<input name='category' type='hidden' value='Administrator'>
        	 <input type="hidden" name="page" value="users.php"/>                                                        	      		

           </p>     	      		
	                
        </center>
      </div>
      <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Change" id="btns1" name="Change"> &nbsp;
                  
      </div>
      </div>
       </form>
  </div>
  </div>
 
 <div id="Useradd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	ADD STAFF DETAILS
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      	<center> 
        		<form method="post" action="upload.php" enctype='multipart/form-data' style="width: 98%;">        		

            	
      	        <p style="margin-bottom:10px;">  
        	      <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="pro">&nbsp;Pro&nbsp;&nbsp; &nbsp; &nbsp;</span>
        	    <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="dr">&nbsp;Dr &nbsp; &nbsp;&nbsp;&nbsp;</span>
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mr">&nbsp;Mr &nbsp; &nbsp; &nbsp;&nbsp;</span>        		
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mrs">&nbsp;Mrs &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="miss">&nbsp;Miss</span>
        		</p>
        		                                                           	      		
                 <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;Firstname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mfname"></span></p>
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;Sirname:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="msname"></span></p>
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Department:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="minstitution"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rank:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="memail"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;Email:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mphone"></span></p>
        	     <p ><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp;Staff ID:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mpassword"></span></p>
        		Add profile picture:<input name='filed' type='file' id='filed' >
                    
        		   <input type="hidden" name="page" value="admin.php"/>                                                        	      		
         </center>
      </div>
      <div class="modal-footer">
       <input type="submit" class="btn btn-success" value="Submit" id="addmember" name="addmember"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div> 
  
  <div id="Initialisation" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SYSTEM INFORMATION INITIALISATION
        	</center></h4>
      </div>
      	<form method="post" action="upload.php" enctype='multipart/form-data'>        		

      <div class="modal-body" >       	
      	<center> 
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Org Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgname"></span></p>
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Phone:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgphone"></span></p>
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Email:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgemail"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp;Website:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgwebsite"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Active Year:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgyear"></span></p>
        	        Attach Organisation Logo:(<h7 style="color:red">Make sure it is a transparent image</h7>)<input name='filed' type='file' id='filed' >
                                   	 <input type="hidden" name="page" value="admin.php"/>                                                        	      		
         </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Finish" id="addmember" name="orginitial"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>





<!--Disciplinary Information System Data Entry Form-->

  <div id="Disciplinary_data_entry" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	DISCIPLINARY DATA ENTRY FORM
        	</center></h4>
      </div>
      	<form method="post" action="upload.php" enctype='multipart/form-data'>        		

      <div class="modal-body" >       	
      	<center> 
		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Emp No:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="empno"></span></p>
		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Emp Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="empname"></span></p>
		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;Disciplinary Type<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="disciplinarytype"></span></p>
		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;Date Commited:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="datecommited"></span></p>
		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;Date Discussed:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="datediscussed"></span></p>
		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Description:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="description"></span></p>
		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action Taken:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="actiontaken"></span></p>
			<!-- <input type="hidden" name="entry" value="Disciplinary.php"/>   -->
                                           	      		
         </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Submit" id="disciplinary_entry" name="disciplinary_entry"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>



<!--Disciplinary Information System Data Edit Form-->

<div id="disciplinary_edit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;"><center>
                   Edit details of <input style="border: none;background:#222d32" type="text" id="oldempno" value="" readonly="readonly" />
	    	
        	</center></h4>
      </div>
      <div class="modal-body" >
        <center>
             
        	<form method="post" action="upload.php" enctype='multipart/form-data'>        		
            
			<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Emp No:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="empno" id ="oldempno"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Emp Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="empname" id="oldempname"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Disciplinary Type<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="disciplinarytype" id ="olddisctype"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Date Commited:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="datecommited" id="olddatecommited"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Date Discussed:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="date" name="datediscussed" id ="olddatediscussed"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Description:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="description" id="olddescription"></span></p>
            <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Action Taken:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="actiontaken" id="oldactiontaken"></span></p>
		
			<input type="hidden" name="id" id="olddiscid" />   	                                                      	      		
           
        </center>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Reset" id="amendreceipt" name="edit_disciplinary"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>









<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
                    

      <?php   
				$sqln ="SELECT * FROM Inorg ";
        $rgetb = mysqli_query($db,$sqln);
        $numb=mysqli_num_rows($rgetb);
        if ($numb!=0) {
          while($foundl = mysqli_fetch_array($rgetb)) {
            $profile= $foundl['pname'];
		      }
					echo"<center><img src='media/$profile'  width='70%' height='140px' alt=''></center>";	   
        } else {
			?>
        <h1>
          <a class="navbar-brand" href="index.html"><span class="fa fa-area-chart">
            </span>MAIN MENU<span class="dashboard_text"></span>
          </a>
        </h1>
      <?php } ?> 

          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">
              	 <h4>Administrator</h4>
              </li>
              <li class="treeview">
                <a href="admin.php">
                <i class="fa fa-tv"></i> <span>Control Panel</span>
                </a>
              </li>
  

              <!--Disciplinary Information System Info Menu Left hand side Panel-->
            

			  <li class="treeview">
			  <a data-toggle='modal' data-id='' href="#Disciplinary_data_entry" class='open-Initial'><i class="fa fa-plus"></i>Add Disciplinary Info</a>    
         
              </li>

                          
                </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				
				<div class="profile_details" >		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img">
										<?php   
										  $sql ="SELECT * FROM Profilepictures WHERE ids='$id' && Category='User'";
                      $rget = mysqli_query($db,$sql);
											$num=mysqli_num_rows($rget);
                      if($num!=0){
												while($found = mysqli_fetch_array($rget)) {
                          $profile= $found['name'];
		                    }
                        echo"<img src='admin/images/$profile' height='50px' width='50px' alt=''>";	   
                      } else {
                        echo"<img src='admin/images/profile.png' height='50px' width='50px' alt=''>";	   
                      }
										?>
                  </span> 
									<div class="user-name" >
										<p style="color:#1D809F;">
                      <?php if(isset($sirname)) {
                        echo"<strong>".$firstname." ".$sirname."! </strong>";
                      } ?>
				            </p>
										<span>Administrator&nbsp;<img src='admin/images/dot.png' height='15px' width='15px' alt=''>
										</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li>
                  <a data-toggle='modal' data-id='<?php echo$id; ?>' href='#Updatepicture' class='open-Updatepicture'><i class="fa fa-user"></i>Change profile picture</a>
                </li>
								<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper"  >
			<div class="main-page" >
	
				
	
			<div class="charts">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">List of Disciplinary Action</h4>
					<!-- start content_slider -->
				<div class="alert alert-info">
                             <i class="fa fa-envelope"></i>&nbsp;This screen displays 50 records use the search box to spool more records
                         </div>
					
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
          <tr>
            <th>EMP NO</th>
            <th>EMP NAME</th>
            <th>DISCIPLINARY TYPE</th>
            <th>DATE COMMITED</th>              
            <th>DATE DISCUSSED</th>
            <th>DESCRIPTION</th>
            <th>ACTION TAKEN</th>          
            <th>PRINT</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
        	<?php   
            $sqlmember ="SELECT * FROM disciplinary ";
			      $retrieve = mysqli_query($db,$sqlmember);
				    $count=0;
            while($found = mysqli_fetch_array($retrieve)) {
              $empno = $found['Emp_No']; $empname = $found['Emp_Name']; $disciplinary_type = $found['Disciplinary_Type'];
						  $date_commited = $found['Date_commited']; $date_discussed = $found['Date_discussed']; $description = $found['Description'];
						  $action_taken = $found['Action_taken'];$id=$found['id'];	 
			        
              echo"<tr> 
				        <td>$empno</td>                                       
                <td>$empname</td>        	
                <td>$disciplinary_type</td>
                <td>$date_commited</td>
							  <td>$date_discussed</td>
							  <td>$description</td>
                <td>$action_taken</td>
			          <td>
                  <a  href='#' class='btn  btn-success' title='click to print report' ><span class='glyphicon glyphicon-print' style='color:white;'></span></a>
                </td>
			          <td>
			            <a data-toggle='modal' data-id='$id' data-ie='$empno'   data-if='$empname' data-ig='$disciplinary_type' data-ih='$date_commited' data-ij='$date_discussed' data-ik='$description'  data-il='$action_taken' class='open-disciplinary_edit btn  btn-info' title='edit user details' href='#disciplinary_edit'><span class='glyphicon glyphicon-edit' style='color:white;'></span></a>
							  </td>				                 
			          <td>
			            <a data-id='$id'  class='open-Delete_disciplinary btn  btn-danger' title='delete user' ><span class='glyphicon glyphicon-trash' style='color:white;'></span></a>
                </td>			 
              </tr>";
					  } 
          ?>
        </tbody>
        
    </table>
      <button id="clear-all-button">Clear All Filters</button>
                           
				        </div>
		
				</div>

					<!--//sreen-gallery-cursual---->
			</div>
		 </div>
		</div>



	<!--footer-->

	<div class="footer">
	  <p>© 2018 Attainment . All Rights Reserved | Design and developed by mvumapatrick@gmail.com </p>		
	</div>
    <!--//footer-->
	</div>
		
	<!-- new added graphs chart js-->
  <script src="admin/js/Chart.bundle.js"></script>
  <script src="admin/js/utils.js"></script>
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="admin/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
      showLeftPush = document.getElementById( 'showLeftPush' ),
      body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="admin/js/jquery.nicescroll.js"></script>
	<script src="admin/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- side nav js -->
	<script src='admin/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
    $('.sidebar-menu').SidebarNav()
  </script>
		
	<!-- Bootstrap Core JavaScript -->
  <script src="admin/js/bootstrap.js""> </script>
	<!-- //Bootstrap Core JavaScript -->
	<script src="css/bootstrap-dropdownhover.js"></script>
	
</body>
</html>