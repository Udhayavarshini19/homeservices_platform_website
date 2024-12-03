<?php
include_once "./include/header1.php";
include_once "./msg/login.php";
?>
<style>
    body{
        background-color: #353a3f;
    }
    .card{
        background-color: #353a3f;
    }
    </style>
<div class="container" style="margin-top: 50px; width: 450px;">
    <div class="card">
        
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center">Login for Service Providers</h3>
            </div>
            <hr>

            <form action="scripts/login.php" method="post">
                <div class="form-group">
                    <label for="">Contact No.</label>
                    <input id="contact"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        name="contact" type="text" class="form-control" placeholder="Enter Your Contact No."
                        minlength="10" maxlength="10" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input id="password" name="password" type="password" class="form-control"
                        placeholder="Enter Password" minlength="4" required>
                </div>
                <h5>Don't have an account ? <a href="register.php">REGISTER</h5>
                <button style="margin-top: 30px;" class="btn btn-block btn-primary" type="submit" name="login"
                    id="login">Login</button>
            </form>

        </div>
    </div>
</div>


<?php include_once "./include/footer.php";
