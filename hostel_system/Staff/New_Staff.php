<head>
<link href="../new_style.css" rel="stylesheet" type="text/css">
</head>


<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','db_csia');

// get the post records
$txtFirst = $_POST['txtFirst'];
$txtLast = $_POST['txtLast'];
$txtAge = $_POST['txtAge'];
$txtMobile = $_POST['txtMobile'];

// database insert SQL code
$sql = "INSERT INTO `Staff_list` (`Id`, `FirstName`, `LastName`, `Age`, `Mobile`) 
VALUES ('0', '$txtFirst', '$txtLast', '$txtAge', '$txtMobile')";

// insert in database 
$rs = mysqli_query($con, $sql);
//Check if the code was successful
if($rs)
{
	echo "Record of the new staff is sucessfully inserted";
}

?>
<!--Going back to the Stafflist-->
<body>
	<p><a href=Stafflist.php>Back to the Database</a></p>
</body>