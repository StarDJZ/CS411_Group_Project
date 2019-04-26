<?php 
	$year = $_GET["year"];
	$term = $_GET["term"];
	$yt = $_GET["yt"];
	$sub = $_GET["sub"];
	$num = $_GET["num"];
	$title = $_GET["title"];
	$A1 = $_GET["A+"];
	$A2 = $_GET["A"];
	$A3 = $_GET["A-"];
	$B1 = $_GET["B+"];
	$B2 = $_GET["B"];
	$B3 = $_GET["B-"];
	$C1 = $_GET["C+"];
	$C2 = $_GET["C"];
	$C3 = $_GET["C-"];
	$D1 = $_GET["D+"];
	$D2 = $_GET["D"];
	$D3 = $_GET["D-"];
	$F = $_GET["F"];
	$W = $_GET["W"];
	$inst = $_GET["inst"];
	
	$mysqli = new mysqli("localhost", "daojiz2_user1", "zhangdj0313", "daojiz2_grade");
	
	if($mysqli->connect_errno){
	    echo "Failed To connect to MySQL";
	}
	
	$sql = "UPDATE Courses SET `A+` = '$A1', A = '$A2', `A-` = '$A3', `B+` = '$B1', B = '$B2', `B-` = '$B3', `C+` = '$C1', C = '$C2', `C-` = '$C3', `D+` = '$D1', D = '$D2', `D-` = '$D3', F = '$F', W = '$W' WHERE Year = '$year' AND Term = '$term' AND Subject = '$sub' AND Number = '$num' AND `Primary Instructor` = '$inst'";
	
	$result = $mysqli->query($sql);
	
	if($result){
	    header("Refresh:3;url=AdminUpdate.html");
        echo 'Success Update.';
        $result->free();
	}
	else{
	    header("Refresh:3;url=AdminUpdate.html");
	    echo 'Update Failed.';
	}
		
	$mysqli->close();
?>