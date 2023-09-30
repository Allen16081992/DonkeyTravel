<?php // Dhr. Allen Pieter 
    class SessionManagement {
        public static function setSession() {
            if (!isset($_SESSION)) {
                session_start();
                echo "Loading session...\n";
            }
        }

        public static function redirectUnauthorized() {
            if (!isset($_SESSION['user_id'])) {
                $_SESSION['error'] = '401: Access denied. You must be signed in.';
                header('Location: ././index.php');
                exit;
            } //else { $userID = $_SESSION['user_id']; }
        }
    }