<?php
$insert = false;
if(isset($_POST['name'])){
    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name="enquiry";
    // create a DB connection ,
    $con = mysqli_connect($server, $username, $password,$db_name);

    // check  for connection success
    if(!$con){
        die("Connection to this database failed due to". mysqli_connect_error());
    }
    // echo "Success connecting to  the database";

    // collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $other = $_POST['subject'];
    $phone = $_POST['message'];
    
    // execute the sql query
    $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`) 
    VALUES ('$name',  '$email', '$other',   '$phone')";

    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successful inserted";
        
        // flag for connection insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // close the connection variables
    $con->close();
}
?>

