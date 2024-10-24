<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;?>
<!DOCTYPE html>
<html>
  <head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | <?php include('../dist/includes/title.php');?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">

    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
	<script src="../dist/js/jquery.min.js"></script>
 </head>

  <body class="hold-transition skin-white layout-top-nav" onload="myFunction()">
    <div style="background-color:#7E3517;" class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <div class="content-wrapper" style="color:white;">
        <div class="container" >

        
          <section class="content">  <!-- BACKGROUND NG PRINT SCHEDULE -->
            <div class="row">
	      <div class="col-md-9">
              <div class="box box-warning">
              	<div style="text-align: center">
				  <div style = background-color:#7E3517;>
				  
              		<h4 style="color:white;" > Display Class Schedule
              		<a href="#searcht" data-target="#searcht" data-toggle="modal" class="dropdown-toggle btn btn-primary">
                     
                      Teacher				
                    </a>
                   <a href="#searchclass" data-target="#searchclass" data-toggle="modal" class="dropdown-toggle btn btn-success">
                     
                      Class				
                    </a>
                  
                   <a href="#searchroom" data-target="#searchroom" data-toggle="modal" class="dropdown-toggle btn btn-warning">
                     
                      Room				
                    </a>
                    </h4>
                </div> 
               <form method="post" id="reg-form">
                <div style="background-color:#7E3517;background-color:#7E3517;" >
			
				<style>
    				table tr td:nth-child(even) {
     					 color: white;
    					}

    				table tr td:nth-child(odd) {
      					color: white;
   						 }

							.table tr:nth-child(odd) { 
  background-color: #7E3517; 
}

.table tr:nth-child(even) { 
  background-color: gray; 
}

  						</style>
				


				<div class="row">
					<div class="col-md-12">
							<table class="table table-bordered">
							<thead>
							  <tr>
								<th style="text-align:center;color:white;">Time</th>
								<th style="text-align:center;color:white;">M</th>
								<th style="text-align:center;color:white;">T</th>
								<th style="text-align:center;color:white;">W</th>
								<th style="text-align:center;color:white;">TH</th>
								<th style="text-align:center;color:white;">F</th>
								<th style="text-align:center;color:white;">S</th>
								
							  </tr>
							</thead>
							
		<?php
				include('../dist/includes/dbcon.php');
				$query=mysqli_query($con,"select * from time where days IN ('mwf', 'tth') order by time_start")or die(mysqli_error());
			
				while($row=mysqli_fetch_array($query)){
						$id=$row['time_id'];
						$start=date("h:i a",strtotime($row['time_start']));
						$end=date("h:i a",strtotime($row['time_end']));
		?>
							  <tr >
							  <div class="round">

							 



								<td><?php echo $start."-".$end;?></td>
								<td><input type="checkbox" id="check" name="m[]" value="<?php echo $id;?>" style="width: 15px; height: 15px;"></td>
								<td><input type="checkbox" id="check" name="t[]" value="<?php echo $id;?>" style="width: 15px; height: 15px;"></td>
								<td><input type="checkbox" id="check" name="w[]" value="<?php echo $id;?>" style="width: 15px; height: 15px;"></td>
								<td><input type="checkbox" id="check" name="th[]" value="<?php echo $id;?>" style="width: 15px; height: 15px;"></td>
								<td><input type="checkbox" id="check" name="f[]" value="<?php echo $id;?>" style="width: 15px; height: 15px;"></td>
								<td><input type="checkbox" id="check" name="s[]" value="<?php echo $id;?>" style="width: 15px; height: 15px;"></td>
								<!-- <td><input type="checkbox" name="th[]" value="<?php echo $id;?>" style="width: 15px; height: 15px;"></td>
								<td><input type="checkbox" name="f[]" value="<?php echo $id;?>" style="width: 15px; height: 15px;"></td>
								<td><input type="checkbox" name="s[]" value="<?php echo $id;?>" style="width: 15px; height: 15px;"></td -->
							</div>
							  </tr>
							
		<?php }?>					  
				
			<?php ?>					  
			</table>  
			<th>────────────────────────────── ⋆⋅☆⋅⋆ ──────────────────────────────</th>

      <button id="open-popup">Open Pop-up</button>
			<style>
  .border {
    border: 2px solid black;
  }
