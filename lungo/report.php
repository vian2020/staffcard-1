<html>
<head>
  <title>Display all Staff records from Database</title>
</head>
<body>

<h2>Staff Details</h2>

<table border="2">
  <tr>
    <td>Emp_No.</td>
    <td>Emp_Name</td>
    <td>Objective</td>
	<td>Apraisee_score</td>
    <td>Supervisor_score</td>
    <td>Performance_score</td>
	<td>Recommendations</td>
  </tr>

<?php

include "Conn.php"; // Using database connection file here

$records = mysqli_query($conn,"select * from opras"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Emp_No']; ?></td>
    <td><?php echo $data['Emp_Name']; ?></td>
    <td><?php echo $data['Objective']; ?></td>
	 <td><?php echo $data['Apraisee_score']; ?></td>
    <td><?php echo $data['Supervisor_score']; ?></td>
    <td><?php echo $data['Performance_score']; ?></td>
	 <td><?php echo $data['Recommendations']; ?></td>
  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($conn); // Close connection ?>

</body>
</html>