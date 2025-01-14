
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
error_reporting(0);
if($_POST)
{
include('../dist/includes/dbcon.php');

	$member = $_POST['teacher'];
	$subject = $_POST['subject'];
	$room = $_POST['room'];
	$cys = $_POST['cys'];
	$remarks = $_POST['remarks'];


	$m = $_POST['m'];
	$w = $_POST['w'];
	$f = $_POST['f'];
	$t = $_POST['t'];
	$th = $_POST['th'];
	$s = $_POST['s'];
	
	$set_id=$_SESSION['settings'];
	$program=$_SESSION['id'];
					
	//monday sched
	foreach ($m as $daym){
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='m'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>monday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='m'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='m'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
		

			$queryt = mysqli_query($con, "select * from member where member_id='$member'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($queryt);
$membert = $rowt['member_last'].", ".$rowt['member_first'];

$querytime = mysqli_query($con, "SELECT * FROM time WHERE time_id='$daym'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($querytime);
$timet = date("h:i a", strtotime($rowt['time_start']))."-".date("h:i a", strtotime($rowt['time_end']));

$time_start = date("Y-m-d H:i:s", strtotime($rowt['time_start']));
$time_end = date("Y-m-d H:i:s", strtotime($rowt['time_end']));

$time_start_timestamp = strtotime($rowt['time_start']);
$time_end_timestamp = strtotime($rowt['time_end']);

$query_overlap = mysqli_query($con, "SELECT * FROM schedule WHERE day='m' AND time_end > '$time_start' AND time_start < '$time_end'") or die(mysqli_error($con));
$num_overlap = mysqli_num_rows($query_overlap);

if ($num_overlap > 0) {
    echo "Time slots are overlapping with the following time slots:";
    while ($row_overlap = mysqli_fetch_assoc($query_overlap)) {
        echo " (" . "Monday ". $row_overlap['time_start'] . " - " . $row_overlap['time_end'] . ")";
    }
    break;
} else {
    echo "Time slots are not overlapping";
}

if (($count_t == 0) && ($count_r == 0) && ($count_c == 0)) {
    mysqli_query($con, "INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by,time_start,time_end) 
                        VALUES('$daym','m','$member','$subject','$cys','$room','$remarks','$set_id','$program','$time_start','$time_end')") or die(mysqli_error());
    
    echo "<span class='text-success'>
    <table width='100%'>
      <tr>
        <td>Monday</td>
        <td>$timet</td> 
        <td>Success</td>					
      </tr>
    </table></span><br>";	
} else if ($count_t > 0) {
    echo $error_t."<br>";
} else if ($count_r > 0) {
    echo $error_r."<br>";
} else {
    echo $error_c."<br>";
}


}
	
	//------------------------------------------------
	//tuesday sched
	foreach ($t as $daym){
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='t'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>tuesday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='t'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>tuesday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='t'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>tuesday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
		

			$queryt = mysqli_query($con, "select * from member where member_id='$member'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($queryt);
$membert = $rowt['member_last'].", ".$rowt['member_first'];

$querytime = mysqli_query($con, "SELECT * FROM time WHERE time_id='$daym'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($querytime);
$timet = date("h:i a", strtotime($rowt['time_start']))."-".date("h:i a", strtotime($rowt['time_end']));

$time_start = date("Y-m-d H:i:s", strtotime($rowt['time_start']));
$time_end = date("Y-m-d H:i:s", strtotime($rowt['time_end']));

$time_start_timestamp = strtotime($rowt['time_start']);
$time_end_timestamp = strtotime($rowt['time_end']);

$query_overlap = mysqli_query($con, "SELECT * FROM schedule WHERE day='t' AND time_end > '$time_start' AND time_start < '$time_end'") or die(mysqli_error($con));
$num_overlap = mysqli_num_rows($query_overlap);

if ($num_overlap > 0) {
    echo "Time slots are overlapping with the following time slots:";
    while ($row_overlap = mysqli_fetch_assoc($query_overlap)) {
        echo " (" . "Tuesday ". $row_overlap['time_start'] . " - " . $row_overlap['time_end'] . ")";
    }
    break;
} else {
    echo "Time slots are not overlapping";
}

if (($count_t == 0) && ($count_r == 0) && ($count_c == 0)) {
    mysqli_query($con, "INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by,time_start,time_end) 
                        VALUES('$daym','t','$member','$subject','$cys','$room','$remarks','$set_id','$program','$time_start','$time_end')") or die(mysqli_error());
    
    echo "<span class='text-success'>
    <table width='100%'>
      <tr>
        <td>Tuesday</td>
        <td>$timet</td> 
        <td>Success</td>					
      </tr>
    </table></span><br>";	
} else if ($count_t > 0) {
    echo $error_t."<br>";
} else if ($count_r > 0) {
    echo $error_r."<br>";
} else {
    echo $error_c."<br>";
}


}
	
	//wednesday sched
	foreach ($w as $daym){
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='w'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>wednesday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='w'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>wednesday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='w'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>wednesday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
		

			$queryt = mysqli_query($con, "select * from member where member_id='$member'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($queryt);
$membert = $rowt['member_last'].", ".$rowt['member_first'];

$querytime = mysqli_query($con, "SELECT * FROM time WHERE time_id='$daym'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($querytime);
$timet = date("h:i a", strtotime($rowt['time_start']))."-".date("h:i a", strtotime($rowt['time_end']));

$time_start = date("Y-m-d H:i:s", strtotime($rowt['time_start']));
$time_end = date("Y-m-d H:i:s", strtotime($rowt['time_end']));

$time_start_timestamp = strtotime($rowt['time_start']);
$time_end_timestamp = strtotime($rowt['time_end']);

$query_overlap = mysqli_query($con, "SELECT * FROM schedule WHERE day='w' AND time_end > '$time_start' AND time_start < '$time_end'") or die(mysqli_error($con));
$num_overlap = mysqli_num_rows($query_overlap);

if ($num_overlap > 0) {
    echo "Time slots are overlapping with the following time slots:";
    while ($row_overlap = mysqli_fetch_assoc($query_overlap)) {
        echo " (" . "Wednesday ". $row_overlap['time_start'] . " - " . $row_overlap['time_end'] . ")";
    }
    break;
} else {
    echo "Time slots are not overlapping";
}

if (($count_t == 0) && ($count_r == 0) && ($count_c == 0)) {
    mysqli_query($con, "INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by,time_start,time_end) 
                        VALUES('$daym','w','$member','$subject','$cys','$room','$remarks','$set_id','$program','$time_start','$time_end')") or die(mysqli_error());
    
    echo "<span class='text-success'>
    <table width='100%'>
      <tr>
        <td>Wednesday</td>
        <td>$timet</td> 
        <td>Success</td>					
      </tr>
    </table></span><br>";	
} else if ($count_t > 0) {
    echo $error_t."<br>";
} else if ($count_r > 0) {
    echo $error_r."<br>";
} else {
    echo $error_c."<br>";
}


}
	
	//-------------------------------------------------------------

//thursday sched
foreach ($th as $daym){
	//check conflict for member
	$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
	natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='th'")or die(mysqli_error($con));
		$row=mysqli_fetch_array($query_member);
		$count_t=$row['count'];
		$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
		$member1=$row['member_last'].", ".$row['member_first'];
		
		$error_t="<span class='text-danger'>
		<table width='100%'>
			<tr>	
				<td>thursday</td>
				<td>$time1</td> 
				<td>$member1</td>
				<td class='text-danger'><b>Not Available</b></td>					
			</tr>
			</span>
		</table>";
	
	//check conflict for room
	$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
	natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='th'")or die(mysqli_error($con));
		$rowr=mysqli_fetch_array($query_room);
		$count_r=$rowr['count'];
		$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
		$roomr=$rowr['room'];
		
		$error_r="<span class='text-danger'>
		<table width='100%'>
			<tr>
				<td>thursday</td>
				<td>$timer</td> 
				<td>Room $roomr</td>
				<td class='text-danger'><b>Not Available</b></td>					
			</tr>
			</span>
		</table>";
		//check conflict for class
	$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
	natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='th'")or die(mysqli_error($con));
		$rowc=mysqli_fetch_array($query_class);
		$count_c=$rowc['count'];
		$cysc=$rowc['cys'];
		$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
		
		$error_c="<span class='text-danger'>
		<table width='100%'>
			<tr>
				<td>thursday</td>
				<td>$timec</td> 
				<td>$cysc</td>
				<td class='text-danger'><b>Not Available</b>	</td>					
			</tr>
		</table></span>";	
	
	

		$queryt = mysqli_query($con, "select * from member where member_id='$member'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($queryt);
$membert = $rowt['member_last'].", ".$rowt['member_first'];

$querytime = mysqli_query($con, "SELECT * FROM time WHERE time_id='$daym'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($querytime);
$timet = date("h:i a", strtotime($rowt['time_start']))."-".date("h:i a", strtotime($rowt['time_end']));

$time_start = date("Y-m-d H:i:s", strtotime($rowt['time_start']));
$time_end = date("Y-m-d H:i:s", strtotime($rowt['time_end']));

$time_start_timestamp = strtotime($rowt['time_start']);
$time_end_timestamp = strtotime($rowt['time_end']);

$query_overlap = mysqli_query($con, "SELECT * FROM schedule WHERE day='th' AND time_end > '$time_start' AND time_start < '$time_end'") or die(mysqli_error($con));
$num_overlap = mysqli_num_rows($query_overlap);

if ($num_overlap > 0) {
    echo "Time slots are overlapping with the following time slots:";
    while ($row_overlap = mysqli_fetch_assoc($query_overlap)) {
        echo " (" . "Thursday ". $row_overlap['time_start'] . " - " . $row_overlap['time_end'] . ")";
    }
    break;
} else {
    echo "Time slots are not overlapping";
}

if (($count_t == 0) && ($count_r == 0) && ($count_c == 0)) {
mysqli_query($con, "INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by,time_start,time_end) 
					VALUES('$daym','th','$member','$subject','$cys','$room','$remarks','$set_id','$program','$time_start','$time_end')") or die(mysqli_error());

echo "<span class='text-success'>
<table width='100%'>
  <tr>
	<td>Thursday</td>
	<td>$timet</td> 
	<td>Success</td>					
  </tr>
</table></span><br>";	
} else if ($count_t > 0) {
echo $error_t."<br>";
} else if ($count_r > 0) {
echo $error_r."<br>";
} else {
echo $error_c."<br>";
}


}


	//friday sched
	foreach ($f as $daym){
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='f'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>friday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='f'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>friday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='f'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>friday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
		

			$queryt = mysqli_query($con, "select * from member where member_id='$member'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($queryt);
$membert = $rowt['member_last'].", ".$rowt['member_first'];

$querytime = mysqli_query($con, "SELECT * FROM time WHERE time_id='$daym'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($querytime);
$timet = date("h:i a", strtotime($rowt['time_start']))."-".date("h:i a", strtotime($rowt['time_end']));

$time_start = date("Y-m-d H:i:s", strtotime($rowt['time_start']));
$time_end = date("Y-m-d H:i:s", strtotime($rowt['time_end']));

$time_start_timestamp = strtotime($rowt['time_start']);
$time_end_timestamp = strtotime($rowt['time_end']);

$query_overlap = mysqli_query($con, "SELECT * FROM schedule WHERE day='f' AND time_end > '$time_start' AND time_start < '$time_end'") or die(mysqli_error($con));
$num_overlap = mysqli_num_rows($query_overlap);

if ($num_overlap > 0) {
    echo "Time slots are overlapping with the following time slots:";
    while ($row_overlap = mysqli_fetch_assoc($query_overlap)) {
        echo " (" . "Friday ". $row_overlap['time_start'] . " - " . $row_overlap['time_end'] . ")";
    }
    break;
} else {
    echo "Time slots are not overlapping";
}

if (($count_t == 0) && ($count_r == 0) && ($count_c == 0)) {
    mysqli_query($con, "INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by,time_start,time_end) 
                        VALUES('$daym','f','$member','$subject','$cys','$room','$remarks','$set_id','$program','$time_start','$time_end')") or die(mysqli_error());
    
    echo "<span class='text-success'>
    <table width='100%'>
      <tr>
        <td>Friday</td>
        <td>$timet</td> 
        <td>Success</td>					
      </tr>
    </table></span><br>";	
} else if ($count_t > 0) {
    echo $error_t."<br>";
} else if ($count_r > 0) {
    echo $error_r."<br>";
} else {
    echo $error_c."<br>";
}


}
	


	//saturdaysched
	foreach ($s as $daym){
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='s'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>saturday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='s'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>saturday</td>
					<td>$timer</td> 
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='s'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>saturday</td>
					<td>$timec</td> 
					<td>$cysc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
		

			$queryt = mysqli_query($con, "select * from member where member_id='$member'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($queryt);
$membert = $rowt['member_last'].", ".$rowt['member_first'];

$querytime = mysqli_query($con, "SELECT * FROM time WHERE time_id='$daym'") or die(mysqli_error($con));
$rowt = mysqli_fetch_array($querytime);
$timet = date("h:i a", strtotime($rowt['time_start']))."-".date("h:i a", strtotime($rowt['time_end']));

$time_start = date("Y-m-d H:i:s", strtotime($rowt['time_start']));
$time_end = date("Y-m-d H:i:s", strtotime($rowt['time_end']));

$time_start_timestamp = strtotime($rowt['time_start']);
$time_end_timestamp = strtotime($rowt['time_end']);

$query_overlap = mysqli_query($con, "SELECT * FROM schedule WHERE day='s' AND time_end > '$time_start' AND time_start < '$time_end'") or die(mysqli_error($con));
$num_overlap = mysqli_num_rows($query_overlap);

if ($num_overlap > 0) {
    echo "Time slots are overlapping with the following time slots:";
    while ($row_overlap = mysqli_fetch_assoc($query_overlap)) {
        echo " (" . "Saturday ". $row_overlap['time_start'] . " - " . $row_overlap['time_end'] . ")";
    }
    break;
} else {
    echo "Time slots are not overlapping";
}

if (($count_t == 0) && ($count_r == 0) && ($count_c == 0)) {
    mysqli_query($con, "INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by,time_start,time_end) 
                        VALUES('$daym','s','$member','$subject','$cys','$room','$remarks','$set_id','$program','$time_start','$time_end')") or die(mysqli_error());
    
    echo "<span class='text-success'>
    <table width='100%'>
      <tr>
        <td>Saturday</td>
        <td>$timet</td> 
        <td>Success</td>					
      </tr>
    </table></span><br>";	
} else if ($count_t > 0) {
    echo $error_t."<br>";
} else if ($count_r > 0) {
    echo $error_r."<br>";
} else {
    echo $error_c."<br>";
}


}
		
}					  
	
?>