</style>
<div 
style="z-index: 1; background-color:gray; display: none; position: fixed; top: 41%; left: 92%; transform: translate(-50%, -50%); width: 230px; height: 400px; font-size: 15px;"         
    class="result border" id="form">
	

	


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#open-popup").remove(); //removing the button
      $("#daterange-btn").click(function(){ //replacing the button id
        $("#form").show();
      });
      $(document).mouseup(function(e) {
        var container = $("#form");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          container.hide();
        }
      });
    });
  </script>
  </div>           
        </div>       
					
			
                </div>
              </div>
            </div>



			
	<!-- 		TEACHER BOX  -->
              <div style = "background-color:#7E3517;" box box-warning> 

               
                <div class="box-body">
                
                  <div id="form1">
					
				  <div class="row">
					 <div class="col-md-9">
						  <div class="form-group">
							<label for="date" style="color:white;">Teacher</label>
							
								<select class="form-control select2" name="teacher" required>
								  <?php 




										$query2=mysqli_query($con,"select * from member order by member_last")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2))
									  {
									if ($row['status'] == "admin" || $row['status'] == "user") {
											continue;
										  }
								  ?>
								  
										<option value="<?php echo $row['member_id'];?>"><?php echo $row['member_last'].", ".$row['member_first'];?></option>
								  <?php }


									  
								  ?>
								</select>
							
						  </div>

						  <script>
  document.getElementById("subjectSelect").addEventListener("change", function() {
    var selectedOption = this.value;
    var query = "SELECT units FROM subject WHERE subject_code='"+ selectedOption +"'"
    //query to your database to get the units corresponding to the selected subject code
    //then assign the value of units to the input element
    document.getElementById("textfield").value = units;
  });
</script>



<div class="form-group">
  <label for="date" style="color:white;">Subject</label>
  
  <select class="form-control select2" name="subject" id="subjectSelect" onchange="updateUnits()" required>
    <?php 
      $query2=mysqli_query($con,"select * from subject order by subject_code")or die(mysqli_error($con));
       while($row=mysqli_fetch_array($query2)){
    ?>
      <option value="<?php echo $row['subject_code'];?>"><?php echo $row['subject_code'];?></option>
    <?php }
     
    ?>
  </select>
  <label style="color:white;">Units</label>
  <input type="text" class="form-control" id="textfield" name="textfield" placeholder="" readonly style="width:149px;">
</div>

<script>
  function updateUnits(){
    var selectedOption = document.getElementById("subjectSelect").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("textfield").value = this.responseText;
      }
    };
    xhttp.open("GET", "getUnits.php?subject_code="+selectedOption, true);
    xhttp.send();
  }
</script>

<script>
    function updateUnits(){
    var selectedOption = document.getElementById("subjectSelect").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var units = this.responseText;
        document.getElementById("textfield").value = units;
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:disabled');
        checkboxes.forEach(function(checkbox) {
          checkbox.disabled = false;
        });
        anotherFunction(units);
      }
    };
    xhttp.open("GET", "getUnits.php?subject_code="+selectedOption, true);
    xhttp.send();
  }
  function anotherFunction(units){
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
       checkbox.addEventListener('change', function() {
          var checkedCount = document.querySelectorAll('input[type="checkbox"]:checked').length;
          if (units == 3 && checkedCount >= 2+1) {
            checkbox.disabled = true;
          } else if (units == 6 && checkedCount >= 4+1) {
            checkbox.disabled = true;
          } else {
            var disabledCheckboxes = document.querySelectorAll('input[type="checkbox"]:disabled');
            disabledCheckboxes.forEach(function(disabledCheckbox) {
                if (units == 3 && checkedCount < 2+1) {
                    disabledCheckbox.disabled = false;
                } else if (units == 6 && checkedCount < 4+1) {
                    disabledCheckbox.disabled = false;
                }
            });
          }
       });
    });
  }

