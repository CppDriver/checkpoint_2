<?php

use App\Models\User;

UserExists::userExists();

class UserExists
{
    static public function userExists()
    {
        $username = $_REQUEST["username"];
        $exists = User::getOneByUsername($username);
        $output = "";
        if ($exists) {
            $output = "Username is already used.";
        } else {
            $output = "You can use this username.";
        }
        echo $output;
    }
}
?>