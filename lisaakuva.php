<?php

    session_start();


    //yhdistä tietokanta
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "rtp_db";
    $port="3307";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db,$port) or die("Connect failed: %s\n". $conn -> error);

    $terapeutinid=$_SESSION['id'];

    if(isset($_POST['uploadfilesub'])) {
        //muuttujat
        $param_id = $_SESSION['id'];
        $filename = $_FILES['uploadfile']['name'];
        $filetmpname = $_FILES['uploadfile']['tmp_name'];
        //kansio, johon kuvat ladataan
        $folder = 'ladatutkuvat/';
        //siirretään kuvat oikeaan kansioon
        move_uploaded_file($filetmpname, $folder.$filename);

        $sql = "INSERT INTO uploadedimage (users_fk, imagename)  VALUES ('$param_id', '$filename')";
        $qry = mysqli_query($conn,  $sql);
        if( $qry) {
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

        <title>Lisää profiilikuva</title>
    </head>
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #5A9089;">
        
            <div class="nav-item">
                <a class="navbar-brand">
                <img src="Pictures\whitelogo_Larate.png" style=" height: 30px; width: 100 px; display: inline-block;">        
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">  
                <ul class="navbar-nav mr-auto">
                </ul>    
            
    </nav>
    <body>
        
        <div class="jumbotron">
            <div class="container" style="text-align: center;">

                <br>
                <br>
                <br>
                <h5 style="text-align: center;">Tällä sivulla voit lisätä profiiliisi kuvan.
                <br>Mikäli et halua lisätä profiilikuvaa, paina "seuraava".
                <br>Tällöin profiilissasi näkyy alla oleva oletuskuva.</h5>
                <br>
                <div class="container" style="background-color: white; text-align: center;">
                    <br><br><br>
                    <?php 

                    ?>

                    <!-- kuva -->
                    <img class="card-img-top" id="kuva" style="width: 350px; height: 350px; background-repeat: no-repeat; " src="pictures/noprofilepic.png">

                    <br>
                    <br>
                    
                    <form action="" method="post" enctype="multipart/form-data" >

                    <input  id="kuvainput" onchange="readURL(this);"  type="file" name="uploadfile" accept="image/*" /> 
                    <input type="submit"  class="btn btn-info" name="uploadfilesub" value="Lataa kuva" />
                    <br>
                    <br><br><br>

                    </form>
                </div>
                <br>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                        <a class="btn btn-danger btn-lg"  style=" min-width: 110px; max-width:100%"
                            href="tervetuloa_sara.php" role="button">Palaa</a> 
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="col-sm-2">
                            <a class="btn btn-success btn-lg"  style=" min-width: 110px; max-width:100%"
                            href="checkbox_testit.php" role="button">Jatka</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <br>
        <br>

        <footer class="footerRTP2">
        <div class="container" style="margin-top: 80px;">
            <div class="row">
            <div class="col-md-4" style="text-align: center;">
                <img src="Pictures\Black logo - no background.png" style=" height: 60px; width: 200 px; display: inline-block;">
            </div>
            <div class="col-md-4" style="text-align: center">  </div>
            <div class="col-md-4" style="text-align: center;">  </div>
            <div class="col-md-12" style="text-align: center; margin-top: 50px; margin-bottom: 20px;">
                <p>&copy; Ryhmä-R 2020</p>
            </div>
            </div>
        </div>
        </footer> 

        <script>

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#kuva')
                            .attr('src', e.target.result)
                            .width(350)
                            .height(350);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>

        <?php $conn->close(); ?>
    </body>
</html>