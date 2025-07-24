<html>
<head>
<title>Residents in the Hostel</title>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        color: #588c7e;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
    }
    th {
        background-color: #2fd1cc;
        color: white;
    }
    tr:nth-child(even) {background-color: #f2f2ff}
    
    .auto-style3 {
	    background-color: #c2f8f6;
    }
    .auto-style4 {
	background-color: #18ACAC;
	font-family: "Malgun Gothic Semilight";
	font-style: italic;
	text-transform: uppercase;
    }
    form {
        width: 30%;
        border: 5px solid rgb(22, 62, 51);
        padding: 10px;
        background-color: rgb(23, 174, 224);
        border-radius: 10px;    
        text-decoration-color: #0c0101;
    }
    input{
        display: block;
        border: 2px solid #ccc;
        width: 65%;
        padding: 10px;
        margin: auto;
        border-radius: 3px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }
</style>
<link href="../new_style.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Hyperlink for going back to home and Adding new Resident-->
<p>
<a href="new1_resident.php">Add New Resident</a>
<a href="resident_FirstSort.php">Sort by First Name</a>
<a href="../admin.html">Back to Home</a>
</p>
<br>

<!--Creating a Search Box-->
<form id="form" action="" method ="post">
    <input type="text" name="search" value="" placeholder="Enter the resident name">
    <button type="submit" name="s" value="Search">Search</button>
</form>

<br>
<table class="auto-style3" align="center" cellpadding="10" cellspacing="6">
    <tr>
        <th nowrap="nowrap" class="auto-style4">ID</th>
        <th nowrap="nowrap" class="auto-style4">First Name</th>
        <th nowrap="nowrap" class="auto-style4">Last Name</th>
        <th nowrap="nowrap" class="auto-style4">Age</th>
        <th nowrap="nowrap" class="auto-style4">Mobile</th>
        <th nowrap="nowrap" class="auto-style4">Profession</th>
        <th nowrap="nowrap" class="auto-style4">Date Joined</th>
        <th nowrap="nowrap" class="auto-style4">Wardon</th>
        <th nowrap="nowrap" class="auto-style4">Operations</th>
    </tr>
<?php

$conn = mysqli_connect("localhost", "root", "", "db_csia");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//execute Query
if (isset($_POST['search'])){
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT ID, FirstName, LastName, Age, Mobile, Profession, DateJoined, Staff_id FROM resident_list 
    where FIRSTNAME LIKE '%$search%' OR LASTNAME LIKE '%$search%'";
    $result = $conn->query($sql);
    }
    else{
        $sql = "SELECT * FROM resident_list";
        $result = $conn->query($sql);
    }

//Display the records in the database
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["ID"]. "</td>
        <td>" . $row["FirstName"] . "</td>
        <td>" . $row["LastName"]. "</td>
        <td>" . $row["Age"]. "</td>
        <td>" . $row["Mobile"]."</td>
        <td>" . $row["Profession"]."</td>
        <td>" . $row["DateJoined"]."</td>
        <td>" . $row["Staff_id"]."</td>
        <td><a href = 'delete_resi.php?rn=$row[ID]'>Delete
        <a href = 'update.php?rn=$row[ID]'>Edit</td>
        </tr>";
    }
    echo "</table>";
}
else{
    echo "The Table has no records";
}

?>
</table>
</body>
</html>