<html>
<head>
    <title>Log In</title>
</head>
<link rel="stylesheet" type="text/css" href= "new_style.css">
<style type="text/css">
    form {
        width: 35%;
        border: 5px solid rgb(22, 62, 51);
        padding: 15px;
        background-color: rgb(23, 174, 224);
        border-radius: 10px;    
        text-decoration-color: #0c0101;
		font-family: Georgia, 'Times New Roman', Times, serif;
    }
    input{
        display: block;
        border: 2px solid #ccc;
        width: 70%;
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
        padding: 12px 16px;
        font-size: 16px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        background-color: #f8f8f8;
        color: #333;
}
</style>
<h1>Welcome to Amulya Deluxe Hostel</h1>
<body>
    <form method="POST">
        <h2>Login</h2>
        <form method="post">
	    <p>
		    <label>Username</label>
		    <input type="text" name="uname" placeholder="Enter your username">
        </p>
	    <p>
		    <label>Password</label>
		    <input type="password" name="pass" placeholder="Enter your password">
	    </p>
        <p>
	        <label>User Type</label>
	        <select name="type">
                <option value="-1">Select User Type</option>
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
            </select>
        </p>
        <p>
	        <button type="submit"name="submit_button">Log In</button>
        </p>
    </form>
</body>
</html>
<?php
$con=mysqli_connect("localhost", "root", "", "db_csia");
if(!$con){
    echo "No Connection established".mysqli_error();
}

if(isset($_POST['submit_button'])){
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $type=$_POST['type'];

    $query= "Select * from users where user_name='$uname' and password='$pass' and Type='$type'";
    $result=mysqli_query($con, $query);
 
    while($row=mysqli_fetch_array($result)){
        if($row['user_name']==$uname && $row['password']==$pass && $row['Type']=='admin'){
            header("Location: admin.html");
        }
        elseif($row['user_name']==$uname && $row['password']==$pass && $row['Type']=='staff'){
                header("Location: staff.html");
        }
    }  
}
?>