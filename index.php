<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container">
  <h1>Timeless Movies</h1>
  <form action ="index.php" method="post">
  <div class="input-group mb-3">
  <input type="text" class="form-control" name="movie" placeholder="Enter movie name" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">OK</button>
  </div>
</div>

</form>
<?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $movie = $_POST['movie'];
        
        
    
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = "movies";
        $conn = mysqli_connect($servername, $username, $password,$database);
        if(!$conn){
            die("could not connect". mysqli_connect_error());
            }
        // $sql = "CREATE DATABASE movies";
        // $sql= "CREATE TABLE `movie` ( `id` INT(6) NOT NULL AUTO_INCREMENT, `name` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`))";
        $sql = "INSERT INTO `movie` (`name`) VALUES ('$movie')";
        $result= mysqli_query($conn, $sql);
        if($result){
            echo "";
            }
        else{
            echo "not successfull";
            }

    $sql = "SELECT * FROM `movie`";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $num = mysqli_num_rows($result);
        echo "<br>";
        $counting = 1;
        if($num>0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<h1>$counting ". $row['name']."</h1>";
            

            echo "<br>";
            $counting +=1;
            }
        }
      
        
        
    }
}
else{
$servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = "movies";

        $conn = mysqli_connect($servername, $username, $password,$database);
        if(!$conn){
            die("could not connect". mysqli_connect_error());
        }

        $sql ="SELECT * FROM `movie`";
        $result = mysqli_query($conn, $sql);    
        if(!$result){
           echo "The does not exists";
        }
        if ($result){
            $num = mysqli_num_rows($result);
            echo "<br>";
            $counting = 1;
            if($num>0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<h1>$counting ". $row['name']."</h1>";
                
                echo "<br>";
                $counting +=1;
                }
            }
        }
            
    }       
        



 ?>
</div>
  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>