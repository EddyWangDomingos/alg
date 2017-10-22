<?php session_start();  ?>
<!DOCTYPE html>

<?php 
include './includes/functions.php';

if (isset($_SESSION['admin_id'])==null) {

    redirect_to("login.php");

}
?>
<html>
    <head>
        <meta charset="UTF-8">
         <title>MK TITANS</title>
         <link rel="stylesheet" type="text/css" href="basicGrey.css"/>
        <link rel="stylesheet" type="text/css" href="../css/960.css"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <link rel="stylesheet" type="text/css" href="../css/admin.css"/>
        <link rel="stylesheet" type="text/css" href="menus-core.css"/>
        <link rel="stylesheet" type="text/css" href="menus-dropdown.css"/>
        <link rel="stylesheet" type="text/css" href="menus-horizontal.css"/>
        <link href='http://fonts.googleapis.com/css?family=Cabin|Fjalla+One' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Share+Tech|Carter+One|Share+Tech+Mono' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
    </head>
<body>
<?php include './includes/admin_navigation.php' ?>
    <div di="content"> 
        <div class="container_12">
          
                <?php
                if (isset($_SESSION["message"])) {
                    echo "<div class=message>";
                    echo $_SESSION["message"];
                    
                    echo "</div>";
                    
                    $_SESSION["message"]=null;
                }
                ?>
           
            <h2>Jogadores</h2>
            <a href="addplayer.php" style="font-size: 12pt; font-weight: bold;">Adicionar Jogador</a>

           <table class="display"  id="example"  cellspacing="0" style="color: #000;">
	<thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th  scope="col" colspan="2">Acção</th>
                </tr>
	</thead>
<tbody>
                <?php
                $playerResult = findAllPlayers();

                while ($row = $playerResult->fetch_assoc()) {

                    $nome = $row['fname'] . " " . $row['nickname'] . " " . $row['lname'];
                    $id = $row['id'];

                    echo "<tr><td>$nome</td><td><a href=viewplayer.php?id=$id>Visualizar</td><td><a href=editplayer.php?id=$id>Alterar</a></td></tr>";
                }
                ?>
</tbody>
            </table>
<script type="text/javascript" src="scripts/jquery-ui/external/jquery/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.dataTables.js"></script>

<script>

    $(document).ready(function() {

console.log("jquery is working");

        $('#example').DataTable();

      
    });

</script>
        </div>
    </div>
    
</body>
</html>