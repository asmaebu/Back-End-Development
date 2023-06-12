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
            <form method="post" action="AddTeacher.php">

    			<label for="teacherName">Teacher Name:</label>
    			<input type="text" name="teacherName">
    			<br><br>

    			<label for="teacherDOB"> DOB:</label>
    			<input type="text" name="teacherDOB">
    			<br><br>
          
    			<label for="teacherAddress">Teacher Address:</label>
    			<input type="text" name="teacherAddress">
    			<br><br>
          
    			<label for="teacherTelephone">Teacher Telephone:</label>
    			<input type="text" name="teacherTelephone">
    			<br><br>

          <label for="teacherEmail">Teacher Email:</label>
    			<input type="text" name="teacherEmail">
    			<br><br>

    			<input type="submit" name="submit">

    		</form>
        </div>
    </body>
</html>



<?php



$link = mysqli_connect("localhost", "root", "root", "School");
// Check connection
if ($link === false) {
    die("Connection failed: ");
}
/*
The isset() function checks whether a variable
 is set, which means that it has to be declared 
 and is not NULL. 
 This function returns true if the variable
  exists and is not NULL, 
  otherwise it returns false.
*/
if (isset($_POST['submit'])) {

    $tname = $_POST['teacherName'];
    $tdob = $_POST['teacherDOB'];
    $taddress = $_POST['teacherAddress'];
    $ttelephone = $_POST['teacherTelephone'];
    $temail = $_POST['teacherEmail'];
  
/*
mysqli_query() function accepts a string value
representing a query as one of the parameters
and, executes/performs the given query 
on the database
*/
    $sql = "INSERT INTO `Teachers` (`teacherID`, `teacherName`, `teacherDOB`, `teacherAddress`, `teacherTelephone`, `teacherEmail`) VALUES (NULL, ('$tname'), ('$tdob'), ('$taddress'), ('$ttelephone'), ('$temail'))";
    if (mysqli_query($link, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error adding record ";
    }

}

?>