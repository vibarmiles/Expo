<?php 
    spl_autoload_register(function($class) {
        if(file_exists('app/controllers/'.$class.'.php')) {
            require_once 'app/controllers/'.$class.'.php';
        } else if(file_exists('app/models/'.$class.'.php')) {
            require_once 'app/models/'.$class.'.php';
        }
    });

    switch($_GET['url']) {
        case '':
            header("Location: dashboard");
        case 'index.php':
            header("Location: dashboard");
        break;
        case 'dashboard':
            Index::View('Index');
        break;
        case 'login':
            Login::View('Login');
        break;
        case 'LoginModel':
            Login::CheckLogin();
        break;
        case 'logout':
            Admin::Logout();
        case 'admin':
            Admin::CheckAction();
        break;
        case 'event':
            Admin::CheckAction();
        break;
        case 'judges':
            Judges::Action();
        break;
        case '404':
            echo "<h1>Page not found!</h1>";
        break;
        default:
            header("Location: 404");
        break;
    }
?>