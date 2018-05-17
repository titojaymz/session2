<?php
/**
 * Created by JOSEF FRIEDRICH S. BALDO
 * Date Time: 10/17/15 10:59 PM
 */
echo validation_errors();
?>
<form method="post">
    <input type="text" name="username" value="<?php echo set_value('username') ?>" placeholder="Enter Username">
    <input type="password" name="password" placeholder="Enter Password">
    <button type="submit" name="submit" value="submit">Register</button>
</form>