<?php 
    if(!isset($_SESSION['judgeId'])) {
        $_SESSION['judgeId'] = rand(1, 999999999);
    } 

    $judges = new JudgesModel;
?>

<div class="container">
    <table class="table">
        <?php 
            $judges->header();
            $judges->showData(); 
        ?>
    </table>
</div>