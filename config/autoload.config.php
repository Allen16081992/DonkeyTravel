<?php //Dhr. Allen Pieter
    spl_autoload_register('ClassAgent'); // Register the autoloader function.

    function ClassAgent($className) {
        $classMap = [
            'Database' => 'classes/database.class.php',
            'SessionManagement' => 'classes/session_management.class.php',
        ];
    
        if (isset($classMap[$className])) {
            require_once $classMap[$className];
        } else {
            throw new InvalidArgumentException("Class '$className' not found.");
        }
    }