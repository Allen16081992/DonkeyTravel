<?php // Khaqan Ul Haq Awan
include_once "database.class.php";
class restaurants extends Database {
    private $Naam;
    private $Adres;
    private $Email;
    private $Telefoon;
    private $Coordinaten;

    public function __construct ($Naam, $Email, $Telefoon, $Adres, $Coordinaten)
    {
        $this->Naam = $Naam;
        $this->Adres = $Adres;
        $this->Email = $Email;
        $this->Telefoon = $Telefoon;
        $this->Coordinaten = $Coordinaten;
    }

    public function createrestaurant()
    {
        $connection = $this->connect();
        $Naam = $this->getNaam();
        $Adres = $this->getAdres();
        $Email = $this->getEmail();
        $Telefoon = $this->getTelefoon();
        $Coordinaten = $this->getCoordinaten();

        $sql = $connection->prepare(
          "INSERT INTO restaurants(Naam, Adres, Email, Telefoon, Coordinaten)
                  VALUES (:Naam, :Adres, :Email, :Telefoon, :Coordinaten);"
        );
        $sql->bindParam(":Naam", $Naam);
        $sql->bindParam(":Adres", $Adres);
        $sql->bindParam(":Email", $Email);
        $sql->bindParam(":Telefoon",$Telefoon);
        $sql->bindParam(":Coordinaten", $Coordinaten);
        $sql->execute();
    }

    public function afdrukkenreservering()
    {
        echo $this->getNaam();
        echo "<br/>";
        echo $this->getAdres();
        echo "<br/>";
        echo $this->getEmail();
        echo "<br/>";
        echo $this->getTelefoon();
        echo"<br/>";
        echo $this->getCoordinaten();

    }

    public function getNaam()
    {
        return $this->Naam;
    }

    public function setNaam($Naam): void
    {
        $this->Naam = $Naam;
    }

    public function getAdres()
    {
        return $this->Adres;
    }

    public function setAdres($Adres): void
    {
        $this->Adres = $Adres;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email): void
    {
        $this->Email = $Email;
    }

    public function getTelefoon()
    {
        return $this->Telefoon;
    }

    public function setTelefoon($Telefoon): void
    {
        $this->Telefoon = $Telefoon;
    }

    public function getCoordinaten()
    {
        return $this->Coordinaten;
    }

    public function setCoordinaten($Coordinaten): void
    {
        $this->Coordinaten = $Coordinaten;
    }



}