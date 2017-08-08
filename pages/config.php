<?php
/*
 * Filename: config.php
 * Author: Matthew Testerman
 * Description: This file contains login credintials to the mysql database.
 * Date: 20-09-2016
 */


$user = 'root';
$password = 'root';
$db = 'scts';
$host = 'localhost';
$port = 8889;

$max_login_attempts = 5; //Limits multiple login attempts.
$dos_max_page_loads = 10000; //Maximum ammount of page views per day (prevent a DOS attack.)
