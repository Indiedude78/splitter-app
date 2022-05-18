<?php
session_start(); //Starting a new sesion
require_once(__DIR__ . "/db.php");

function generate_random_number($num_len)
{
    //will generate a random number of the given length
    $rand_num = str_pad(rand(0, pow(10, $num_len) - 1), $num_len, '0', STR_PAD_LEFT); //Will allow leading 0
    return $rand_num;
}
function set_sess_var($sess_name, $db_var)
{
    $_SESSION[$sess_name] = $db_var;
}

function get_user_id()
{
    return $_SESSION["id"];
}

function get_user_fullname()
{
    return $_SESSION["fname"] . " " . $_SESSION["lname"];
}

function get_username()
{
    return $_SESSION["username"];
}

function get_email()
{
    return $_SESSION["email"];
}

function is_logged_in()
{
    if (isset($_SESSION["id"]) && isset($_SESSION["username"]) && isset($_SESSION["email"])) {
        return true;
    } else {
        return false;
    }
}
