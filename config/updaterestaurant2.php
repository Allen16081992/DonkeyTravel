<!doctype html>
<html>
<head>
    <title>update reservering 2</title>
</head>
<body>
<h1>update reservering 2</h1>

<?php

require_once "classes/restaurant.class.php";
$ID = $_POST["ID"];
$ID1=new restaurants($ID);
$ID1->searchrestaurant();

$Naam = $ID1->getNaam();
$Email = $ID1->getEmail();
$Adres = $ID1->getAdres();
$Telefoon = $ID1->getTelefoon();
$Coordinaten = $ID1->getCoordinaten();


?>

<form action="updaterestaurant3.php" method="post">

    <?php echo $ID ?>
    <label>ID:</label>
    <input type="text" name="ID" value="<?php echo $ID;  ?> "><br/>
    <label>Naam</label>
    <input type="text" name="Naam" value="<?php echo $Naam;  ?>"><br/>
    <label>E-mail:</label>
    <input type="text"   name="Email" value="<?php echo $Email;     ?> "><br/>
    <label>Adres:</label>
    <input type="text"   name="Adres"  value="<?php echo $Adres;  ?> "><br/>
    <label>Telefoon:</label>
    <input type="text"   name="Telefoon" value="<?php echo $Telefoon;  ?> "><br/><br/>
    <label>Coordinaten:</label>
    <input type="text"   name="Coordinaten" value="<?php echo $Coordinaten;  ?> "><br/><br/>


    <input type="submit"><br/><br/>
</form>

</body>
