<head>
<link href="../new_style.css" rel="stylesheet" type="text/css">
</head>

<?php
$conn = mysqli_connect("localhost", "root", "", "db_csia");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$idno = $_GET['rn'];
$query = "DELETE FROM resident_list WHERE ID = '$idno'";

$data = mysqli_query($conn, $query);

if($data){
    echo "<font color ='Blue'><font-family = 'monospace'> Record deleted Successfully!!";
}
else{
    echo "<font color = 'red'> Failed to delete record";
}


?>
<body> 
    <p><a href=resident_list.php>Back to the List of staff</a></p>
</body>

