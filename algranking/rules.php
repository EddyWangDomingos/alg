<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	/*
	File: rules.php
	Author: MKTitans
	ModifiedDate: 02/06/15
	Description: Regras de Competição
	*/
	session_start();	//start session
	set_include_path('/home/u333096978/public_html/includes');	//set include path dir
	
?>
	
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>MK TITANS</title>
        <link rel="stylesheet" type="text/css" href="css/960.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/menus-core.css"/>
        <link rel="stylesheet" type="text/css" href="css/menus-dropdown.css"/>
        <link rel="stylesheet" type="text/css" href="css/menus-horizontal.css"/>
        <link href='http://fonts.googleapis.com/css?family=Cabin|Fjalla+One' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Share+Tech|Carter+One|Share+Tech+Mono' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" type="text/css" href="scripts/jquery-ui/jquery-ui.theme.css" />
        <link rel="stylesheet" type="text/css" href="scripts/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="scripts/jquery-ui/jquery-ui.structure.css" />
        
        <script type="text/javascript" src="scripts/jquery-ui/external/jquery/jquery.js"></script>
        <script type="text/javascript" src="scripts/jquery-ui/jquery-ui.js"></script>
    </head>
    <body>
        <?php require_once("navigation.php") ?>
        <div id="content">
            <div class="container_12">
                <h2>Regras/ Sistema Ranking</h2>

                <div id="tabs">
                    <ul>
                        <li><a href="#fragment-1">Regras</a></li>
                        <li><a href="#fragment-2">Rating Bonus</a></li>
                        <li><a href="#fragment-3">ALG Qualifier unties</a></li>
                    </ul>
                    <div id="fragment-1">
                        <h3>Regras de torneios</h3>
                        <ul>
                            <li>Vencedor não troca variação ou personagem </li>
                            <li>O que perder pode trocar de personagem ou var</li>
                            <li>Combates serão 2/3 jogos</li>
                            <li>top 8 são  3/5 jogos (Circustancial ao tempo)</li>
                        </ul>
                    </div>
                    <div id="fragment-2">
                        <h3>Sistem de rating/ pontuação</h3>
                        <ul>
                            <li>10 jogadores que já foram top 8 em MK9 = 500 Rating</li>
                            <li>Bracket com 32 Players = 500 Rating</li>
                            <li>Torneio patrocinado: 500 Rating</li>
                            <li>Premio no valor de 50.000 com pot Bonus = 500 Rating</li>
                            <li>pelo menos um jogador internacional = 500 pontos de rating</li>
                            <li>Evento com mais de um patrocínio = 1000 Rating</li>
                            <li>Cada participante do evento = 20 Rating</li>
                            <li>Participante internacional: 50 Rating</li>
                            <li>Bracket com 64 players = 1000 Rating</li>
                            <li>Bracket com 128 players = 2000 Rating</li>
                        </ul>
                    </div>
                    <div id="fragment-3">
                        
                        <ul>
                            <li>Se ambos os jogadores tiverem o mesmo valor de ALG Pts, passa o que tiver maior % de CF</li>
                            <li>Se ambos os jogadores tiverem o mesmo valor de ALG Pts e % de CF, Sai um duelo melhor de 7</li>
                            <li>os 16 primeiros com mais pontos jogam num invitacional fechado a custo 0, com os pontos acumulados nos torneios que se passaram.</li>
                        </ul>
                        
                       
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
        $(document).ready(function(){
            $( "#tabs" ).tabs();
        });
        </script>
    </body>
</html>