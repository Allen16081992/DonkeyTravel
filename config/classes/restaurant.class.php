<?php // Khaqan Ul Haq Awan
include_once "classes/database.class.php";
class restaurants extends Database {
    private $ID;
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

    public function readrestaurant()
    {
        $connection = $this->connect();
        $sql = $connection->prepare("
        SELECT *
        FROM restaurants");

        $sql->execute();

        foreach ($sql as $restaurant)
        {
            echo $restaurant["ID"];
            echo $this->Naam = $restaurant["Naam"];
            echo $this->Adres = $restaurant["Adres"];
            echo $this->Email = $restaurant ["Email"];
            echo $this->Telefoon = $restaurant["Telefoon"];
            echo $this->Coordinaten = $restaurant["Coordinaten"];
        }
    }

    public function updaterestaurant ($ID)
    {
        $connection = $this->connect();
        $Naam = $this->getNaam();
        $Adres = $this->getAdres();
        $Email = $this->getEmail();
        $Telefoon = $this->getTelefoon();
        $Coordinaten = $this->getCoordinaten();

        $sql = $connection->prepare
        ("
        UPDATE restaurants
        SET Naam=:Naam, Adres=:Adres, Email=:Email, Telefoon=:Telefoon, Coordinaten=:Coordinaten
        WHERE ID=:ID");

        $sql->bindParam(":ID", $ID);
        $sql->bindParam(":Naam", $Naam);
        $sql->bindParam(":Adres", $Adres);
        $sql->bindParam(":Email", $Email);
        $sql->bindParam(":Telefoon", $Telefoon);
        $sql->bindParam(":Coordinaten", $Coordinaten);
        $sql->execute();

    }

    public function searchrestaurant($ID)
    {
        $connection = $this->connect();
        $sql = $connection->prepare(
            "SELECT ID, Naam, Adres, Email, Telefoon, Coordinaten
            FROM restaurants
            WHERE ID =:ID"
        );
        $sql->bindParam(":ID", $ID);
        $sql->execute();

        foreach ($sql as $restaurant)
        {
            $this->Naam = $restaurant["Naam"];
            $this->Adres = $restaurant["Adres"];
            $this->Email = $restaurant["Email"];
            $this->Telefoon = $restaurant["Telefoon"];
            $this->Coordinaten = $restaurant["Coordinaten"];
        }
    }

    public function afdrukkenrestaurant()
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

    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID): void
    {
        $this->ID = $ID;
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