<?php
    require_once 'Database.php';

    class LoginModel extends DB {
        function __construct() {
            parent::__construct();
        }

        function checkUser($user) {
            return parent::select("*", "admin", NULL, "username=?", "s", $user);
        }

        function checkPass($inspass, $pass) {
            return password_verify($inspass, $pass);
        }

        function logIn() {
            return parent::update("loggedIn=?", "admin", NULL, "id=?", "ii", array(1, 1));
        }

        function logOut() {
            return parent::update("loggedIn=?", "admin", NULL, "id=?", "ii", array(0, 1));
        }

        function __destruct() {
            parent::__destruct();
        }
    }
?>