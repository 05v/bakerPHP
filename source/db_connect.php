<?php

/**
 * Dit bestand bevat de databaseverbinding.
 *
 * @category   Database
 * @package    Connection
 * @author     Vlad Verheij
 */

$servername = "mariadb";
$username = "db_user";
$password = "mijn_p@ss#";
$dbname = "baking";

// Maak de verbinding
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
