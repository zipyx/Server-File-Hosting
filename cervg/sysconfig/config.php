<?php

/**
 * Configuration for database connection
 *
 */

$host       = "localhost";
$username   = "phano";
$password   = "Pacific1!";
$dbname     = "server";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
