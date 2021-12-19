<!doctype html>
<html lang="fi">
  <head>
    <!-- Tarvittavat metatagit -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Larate</title>
    
    <style>
      .dropbtn {
      background-color:#5A9089;
      color: white;
      padding:8px;
      font-size: 16px;
      border: none;
      }
      
      .dropdown {
        position: relative;
        display: inline-block;
      }
      
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #5A9089;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }
      
      .dropdown-content a:hover {background-color: #ddd;}
      
      .dropdown:hover .dropdown-content {display: block;}
      
      .dropdown:hover .dropbtn {background-color: #5A9089;}

    </style>

    <script>

      function ShowHide(divId, Palvelutkuva)
      {
        if(document.getElementById(divId).style.display == 'none')
        {
        $("article").hide();
        document.getElementById(divId).style.display='block';
      }

      if(document.getElementById(Palvelutkuva).style.display == 'none')
        {
        $("image").hide();
        document.getElementById(Palvelutkuva).style.display='block';
        }     
      }

      function openpalvelut(){
        window.open("RTP_Palvelut.php", "_self");
      }
      function opentietoa(){
        window.open("RTP_TietoaMeista.php", "_self");
      }
    </script>

  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #5A9089;">

    <div class="nav-item">
      <a class="navbar-brand" href="index.php">
        <img src="Pictures\whitelogo_Larate.png" style=" height: 30px; width: 100 px; display: inline-block;">
          
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="Asiantuntijat.php" style="color: white;">Asiantuntijat</a>
        </li>
        <div class="dropdown">
        <button class="dropbtn" onclick="openpalvelut()">Palvelut</button>
          <div class="dropdown-content">
            <a class="nav-link active"  href="RTP_Palvelut.php">Ruoanvalinta helpommaksi</a>
            <a class="nav-link active" onclick="javascript:ShowHide('ar2', 'Palvelutkuva2')" href="RTP_Palvelut.php#ar2">Energisempi arki</a>
            <a class="nav-link active" onclick="javascript:ShowHide('ar3', 'Palvelutkuva3')" href="RTP_Palvelut.php#ar3">Liikkujan ravitsemus</a>
            <a class="nav-link active" onclick="javascript:ShowHide('ar4', 'Palvelutkuva4')" href="RTP_Palvelut.php#ar4">Ahdistava ruoka</a>
            <a class="nav-link active" onclick="javascript:ShowHide('ar5', 'Palvelutkuva5')" href="RTP_Palvelut.php#ar5">Vegaaniravitsemus</a>
            <a class="nav-link active" onclick="javascript:ShowHide('ar6', 'Palvelutkuva6')" href="RTP_Palvelut.php#ar6">Eettisesti ja ekologisesti kestävä ruokavalio</a>
            <a class="nav-link active" onclick="javascript:ShowHide('ar7', 'Palvelutkuva7')" href="RTP_Palvelut.php#ar7">Tyypin 1 diabetes</a>
            <a class="nav-link active" onclick="javascript:ShowHide('ar8', 'Palvelutkuva8')" href="RTP_Palvelut.php#ar8">Suolistosairaudet ja vatsaongelmat</a>
            <a class="nav-link active" onclick="javascript:ShowHide('ar9', 'Palvelutkuva9')" href="RTP_Palvelut.php#ar9">Lapsiperheen ravitsemus</a>
            <a class="nav-link active" onclick="javascript:ShowHide('ar10', 'Palvelutkuva10')" href="RTP_Palvelut.php#ar10">Etkö löydä etsimääsi?</a>
            <a class="nav-link active" onclick="javascript:ShowHide('ar11', 'Palvelutkuva11')" href="RTP_Palvelut.php#ar10">Hinnasto</a>
          </div>
        </div>
        
        <div class="dropdown">
        <button class="dropbtn" onclick="opentietoa()">Tietoa meistä</button>
          <div class="dropdown-content">
            <a class="nav-link active" onclick="javascript:ShowHide('art1', 'Palvelutkuva1')" href="RTP_TietoaMeista.php">Miksi ravitsemusterapiaan?</a>
            <a class="nav-link active" onclick="javascript:ShowHide('art2', 'Palvelutkuva2')" href="RTP_TietoaMeista.php#ar2">Kenelle ravitsemusterapiaa?</a>
            <a class="nav-link active" onclick="javascript:ShowHide('art3', 'Palvelutkuva3')" href="RTP_TietoaMeista.php#ar3">Mistä löydän luotettavaa tietoa ravitsemuksesta?</a>
            <a class="nav-link active" onclick="javascript:ShowHide('art4', 'Palvelutkuva4')" href="RTP_TietoaMeista.php#ar4">Mitä ravitsemusterapia on?</a>
            <a class="nav-link active" onclick="javascript:ShowHide('art5', 'Palvelutkuva5')" href="RTP_TietoaMeista.php#ar5">Voiko terve hyötyä ravitsemusterapiasta?</a>
            <a class="nav-link active" onclick="javascript:ShowHide('art6', 'Palvelutkuva6')" href="RTP_TietoaMeista.php#ar6">Mitä palveluita tarjoamme?</a>
          </div>
        </div>
        <li class="nav-item">
          <a class="nav-link" href="RTP_Ajankohtaista.php" style="color: white;">Ajankohtaista</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="RTP_Yhteystiedot.php" style="color: white;">Yhteystiedot</a>
        </li>
      
      </ul>
    
      <a class="btn btn-light float-right" href="kirjaudu.php" type="button" aria-haspopup="true" aria-expanded="false">
      Terapeuttien kirjautuminen</a>
    </nav>
