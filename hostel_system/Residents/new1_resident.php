<html>
<head>
<title>Adding New Resident</title>
<link href="../new_style.css" rel="stylesheet" type="text/css">
<style type="text/css">
    .auto-style1 {
	    text-align: left;
    }
    form {
        width: 55%;
        border: 5px solid rgb(22, 62, 51);
        padding: 10px;
        background-color: rgb(23, 174, 224);
        border-radius: 10px;    
        text-decoration-color: #0c0101;
		font-family: Georgia, 'Times New Roman', Times, serif;
    }
    input{
        display: block;
        border: 2px solid #ccc;
        width: 75%;
        padding: 10px;
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
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'db_csia'); 
    if(!$conn){
        echo "Connection failed";
    }
    $query = "select * from staff_list";
    $run= mysqli_query($conn, $query);
    ?>

<legend class="auto-style1"><h1>New Resident Form</h1></legend>
<form method="post" action="new_resident.php">
<p>
<label for="First">FirstName </label>
<input type="text" name="txtFirst" id="txtFirst" autocomplete="off" required>
</p>
<p>
<label for="Last">LastName</label>
<input type="text" name="txtLast" id="txtLast" autocomplete="off" required>
</p>
<p>
<label for="Age">Age</label>
<input type="text" name="txtAge" id="txtAge" autocomplete="off" required>
</p>
<p>
<label for="Mobile">Mobile</label>
<input type ="text" name="txtMobile" id="txtMobile" autocomplete="off" required>
</p>
<p>
<label for="Profession">Profession</label>
<input type ="text" name="txtProf" id="txtProf" autocomplete="off" required>
</p>
<p>
<label for="DateJoined">Date Joined</label>
<input type ="date" name="txtdate" id="txtdate" autocomplete="off" required>
</p>
<p>
<label for="ID">Wardon</label>
<select name = "staff_id" required>
    <option value = "">Select the Staff ID</option> 
    <?php
    while($data = mysqli_fetch_array($run)){
        echo "<option value='$data[0]'>$data[0]</option>";
    }
    ?>
</select>
</p>
<p>
<button type="submit">Submit</button>
</p>
<p>&nbsp;</p>
</form>
</body>
</html>