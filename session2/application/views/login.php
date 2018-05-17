<?php
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/17/15 11:16 PM
 */
if (!$this->session->userdata('user_data')){
echo validation_errors();
?>
<body>
<div class="container">
    <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading"><i class="fa fa-group"></i> Student System</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value=" Login "><i class="fa fa-sign-in"></i> Login</button>
    </form>
</div>
</body>
<?php } else { ?>
    <?php redirect('/students/index','location'); ?>
<?php } ?>