<?php
// käynnistä sessio
session_start();
 
// Jos käyttäjä on jo kirjautununeena, ohjataan profiilisivulle
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: terve_terapeutti.php");
  exit;
}
 
// luo tietokantayhteys
require_once "config.php";
 
// määritä parametrit tyhjiksi
$username = $password = "";
$username_err = $password_err = "";
 
// Kaavakkeen tietojen käsittely napin painalluksen jälkeen
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // tarkista onko käyttäjätunnus tyhjä
    if(empty(trim($_POST["username"]))){
        $username_err = "Syötä käyttäjätunnus.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // tarkista onko salasana tyhjä
    if(empty(trim($_POST["password"]))){
        $password_err = "Syötä salasana.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // validoi credentialsit
    if(empty($username_err) && empty($password_err)){
        // valmistele hakulause
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Sido parametrit
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // määritä parametrit
            $param_username = $username;
            
            // koeta ajaa kysely
            if(mysqli_stmt_execute($stmt)){
                // tallenna tulos
                mysqli_stmt_store_result($stmt);
                
                // jos käyttäjätunnus on olemassa, tarkista salasana
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // sido tuloksena saadut parametrit
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Jos salasana on oikein, aloita uusi sessio
                            session_start();
                            
                            // Tallenna tarvittavat tiedot sessio-parametreihin
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // ohjaa käyttäjä aloitussivulle
                            header("location: tervetuloa_sara.php");
                        } else{
                            // anna virhe jos salasana oli väärin
                            $password_err = "Syöttämäsi salasana ei kelpaa, ole hyvä ja syötä uusi salasana.";
                        }
                    }
                } else{
                    // anna virhe jos käyttäjätunnusta ei löydy
                    $username_err = "Käyttäjätunnusta ei löytynyt.";
                }
            } else{
                echo "Hups! Jotain meni vikaan. Kokeile myöhemmin uudestaan.";
            }

            // sulje statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // sulje tietokantayhteys
    mysqli_close($link);
}
?>

<?php include('includes/head.php') ?>

<body>
<div class="container" id="containerKirjautuminen">
    <div class="divKirjautuminen1">
        
            <h2>Kirjaudu sisään</h2>
            <p>Täytä tiedot kirjautuaksesi sisään.</p>
            <div class="divKirjautuminen2">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Sähköpostiosoite</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Salasana</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info btnKirjaudu" value="Kirjaudu">
                </div>
                </div>
                <p class="pTerapeutti">Terapeutti, eikö sinulla ole vielä tiliä? <a href="rekisteriin.php">Luo uusi tili</a></p>
                <p>Tai palaa takaisin <a href="index.php">etusivulle</a></p>
                </form>
            
    </div>
</div>
<?php include('includes/footer.php')?>    
</body>

</html>