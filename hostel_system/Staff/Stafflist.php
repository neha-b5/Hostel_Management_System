<html>
<head>
<title>Staff in the Hostel</title>
</head>

<style>
    table {
        border-collapse: collapse;
        width: 80%;
        color: #588c7e;
        font-size: 25px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        text-align: left;
    }
    td{
        height: 65px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }
    th {
        background-color: #2fd1cc;
        color: white;
        font-family: Georgia, 'Times New Roman', Times, serif;
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
    .auto-style5 {
        border-width: 0px;
    }
    .auto-style6 {
        font-family: "Monotype Corsiva";
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
<h1>Hostel Staff List</h1>
<body>
<p>
<a href="New_Staff.html">Add New Staff</a>
<a href="staff_FirstSort.php">Sort by First Name</a>
<a href="../admin.html">Back to Home</a>
</p>
<br>

<!--Create a search box -->
<form id="form" action="" method ="post">
    <input type="text" name="search" value="" placeholder="Enter the staff name">
    <button type="submit" name="s" value="Search">Search</button>
</form>
 

<!--Creating the table-->
<table class="auto-style3" align="left" cellspacing="6">
    <tr class="auto-style6">
        <th class="auto-style4">ID</th>
        <th class="auto-style4">FirstName</th>
        <th class="auto-style4">LastName</th>
        <th class="auto-style4">Age</th>
        <th class="auto-style4">Mobile</th>
        <th class="auto-style4">Operations</th>
    </tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "db_csia");//Connecting the database

if ($conn->connect_error) { // Check connection
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['search'])){
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT ID, FirstName, LastName, Age, Mobile FROM staff_list where FIRSTNAME LIKE 
    '%$search%' OR LASTNAME LIKE '%$search%'";
    $result = $conn->query($sql);
    }
    else{
        $sql = "SELECT ID, FirstName, LastName, Age, Mobile FROM staff_list"; //Show the table of the database
        $result = $conn->query($sql);
    }

    if ($result -> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
         echo "<tr>
            <td>" . $row["ID"]. "</td>
            <td>" . $row["FirstName"]. "</td>
            <td>" . $row["LastName"]. "</td>
            <td>" . $row["Age"]. "</td>
            <td>" . $row["Mobile"]."</td>
            <td><a href = 'update.php?rn=$row[ID]'>Edit</td>
            </tr>";
        }
        echo "</table>" ;
    }
    else{
        echo "<p style='color: red; font-size: 20px;'> No records in the Table</p>";
    }    
    
?>
</table>
</body>
</html>