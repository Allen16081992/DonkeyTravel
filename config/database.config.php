<?php //Loubna Faress
  class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'donkeytra_db';
    
    function connect() {
      try { 
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $doeIets = $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $doeIets; 
      }  
      catch(PDOException $e){
          throw new Exception("Failed to connectto the database." . $e->getMessage());
      }     
    }
  }
?>