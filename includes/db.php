<?php
    $db['db_host'] = "localhost";
    $db['db_user'] = "root";
    $db['db_pass'] = "";
    $db['db_name'] = "cms";

    foreach($db as $key => $value){
        define(strtoupper($key), $value);
    }

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if($connection){
        //echo "we are connected";
    }
/////////////////// UN COMMENT THIS TO USE ON SERVER //////////////////////
    // $db['db_host'] = "localhost";
    // $db['db_user'] = "blog_cms_user";
    // $db['db_pass'] = "<<areorion>>";
    // $db['db_name'] = "blog_cms";

    // foreach($db as $key => $value){
    //     define(strtoupper($key), $value);
    // }

    // $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    // if($connection){
    //     //echo "we are connected";
    // } else {
    //     echo "we are Not connected";
    // }


?>