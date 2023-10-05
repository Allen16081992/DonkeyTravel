<?php

require_once '../classes/herberg.class.php';

class HerbergControl extends Herberg {
    public function addHerberg($name, $address, $email, $coordinates) {
        $this->setHerberg($name, $address, $email, $coordinates);
        // You can add any additional logic or error handling here
        header('location: success_page.php'); // Redirect to success page
        exit();
    }

    // You can add methods for update and delete operations here
}
?>