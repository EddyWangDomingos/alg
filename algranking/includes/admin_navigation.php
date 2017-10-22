<?php include_once 'functions.php'; ?>
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
                <li class="pure-menu-item"><a href="listgame.php">Jogos</a></li>
                <li class="pure-menu-item"><a href="#">Torneios</a></li>
                <li class="pure-menu-item"><a href="#">Ranks</a></li>
<li class="pure-menu-item" style="float:right; margin-right: 20px;"> 
   <a href="../logout.php">Logout</a>

</li>
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