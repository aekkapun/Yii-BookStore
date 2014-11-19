<?php
// ta https://stackoverflow.com/questions/19751354/how-to-import-sql-file-in-mysql-database-using-php
// Name of the file
$filename = '../u944640367_catal.sql';
// MySQL host
$mysql_host = 'mysql.hostinger.com.ua';
// MySQL username
$mysql_username = 'u944640367_auser';
// MySQL password
$mysql_password = 'qwerty12345';
// Database name
$mysql_database = 'u944640367_catal';

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

// Add this line to the current segment
    $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';')
    {
        // Perform the query
        mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
}
echo "Tables imported successfully";