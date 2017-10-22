<?php
include './includes/header.php';
include './includes/admin_navigation.php';
include_once './includes/functions.php';
?>
<body>

    <?php
    $playerId = $_GET['id'];
    $result = findPLayerById($playerId);

    while ($row = $result->fetch_assoc()) {

        $nomeCompleto = $row['fname'] . " " . $row['nickname'] . " " . $row['lname'];
        $nome = $row['fname'] . " " . $row['lname'];
        $nickname = $row['nickname'];
        $facebook = $row['facebook'];
        $email = $row['email'];
        $age = $row['age'];
        $address = $row['address'];
        $top8 = $row['top8'];
        $main = $row['main'];
        $alt = $row['alt'];
        $replacer = $row['replacer'];
        $picture = $row['picture'];
    }
    ?>
    <div id="content">

        <div class="container_12">


            <h2 style="border-bottom: 3px solid #181717"><?php echo"$nomeCompleto"; ?></h2>


            <img src="<?php echo $picture?>" alt="<?php echo $nomeCompleto?>" style="margin-left: 25px;"  />
            <table class="viewTableForm" style="float: left;">
                <?php
                echo"<tr><td>Nome</td><td>$nome</td></tr>";
                echo"<tr><td>Nickname</td><td>$nickname</td></tr>";
                echo"<tr><td>Facebook</td><td><a href=$facebook>$facebook</a></td></tr>";
                echo"<tr><td>Email</td><td>$email</td></tr>";
                echo"<tr><td>Idade</td><td>$age</td></tr>";
                echo"<tr><td>Endereço</td><td>$address</td></tr>";
                echo"<tr><td>Top 8</td><td>$top8</td></tr>";
                echo"<tr><td>Main</td><td>$main</td></tr>";
                echo"<tr><td>Alternative</td><td>$alt</td></tr>";
                echo"<tr><td>Replacer</td><td>$replacer</td></tr>";
                ?>
            </table>

            






        </div>



    </div>

</body>
</html>