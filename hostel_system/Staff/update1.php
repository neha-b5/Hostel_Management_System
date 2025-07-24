<head>
<link href="../new_style.css" rel="stylesheet" type="text/css">
</head>

<?php
$conn = mysqli_connect("localhost", "root", "", "db_csia");

if ($conn->connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

//Feth the data of the record that is needed to be editted
$txtFirst=$txtLast=$txtAge=$txtMobile=$rnp=" ";
$rnp = $_GET['id'];
$txtFirst = $_POST['txtFirst'];
$txtLast = $_POST['txtLast'];
$txtAge = $_POST['txtAge'];
$txtMobile = $_POST['txtMobile'];

// database insert SQL code
$upd= "UPDATE Staff_list set FirstName ='$txtFirst', LastName ='$txtLast', Age ='$txtAge', Mobile ='$txtMobile' WHERE ID = $rnp";

if ($conn->query($upd)===TRUE){ 
    echo "Record updated Sucessfully!!";

}
else{
    echo "Error while updating, Please try again";
}

?>

<body>
	<p><a href=Stafflist.php>Back to the Database</a></p>
</body>