<head>
<link href="../new_style.css" rel="stylesheet" type="text/css">
</head>

<?php
$conn = mysqli_connect("localhost", "root", "", "db_csia");

if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

//Feth the data of the record that is needed to be editted
$txtFirst=$txtLast=$txtAge=$txtMobile=$txtProf=$txtdate=$rnp=" ";
$rnp = $_GET['id'];
$txtFirst = $_POST['txtFirst'];
$txtLast = $_POST['txtLast'];
$txtAge = $_POST['txtAge'];
$txtMobile = $_POST['txtMobile'];
$txtProf = $_POST['txtProf'];
$txtdate = $_POST['txtdate'];
$staff_id = $_POST['staff_id'];

// database insert SQL code
$upd= "UPDATE resident_list set FirstName ='$txtFirst', LastName ='$txtLast', Age ='$txtAge', 
Mobile ='$txtMobile', Profession ='$txtProf', DateJoined ='$txtdate', Staff_id ='$staff_id'
WHERE ID = $rnp";

$rs = mysqli_query($conn, $upd);

if ($rs){ 
    echo "Record updated Sucessfully!!";
}
else{
    echo "Error while updating, Please try again";
}
?>

<body>
	<p><a href= Resident_list.php>Back to the Database</a></p>
</body>