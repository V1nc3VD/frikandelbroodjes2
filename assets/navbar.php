<nav class="navbar navbar-dark navbar-expand-lg fixed-top navbar-custom">
    <div class="container"><a class="navbar-brand" href="../index.php?content=home">Frikandelbroodjes</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarResponsive"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php
            session_start();
            $adminlinks = "";
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                print('
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../index.php?content=register">Sign Up</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../index.php?content=login">Log In</a></li>
                </ul>');
            } else {
                //checkt of de gebruiker een admin of superadmin is
                if ($_SESSION["isstaff"] == true)
                {
                    $adminlinks = '<a class="dropdown-item" href="./index.php?content=panel">Administratie</a>';
                }
                print('<div class="dropdown ml-auto">                    
                    <a href="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                    'Welkom, ' . $_SESSION["username"] .
                    '<img src="./img/dropdownicon.png" alt="">' .

                    '</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./index.php?content=panel">Profiel en berichten</a>'
                    . $adminlinks .
                    '<a class="dropdown-item" href="./phpscripts/logout.php">Uitloggen</a>
                        <hr>
                        <b class="ml-3" >'. $_SESSION["userrole"] . '</b>
                        
                    </div>
                </div>
                
                ');
            }
            ?>
        </div>
    </div>
</nav>