<?php session_start(); ?>
<!DOCTYPE html>

<?php 
include_once './includes/functions.php';

if (!isset($_SESSION['admin_id'])) {

    redirect_to("login.php");

}
?>


<html>
    <head>
        <meta charset="UTF-8">
         <title>MK TITANS</title>
         <link rel="stylesheet" type="text/css" href="../css/basicGrey.css"/>
        <link rel="stylesheet" type="text/css" href="../css/960.css"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <link rel="stylesheet" type="text/css" href="../css/admin.css"/>
        <link rel="stylesheet" type="text/css" href="../css/menus-core.css"/>
        <link rel="stylesheet" type="text/css" href="../css/menus-dropdown.css"/>
        <link rel="stylesheet" type="text/css" href="../css/menus-horizontal.css"/>
        <link href='http://fonts.googleapis.com/css?family=Cabin|Fjalla+One' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Share+Tech|Carter+One|Share+Tech+Mono' rel='stylesheet' type='text/css'/>
       
    </head>
<body>


<div id="header">
    <div class="container_12">
        <span class="title"></span>
    </div>
</div>
<div id="nav">
    <div class="container_12">
        <div class="pure-menu pure-menu-horizontal ">
            <ul id="menu" class=" navList">
                <li class="pure-menu-item"><a href="listplayer.php">Jogadores</a></li>
                <li class="pure-menu-item"><a href="#">Jogos</a></li>
                <li class="pure-menu-item"><a href="#">Torneios</a></li>
                <li class="pure-menu-item"><a href="#">Ranks</a></li>
                <li class="pure-menu-item" style="float:right; margin-right: 20px;"> 
                    <a href="#">
                    <?php
                    
                    if (isset($_SESSION['username'])) {
                        
                        echo " $_SESSION[username] |";  
                    }
                    
                    ?>
                    </a>
                </li>
               
    

</li>
            </ul>
        </div>
    </div>
</div>


    <div id="content">
        <form method="POST" action="create_player.php">
        <div class="container_12">
             <?php
                if (isset($_SESSION["message"])) {
                    echo "<div class=message>";
                    echo $_SESSION["message"];
                    echo "</div>";
                    
                     $_SESSION["message"]=null;
                }
                ?>
            <h2>Adicionar jogador</h2>

            <table class="viewTableForm" style="float: left;">
                
                <tr><td>Primeiro Nome</td><td><input type=text  name="fname"/></td></tr>
                <tr><td>Ultimo Nome</td><td><input type=text  name="lname"/></td></tr>
                <tr><td>Nickname</td><td><input type=text  name="nickname" /></td></tr>
                <tr><td>Facebook</td><td><input type=text name="facebook" /></td></tr>
                <tr><td>Email</td><td><input type=text name="email" /></td></tr>
                <tr><td>Idade</td><td> <input type=text name="age" /></td></tr>
                <tr><td>Endereço</td><td><input type=text name="address" /></td></tr>
                <tr><td>Main</td><td><input type=text name="main" /></td></tr>
                <tr><td>Alternative</td><td><input type=text  name="alt" /></td></tr>
                <tr><td>Replacer</td><td><input type=text name="replacer" /></td></tr>
                
            </table>


        </div>
        
        <div class="container_12">
            <center>
                <input type="submit" value="Gravar" name="submit" onclick="return confirm('Pretende adicionar este jogador?');" />
            </center>
        </div>
        </form>
    </div>
    
    <script type="text/javascript" src="jquery-ui/external/jquery/jquery.js"/>
    <script>
    
    $(document).ready(function(){
       
       $("#closeMessage").click(function(){
           
           $("#closeMessage").css("display","none");
       });
       
    });
    </script>
        
        
</body>
</html>