<?php
$conn = mysqli_connect("localhost", "root", "", "db_csia");

if ($conn->connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

//Feth the data of the record that is needed to be editted

$idno = $_GET['rn'];
$display = "SELECT * FROM Resident_list WHERE id='$idno'";
$data = mysqli_query($conn,$display);
$row = mysqli_fetch_array($data);


$query = "select * from staff_list";
$run= mysqli_query($conn, $query);

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
        width: 50%;
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
    select {
        padding: 12px 16px;
        font-size: 14px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        appearance: none;
    }
    option {
        padding: 17px 16px;
        font-size: 16px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        background-color: #f8f8f8;
        color: #333;
}
</style>

</head>

<body>
<legend class="auto-style1"><h1> Update staff Form</h1></legend>

<!--The values of the current field-->
<form name="frmContact" method="post" action="update1.php?id=<?php echo$idno;?>">
<p>
    <label for="First">FirstName </label>
    <input value="<?php echo $row['FirstName']?>" type="text" name="txtFirst" id="txtFirst" 
    autocomplete="off" required>
</p>
<p>
    <label for="Last">LastName</label>
    <input value="<?php echo $row['LastName'] ?>" type="text" name="txtLast" id="txtLast" 
    autocomplete="off" required>
</p>
<p>
    <label for="Age">Age</label>
    <input value="<?php echo $row['Age'] ?>" type="text" name="txtAge" id="txtAge" 
    autocomplete="off" required>
</p>
<p> 
    <label for="Mobile">Mobile</label>
    <input value="<?php echo $row['Mobile'] ?>" type ="text" name="txtMobile" id="txtMobile" 
    autocomplete="off" required>
</p> 
<p> 
    <label for="Profession">Profession</label>
    <input value="<?php echo $row['Profession'] ?>" type ="text" name="txtProf" id="txtProf" 
    autocomplete="off" required>
</p>
<p> 
    <label for="Date Joined">Date Joined</label>
    <input value="<?php echo $row['DateJoined'] ?>" type ="date" name="txtdate" id="txtdate" 
    autocomplete="off" required>
</p>
<p>
<label for="ID">Wardon</label>
<select name = "staff_id" required>
    <option value = "">Select the Staff ID</option> 
    <?php
    while($id = mysqli_fetch_array($run)){
        echo "<option value='$id[0]'>$id[0]</option>";
    }
    ?>
</select>
</p>
<p>
    <input type="submit" name="update" value="update">
</p>
</form>
</body>
</html>