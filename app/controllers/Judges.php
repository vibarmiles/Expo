<?php
    session_start();

    class Judges extends Controller {
        function Action() {
            if(isset($_POST['submit'])) {
                self::score();
            }
                
            parent::View('Judges');
        }

        function score() {
            if(max($_POST['value']) <= 100 && min($_POST['value']) >= 0) {
                $score = new JudgesModel;
                $final = 0;
    
                foreach($_POST['value'] as $key => $value) {
                    if ($value == NULL) {
                        $final += 0 * ($_POST['percent'.$key]/100);
                    } else {
                        $final += $value * ($_POST['percent'.$key]/100);
                    }
                }

                $score->addScore($_POST['id'], round($final, 2), $_SESSION['judgeId']);
            } else {
                echo "<p>Invalid!</p>";
            }
        }
    }
?>