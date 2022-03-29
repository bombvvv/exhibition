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

        if(isset($_POST['button1'])) {
          $sql = "UPDATE exhibition set `likes` = `likes`+1 where `artwork_id` = '1'";
          if (!mysqli_query($dbconnect, $sql)) {
            die('An error occurred when submitting your form');
          } else {
            header("Refresh:0; url=index.php");
          }
          }

          if(isset($_POST['button2'])) {
            $sql = "UPDATE exhibition set `likes` = `likes`+1 where `artwork_id` = '2'";
            if (!mysqli_query($dbconnect, $sql)) {
              die('An error occurred when submitting your form');
            } else {
              header("Refresh:0; url=index.php");
            }
            }

            if(isset($_POST['button3'])) {
              $sql = "UPDATE exhibition set `likes` = `likes`+1 where `artwork_id` = '3'";
              if (!mysqli_query($dbconnect, $sql)) {
                die('An error occurred when submitting your form');
              } else {
                header("Refresh:0; url=index.php");
              }
              }
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        main();
      }else{
        echo str_replace("/*cssPos*/",file_get_contents("css/main.css"),file_get_contents("html/index.html"));
      }
?>