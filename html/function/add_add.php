<?php
	// $query1 = mysqli_query($mysqli, "SELECT * FROM filmtitles");
	// $databaseHost = 'localhost';
	// $databaseName = 'tupt_db';
	// $databaseUsername = 'root';
	// $databasePassword = '';
	 
	// $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	// mysqli_select_db($mysqli,$databaseName);

    require("../../php/config.php");

	if(isset($_POST['submit'])) {    
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $course_id = $_POST['course_id'];
    $gender = $_POST['gender'];
        
    // checking empty fields
    if(empty($student_id) || empty($name) || empty($course_id) || empty($gender)) {                
        if(empty($student_id)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($name)) {
            echo "<font color='red'>Note field is empty.</font><br/>";
        }

         if(empty($course_id)) {
            echo "<font color='red'>Note field is empty.</font><br/>";
        }

         if(empty($gender)) {
            echo "<font color='red'>Note field is empty.</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $query = "INSERT INTO student(STUDENT_ID,NAME,GENDER,COURSE_COURSE_ID) VALUES(?,?,?,?)";
        //'$ActorFullName','$ActorNotes'

       // $result = mysqli_query($mysqli, );

        $result = mysqli_prepare($mysqli,$query);
        $result->bind_param("ssss",$student_id,$name,$gender,$course_id) or die(mysqli_error($mysqli));
        $result->execute();
        $result->close();
        
        //display success message
        // echo "<center class='successsmg'>";
        // echo "<font color='green'>Data added successfully.";
        // echo "<br/><a href='add.php'>Go to Database</a>";
        header("Location: add.php");
        echo "</center>";
    }
}
?>