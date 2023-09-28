<?php //Dhr. Allen Pieter
    spl_autoload_register('ClassAgent'); // Register the autoloader function.

    function ClassAgent($className) {
        $classMap = [
            'Database' => 'config/classes/Database.php',
            'SessionManagement' => 'path/to/session_management.config.php',
            // Define more class mappings as needed.
        ];
    
        if (isset($classMap[$className])) {
            require_once $classMap[$className];
        } else {
            throw new InvalidArgumentException("Class '$className' not found.");
        }
    }