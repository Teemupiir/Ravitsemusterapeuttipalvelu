<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<h4>cbxDiabetes2 on <?php echo ($_SESSION['cbxDiabetes2']); ?></h4>
<h4>cbxVanhus on <?php echo ( $_SESSION['cbxVanhus']); ?></h4>
<h4>cbxKasvis on <?php echo ($_SESSION['cbxKasvis']); ?></h4>

<form action="insert_tp.php" method="post">
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" name="tbxEtunimi" id="firstName">
    </p>
    <p>
        <label for="lastName">Last Name:</label>
        <input type="text" name="tbxSukunimi" id="lastName">
    </p>
    <p>
        <label for="lastName">Laaasp Name:</label>
        <input type="text" name="tbxKaupunki" id="laaastName">
    </p>
    <p>
        <label for="emailAddress">Email Address:</label>
        <input type="text" name="tbxEmail" id="emailAddress">
    </p>
    <p>
        <label for="esittelys">Esittely:</label>
        <input type="text" name="taProfiiliteksti" id="esittely">
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</html>
