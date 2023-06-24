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
    <form action="index.php" method="post">
        <label>username:</label>
        <input type="text" name="username">
        <br>
        <label>password:</label>
        <input type="password" name="password">
        <br>
        <input type="submit" name="submit" value="Log in">
    </form>
</body>
</html>

<?php

    if(isset($_POST["submit"])){

        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);

        $password = $_POST['password'];
        $hash_pass = password_hash($password, PASSWORD_BCRYPT);


        if(!empty($username) && !empty($password)){
            $_SESSION['$username'] = $username;
            $_SESSION['$password'] = $password;

            $sql = "INSERT INTO users(
                user, password)
                VALUES ('$username', '$password')";

            header("Location: home.php");

            try{
                mysqli_query($conn, $sql);
                echo "User is now registered";
            }
            catch(mysqli_sql_exception){
                echo "Could not register user..";
            }
            mysqli_close($conn);


        }
        else{
            echo "Missing username and/or password <br>";
        }
    }
?>