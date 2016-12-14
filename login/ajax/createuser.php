<?php
require '../autoload.php';

//Pull username, generate new ID and hash password
$newid = uniqid(rand(), false);
$newuser = $_POST['newuser'];
$newemail = $_POST['email'];
$pw1 = $_POST['password1'];
$pw2 = $_POST['password2'];
$userarr = Array(Array('id'=>$newid, 'username'=>$newuser, 'email'=>$newemail, 'pw'=>$pw1));

$conf = new GlobalConf;

$pwresp = PasswordPolicy::validate($pw1, $pw2, $conf->pwpolicy, $conf->pwminlength);

if (!filter_var($newemail, FILTER_VALIDATE_EMAIL) == true) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Must provide a valid email address</div><div id="returnVal" style="display:none;">false</div>';

} else {
    //Validation passed
    if (isset($_POST['newuser']) && !empty(str_replace(' ', '', $_POST['newuser'])) && $pwresp['status'] == 1) {

        $a = new NewUser;

        $response = $a->createUser($userarr);

        //Success
        if ($response == 1) {

            echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'. $conf->signupthanks .'</div><div id="returnVal" style="display:none;">true</div><form action="'.$conf->base_url.'/login/index.php"><button class="btn btn-success">Login</button></form><div id="returnVal" style="display:none;">true</div>';

            try { //Send verification email
                $m = new MailSender;

                $m->sendMail($userarr, 'Verify');

            } catch (Exception $e) {

                echo $e->getMessage();
            }

        } else {
            //DB Failure
            MiscFunctions::mySqlErrors($response);

        }
    } else {
        //Password Failure
        echo $pwresp['message'];
    }
};