</script>








					

						  <div class="form-group">
							<label for="date" style="color:white;">Section</label>
							<select class="form-control select2" name="cys" required>
								  <?php 
									$query2=mysqli_query($con,"select * from cys order by cys")or die(mysqli_error($con));
									 while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['cys'];?></option>
								  <?php }
									
								  ?>
								</select>	
						  </div>
						  <div class="form-group">
							<label for="date" style="color:white;">Room</label>
							<select class="form-control select2" name="room" required>
								  <?php 
									$query2=mysqli_query($con,"select * from room order by room")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['room'];?></option>
								  <?php }
									
								  ?>
								</select>	
						  </div>
						  
					</div>
					
					

				</div>	
               
                  
                  <div class="form-group">
                    
                      <button class="btn btn-lg btn-primary" id="daterange-btn" name="save" type="submit">
                        Save
                      </button>
					  
					  <button class="refresh-page btn btn-lg btn-success" type="button" onclick="location.reload();">Uncheck</button>
					  
					  
                   </div>
                  </div><hr>
				</form>	
                      
                </div>
              </div>
            </div>
			
			
          </div>
	  
            
          </section>
        </div>
      </div>
      <?php include('../dist/includes/footer.php');?>
    </div>
	<div id="searcht" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Faculty Schedule</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="faculty_sched.php" target="_blank">
                
				<div class="form-group">
					<label class="control-label col-lg-2" for="name">Faculty</label>
					<div class="col-lg-10">
					<select class="select2" name="faculty" style="width:90%!important" required>
								  <?php 
								  
									$query2=mysqli_query($con,"select * from member order by member_last")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
										if ($row['status'] == "admin" || $row['status'] == "user") {
											continue;
										  }
								  ?>
										<option value="<?php echo $row['member_id'];?>"><?php echo $row['member_last'].", ".$row['member_first'];?></option>
								  <?php }
									
								  ?>
								</select>
					</div>
				</div> 
				
				
              </div><hr>
              <div class="modal-footer">
				<button type="submit" name="search" class="btn btn-primary">Display Schedule</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div>
 </div>

 
 <div id="searchclass" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Class Schedule</h4>
              </div>
              <div class="modal-body">
			  <form class="form-vertical" method="post" action="class_sched.php" target="_blank">
                
				<div class="form-group">
					<label class="control-label col-lg-2" for="name">Class</label>
					<div class="col-lg-10">
					<select class="select2" name="class" style="width:90%!important" required>
								  <?php 
								  
									$query2=mysqli_query($con,"select * from cys order by cys")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['cys'];?></option>
								  <?php }
									
								  ?>
								</select>
					</div>
				</div> 
				
				
              </div><hr>
              <div class="modal-footer">
				<button type="submit" name="search" class="btn btn-primary">Display Schedule</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div>
 </div>

 
 <div id="searchroom" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Room Schedule</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="room_sched.php" target="_blank">
                
				<div class="form-group">
					<label class="control-label col-lg-2" for="name">Room</label>
					<div class="col-lg-10">
					<select class="select2" name="room" style="width:90%!important" required>
								  <?php 
								  
									$query2=mysqli_query($con,"select * from room order by room")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['room'];?></option>
								  <?php }
									
								  ?>
								</select>
					</div>
				</div> 
				
				
              </div><hr>
              <div class="modal-footer">
				<button type="submit" name="search" class="btn btn-primary">Display Schedule</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div>
 </div>
 
	<script type="text/javascript">
	
		$(document).on('submit', '#reg-form', function()
		 {  
		  $.post('submit.php', $(this).serialize(), function(data)
		  {
		   $(".result").html(data);  
		   $("#form1")[0].reset();


		  });
		  
		  return false;
		  
		
		})
</script>
<script>
$(".uncheck").click(function () {
			$('input:checkbox').removeAttr('checked');
});
</script>
	
	<script type="text/javascript" src="autosum.js"></script>

    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>

    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <script src="../plugins/fastclick/fastclick.min.js"></script>

    <script src="../dist/js/app.min.js"></script>

    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
  
     <script>
      $(function () {

        $(".select2").select2();
       

        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});

        $("[data-mask]").inputmask();


        $('#reservation').daterangepicker();

        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });

        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });

        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });


        $(".my-colorpicker1").colorpicker();

        $(".my-colorpicker2").colorpicker();


        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
