<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include "../../includes/functions.php";
	/*
	File: mk9\index.php
	Author: MKTitans
	ModifiedDate: 02/06/15
	Description: MK9 Rankings page

    3G Adicionei alguns metas tags para melhorar a procura no google
	*/
	session_start();	//start session
	set_include_path('C:\\xampp\\php\\php.exe');	//set include path dir
	
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MK TITANS Ranking Mortal Kombat IX</title>
        <meta name="description" content="algranking,Mkx,angola,Mk-titans,alg-ranking,mortal kombate titans,campeonato nacional de mortal kombat">
        <meta name="robots" content="index,follow">
        <link rel="stylesheet" type="text/css" href="../../css/960.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/menus-core.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/menus-dropdown.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/menus-horizontal.css"/>

        <link href='http://fonts.googleapis.com/css?family=Cabin|Fjalla+One' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Share+Tech|Carter+One|Share+Tech+Mono' rel='stylesheet' type='text/css'/>

    </head>
    <body>
       
        <?php require_once("../../includes/navigation.php")?>

        <div id="content">
            <div class="container_12">

                <h2>MK9 Final Rank</h2>

                <?php
                
                /* $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "uddb_alg";*/
                
                
                // $servername = "mysql.hostinger.pt";
                // $username = "u333096978_algr";
                // $password = "Chandula33";
                // $dbname = "u333096978_mkran";

                // Create connection
                // $conn = new mysqli($servername, $username, $password, $dbname);
                $conn = new mysqli(HOST, USER, PASS, DBSA);
// Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM statsmk ORDER BY rating DESC";
                $result = $conn->query($sql);

// definir o rank
                $rank = 0;
                $last_score = false;
                $position = 0;

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {


                        $player = $row['name'];
                        $match = $row['kombats'];
                        $wins = $row['wins'];
                        $rating = $row['rating'];
			$photo = "/imagens/Titans/";
			$photo .= $row['pic'];
                        $fb = $row['facebook'];
                        $adress = $row['adress'];
                        $twins = $row['twins'];
                        $top8 = $row['top8'];
                        $rival = $row['rivals'];
                        $main = $row['main'];
                        $alt = $row['alt'];
                        $opt = $row['opt'];
                        $clasify = $row['ratingoverall'];
                        $loses = $match - $wins;
                        $coef = $wins / $match * 100;
                        $ratio = round($coef, 2, PHP_ROUND_HALF_UP); //Coeficiente de Força simplificado.
                        //Definindo o Rank
                        $position++; // vai aumentando as pos do rank
                        // Compara os rating points e diz que o Rank é o mesmo qnd os valores são iguais
                        if ($last_score != $rating) {
                            $last_score = $rating;
                            $rank = $position;
                        }
                        /* Classifica usando coeficiente de força quando ranks são iguais
                          if($last_score = $rating){
                          $last_score = $ratio;
                          $rank = $position;
                          } */

                        $rankColor = "";


                        if ($ratio >= 0 && $ratio <= 20) {
                            $rankColor = "#660000";
                        } else if ($ratio >= 21 && $ratio < 29) {

                            $rankColor = "#ff6600";
                        } else if ($ratio >= 30 && $ratio < 45) {
                            $rankColor = "#ffff00";
                        } else if ($ratio >= 46 && $ratio < 59) {
                            $rankColor = "#ccff00";
                        } else if ($ratio >= 60 && $ratio < 70) {
                            $rankColor = "#66ff00";
                        } else if ($ratio >= 71 && $ratio < 89) {
                            $rankColor = "#66ff00";
                        } else if ($ratio >= 71 && $ratio < 89) {
                            $rankColor = "#336600";
                        } else if ($ratio >= 90 && $ratio < 95) {
                            $rankColor = "#003399";
                        } else if ($ratio > 95.99) {
                            $rankColor = "#660066";
                        }




                        echo"


<div class='grid_3 playerBox'>
<div class='rankPosition'>
<span class='Number rank'>" . $rank . "</span>
<span class='Number' >" . $clasify . "</span>
 </div>
<table>
<tr>
<td>&nbsp;</td> <td><img src=\"" . $photo . "\"/></td> <td></td> 
</tr>
<tr>
<td>Nome:</td><td> " . $player . "</td>
</tr>
<tr>
<td><label>Rating:</label></td><td>" . $rating . "</td>
</tr>
<tr>
<td><label>Kombat:</label></td><td>" . $match . "</td>
</tr>
<tr>
<td><label>Wins:</label></td><td> " . $wins . "</td>
</tr>
<tr >
<td><label> Coeficiente de for&ccedil;a:</label></td><td style='color:" . $rankColor . ";'>" . $ratio . " %</td>
</tr>
<tr>
<td colspan='2'><a href=" . $fb . " target='_blank'>facebook</a></td>
</tr>
<tr>
<td><label>Rival:</label></td><td>" . $rival . "</td>
</tr>
<tr>
<td><label>Tornament Victories: </label></td><td>" . $twins . "</td>
</tr>
<tr>
<td><label>Top 8s:</label></td><td>" . $top8 . "</td>
</tr>
<tr>
<td><label>Main:</label></td><td> " . $main . "</td>
</tr>
<tr>
<td><label>Alt: </label></td><td>" . $alt . "</td>
</tr>
<tr>
<td><label>Replacer: </label></td><td>" . $opt . "</td>
</tr>
<tr>
<td><label>Adress:</label></td><td>" . $adress . "</td>
</tr>
</table>



  

  
   

 
 
</ul>

</div>


";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </body>
</html>