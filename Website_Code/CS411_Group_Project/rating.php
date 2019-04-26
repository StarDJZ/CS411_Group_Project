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
	<div aria-labelledby="themes" class="dropdown-menu"><a class="dropdown-item" href="http://daojiz2.web.illinois.edu/search.html">Subject Search</a> <a class="dropdown-item" href="http://daojiz2.web.illinois.edu/searchGenEd.html">GenEd Search</a> <a class="dropdown-item" href="http://daojiz2.web.illinois.edu/searchInfo.html">Advanced Search</a></div>
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
	$ras = $_GET["ras"];
	
	$mysqli = new mysqli("localhost", "daojiz2_user1", "zhangdj0313", "daojiz2_grade");
	
	if($mysqli->connect_errno){
	    echo "Failed To connect to MySQL";
	}
	
	$sql = "INSERT INTO Rating VALUES ('$sub', '$num', '$ras', now())";
	
	$result = $mysqli->query($sql);
	
	if($result){
        echo 'Success Rating, click <a href="index.html">here</a> to logout.';
        $result->free();
	}
	
	$mysqli->close();
	
	print("<P> To be continued");
?>

</div>

</body>
</html>