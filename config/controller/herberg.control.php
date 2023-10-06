<?php // Dhr. Allen Pieter
    // This session_start is solely for displaying error messages.
    require_once '../classes/session_management.class.php';

    class HerbergControl extends Herberg {
        // Herberg data
        private $name;
        private $adres;
        private $email;
        private $phone;
        private $latlon;

        public function __construct($name, $adres, $email, $phone, $latlon) {
            // Referencing
            $this->name = $name;
            $this->adres = $adres;
            $this->email = $email;
            $this->phone = $phone;
            $this->latlon = $latlon;
        }

        public function verifyHerberg() {
            if(!$this->emptyName()) {
                // No firstname or lastname provided.
                $_SESSION['error'] = 'No firstname or lastname provided.';
            } elseif(!$this->emptyAdres()) {
                // No country information provided.
                $_SESSION['error'] = 'No country or nationality provided.';
            } elseif(!$this->emptyEmail()) {
                // No email information provided.
                $_SESSION['error'] = 'No email provided.';
            } elseif(!$this->invalidEmail()) {
                // Invalid emailaddress.
                $_SESSION['error'] = 'Please enter a valid email address.';
            } elseif(!$this->emptyCoordinate()) {
                // No country information provided.
                $_SESSION['error'] = 'No country or nationality provided.';
            } else {
                $this->setHerberg(
                    $this->name, $this->adres, $this->email, $this->phone, $this->latlon
                );
            }       
            header('location: ../donkey_client.php');
            exit();
        }

        private function emptyName() {
            // Make sure the submitted values are not empty.
            return !(empty($this->name));
        }

        private function emptyAdres() {
            // Make sure the submitted values are not empty.
            return !(empty($this->adres));
        }

        private function emptyEmail() {
            // Make sure the submitted values are not empty.
            return !(empty($this->email));
        }

        private function invalidEmail() {
            // Make sure the submitted values contain an @ character.
            return filter_var($this->email, FILTER_VALIDATE_EMAIL);
        }

        private function emptyPhone() {
            // Make sure the submitted values are not empty.
            return !(empty($this->phone));
        }

        private function emptyCoordinate() {
            // Make sure the submitted values are not empty.
            return !(empty($this->latlon));
        }
    }