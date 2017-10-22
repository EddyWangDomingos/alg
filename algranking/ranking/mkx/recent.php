<!DOCTYPE html>
<?php    

include "../../includes/functions.php";

?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
	/*
	File: mkx\index.php
	Author: MKTitans
	ModifiedDate: 11/06/15
	Description: MKX Rankings page
	*/
	session_start();	//start session
	set_include_path('/home/u333096978/public_html/includes');	//set include path dir
	
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>MK TITANS Ranking Mortal Kombat X</title>
        <link rel="stylesheet" type="text/css" href="/css/960.css"/>
        <link rel="stylesheet" type="text/css" href="/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="/css/menus-core.css"/>
        <link rel="stylesheet" type="text/css" href="/css/menus-dropdown.css"/>
        <link rel="stylesheet" type="text/css" href="/css/menus-horizontal.css"/>
        <link href='http://fonts.googleapis.com/css?family=Cabin|Fjalla+One' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Share+Tech|Carter+One|Share+Tech+Mono' rel='stylesheet' type='text/css'/>
    </head>
    <body>

		<?php require_once("navigation.php")?>

        <div id="content">
            <div class="container_12">
                <h2>MKX RANK</h2>

                <?php
                /*$servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "uddb_alg";*/ 

                  $servername = "mysql.hostinger.pt";
                  $username = "u333096978_algr";
                  $password = "Chandula33";
                  $dbname = "u333096978_mkran"; 

// Criar uma conexao
                $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

              
                //            $sql = "select r.algpoints,p.fname,p.lname,p.nickname,p.picture,p.main,p.alt,p.replacer,r.rating,r.wins,r.kombats,r.set_play, r.set_wins,r.tournament_victories,r.top8,r.ano,g.nome as game,t.name, p.lastposition from ratings r
                //inner join game g on g.id=r.fk_game
                //inner join player p on p.id=r.fk_player
                //inner join torneio t on t.id=r.fk_torneio 
                //where r.fk_torneio=2
                //order by r.algpoints desc";
                $sql = "select sum(r.algpoints) as algpoints,p.fname,p.lname,p.nickname,p.picture,p.main,p.alt,p.replacer,sum(r.rating) as rating,sum(r.wins) as wins,sum(r.kombats) as kombats,sum(r.set_play) as set_play, sum(r.set_wins) as set_wins,
                sum(r.tournament_victories) as tournament_victories,sum(r.top8) as top8,r.ano,g.nome as game, p.lastposition
                        from ratings r\n"
                    . "inner join game g on g.id=r.fk_game\n"
                    . "inner join player p on p.id=r.fk_player\n"
                    . "inner join torneio t on t.id=r.fk_torneio\n"
                    . "group by `fk_player`\n"
                    . "order by algpoints desc";
                $result = $conn->query($sql);

                // Definir o Rank
                $rank = 0;
                $last_score = false;
                $position = 0;
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $first_name = $row['fname'];
                        $last_name = $row['lname'];
                        $kombat_name = $row['nickname'];
                        $match = $row['kombats'];
                        $wins = $row['wins'];
                        $setplay = $row ['set_play'];
                        $setwins = $row ['set_wins'];
                        $rating = $row['rating'];
                        $photo = $row['picture'];
                        //$fb = $row['facebook'];
                        //$adress = $row['address'];
                        $twins = $row['tournament_victories'];
                        $top8 = $row['top8'];
                        $division = $row['division'];
                        $main = $row['main'];
                        $alt = $row['alt'];
                        $lastPosition = $row['lastposition'];
                        $level = $row['lvl_name'];
                        $exp = $row['lvl_number'];
                        //$age = $row ['age'];
                        $opt = $row['replacer'];
                        $alg_scores = $row['algpoints'];
                        //$player = $row['profile'];
                        $loses = $match - $wins;
                        $coef = $wins / $match * 100;
			$setcf = $setwins / $setplay * 100;
			$ratio = round($setcf, 2, PHP_ROUND_HALF_UP); // Calcula o Coeficiente de Força
                        $ratio2 = round($coef, 2, PHP_ROUND_HALF_UP); //Coeficiente de ForÃ§a simplificado.
                        //Definindo o Rank
                        $position++; // vai aumentando as pos do rank
                        // Compara os rating points e diz que o Rank Ã© o mesmo qnd os valores sÃ£o iguais
                        if ($last_score != $rating) {
			    $last_score = $rating;
                            $rank = $position;
                        }

			// Define last postition como divião A e B 
                        if ($lastPosition == 1) {
                            $lastPositionLabel = 'A';
                        } else if ($lastPosition == 2) {
                            $lastPositionLabel = 'B';
                        }
			// Condiciona o coeficiente de força com cores de acordo com os numeros.
                        $rankColor = "";


                          if ($ratio >= 0 && $ratio <= 9.99) {              // se ratio for maior ou igual a zero e menor q nove.
                            $rankColor = "#ff1919";
                        } else if ($ratio >= 10 && $ratio < 19.99) {

                            $rankColor = "#a80000";
                        } else if ($ratio >= 20 && $ratio <= 29.99) {
                            $rankColor = "#d60000";
                        } else if ($ratio >= 30 && $ratio <= 39.99) {
                            $rankColor = "#ffff00";
                        } else if ($ratio >= 40 && $ratio <= 49.99) {
                            $rankColor = "#ddd309";
                        } else if ($ratio >= 50 && $ratio <= 59.99) {
                            $rankColor = "#96a40c";
                        } else if ($ratio >= 60 && $ratio <= 69.99) {
                            $rankColor = "#67e608";
                        } else if ($ratio >= 70 && $ratio <= 79.99) {
                            $rankColor = "#0e8021";
                        } 
                         else if ($ratio >= 80 && $ratio <= 85.99) {
                            $rankColor = "#03c1c1";
                        } 
                         else if ($ratio >= 86 && $ratio <= 90.99) {
                            $rankColor = "#150af6";
                        } 
                         else if ($ratio >= 91 && $ratio <= 100) {
                            $rankColor = "#e6b8b7";
                        } 
                       
					   // Codigo das cores para a consistencia
					   $rankColor2 = "";


                          if ($ratio2 >= 0 && $ratio2 <= 9.99) {              // se ratio2 for maior ou igual a zero e menor q nove.
                            $rankColor2 = "#ff1919";
                        } else if ($ratio2 >= 10 && $ratio2 < 19.99) {

                            $rankColor2 = "#a80000";
                        } else if ($ratio2 >= 20 && $ratio2 <= 29.99) {
                            $rankColor2 = "#d60000";
                        } else if ($ratio2 >= 30 && $ratio2 <= 39.99) {
                            $rankColor2 = "#ffff00";
                        } else if ($ratio2 >= 40 && $ratio2 <= 49.99) {
                            $rankColor2 = "#ddd309";
                        } else if ($ratio2 >= 50 && $ratio2 <= 59.99) {
                            $rankColor2 = "#96a40c";
                        } else if ($ratio2 >= 60 && $ratio2 <= 69.99) {
                            $rankColor2 = "#67e608";
                        } else if ($ratio2 >= 70 && $ratio2 <= 79.99) {
                            $rankColor2 = "#0e8021";
                        } 
                         else if ($ratio2 >= 80 && $ratio2 <= 85.99) {
                            $rankColor2 = "#03c1c1";
                        } 
                         else if ($ratio2 >= 86 && $ratio2 <= 90.99) {
                            $rankColor2 = "#150af6";
                        } 
                         else if ($ratio2 >= 91 && $ratio2 <= 100) {
                            $rankColor2 = "#e6b8b7";
                        } 
					   // Condiciona o valor dos wins com o nivel na DB e dá o nome.
					   $exp = $wins;

                        echo "
