<?php //Dhr. Allen Pieter
    spl_autoload_register('ClassAgent'); // Register the autoloader function.

    function ClassAgent($className) {
        $classMap = [
            'Database' => 'classes/database.class.php',
            'SessionManagement' => 'classes/session_management.class.php',
        ];
    
        // Verify if the class was set.
        if (!isset($classMap[$className])) {
            throw new InvalidArgumentException("Class '$className' not found.");
        }

        require_once $classMap[$className];
    }