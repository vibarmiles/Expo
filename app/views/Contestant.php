<?php 
    $con = new ContestantModel;
?>

<div class="margin-top-10">
    <table class="table">
        <?php 
            $con->data();
        ?>
    </table>
</div>