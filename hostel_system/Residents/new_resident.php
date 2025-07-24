<head>
<link href="../new_style.css" rel="stylesheet" type="text/css">
</head>
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '', 'db_csia');

// get the post records
$txtFirst = $_POST['txtFirst'];
$txtLast = $_POST['txtLast'];
$txtAge = $_POST['txtAge'];
$txtMobile = $_POST['txtMobile'];
$txtProf = $_POST['txtProf'];
$txtdate = $_POST['txtdate'];
$staff_id = $_POST['staff_id'];


// database inserting new record
$sql = "INSERT INTO `resident_list` (`ID`, `FirstName`, `LastName`, `Age`, `Mobile`, 
`Profession`, `DateJoined`, `Staff_id`) 
VALUES ('0', '$txtFirst', '$txtLast', '$txtAge', '$txtMobile', '$txtProf', '$txtdate', '$staff_id')";

// insert in database
$result = mysqli_query($con, $sql);
if($result){
	echo "Record of the new resident is sucessfully inserted";
}
?>
<!--Going back to the Resident list-->
<body>
	<p><a href=Resident_list.php>Back to the Database</a></p>
</body>