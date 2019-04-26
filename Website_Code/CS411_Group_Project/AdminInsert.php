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
	
	$sql = "INSERT INTO Courses VALUES ('$year', '$term', '$yt', '$sub', '$num', '$title', '$A1', '$A2', '$A3', '$B1', '$B2', '$B3' ,'$C1' ,'$C2', '$C3', '$D1', '$D2', '$D3', '$F', '$W', '$inst')";
	
	$result = $mysqli->query($sql);
	
	if($result){
	    header("Refresh:3;url=AdminInsert.html");
        echo 'Successful Insertion.';
        $result->free();
	}
	else{
	    header("Refresh:3;url=AdminInsert.html");
	    echo 'Insertion Failed.';
	}
		
	$mysqli->close();
?>
