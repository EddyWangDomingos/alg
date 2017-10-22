<?php
 
	
 define('HOST', 'localhost');
 define('USER', 'root');
 define('PASS', '');
 define('DBSA', 'algranking');
 define('PATH', 'https://localhost/mkrank/includes');

// $servername = "mysql.hostinger.pt";
//  $username = "u333096978_algr";
//  $password = "Chandula33";
//  $dbname = "u333096978_mkran"; 

// Criar uma conexao
//$connection = new mysqli(HOST , $username, $password, $dbname);
 $connection = new mysqli(HOST, USER, PASS, DBSA);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function redirect_to($new_location) {

    header("Location: " . $new_location);
    exit;
}

function findAllPlayers() {

    global $connection;

    $playerSql = "select * from player";

    $resultPlayer = mysqli_query($connection, $playerSql);

    validateQuery($resultPlayer);

    return $resultPlayer;
}

function findPlayerById($id) {

    global $connection;

    $playerSql = "select * from player where id=$id";

    $resultPlayer = mysqli_query($connection, $playerSql);

    validateQuery($resultPlayer);

    return $resultPlayer;
}

function validateQuery($result) {

    if (!$result) {

        Die('Query failed ' . mysql_error());
    }
}

function attempt_login($username, $password) {

    global $connection;
    $sql = "select*from admins where username='{$username}' and password='{$password}' ";

    $admin = mysqli_query($connection, $sql);
    
    if ($admin) {
        
        return $admin;
    }
    else{
        
        return false;
    }
}

function findGames(){

 global $connection;

 $gameSql="select*from game";

$resultGame=mysqli_query($connection,$gameSql);

validateQuery($resultGame);

return $resultGame;


}

function findTournaments(){

global $connection;

$torneioSql="select *from torneio";

$torneios=mysqli_query($connection,$torneioSql);

validateQuery($torneios);


return $torneios;

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}