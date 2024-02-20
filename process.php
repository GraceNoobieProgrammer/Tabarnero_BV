<?php
    
    include "conn.php";
    session_start();

    if(isset($_POST['reg'])){
        $cn = $_POST ['cn'];
        $email = $_POST ['email'];
        $password = $_POST ['pass'];

        //validate email
        $validate = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");

        $val_num = mysqli_num_rows($validate);

        if($val_num <= 0){


        $insertusers  = mysqli_query ($conn ,"INSERT INTO users VALUES ('0', '$cn', '$email','$password')");

    if($insertusers == true){
        ?>
        <script>
            alert("Already Registered!");
            window.location.href="reg.php";
            </script>
        <?php
    }else{
        ?>
        <script>
            alert("Not Registered!");
            window.location.href="reg.php";
            </script>
        <?php
    }
    }else{
        ?>
        <script>
            alert("Email already exist!")
            window.location.href="reg.php";
        </script>
    <?php 
    }
}

//this code is for login

if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $check_login = mysqli_query($conn, "SELECT * FROM users WHERE email= '$email' AND password= '$pass' ");

    $num = mysqli_num_rows($check_login);

    if($num >=0){
        ?>
        <script>
            alert("Login successfully!");
            window.location.href="index.php";
            </script>
        <?php
    }else{
        ?>
        <script>
            alert("Login error!");
            window.location.href="index.php";
            </script>
        <?php
    }
}
?>