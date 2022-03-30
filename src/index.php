<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Banksy exhibition</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head> 
  <body>
        <h1>Banksy exhibition</h1>
        <div class="responsive">
        <div class="gallery">
        <?php
        $hostname = "db";
        $username = "root";
        $password = "root";
        $db = "artworks";

        $dbconnect = mysqli_connect($hostname,$username,$password,$db);
        if ($dbconnect->connect_error) {
            die("Database connection failed: " . $dbconnect->connect_error);
        }

        $query= "SELECT * FROM exhibition";
        $result = $dbconnect->query( $query );
        $bestpic = "SELECT * FROM exhibibition ORDER BY 'like' DESC LIMIT 3";
        $bestpics = $dbconnect->query( $bestpic );

        while( $row = $result->fetch_assoc() ){
          echo "<img src='" . $row['path'] . "' alt='Girl_With_A_Balloon' width='600' height='400'>"."<br>";
          echo "<form method='post'><button type='submit' name='button'".$row['id_artwork']." style='font-size: 24px'> <i class='fa fa-heart'> </i> </button></form><br>";
          if(isset($_POST["button".$row["id_artwork"]])) {
            $sql = "UPDATE exhibition set `likes` = `likes`+1 where `artwork_id` = ".$row["id_artwork"];
            if (!mysqli_query($dbconnect, $sql)) {
              die('An error occurred when submitting your form');
            } else {
              header("Refresh:0; url=index.php");
            }
          }
        }

        while( $row = $bestpics->fetch_assoc() ){
          echo "<img src='" . $row['path'] . "' alt='Girl_With_A_Balloon' width='600' height='400'>"."<br>";
          echo "<form method='post'><button type='submit' name='button'".$row['id_artwork']." style='font-size: 24px'> <i class='fa fa-heart'> </i> </button></form><br>";
        }

              $result->free();
              $conn->close();
?>