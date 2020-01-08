<h1 class="jumbotron text-center"><?php $admin = new Admin; echo $admin->title(); ?></h1>

<div class="container margin-top">
    <?php 
        if(isset($_GET['editCon'])):
    ?>
    <form action="admin" method="POST" class="form-inline">
        <input type="hidden" name="id" value="<?php echo $_GET['editCon']; ?>">
        <input class="form-control" type="text" placeholder="First Name" name="fname" value="<?php echo $_GET['fname']; ?>" required>
        <input class="form-control" type="text" placeholder="Last Name" name="lname" value="<?php echo $_GET['lname']; ?>" required>
        <input class="form-control" type="number" placeholder="ID" name="snum" value="<?php echo $_GET['editCon']; ?>" required>
        <input class="btn btn-primary" type="submit" value="Update" name="updateCon">
        <a href="admin">Cancel</a>
    </form>
    <?php 
        else: 
    ?>
    <form action="admin" method="POST" class="form-inline">
        <input class="form-control col-sm-3" type="text" placeholder="First Name" name="fname" required>
        <input class="form-control col-sm-3" type="text" placeholder="Last Name" name="lname" required>
        <input class="form-control col-sm-3" type="number" placeholder="ID" name="snum" required>
        <input class="btn btn-primary col-sm-3" type="submit" value="Submit" name="Contestants">
    </form>
    <?php
        endif;
        require_once 'app/views/Contestant.php';
        if(isset($_GET['editCri'])):
    ?>
    <form action="admin" method="POST" class="form-inline">
        <input type="hidden" name="id" value="<?php echo $_GET['editCri']; ?>">
        <input type="hidden" name="initPerc" value="<?php echo $_GET['perc']; ?>">
        <input class="form-control col-sm-3" type="text" placeholder="First Name" name="cri" value="<?php echo $_GET['cri']; ?>" required>
        <input class="form-control col-sm-3" type="text" placeholder="Last Name" name="desc" value="<?php echo $_GET['desc']; ?>">
        <input class="form-control col-sm-3" type="number" placeholder="ID" name="perc" value="<?php echo $_GET['perc']; ?>" required>
        <input class="btn btn-primary col-sm-3" type="submit" value="Update" name="updateCri">
        <a href="admin">Cancel</a>
    </form>
    <?php 
        else: 
    ?>
    <form action="admin" method="POST" class="form-inline">
        <input class="form-control col-sm-3" type="text" placeholder="Criteria" name="cri" required>
        <input class="form-control col-sm-3" type="text" placeholder="Description" name="desc">
        <input class="form-control col-sm-3" type="number" placeholder="Percentage" name="perc" required>
        <input class="btn btn-primary col-sm-3" type="submit" value="Submit" name="Criteria">
    </form>
    <?php 
        endif;
        require_once 'app/views/Criteria.php';
    ?>
    <div class="row">
        <div class="col-sm-4"></div>
        <a href="logout" class="btn btn-secondary col-sm-4">Logout</a>
        <div class="col-sm-4"></div>
    </div>
</div>
