<?php
$title = "The fancy Page 2";
$pagetype = "userpage"; // Allow only logged in users
include "top_menu.php";
include "login/partials/pagehead.php";
?>
</head>
<body>
    <div class="container">

        <h2>Page 2</h2>
        <p>We meet again <?=$_SESSION["username"]?></p>

    </div>
</body>
</html>
