<?php

// tietokannan tiedot
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'rtp_db');
define('DB_PORT', 3307);

/* yhdistä tietokantaan */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
 
// tarkista yhteys
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
