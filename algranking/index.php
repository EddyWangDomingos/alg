<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
	/*
	File: index.php (eventos)
	Author: MKTitans
	ModifiedDate: 02/06/15
	Description: MKX Events page
	*/
	session_start();	//start session
	set_include_path('https://localhost/mkrank/includes');	//set include path dir
    
   define('BASE', 'https://localhost/mkrank');
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>MK Titans</title>
        <meta name="description" content="algranking,mortal kombate titans, ranking,angola,luanda,algpoints,alg rank, angola, mkx, mortal kombat, mortal kombat x, alg, mktitans, mortal kombat titans, mkx, torneio, tournament,mkt,associação dos desportos virtuais de angola,comunidade de jogos de luta,torneio de jogos de luta">
        <meta name="robots" content="index,follow">
        <link rel="canonical" href="<?=BASE;?>"/>
        <link rel="base" href="<?=BASE;?>"/>
        <link rel="alternate" type="application/rss+xml" href="<?=BASE;?>/rss.xml"/>
        <link rel="stylesheet" type="text/css" href="css/960.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/menus-core.css"/>
        <link rel="stylesheet" type="text/css" href="css/menus-dropdown.css"/>
        <link rel="stylesheet" type="text/css" href="css/menus-horizontal.css"/>
        <link href='http://fonts.googleapis.com/css?family=Cabin|Fjalla+One' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Share+Tech|Carter+One|Share+Tech+Mono' rel='stylesheet' type='text/css'/>
    </head>
    <body>

		<?php require_once("./includes/navigation.php")?>

        <div id="content">
            <div class="container_12">

                <h1>Calend&aacute;rio</h1>
                <div class="grid_5">
                    <img  src="JC.png" alt="Johnny Cage MKX" />
                </div>
                <div class="grid_6" id="calendar">
                    <ul>
                        <li><span class="title" style="text-decoration:line-through">NCR EXPO TIC 2015</span></li>
                        <li> <span style="text-decoration:line-through"> 14/05/2015</span></li>
                        <li><span class="title" style="text-decoration:line-through">Flawless Victory 2015</span></li>
                        <li><span style="text-decoration:line-through"> 28/06/2015</span></li>
                        <li> <span class="title"class="title" style="text-decoration:line-through">Hit Confirm 2015</span></li>
                        <li><span style="text-decoration:line-through"> 02/08/2015</span></li>
                        <li> <span class="title">Wastelands 2015</span></li>
                        <li> <span> 06/09/2015</span></li>
                        <li class="title">Finish him 2015</li>
                        <li>4/10/2015</li>
                        <li class="title">Brutality</li>
                        <li>8/11/2015</li>
                        <li class="title">Natgil Invitacional</li>
                        <li>13/12/2015</li>
                    </ul>


                </div>
            </div>
            
            <div class="container_12">
                
              
            </div>

        </div>
    </body>
</html>	