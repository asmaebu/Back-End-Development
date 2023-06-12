<?php

$link = mysqli_connect("localhost", "root", "root", "School");
// Check connection
if ($link === false) {
    die("Connection failed: ");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
          overflow: hidden;
          background-color: #333;
        }

        .navbar a {
          float: left;
          font-size: 16px;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        .dropdown {
          float: left;
          overflow: hidden;
        }

        .dropdown .dropbtn {
          font-size: 16px;
          border: none;
          outline: none;
          color: white;
          padding: 14px 16px;
          background-color: inherit;
          font-family: inherit;
          margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
          background-color: red;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          float: none;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          text-align: left;
        }

        .dropdown-content a:hover {
          background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }
        </style>
    </head>
    <body>
    <div class="navbar">
            <a href="index.html">Home</a>
            <div class="dropdown">
                <button class="dropbtn">View
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="ViewStudent.php">Student</a>
                    <a href="ViewParent.php">Parent</a>
                    <a href="ViewTeacher.php">Teacher</a>
                    <a href="ViewClass.php">Class</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Add
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="AddStudent.php">Student</a>
                    <a href="AddParent.php">Parent</a>
                    <a href="AddTeacher.php">Teacher</a>
                    <a href="AddClass.php">Class</a>
                </div>
            </div>
            <a href="Contact.html">Contact Us</a>
        </div>

        <div>
            <br>
            <form method="post" action="AddStudent.php">

              <label for="Class">Student Name:</label>
              <input type="text" name="studentName">
              <br><br>
              <label for="studentName">Student Address:</label>
              <input type="text" name="studentAddress">
              <br><br>
              <label for="studentName">Student Medical Info:</label>
              <input type="text" name="studentMedicalInfo">
              <br><br>
              <label for="studentName">Student DOB:</label>
              <input type="text" name="studentDOB">
              <br><br>
              Parent ID: 
              <select name="parentID"> 
                        <?php
                        $parents = mysqli_query ($link, "SELECT parentID FROM Parents");
                        if ($parents == false) {
                          echo "hello";
                         };
                        while ($row = $parents->fetch_assoc()) {
                            echo "<option value='{$row['parentID']}'>{$row['parentID']} : </option>";
                        }
                        ?>
              </select>      
              Class ID: 
              <select name="classID"> 
                        <?php
                        $classes = mysqli_query ($link, "SELECT classID , className FROM Class");
                        if ($classes == false) {
                          echo "hello";
                         };
                        while ($row = $classes->fetch_assoc()) {
                            echo "<option value='{$row['classID']}'>{$row['classID']} : {$row['className']} </option>";
                        }
                        ?>
              </select>     
    			<br><br>

    			<input type="submit" name="submit">

    		</form>
        </div>
    </body>
</html>

<?php

//mysqli_connect() function establishes a connection with MySQL server and returns the connection as an object.
/*
   $host = "localhost";
   $username  = "root";
   $passwd = " ";
   $dbname = "school";
*/


/*
The isset() function checks whether a variable
 is set, which means that it has to be declared 
 and is not NULL. 
 This function returns true if the variable
  exists and is not NULL, 
  otherwise it returns false.
*/
if (isset($_POST['submit'])) {

    $sname = $_POST['studentName'];
    $saddress = $_POST['studentAddress'];
    $smed = $_POST['studentMedicalInfo'];
    $sdob = $_POST['studentDOB'];
    $pid = $_POST['parentID'];
    $cid = $_POST['classID'];
  
/*
mysqli_query() function accepts a string value
representing a query as one of the parameters
and, executes/performs the given query 
on the database
*/
    $sql = "INSERT INTO `Pupils` (`pupilID`, `pupilName`, `pupilAddress`, `pupilMedicalInfo`, `pupilDOB`, `parentID`,`classID` ) VALUES (NULL, ('$sname'), ('$smed'), ('$saddress'), ('$sdob'), ('$pid'), ('$cid'))";
    if (mysqli_query($link, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error adding record ";
    }

}

?>