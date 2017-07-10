<?php
$title = 'Home';
include "login/partials/pagehead.php";
?>
</head>
<body>
    <div class="container">

<?php
    if (isset($_SESSION['username'])){

        echo '<div class="jumbotron text-center"><h1>Hi, '.$_SESSION['username'].'!</h1>
        <p>Click on your username in the top right corner to expose menu options</p></div>
        <div class="col-lg-2"></div><div class="col-lg-8">
        <h2>Menu Items:</h2>

        <p><b><em>Edit Profile</em></b> - Edit your own user profile information including your name, contact info, avatar, etc</p>

        <p><b><em>Account Settings</em></b> - Change your email address and/or password</p>';

        if ((isset($_SESSION['admin'])) && $_SESSION['admin'] == true) {

            echo '<p><b><em>Verify/Delete Users</em></b> - Admin mass verify or delete new user requests</p>';
        }

        if ((isset($_SESSION['superadmin'])) && $_SESSION['superadmin'] == true) {

            echo '<p><b><em>Edit Site Config</em></b> - Superadmin edit site configuration in one page</p>';
        }

    } else {

        echo '<div class="jumbotron text-center"><h1 class="display-1">Homepage</h1>
        <small>This is your homepage. You are currently signed out.</small><br><br>
        <p>You can sign in or create a new account by clicking "Sign In" in the top right corner!</p>';
    }
      echo '</div><div class="col-lg-2"></div>';

?>

    </div>
</body>
</html>