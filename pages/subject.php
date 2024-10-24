 <?php 
 error_reporting(0);
 session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Subject | <?php include('../dist/includes/title.php');?></title>

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

      <div class="content-wrapper">
        <div class="container" style="color:white;">

        


          <section class="content">
            <div class="row">
            <div class="col-md-9">
              <div box box-warning>

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
               
                <div style="background-color:#7E3517;" class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table id="example1" class="table table-bordered ">
              <thead>
                <tr>
                <th>Subject Code</th>
                <th>Subject Title</th>
                <th>Units</th>
                <th>Action</th>
                
                
                </tr>
              </thead>
              
    <?php
         if(!isset($_SESSION)) 
         { 
             session_start(); 
         } 
        $member=$_SESSION['id'];
        include('../dist/includes/dbcon.php');
        $query=mysqli_query($con,"select * from subject order by subject_code")or die(mysqli_error());
          
          while($row=mysqli_fetch_array($query)){
            $id=$row['subject_id'];
            $code=$row['subject_code'];
            $title=$row['subject_title'];
            $units=$row['units'];
            $mid=$row['member_id'];
    ?>
                <tr>
                <td><?php echo $code;?></td>
                <td><?php echo $title;?></td> 
                <td><?php echo $units;?></td> 
                <td>
                <?php 
                  if ($member==$mid)  
                    {
                      echo "  
                        <a id='click' href='subject.php?id=$id&code=$code&title=$title&units=$units'>
                          <i class='glyphicon glyphicon-edit text-blue'></i></a>
                        <a id='removeme' href='subject_del.php?id=$id'>
                          <i class='glyphicon glyphicon-remove text-red'></i></a>";
                  }
                ?>
                </td>
        
                </tr>

              
<?php }?>           
</table>  
							  
		</div>
		<div class="col-md-6">
			
						
         </div>          
        </div>      
					
			
                </div>
              </div>
            </div>
            <form method="post" action="subject_save.php">
            <div class="col-md-2 ">
              <div>
                <div style="background-color:#f5cb42; background-color:#7E3517;" class="box-body">
              
                  <div id="form">
                  
				  <div class="row">
					 <div class="col-md-12"> 
           
						  <div class="form-group">
							<label for="date">Add Subject</label><br>
								<input type="text" class="form-control" name="code" placeholder="Subject Code" required>
								<input type="text" class="form-control" name="title" placeholder="Subject Title" required>
                <input type="number" class="form-control" name="units" placeholder="Subject Units" required>
						  </div>
					</div>
				  </div>	
               
                  
                  <div class="form-group">
                    
                      <button class="btn btn-lg btn-block btn-primary" id="daterange-btn" name="save" type="submit">
                        Save
                      </button>
					  <button class="btn btn-lg btn-block" id="daterange-btn" type="reset" style="color:black;">
                       Cancel
                      </button>
					  
					  
                   </div>
                  </div><hr>
                  
				</form>	
                </div>
              
				<div style="background-color:#7E3517; " class="box-body" style="" id="displayform">
        
              
                  <div id="form">
                  
				  <div class="row">
					 <div class="col-md-12">
						  <form method="post" action="subject_update.php">
						  <div class="form-group">
							<label for="date">Update Subject</label><br>
              
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_REQUEST['id'];?>">
								<input type="text" class="form-control" id="code" name="code" value="<?php echo $_REQUEST['code'];?>" placeholder="Subject Code">
								<input type="text" class="form-control" id="class" name="title" value="<?php echo $_REQUEST['title'];?>" placeholder="Subject Title" required>
                <input type="number" class="form-control" id="units" name="units" value="<?php echo $_REQUEST['units'];?>" placeholder="Subject Units" required>
                
              </div>
					</div>
				  </div>	
               
                  
                  <div class="form-group">
                    
                      <button class="btn btn-lg btn-block btn-primary" id="daterange-btn" name="save" type="submit">
                        Update
                      </button>
					  
					  </form>
					  
                   </div>
                  </div><hr>
				
                </div>
              </div>
            </div>
			
			
          </div>
	  
            
          </section>
        </div>
      </div>
      <?php include('../dist/includes/footer.php');?>
    </div>
	
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
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
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
