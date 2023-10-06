<?php // Loubna Faress
class SignUpControl extends SignUp {
    private $name;
    private $email;
    private $password;
    private $phone;

    public function __construct($name, $email, $password, $phone) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

    public function signupUser() {
        $errors = $this->validateUserInput();

        if (!empty($errors)) {
            $_SESSION['error'] = $errors[0]; // Display the first error message
        } else {
            $this->setUser($this->name, $this->email, $this->password, $this->phone);
            $_SESSION['success'] = 'You have successfully registered.';
        }

        header('location: ../index.php');
        exit();
    }

    private function validateUserInput() {
        $errors = [];

        if (empty($this->name)) {
            $errors[] = 'No name provided.';
        }

        if (empty($this->email)) {
            $errors[] = 'No email provided.';
        } elseif (!$this->isValidEmail()) {
            $errors[] = 'Invalid email format.';
        }

        if (empty($this->password)) {
            $errors[] = 'No password provided.';
        }

        if (empty($this->phone)) {
            $errors[] = 'No phone number provided.';
        }

        return $errors;
    }

    private function isValidEmail() {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }
}
?>
