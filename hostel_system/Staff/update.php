<?php
$conn = mysqli_connect("localhost", "root", "", "db_csia");

if ($conn->connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

//Feth the data of the record that is needed to be editted

$idno = $_GET['rn'];
$display = "SELECT * FROM staff_list WHERE id='$idno'";
$data = mysqli_query($conn,$display);
$row = mysqli_fetch_array($data);
?>
<html>
<head>
    
<title>Updating existing Staff</title>
<link href="../new_style.css" rel="stylesheet" type="text/css">
<style type="text/css">
    .auto-style1 {
	    text-align: left;
    }
    form {
        width: 65%;
        border: 5px solid rgb(22, 62, 51);
        padding: 20px;
        background-color: rgb(23, 174, 224);
        border-radius: 10px;    
        text-decoration-color: #0c0101;
		font-family: Georgia, 'Times New Roman', Times, serif;
    }
    input{
        display: block;
        border: 2px solid #ccc;
        width: 100%;
        padding: 15px;
        margin: auto;
        border-radius: 3px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }
</style>

</head>

<body>
<legend><h1>Update staff Form</h1></legend>

<!--The values of the current field-->
<form name="frmContact" method="post" action="update1.php?id=<?php echo$idno;?>">
<p>
<label for="First">FirstName </label>
<input value="<?php echo $row['FirstName']?>" type="text" name="txtFirst" id="txtFirst" autocomplete="off" required>
</p>
<p>
<label for="Last">LastName</label>
<input value="<?php echo $row['LastName'] ?>" type="text" name="txtLast" id="txtLast" autocomplete="off" required>
</p>
<p>
<label for="Age">Age</label>
<input value="<?php echo $row['Age'] ?>" type="text" name="txtAge" id="txtAge" autocomplete="off" required>
</p>
<p> 
<label for="Mobile">Mobile</label>
<input value="<?php echo $row['Mobile'] ?>" type ="text" name="txtMobile" id="txtMobile" autocomplete="off" required>
</p> 
<p>
<input type="submit" name="update" value="update">
</p>
<p>&nbsp;</p>
</form>
<body>
</html>