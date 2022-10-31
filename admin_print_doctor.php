<?php include 'connection.php';
$q2="SELECT CURDATE() as m";                            
	$r=select($q2);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script> 
		function printDiv() { 
			var divContents = document.getElementById("div_print").innerHTML; 
			var a = window.open('', '', 'height=500, width=500'); 
			a.document.write(divContents); 
			a.document.close(); 
			a.print(); 
		} 
	</script> 
</head>
<body onload="printDiv()">

<div id="div_print" >

	<center>
	
<h1 style="padding-top: 30px;font-size: 60px">Doctor Details</h1>
<p style="padding-top: 30px;font-size: 40px;font-style: italic;font-family: monospace;font-size: 20px;margin-left: 150px;margin-bottom: 20px" align="left">Date :<?php echo $r[0]['m'] ?></p>


<table class="table" style="width: 1000px;color: black;font-style: italic;font-family: monospace;font-size: 22px" border="5">
	<h2>DOCTORS REPORTS</h2><br>
<table class="table" border="2" style="width: 1000px">
	<?php 
	$qq="SELECT *,concat(first_name,' ',last_name) as doctor_name FROM `doctors`";
	$rs=select($qq);
	if(sizeof($rs)>0){ ?>
	<tr>
		<th>Name</th>
		<th>Specialization</th>
		<th>Place</th>
		<th>Phone</th>
		<th>Email</th>
	
	</tr>
	<?php 
		foreach ($rs as $r) { ?>
			
	
	<tr>
		
		<td><?php echo $r['doctor_name']; ?></td>
		<td><?php echo $r['qualification']; ?></td>
		<td><?php echo $r['place']; ?></td>
		<td><?php echo $r['phone']; ?></td>
		<td><?php echo $r['email']; ?></td>
	</tr>
	<?php	}
	 ?>
</table>
<?php	}
 ?>


	</center>

</body>
</html>