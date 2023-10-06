<?php
class klanten extends Database {
    private $Naam;
    private $Email;
    private $Telefoon;
    private $Wachtwoord;

    public function __construct ($Naam, $Email, $Telefoon, $Wachtwoord)
    {
        $this->Naam = $Naam;
        $this->Email = $Email;
        $this->Telefoon = $Telefoon;
        $this->Wachtwoord = $Wachtwoord;
    }

    public function createklanten()
    {
        $connection = $this->connect();
        $Naam = $this->getNaam();
        $Email= $this->getEmail();
        $Telefoon = $this->getTelefoon();
        $Wachtwoord = $this->getWachtwoord();

        $sql = $connection->prepare(
            "INSERT INTO klanten(Naam, Email, Telefoon, Wachtwoord)
                     VALUES (:Naam, :Email, :Telefoon, :Wachtwoord);"
        );

        $sql->bindParam(":Naam", $Naam);
        $sql->bindParam(":Email", $Email);
        $sql->bindParam(":Telefoon", $Telefoon);
        $sql->bindParam(":Wachtwoord", $Wachtwoord);
        $sql->execute();

    }

    public function getNaam()
    {
        return $this->Naam;
    }

    public function setNaam($Naam): void
    {
        $this->Naam = $Naam;
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

    public function getWachtwoord()
    {
        return $this->Wachtwoord;
    }

    public function setWachtwoord($Wachtwoord): void
    {
        $this->Wachtwoord = $Wachtwoord;
    }

}