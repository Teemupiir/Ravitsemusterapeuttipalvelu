<?php
session_start();

 
// tarkistetaan onko käyttäjä kirjautunut
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: kirjaudu.php");
    exit;
}

// config
require_once "config.php";
 
// määritellään muuttujat
$etunimi = $sukunimi = $kaupunki = $email = $esittely = "";
$etunimi_err = $sukunimi_err = $kaupunki_err = $email_err = $esittely_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    //Tarkistetaan että errorit tyhjiä
    if(empty($etunimi_err) && empty($sukunimi_err) && empty($kaupunki_err) && empty($email_err) && empty($esittely_err)){

        $etunimi = $_POST["etunimi"];
        $sukunimi = $_POST["sukunimi"];
        $kaupunki = $_POST["kaupunki"];
        $email = $_POST["email"];
        $esittely = $_POST["esittely"];
        
        $sql = "INSERT INTO terapeutit (users_fk,tp_etunimi,tp_sukunimi,tp_paikkakunta,tp_email,tp_esittelyteksti) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssss", $param_id, $param_etunimi, $param_sukunimi, $param_kaupunki, $param_email, $param_esittely);
            
            // parametrit
            $param_id = $_SESSION['id'];
            $param_etunimi = $etunimi;
            $param_sukunimi = $sukunimi;
            $param_kaupunki = $kaupunki;
            $param_email = $email;
            $param_esittely = $esittely;
            
            
            if(mysqli_stmt_execute($stmt)){
                echo "Tallennettu. Mahtavaa!";
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // sulje statement
            mysqli_stmt_close($stmt);
        }
    }
}
    
    // sulje tietokantayhteys
    mysqli_close($link);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
        <h4>ID on <?php echo ($_SESSION['id']); ?></h4>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($etunimi_err)) ? 'has-error' : ''; ?>">
                <label>Etunimi</label>
                <input type="text" name="etunimi" class="form-control" value="<?php echo $etunimi; ?>">
                <span class="help-block"><?php echo $etunimi_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($sukunimi_err)) ? 'has-error' : ''; ?>">
                <label>Sukunimi</label>
                <input type="text" name="sukunimi" class="form-control" value="<?php echo $sukunimi; ?>">
                <span class="help-block"><?php echo $sukunimi_err; ?></span>
            </div>   
            <div class="form-group <?php echo (!empty($kaupunki_err)) ? 'has-error' : ''; ?>">
                <label>Kaupunki</label>
                <input type="text" name="kaupunki" class="form-control" value="<?php echo $kaupunki; ?>">
                <span class="help-block"><?php echo $kaupunki_err; ?></span>
            </div>   
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($esittely_err)) ? 'has-error' : ''; ?>">
                <label>Esittely</label>
                <input type="text" name="esittely" class="form-control" value="<?php echo $esittely; ?>">
                <span class="help-block"><?php echo $esittely_err; ?></span>
            </div>        
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                
                <p>
                    <a href="reset_password.php" class="btn btn-warning">Reset Your Password</a>
                    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                </p>


<?php include('includes/footer.php');?>
</body>
</html>