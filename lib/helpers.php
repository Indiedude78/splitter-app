<?php
session_start(); //Starting a new sesion
require_once(__DIR__ . "/db.php");

function generate_random_number($num_len)
{
    //will generate a random number of the given length
    $rand_num = str_pad(rand(0, pow(10, $num_len) - 1), $num_len, '0', STR_PAD_LEFT); //Will allow leading 0
    return $rand_num;
}
