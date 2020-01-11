<div class="container">
    <div class="card col-md-4 margin-top">
        <form action="LoginModel" method="POST" class="form-horizontal card-body">
            <div class="form-group">
                <h1 class="text-center">Login</h1>
                <?php 
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "usererr") {
                            echo '<p class="alert alert-danger">Incorrect Username</p>';
                        } else if ($_GET['error'] == "pwderr") {
                            echo '<p class="alert alert-danger">Incorrect Password</p>';
                        }
                    }
                                
                    if (isset($_GET['user'])) {
                        if ($_GET['user'] == "double") {
                            echo '<p class="alert alert-danger">User already logged on!</p>';
                        }
                    }
                ?>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary btn-block input-lg" value="Login">
            </div>
        </form>
    </div>
</div>