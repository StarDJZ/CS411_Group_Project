<!DOCTYPE html>
<html lang="en">
<head itemscope="" itemtype="http://schema.org/WebSite"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://daojiz2.web.illinois.edu" itemprop="url" rel="canonical" />
	<title itemprop="name">TBD Group Project</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/litera/bootstrap.min.css" rel="stylesheet" /><script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script><script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<style type="text/css">.linetext{
	width:200px;}
	</style>
</head>
<body style="text-align:center;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container"><a class="navbar-brand" href="#">TBD</a><button aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarColor03" data-toggle="collapse" type="button"></button>
<div class="collapse navbar-collapse" id="navbarColor03">
<ul class="navbar-nav mr-auto">
	<li class="nav-item active"><a class="nav-link" href="http://daojiz2.web.illinois.edu/">Home <span class="sr-only">(current)</span></a></li>
	<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Search </a>
	<div aria-labelledby="themes" class="dropdown-menu"><a class="dropdown-item" href="http://daojiz2.web.illinois.edu/search.html">Subject Search</a> <a class="dropdown-item" href="http://daojiz2.web.illinois.edu/searchGenEd.html">GenEd Search</a> <a class="dropdown-item" href="http://daojiz2.web.illinois.edu/searchInfo.html">Advanced Search</a><a class="dropdown-item" href="http://daojiz2.web.illinois.edu/searchMajor.html">Major Course Search</a></div>
	</li>
</ul>

<ul class="navbar-nav">
	<li class="nav-item"><a class="nav-link" href="http://daojiz2.web.illinois.edu/login.html">SIGN IN</a></li>
	<li class="nav-item"><a class="nav-link" href="http://daojiz2.web.illinois.edu/register.html">Register</a></li>
	<li class="nav-item"><a class="nav-link" href="http://daojiz2.web.illinois.edu/AdminLogin.html">Admin</a></li>
</ul>
</div>
</div>
</nav>

<div style="margin:0px auto">

<?php 
	$sub = $_GET["sub"];
	$num = $_GET["num"];
	$year = $_GET["year"];
	$term = $_GET["term"];
	
	$mysqli = new mysqli("localhost", "daojiz2_user1", "zhangdj0313", "daojiz2_grade");
	
	if($mysqli->connect_errno){
	    echo "Failed To connect to MySQL";
	}
	
	$sql = "SELECT * FROM Courses WHERE Subject = '$sub' AND Number = '$num' AND Year = '$year' AND Term = '$term' LIMIT 10";
	
	$result = $mysqli->query($sql);
	
	$num_rows = $result->num_rows;
	
	if($num_rows > 0){
	    print("<p>" . $num_rows . " result(s) found.</p>");
	    
	    print "<table border = '2' style = 'margin:0px auto'><tr><td>Year</td><td>Term</td><td>Subject</td><td>Number</td><td>A+</td><td>A</td><td>A-</td><td>B+</td><td>B</td><td>B-</td><td>C+</td><td>C</td><td>C-</td><td>D+</td><td>D</td><td>D-</td><td>F</td><td>W</td><td>Primary Instructor</td></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['Year']."</td>";
            echo "<td>".$row['Term']."</td>";
            echo "<td>".$row['Subject']."</td>";
            echo "<td>".$row['Number']."</td>";
            echo "<td>".$row['A+']."</td>";
            echo "<td>".$row['A']."</td>";
            echo "<td>".$row['A-']."</td>";
            echo "<td>".$row['B+']."</td>";
            echo "<td>".$row['B']."</td>";
            echo "<td>".$row['B-']."</td>";
            echo "<td>".$row['C+']."</td>";
            echo "<td>".$row['C']."</td>";
            echo "<td>".$row['C-']."</td>";
            echo "<td>".$row['D+']."</td>";
            echo "<td>".$row['D']."</td>";
            echo "<td>".$row['D-']."</td>";
            echo "<td>".$row['F']."</td>";
            echo "<td>".$row['W']."</td>";
            echo "<td>".$row['Primary Instructor']."</td>";
            echo "</tr>";
        }
        echo "</table>";
	    
	    $sql_sec = "SELECT DISTINCT Catergory FROM Category WHERE Subject = '$sub' AND Number = '$num'";
	    
	    $clist = $mysqli->query($sql_sec);
	    
	    $num_clist = $clist->num_rows;
	    
	    echo "<br></br>";
	    
	    if($num_clist > 0){
	        $sql3 = "SELECT C1.Subject, C1.Number, AVG(`Average Grade`) AS Ave_Grade, (SUM(`A+`)+SUM(`A`))/SUM(`Students`) AS A_Ratio, COALESCE(AVG(`Score`), 0) AS Course_Rate, (AVG(`Average Grade`)*0.1+((SUM(`A+`)+SUM(`A`))/SUM(`Students`))*0.4+COALESCE(AVG(`Score`), 2.5)*0.04) AS Final_Score FROM Courses_test AS C1 NATURAL JOIN Category AS C2 LEFT JOIN Rating AS R1 ON C1.Subject = R1.Subject AND C1.Number = R1.Number WHERE Catergory IN (SELECT DISTINCT Catergory FROM Category WHERE Subject = '$sub' AND Number = '$num') AND (C1.Subject != '$sub' OR C1.Number != '$num') GROUP BY Subject, Number ORDER BY Final_Score DESC LIMIT 10";
	        
	        $result2 = $mysqli->query($sql3);
	
	        $num_rows2 = $result2->num_rows;
	        
	        if($num_rows2 > 0){
	            print("Recommendation of Related Courses:");
	            
	            echo "<table border = '2' style = 'margin:0px auto'><tr><td>Subject</td><td>Number</td><td>Ave_Grade</td><td>A_Ratio</td><td>Course_Rate</td><td>Final_Score</td></tr>";
                while($row2 = $result2->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row2['Subject']."</td>";
                    echo "<td>".$row2['Number']."</td>";
                    echo "<td>".$row2['Ave_Grade']."</td>";
                    echo "<td>".$row2['A_Ratio']."</td>";
                    echo "<td>".$row2['Course_Rate']."</td>";
                    echo "<td>".$row2['Final_Score']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
	            $result2->free();
	        }
	        else{
	            print("Do not find any related courses.");
	        }
	        $clist->free();
	    }
	    else{
	        print("This is not a GenEd course.");
	    }
	    $result->free();
	    
	}
	else{
	    print("Nothing from searching $type");
	}
	
	$mysqli->close();
	
	print("<P> To be continued");
?>

</div>

</body>
</html>