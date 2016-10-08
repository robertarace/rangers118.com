<?php
   $dbhost = 'localhost';
   $dbuser = 'ebbhar5_robert1';
   $dbpass = 'v2premier';

   $conn = mysql_connect($dbhost, $dbuser, $dbpass);

   if(! $conn )
   {
      die('Could not connect: ' . mysql_error());
   }

   $sql = 'SELECT student_name, student_address FROM employee';
   mysql_select_db('ebbhar5_rangers_form');
   $retval = mysql_query( $sql, $conn );

   if(! $retval )
   {
      die('Could not get data: ' . mysql_error());
   }

   while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
   {
      echo "Student Name : {$row['student_name']} <br> ".
         "Student Address : {$row['student_address']} <br> ".
         "--------------------------------<br>";
   }

   echo "Fetched data successfully\n";

   mysql_close($conn);
?>
