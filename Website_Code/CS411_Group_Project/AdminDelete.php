<?php
    $year = $_GET["year"];
    $term = $_GET["term"];
    $sub = $_GET["sub"];
    $num = $_GET["num"];
    $inst = $_GET["inst"];
    
    $mysqli = new mysqli("localhost", "daojiz2_user1", "zhangdj0313", "daojiz2_grade");
	
	if($mysqli->connect_errno){
	    echo "Failed To connect to MySQL";
	}
	
	$sql = "DELETE FROM Courses WHERE Year = '$year' AND Term = '$term' AND Subject = '$sub' AND Number = '$num' AND `Primary Instructor` = '$inst'";
	
	$result = $mysqli->query($sql);
	
	if($result){
	    header("Refresh:3;url=AdminDelete.html");
        echo 'Successful Deletion.';
        $result->free();
	}
	else{
	    header("Refresh:3;url=AdminDelete.html");
	    echo 'Deletion Failed.';
	}
		
	$mysqli->close();
?>