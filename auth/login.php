<?require ($_SERVER["DOCUMENT_ROOT"].'/templates/header.php'); ?>
    <form id="logInForm" class="form-signin form-register" method="POST">
        <h2>Log in</h2>
        <div style="display: none" id="error" class="alert-danger alert" role="alert"></div>
        <input type="text" name="email" class="form-control" placeholder="Email" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
        <a href="index.php" class="btn btn-lg btn-primary">Register</a>
    </form>
<?require ($_SERVER["DOCUMENT_ROOT"].'/templates/footer.php');?>
