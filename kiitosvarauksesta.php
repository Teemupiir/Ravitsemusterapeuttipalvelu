<?php 
    //tietokantayhteys
    require_once 'config.php';
    //head
    include('includes/head.php');

    //haetaan terapeutin id
    if(isset($_GET['id'])){
        $tpid = mysqli_real_escape_string($link, $_GET['id']);
        $select = "SELECT * FROM terapeutit WHERE users_fk=$tpid"; 
        $tulos = mysqli_query($link, $select);
        $tp = mysqli_fetch_assoc($tulos);
        mysqli_free_result($tulos); 
    }
    // Suljetaan tietokantayhteys
    mysqli_close($link);
?>

<body>
    <div class="container" style="text-align:center; margin-top:100px;">
        <br>
        <h2>Kiitos varauksestasi!</h2>
        <br><br><br>
        <img style="height: 150px; width:auto;" src="pictures/lappaomena.png">
        <br><br><br>
            <div>
                <a class="btn btn-info btn-lg"
                href="index.php" role="button">Palaa etusivulle</a>
            </div>
            <br>
        <div style="margin-bottom:300px;"></div>
    </div>
    </div>
    <?php 
    //footer
    include('includes/footer.php');
    ?>
</body>