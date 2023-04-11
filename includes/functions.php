<?php

function login()
{
    global $connection;
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];



        if (empty($username) && empty($password)) {
            return $msg = "ইউজারনেম বা পাসওয়ার্ড পাওয়া দিন!...";
        } else {

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users WHERE username='{$username}'";
        $run = mysqli_query($connection, $query);
        confirmation($run);

        while ($data = mysqli_fetch_array($run)) {

            $id = $data['user_id'];
            $uname = $data['username'];
            $pass = $data['password'];
            $uType = ['user_type'];
            $firstName = ['first_name'];
            $lastName = ['last_name'];
    
        }

        if ($username === $uname && $password===$pass) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $uname;
            $_SESSION['password'] = $pass;
            $_SESSION['user_type'] = $uType;
            $_SESSION['first_name'] = $firstName;
            $_SESSION['last_name'] = $lastName;
    
            header("Location: ./admin");
        } else {
            header("Location: ../index.php");
        }
        }
    }

}

function confirmation($up)
{
    global $connection;
    if (!$up) {
        die("failed!" . mysqli_error($connection));
    }
}



?>