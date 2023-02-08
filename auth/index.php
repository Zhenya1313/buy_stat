<?require ($_SERVER["DOCUMENT_ROOT"].'/templates/header.php'); ?>
    <form id="registerForm" class="form-register" style="max-width: 400px" method="POST">
        <h2>Registration</h2>
        <div style="display: none" id="error" role="alert" class="alert-danger alert"></div>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <input type="text" name="email" class="form-control" placeholder="Email" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a href="login.php" class="btn btn-lg btn-primary">Log in</a>
    </form>
<?require ($_SERVER["DOCUMENT_ROOT"].'/templates/footer.php');?>