<?php 
	$uid = $_GET["UserId"];
	$pw = $_GET["Password"];
	
	$mysqli = new mysqli("localhost", "daojiz2_user1", "zhangdj0313", "daojiz2_grade");
	
	if($mysqli->connect_errno){
	    echo "Failed To connect to MySQL";
	}
	
	$sql = "SELECT * FROM Users WHERE UserName = '$uid' AND Password = '$pw'";
	
	$result = $mysqli->query($sql);
	
	$num_rows = $result->num_rows;
	
	if($num_rows > 0){
	    $result->free();
	    header("Refresh:3;url=rating.html");
	    echo 'Successful Login. You\'ll be redirected in about 3 secs. If not, click <a href="rating.html">Menu</a>.';
	}
	else{
	    $result->free();
	    header("Refresh:3;url=login.html");
	    echo "The password you have entered is incorrect";
	}
	
	$mysqli->close();
	
	print("<P> To be continued");
?>