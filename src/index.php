<?php
    function main(){
        $hostname = "db";
        $username = "root";
        $password = "root";
        $db = "artworks";

        $dbconnect = mysqli_connect($hostname,$username,$password,$db);
        if ($dbconnect->connect_error) {
            die("Database connection failed: " . $dbconnect->connect_error);
        }
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        main();
      }else{
        echo str_replace("/*cssPos*/",file_get_contents("css/main.css"),file_get_contents("html/index.html"));
      }
?>