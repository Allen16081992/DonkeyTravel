<?php //Dhr. Allen Pieter
    //Getters & Setters are grouped together.
    trait GeSe { 
        // Name
        public function getName() {
            return $this->name;
        }
        public function setName($name) {
            $this->name = $name;
        }
        // Email
        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        // Password
        public function getPassword() {
            return $this->password;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
        // Phone
        public function getPhone() {
            return $this->phone;
        }
        public function setPhone($phone) {
            $this->phone = $phone;
        }
        // Address $ Coordinates
        public function getAddress() {
            return $this->Address;
        }
        public function setAddress($Address) {
            $this->Address = $Address;
        }
    }

    // Improved Getters & Setters
    // Modular and flexible enough to handle all classes you throw at it.
    trait iGeSe {
        // Rare table columns, specify them in your constructor.
        private $properties = [];

        // Getter
        public function getProperty($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            } elseif (array_key_exists($property, $this->properties)) {
                return $this->properties[$property];
            } else {
                throw new InvalidArgumentException("Property '$property' does not exist.");
            }
        }
        // Setter
        public function setProperty($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            } elseif (array_key_exists($property, $this->properties)) {
                $this->properties[$property] = $value;
            } else {
                throw new InvalidArgumentException("Property '$property' does not exist.");
            }    
        }
    }