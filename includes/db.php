<?php
$connection = mysqli_connect('localhost','root','','story');
mysqli_query($connection,'SET CHARACTER SET utf8');
mysqli_query($connection,"SET SESSION collation_connection ='utf8_general_ci'");
if(!$connection){
    die("there is a problem to connecting database!");
}

?>
