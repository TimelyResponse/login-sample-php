<?php
    /*** MOVE THIS TO /login FOLDER AFTER EDITING ***/
    //DATABASE CONNECTION VARIABLES
    $host = "localhost"; // Host name
    $username = "root"; // Mysql username
    $password = ""; // Mysql password
    $db_name = "loginmanual1"; // Database name

    $tbl_prefix = ""; //Prefix for all database tables
    /*** DO NOT EDIT BELOW THIS LINE ***/
    $tbl_members = $tbl_prefix."members";
    $tbl_memberinfo = $tbl_prefix."memberInfo";
    $tbl_admins = $tbl_prefix."admins";
    $tbl_attempts = $tbl_prefix."loginAttempts";
    $tbl_deleted = $tbl_prefix."deletedMembers";
    $tbl_tokens = $tbl_prefix."tokens";
    $tbl_cookies = $tbl_prefix."cookies";
    $tbl_appConfig = $tbl_prefix."appConfig";
    $tbl_mailLog = $tbl_prefix."mailLog";