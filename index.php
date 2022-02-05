<?php
mysql_connect("localhost","root","") or die("Connection Failed...");
mysql_select_db("crud");

//auto no code start...
$res1=mysql_query("select max(sid) from stud");
$sid=0;
while($r1=mysql_fetch_array($res1))
{
	$sid=$r1[0];
}
$sid++;
//auto no code end....
?>
<html lang="zxx">
<head>
	<title>Crud Operation</title>
	<meta charset="UTF-8">
	<meta name="description" content="Instyle Fashion HTML Template">
	<meta name="keywords" content="instyle, fashion, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="img/favicon.ico" rel="shortcut icon"/>

	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>

	<link rel="stylesheet" href="css/style.css"/>

</head>

<script type="text/javascript">
function validation()
{
	var v=/^[a-zA-Z ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Data...");
		form1.txtcat.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets...");
			form1.txtcat.focus();
			return false;
		}
	}
	var v=/^[a-zA-Z ]+$/
	if(form1.txtcou.value=="")
	{
		alert("Please Enter Data...");
		form1.txtcat.focus();
		return false;
	}else{
		if(!v.test(form1.txtcou.value))
		{
			alert("Please Enter Only Alphabets...");
			form1.txtcat.focus();
			return false;
		}
	}
	var v=/^[a-zA-Z ]+$/
	if(form1.txtcity.value=="")
	{
		alert("Please Enter Data...");
		form1.txtcat.focus();
		return false;
	}else{
		if(!v.test(form1.txtcity.value))
		{
			alert("Please Enter Only Alphabets...");
			form1.txtcat.focus();
			return false;
		}
	}
}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$sid=$_POST['txtsid'];
	$name=$_POST['txtname'];
	$course=$_POST['txtcou'];
	$city=$_POST['txtcity'];
	
	$query="insert into stud values('$sid','$name','$course','$city')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Data Inserted Successfully');";
		echo "window.location.href='index.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['sdid']))
{
	$sid1=$_REQUEST['sdid'];
	$query="delete from stud where sid='$sid1'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Data Deleted Successfully');";
		echo "window.location.href='index.php';";
		echo "</script>";
	}
	
}

if(isset($_REQUEST['seid']))
{
	$sid=$_REQUEST['seid'];
	$res2=mysql_query("select * from stud where sid='$sid'");
	$r2=mysql_fetch_array($res2);
	$name=$r2[1];
	$course=$r2[2];
	$city=$r2[3];
}

if(isset($_POST['btnedit']))
{
	$sid=$_POST['txtsid'];
	$name=$_POST['txtname'];
	$course=$_POST['txtcou'];
	$city=$_POST['txtcity'];
	
	$query="update stud set sname='$name',course='$course',city='$city' where sid='$sid'";
	
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Data Updated Successfully');";
		echo "window.location.href='index.php';";
		echo "</script>";
	}
}
?>
<html lang="zxx">
<head>
	<title>Crud Operation</title>

</head>
</html>
<!-- Contact page -->
<center>
	<section class="page-warp contact-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="section-title">
						
						<h2>MANAGE STUDENT DATA</h2>
					</div>
					<form class="comment-form" name="form1" method="post">
						<div class="row">
							
							<div class="col-md-12">
								<input type="text" placeholder="Enter Course Id" name="txtsid" value="<?php echo $sid; ?>" readonly="true">
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Enter Student Name" name="txtname" value="<?php echo $name; ?>">
							</div>
							<div class="col-md-12">
							<input type="text" placeholder="Enter Course Name" name="txtcou" value="<?php echo $course; ?>">
							</div>
							<div class="col-md-12">
							<input type="text" placeholder="Enter City Name" name="txtcity" value="<?php echo $city; ?>">
							</div>
							<div>
							<?php
							if(isset($_REQUEST['seid']))
							{
								?>
								<button class="site-btn sb-dark" name="btnedit" type="submit" onclick="return validation();">EDIT <i class="fa fa-angle-double-right"></i></button>
								<?php
							}else{
							
							?>
							
								<button class="site-btn sb-dark" name="btnsave" type="submit" onclick="return validation();">SAVE <i class="fa fa-angle-double-right"></i></button>
							<?php
							}
							?>
							</div>
							
						</div>
					</form>
				</div>
				<div class="col-lg-7">
					<div class="map">
						<br/><br/><br/><br/>
					<?php
					
					$qur1=mysql_query("select * from stud");
					if(mysql_num_rows($qur1)>0)
					{
						echo "<table class='table table-bordered'>
								<tr>
									<th>Student ID</th>
									<th>Student Name</th>
									<th>Course Name</th>
									<th>City</th>
									<th>EDIT</th>
									<th>DELETE</th>
								</tr>";
							while($q1=mysql_fetch_array($qur1))
							{
								echo "<tr>";
								echo "<td>$q1[0]</td>";
								echo "<td>$q1[1]</td>";
								echo "<td>$q1[2]</td>";
								echo "<td>$q1[3]</td>";
								echo "<td><a href='index.php?seid=$q1[0]'>EDIT</a></td>";
								echo "<td><a href='index.php?sdid=$q1[0]'>DELETE</a></td>";
								echo "</tr>";
							}
						echo "</table>";
					}else{
						echo "<h3>No Data Found</h3>";
					}
					?>
					</div>
				
				</div>
			</div>
		</div>
	</section>

</center>