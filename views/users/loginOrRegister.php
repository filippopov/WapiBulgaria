<?php
    /** @var \FPopov\Core\ViewInterface $this */
?>
<div class="container loginContainer">

    <h1>Online Library</h1>
    <p><strong>All Your Favorite Books</strong></p>

    <form method="post" id="logInForm" action="<?php echo $this->uri('users', 'loginPost')?>">
        <p>Log In using your username and password</p>
        <fieldset class="form-group">
            <input class="form-control" name="username" id="inputUsername" placeholder="Username" type="text">
        </fieldset>
        <fieldset class="form-group">
            <input class="form-control" name="password" id="inputPassword" placeholder="Password" type="password">
        </fieldset>
        <fieldset class="form-group">
            <input name="login" type="submit" class="btn btn-success" value="Log In!">
        </fieldset>
        <p><a href="#" class="toggleForms">Sign Up</a></p>
    </form>

    <form  method="post" id="signUpForm" action="<?php echo $this->uri('users', 'registerPost') ?>">
        <p>Interested? Sign Up now.</p>
        <fieldset class="form-group">
            <input class="form-control" name="username" id="inputUsername" placeholder="Username" type="text">
        </fieldset>
        <fieldset class="form-group">
            <input class="form-control" name="password" id="inputPassword" placeholder="Password" type="password">
        </fieldset>
        <fieldset class="form-group">
            <input name="register" type="submit" class="btn btn-success" value="Sign Up!">
        </fieldset>
        <p><a href="#" class="toggleForms">Log In</a></p>
    </form>
</div>