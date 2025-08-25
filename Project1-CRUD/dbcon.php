<?php
define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","crud_operations");

$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
if(!$connection){
    die("Connection Failed");//die used to show msg and then terminate the program
}
else{
    echo("");//display msg to output screen
}
?>