<?php session_start(); ?>

<?php include './includes/functions.php'; ?>
<?php 

if (!isset($_SESSION['admin_id'])) {

    redirect_to("login.php");

}

if(isset($_POST['submit'])){

global $connection;

$game=$_POST['gametoadd'];

$sql="INSERT INTO game(nome) values('{$game}')";

$result=mysqli_query($connection,$sql);

if($result){

$_SESSION['message']="Record added with success";
redirect_to("listgame.php");
}
else{
$_SESSION['message']="Database query failed  ".mysqli_error($connection);
}

}
?>
<?php include './includes/header.php'; 
include './includes/admin_navigation.php' ?>
<body>

<div id="content">

<div class="container_12">
<h2>Adicionar jogo</h2>

  <?php
                if (isset($_SESSION["message"])) {
                    echo "<div class=message>";
                    echo $_SESSION["message"];
                    
                    echo "</div>";
                    
                    $_SESSION["message"]=null;
                }
                ?>
<form method="POST" action="addgame.php">
<table>
<tr>
<td>Nome :</td>
<td><input type="text" name="gametoadd" size=60 placeholder="Insira o nome do jogo" /></td>
</tr>
<tr>
<td colspan="2">
<center>
<input type="submit" value="Gravar" name="submit" onclick="return confirm('pretende gravar este jogo?');" />
</center>
</td>
</tr>

</table>

</form>
</div>
</div>

</body>

</html>