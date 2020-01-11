<?php 
    $ad = new admin;
    $dash = new Dashboard;
?>

<h1 class="jumbotron text-center"><?php echo $ad->title(); ?></h1>

<div class="container">
    <!-- <p class="text-center"><?php  ?></p> -->
    
    <table class="table table-hover">
        <thead>
            <tr class="row">
                <td class="col-sm-2">ID</td>
                <td class="col-sm">Name</td>
                <td class="col-sm-1">Score</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                $dash->data();
            ?>
        </tbody>
    </table>

    <div class="text-center" style="margin: 50px">
        <a href="judges"><button class="btn btn-primary">I'm a Judge</button></a>
        <a href="login"><button class="btn btn-info">I'm the Admin</button></a>
    </div>
</div>
