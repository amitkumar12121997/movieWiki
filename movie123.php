

<html>
    <head>
        
        <style>
            *{
                margin: 50px;
                margin: 50px;
            }
            .container{
                background-color:#3C3E94;
                 
                 border:5px solid white;
                 width: 950px;
                 height: 100px;
                 text-align:center;
            }
            .container button{
                text-align: center;
                 width: 100px;
                 height: 20px;
            }
            .container input{
                text-align: center;
            }
            .name h1{
                background-color: aqua;
                width:200px;
                 height: 50;
                 text-align: center ;
                 border: 0px solid white;
                 
                 
            }
            form{
                background-color: orange;
            }
            
.container1 table tr th{
    border: 2px solid black;
    width: 1200px;
    background-color: lightgreen;
    
}
        </style>
    </head>
    <body>
    <form action="" method="POST">
        <center>
        <div class="name">
        <h1>MovieWiki</h1>
        </div>
        </center>
        <div class="container">


            <input type="text" placeholder="Enter movie name" name="movie" required>
            <input type="submit" name="search" value="search">
           
        </div>
    </form>
        <div class="container1">
            <table>
                <tr>
                    <th>Movie Poster</th>
                    <th>Movie name</th>
                    <th>Actor name</th>
                    <th>Director name</th>
                    <th>Language</th>
                </tr><br>
               
            </table>
        </div>
    </body>
</html>
<?php

$moviename = $_POST["movie"];
$host ="localhost";
$user="root";
$dbPassword="";
$dbname="movie_wiki";

$table = "movie";
  
$conn =new mysqli($host,$user,$dbPassword, $dbname);
if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
} else 

$query = "SELECT * FROM movie WHERE moviename ='".$moviename."'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) <= 0) {
        echo "PLease provide valid data";
    } else {
       
        $row = mysqli_fetch_assoc($result);
        setcookie("CurrentUser",$row["moviename"]);
        echo $row['image'];
        echo "\n";
       
        echo $row['moviename'];
        echo "\n\n\n";
        echo $row['actorname'];
        echo "\n\n\n";
        echo $row['directorname'];
        echo "\n\n\n";
        echo $row['language'];
      
    }

    $conn->close();
  
?>