<div class='grid_3 playerBox'> 
<div class='rankPosition'>
<span class='Number rank'>" . $rank . "</span>
  <span class='Number' >" . $lastPositionLabel . "</span>
 </div>
 

<table >
<tr>
<td>&nbsp;</td> <td><img alt='player photo' src=\"" . $photo . "\"/></td> <td></td> </tr>
  <tr>
    <td>Nome</td>
    <td> " . $first_name . " <strong>" . $kombat_name . "</strong> " . $last_name . "</td>
  </tr>
  <tr>
  <td><label>Rating</label></td>
    <td>" . $rating . " </td>
  </tr>
  <tr>
    <td><label>Kombat:</label></td>
    <td>" . $match . ", Wins:</strong> " . $wins . "</td>
  </tr>
  <tr>
  <td><label>Coeficiente de for&ccedil;a:</label>
    <td style='color:" . $rankColor . ";'>" . $ratio . " %</td>
	</tr>
	<tr>
	<td><label>Concist&ecirc;ncia:</label>
    <td style='color:" . $rankColor2 . ";'>" . $ratio2 . " %</td>
  </tr>
  
  <tr>
  <td><label>Tournament Victories:</label></td>
    <td> " . $twins . "</td>
  </tr>
  <tr>
  <td><label>Top 8s:</label></td>
<td>   " . $top8 . "</td>  
</tr>
  
  <tr>
  <td><label>Main</label></td>
    <td>" . $main . "  </td>
  </tr>
  <tr>
<td><label>Alt</label></td>  
<td>" . $alt . "</td>
</tr>
 <tr>
<td><abel>Replacer</label></td>
<td>" . $opt . "</td>
</tr>
  <tr>
 <td><label>ALG</label></td>
    <td style='color:#35901d; font-weight:bold;'>" . $alg_scores . " pts.</td>
  </tr>
 
  <tr>
 
  </tr>
</table></div>";
                        //echo "<img src=\"".$photo."\/>"."rank ".$rank." is ".$row['name']." with point ".$row['rating']."<br/>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>

            </div>
        </div>
<script type="text/javascript" src="../../scripts/jquery-ui/external/jquery/jquery.js">

</script>
<script type="text/javascript">

$(document).ready(function(){



});



</script>
    </body>
</html>