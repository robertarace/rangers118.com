<html>

   <head>
      <title>Add New Record in MySQL Database</title>
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/hover.css" rel="stylesheet" media="all">
   </head>

   <body>
      <?php
         if(isset($_POST['add']))
         {
            $dbhost = 'localhost';
            $dbuser = 'ebbhar5_robert1';
            $dbpass = 'v2premier';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);

            if(! $conn )
            {
               die('Could not connect: ' . mysql_error());
            }

            if(! get_magic_quotes_gpc() )
            {
               $student_name = addslashes ($_POST['student_name']);
               $student_address = addslashes ($_POST['student_address']);
               $level = addslashes ($_POST['level']);
            }
            else
            {
               $student_name = $_POST['student_name'];
               $student_address = $_POST['student_address'];
               $level = $_POST['level'];
            }

            $level = $_POST['level'];

            $sql = "INSERT INTO employee ". "(student_name,student_address, level, join_date) ". "VALUES('$student_name','$student_address',$level, NOW())";

            mysql_select_db('ebbhar5_rangers_form');
            $retval = mysql_query( $sql, $conn );

            if(! $retval )
            {
               die('Could not enter data: ' . mysql_error());
            }

            echo "Entered data successfully\n";

            mysql_close($conn);
         }
         else
         {
            ?>
<div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <form method="post" action="<?php $_PHP_SELF ?>" style="width:400px; margin:auto; ">
              <div class="form-group">
                <label>Student Name</label>
                <input name="student_name" type="text" id="student_name" class="form-control" placeholder="Full Name">
              </div>
              <div class="form-group">
                <label>Student Address</label>
                <input name="student_address" type="text" id="student_address" class="form-control" placeholder="Address">
              </div>
              <div class="form-group">
                <label>Student Level</label>
                <input name="level" type="text" id="level" class="form-control" placeholder="Level">
              </div>
              <button name="add" type="submit" id="add" value="Add Student" class="btn btn-default">Add Student</button>
            </form>
          </div>
        </div>

            <?php
         }
      ?>

   </body>
</html>
