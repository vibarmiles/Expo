<?php 
    class Admin extends Controller {
        function CheckAction() {
            if(isset($_POST['Contestants'])) {
                self::insertContestant();
            } else if(isset($_POST['Criteria'])) {
                self::insertCriteria();
            } else if(isset($_POST['updateCon'])) {
                self::updateContestant();
            } else if(isset($_GET['delCon'])) {
                self::removeContestant();
            } else if(isset($_POST['updateCri'])) {
                self::updateCriteria();
            } else if(isset($_GET['delCri'])) {
                self::removeCriteria();
            } else {
                self::checkAdmin();
            }
        }

        function title() {
            $dash = new Dashboard;

            $row = $dash->event();
            return $row['name'];
        }

        function checkAdmin() {
            session_start();
            
            if(isset($_SESSION['id'])) {
                self::View('admin');
            } else {
                header("Location: login?error=loginerr");
            }
        }

        function insertContestant() {
            $contestant = new ContestantModel;

            if(!preg_match('#[0-9]#', $_POST['fname']) && !preg_match('#[0-9]#', $_POST['lname']) && !is_numeric($_POST['fname']) && !is_numeric($_POST['lname']) && is_numeric($_POST['snum']) && strlen($_POST['snum']) > 6) {
                $contestant->add($_POST['fname'], $_POST['lname'], $_POST['snum']);
                header("Location: admin?insert=success");
            } else {
                header("Location: admin?insert=invalid");
            }
        }

        function updateContestant() {
            $contestant = new ContestantModel;

            if(!preg_match('#[0-9]#', $_POST['fname']) && !preg_match('#[0-9]#', $_POST['lname']) && !is_numeric($_POST['fname']) && !is_numeric($_POST['lname']) && is_numeric($_POST['snum']) && strlen($_POST['snum']) > 6) {
                $contestant->edit($_POST['fname'], $_POST['lname'], $_POST['snum'], $_POST['id']);
                header("Location: admin?update=success");
            } else {
                header("Location: admin?update=invalid");
            }
        }

        function removeContestant() {
            $contestant = new ContestantModel;

            $contestant->remove($_GET['delCon']);
            $contestant->delScores($_GET['delCon']);
            header("Location: admin?removed=$_GET[delCon]");
        }

        function insertCriteria() {
            $criteria = new CriteriaModel;

            if(!is_numeric($_POST['cri']) && $_POST['perc'] < 101 && $_POST['perc'] > 0 && $criteria->checkTotal() - $_POST['initPerc'] + $_POST['perc'] < 101) {
                $criteria->add($_POST['cri'], $_POST['desc'], $_POST['perc']);
                header("Location: admin?insert=success");
            } else {
                header("Location: admin?insert=invalid");
            }
        }

        function updateCriteria() {
            $criteria = new CriteriaModel;
            
            if(!is_numeric($_POST['cri']) && $_POST['perc'] < 101 && $_POST['perc'] > 0 && $criteria->checkTotal() - $_POST['initPerc'] + $_POST['perc'] < 101) {
                $criteria->edit($_POST['cri'], $_POST['desc'], $_POST['perc'], $_POST['id']);
                header("Location: admin?update=success");
            } else {
                header("Location: admin?update=invalid");
            }
        }

        function removeCriteria() {
            $criteria = new CriteriaModel;

            $criteria->remove($_GET['delCri']);
            header("Location: admin?removed=$_GET[delCri]");
        }

        function Logout() {
            $logout = new LoginModel;

            $logout->logOut();

            session_start();
            session_unset();
            session_destroy();
            header("location: dashboard");
            exit();
        }
    }
?>