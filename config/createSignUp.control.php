<?php // Loubna Faress
class RegistrateControl extends Registration {
    use ErrorHandlers;
    // Account info
    private $name;
    private $email;
    private $password;
    private $phone;
    // Contact info

    public function __construct($name, $email, $password, $phone) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

    public function signupUser() {
        if(!$this->emptyNames()) {
            // No name provided.
            $_SESSION['error'] = 'No name provided.';
        } elseif(!$this->emptyEmail()) {
            // No Email provided.
            $_SESSION['error'] = 'No Email provided.';
        } elseif(!$this->emptyPassword()) {
            // No Password provided.
            $_SESSION['error'] = 'No Password provided.';
        } elseif(!$this->emptyPhone()) {
            // No Phone number provided.
            $_SESSION['error'] = 'No Phone number provided.';
        } else {
            $this->setKlant(
                $this->name, $this->email, $this->$password, $this->phone,);
        }
        header('location: ../index.php');
            exit();
    }
}
?>