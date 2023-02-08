<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <?if(Main::isAuth()){?>
        <a class="navbar-brand" href="/auth/logout.php">Log Out</a>
        <?} else {?>
        <a class="navbar-brand" href="/auth/">Log In</a>
        <?}?>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <?if(Main::isAuth()){?>
                    <li class="nav-item">
                        <a class="nav-link" href="/page_a">Page A</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/page_b">Page B</a>
                    </li>
                    <?if(Main::isAdmin()){?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/reports/">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/stat/">Stat</a>
                    </li>
                    <?}?>
                <?}?>
            </ul>
        </div>
    </div>
</nav>
