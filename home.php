<?php
    session_start();
    include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>This is the Home page</h2>
    <form action="home.php" method="post">
        <input type="submit" name="logout" value="logout">
    </form>
</body>
</html>

<?php 
    
    echo $_SESSION['$username'] . "<br>";
    echo $_SESSION['$password'] . "<br>";

    $conn = $_GET['$conn'];
    $sql = "SELECT * FROM users WHERE user = 'username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo $row["id"] . "<br>";
        echo $row["user"] . "<br>";
        echo $row["reg_date"] . "<br>";
    }
    else{
        echo "No user found";
    }

    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: index.php");
    }

?>