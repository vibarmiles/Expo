<?php 
    $con = new ContestantModel;
    $cri = new CriteriaModel;
?>

<h1 class="jumbotron text-center"><?php $admin = new Admin; echo $admin->title(); ?></h1>

<div class="container">
    <div class="margin-top-10">
        <table class="table table-hover">
            <tr class="table-active row align-items-center">
                <?php 
                    if(isset($_GET['editCon'])):
                ?>
                
                <form action="admin" method="POST" class="form-inline">
                    <input type="hidden" name="id" value="<?php echo $_GET['editCon']; ?>">
                    <td class="col-sm-4"><input class="form-control" type="text" placeholder="First Name" name="fname" value="<?php echo $_GET['fname']; ?>" required></td>
                    <td class="col-sm-4"><input class="form-control" type="text" placeholder="Last Name" name="lname" value="<?php echo $_GET['lname']; ?>" required></td>
                    <td class="col-sm-2"><input class="form-control" type="number" placeholder="ID" name="snum" value="<?php echo $_GET['editCon']; ?>" required></td>
                    <td class="col-sm-2"><div class="row justify-content-around pl-2 pr-2"><input class="btn btn-primary" type="submit" value="Update" name="updateCon">
                    <a href="admin" class="btn btn-default">Cancel</a></div></td>
                </form>
                
                <?php 
                    else: 
                ?>
                
                <form action="admin" method="POST" class="form-inline">
                    <td class="col-sm-4"><input class="form-control" type="text" placeholder="First Name" name="fname" required></td>
                    <td class="col-sm-4"><input class="form-control" type="text" placeholder="Last Name" name="lname" required></td>
                    <td class="col-sm-2"><input class="form-control" type="number" placeholder="ID" name="snum" required></td>
                    <td class="col-sm-2"><input class="btn btn-primary w-100" type="submit" value="Submit" name="Contestants"></td>
                </form>
                
                <?php
                    endif;
                ?>
            </tr>
            
            <?php
                $con->data();
            ?>
        </table>
    </div>

    <div class="margin-top-10">
        <table class="table table-hover">   
            <tr class="table-active row align-items-center">
                <?php
                    if(isset($_GET['editCri'])):
                ?>

                <form action="admin" method="POST" class="form-inline">
                    <input type="hidden" name="id" value="<?php echo $_GET['editCri']; ?>">
                    <input type="hidden" name="initPerc" value="<?php echo $_GET['perc']; ?>">
                    <td class="col-sm-4"><input class="form-control" type="text" placeholder="First Name" name="cri" value="<?php echo $_GET['cri']; ?>" required></td>
                    <td class="col-sm-4"><input class="form-control" type="text" placeholder="Last Name" name="desc" value="<?php echo $_GET['desc']; ?>"></td>
                    <td class="col-sm-2"><input class="form-control" type="number" placeholder="ID" name="perc" value="<?php echo $_GET['perc']; ?>" required></td>
                    <td class="col-sm-2"><div class="row justify-content-around pl-2 pr-2"><input class="btn btn-primary" type="submit" value="Update" name="updateCri">
                    <a href="admin" class="btn btn-default">Cancel</a></div></td>
                </form>
                
                <?php 
                    else: 
                ?>

                <form action="admin" method="POST" class="form-inline">
                    <td class="col-sm-4"><input class="form-control" type="text" placeholder="Criteria" name="cri" required></td>
                    <td class="col-sm-4"><input class="form-control" type="text" placeholder="Description" name="desc"></td>
                    <td class="col-sm-2"><input class="form-control" type="number" placeholder="Percentage" name="perc" required></td>
                    <td class="col-sm-2"><input class="btn btn-primary w-100" type="submit" value="Submit" name="Criteria"></td>
                </form>

                <?php 
                    endif;
                ?>
            </tr>

            <?php 
                $cri->data();
            ?>
        </table>
    </div>

    <div class="row">
        <div class="col-sm-4"></div>
        <a href="logout" class="btn btn-secondary col-sm-4">Logout</a>
        <div class="col-sm-4"></div>
    </div>
</div>
