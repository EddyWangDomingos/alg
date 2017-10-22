<?php
include './includes/header.php';
include_once './includes/admin_navigation.php';
include_once './includes/functions.php';
?>
<body>

    <?php
    $playerId = $_GET['id'];
    $result = findPlayerById($playerId);

    if ($row = $result->fetch_assoc()) {

        $nomeCompleto = $row['fname'] . " " . $row['nickname'] . " " . $row['lname'];
        $nome = $row['fname'] . " " . $row['lname'];
        $nickname = $row['nickname'];
        $facebook = $row['facebook'];
        $email =$row['email'];
        $age = $row['age'];
        $address = $row['address'];
        $top8 = $row['top8'];
        $main = $row['main'];
        $alt = $row['alt'];
        $replacer = $row['replacer'];
        $picture = $row['picture'];

    }

if(isset($_POST['update'])){

global $connection;

$email=$_POST['email'];
$nickname=$_POST['nickname'];

$sql="update player set nickname='{$nickname}',email='{$email}' where id={$playerId} limit 1";

$result=mysqli_query($connection,$sql);

if($result ){

  redirect_to("listplayer.php");
}
else{

die("edit failed ".mysql_error());
}

}

    ?>
    <div id="content">


        <form method="POST" action="<?php echo "editplayer.php?id=$playerId"  ?>" >
            <div class="container_12">


                <h2 style="border-bottom: 3px solid #181717"><?php echo"$nomeCompleto"; ?></h2>
               
                
                <img src="<?php echo $picture ?>" alt="<?php echo $nome ?>" style="margin-left: 25px;"  />
                <table class="viewTableForm" style="float: left;">
                    <?php
                    echo"<tr><td>Nome</td><td><input type=text value=$nome /></td></tr>";
                    echo"<tr><td>Nickname</td><td><input type=text name='{nickname }' value=$nickname /></td></tr>";
                    echo"<tr><td>Facebook</td><td><input type=text value=$facebook/></td></tr>";
                    echo"<tr><td>Email</td><td><input type=text name='{email }' value=$email /></td></tr>";
                    echo"<tr><td>Idade</td><td> <input type=text name=age value=$age/></td></tr>";
                    echo"<tr><td>Endereço</td><td><input type=text name=address value=$address/></td></tr>";
                    echo"<tr><td>Top 8</td><td><input type=text name=top value=$top8/></td></tr>";
                    echo"<tr><td>Main</td><td><input type=text name=main value=$main/></td></tr>";
                    echo"<tr><td>Alternative</td><td><input type=text name=alt value=$alt /></td></tr>";
                    echo"<tr><td>Replacer</td><td><input type=text name=replacer value=$replacer /></td></tr>";
                    ?>
                </table>
            </div>
            <div class="container_12" >
                <center>
                    <input type="submit" class="submitButton" name="update"  value="Alterar" onclick="return confirm('Pretende alterar este jogador?');"  />
                  
                </center>
               
            </div>
        </form>

    </div>

</body>
</html>