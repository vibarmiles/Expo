<?php 
    class Controller {
        static function View($view) {
            require_once "app/views/$view.php";
        }
    }
?>