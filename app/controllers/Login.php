<?php 
    class Login extends Controller {
        public static function CheckLogin() {
            if(isset($_POST['submit'])) {
                require_once 'app/models/LoginModel.php';

                $login = new LoginModel();

                if($row = $login->checkUser($_POST['username'])) {
                    if($row['loggedIn'] == 0) {
                        $pwver = $login->checkPass($_POST['password'], $row['password']);
        
                        if($pwver == true) {
                            session_start();
        
                            $login->logIn();
                            $_SESSION['id'] = $row['id'];
                            header("Location: admin");
                        } else {
                            header("Location: login?error=pwderr");
                            exit();
                        }
                    } else {
                        header("Location: login?user=double");
                    }
                } else {
                    header("Location: login?error=usererr");
                    exit();
                }
            } else {
                header("Location: login");
                exit();
            }
        }
    }
?>