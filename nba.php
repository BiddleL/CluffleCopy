<?php
session_start();
date_default_timezone_set("UTC");
$request=$_REQUEST;

/*
require_once("classes/dbinterface.inc.php");
require_once("classes/tracking.inc.php");
global $db;
$db=new dbinterface();
$tracking = new tracking();
$tracking->saveEverything();
*/

global $useragent;
$useragent="Cluffle";

//$_SESSION["active"] = !loggedin() ? false : $_SESSION["active"];
$_SESSION["chapter"]= isset($_SESSION["chapter"]) ? $_SESSION["chapter"] : 1;
$_SESSION["chapterdata"]= isset($_SESSION["chapterdata"]) ? $_SESSION["chapterdata"] : array();
$_SESSION["chapterbuffer"]= isset($_SESSION["chapterbuffer"]) ? $_SESSION["chapterbuffer"] : array();
$_SESSION["before"]= isset($_SESSION["before"]) ? $_SESSION["before"] : "";
$_SESSION["after"]= isset($_SESSION["after"]) ? $_SESSION["after"] : "";
$_SESSION["count"]= isset($_SESSION["count"]) ? $_SESSION["count"] : 0;
$_SESSION["page"]= isset($_SESSION["page"]) ? $_SESSION["page"] : 1;
$_SESSION["query"]= isset($_SESSION["query"]) ? $_SESSION["query"] : "";
$_SESSION["action"]= isset($_SESSION["action"]) ? $_SESSION["action"] : "";


$request["action"] = isset($request["action"]) ? $request["action"] : "";
switch ($request["action"]) {
	case "login":
		login($request["username"],$request["password"]);
		break;
	case "logout":
		session_destroy();
		header("Location: index.php");
		break;
	case "groups":
		groups($request);
		break;
	default:
		if (!isset($_REQUEST["q"]) || $_REQUEST["q"]=="") {
			frontpage();
		} else {
			search($_REQUEST);
		}
		break;
}

function frontpage() {
	global $useragent;
	
	/*if (loggedin()) {
		$header='<div id="navbarmenu">
					<div id="navbarmenuicon"></div>
					<div id="navbarmenunotification"></div>
					<div id="navbarmenuadd"></div>
					<div id="navbarmenuprofile" tabindex="1">
						<a href="index.php?action=logout" id="navbarlogout">
							Logout
						</a>
					</div>
				</div>
				<div id="navbarlinks">
					<a target=_blank href="http://www.reddit.com/u/'.$_SESSION["username"].'">+'.$_SESSION["username"].'</a>
					<a href="nba.html">NBA Stream</a>
					<a href="#">Images</a>
				</div>';
	} else {
		$header='<div id="navbarmenu">
				<div id="navbarmenuicon"></div>
				<label for="logincheckbox" id="navbarmenubutton">Sign In</label>
				<input type="checkbox" id="logincheckbox" value="1" style="display:none;">
				<div id="navbarlogin">
					<form method="post">
						<input type="hidden" name="action" value="login">
						<input type="text" name="username" placeholder="User">
						<input type="password" name="password" placeholder="Password">
						<button id="loginbutton" type="submit">Sign In</button>
					</form>
				</div>
				</div>
				<div id="navbarlinks">
					<a href="http://www.reddit.com/u/Lutan" target="_blank">+You</a>
					<a href="nba.html">NBA Stream</a>
					<a href="#">Images</a>
				</div>';
	}*/
	
	$header='<div id="navbarmenu">
				<div id="navbarmenuicon"></div>
				<div id="navbarmenubutton">Sign In</div>
				</div>
				<div id="navbarlinks">
					<a href="http://www.reddit.com/u/Lutan" target="_blank">+You</a>
					<a href="nba.html">NBA Stream</a>
					<a href="#">Images</a>
				</div>';
	
	echo '<!DOCTYPE HTML>
<head>
<meta charset="utf-8">
<title>Cluffle</title>
<link rel="shortcut icon" href="gfx/faviconsmall.png" />
<style>';
require("css/nba.css");
echo '</style>
<script>';
require("js/jquery-2.1.1.min.js");
echo '</script>
<script>';
require("js/script.js");
echo '</script>
<style>
body {
	position:absolute;
	top:0;
	left:0;
	right:0;
	bottom:0;
	background-color:white;
	padding:0;
	margin:0;
	min-width:980px;
}
</style>
</head>

<body>
<div id="help" class="popup" style="display:none;">
	<h2>Help</h2>
	<div class="closebutton">Close</div>
	<p>
		
	</p>
</div>
<div id="opensource" class="popup" style="display:none;">
	<h2>Open source</h2>
	<div class="closebutton">Close</div>
	<p>
		The whole project is completely open source and available at <a href="http://www.github.com/Lutron/Cluffle">Github</a>.<br>
		If you want to help improving the messy project (it\'s based on PHP), feel free to make a pull request. I\'ll also list everyone helping here.
	</p>
</div>
<div id="about" class="popup" style="display:none;">
	<h2>About</h2>
	<div class="closebutton">Close</div>
	<p>Want to use Reddit without people knowing you are using it? This page provides you with the known Google interface for your Reddit needs.<br><br>
	
	Browse a subreddit by entering it into the box ("/r/internetisbeautiful" or "/r/web_design").<br>
	Search for a term as you would on reddit.<br>
	Press the "I\'m feeling lucky" - button to browse a random subreddit.<br><br>
	
	Cluffle is your stealth mode to avoid things like suspicious coworkers and classmates.<br>
	Reddit is blocked at work? Cluffle also works as a proxy.<br>
	You want the usual Reddit interface while using the proxy? Just go to <a href="http://proxy.cluffle.com" target=_blank>proxy.cluffle.com</a>.
	</p>
</div>
<div class="noselect" id="navbar">
	'.$header.'
</div>
<div id="content">
	<div id="contentlogo">
	</div>
	<form action="index.php">
		<input type="hidden" name="enableproxy" value="true">
		<input type="text" id="contentinput" autofocus name="q" autocomplete="off">
		<div class="noselect" id="contentbuttons">
			<button type=submit id="contentbutton1"></button>
			<a id="contentbutton2" href="index.php?q=/r/random&enableproxy=true"></a>
		</div>
	</form>
</div>
<div class="noselect" id="footer">
	<a div="opensource">Help</a>
	<a div="opensource">Open Source</a>
	<a div="about">About</a>

	<span id="footerright">
		<a class="pullright" href="http://www.reddit.com/u/Lutan" target="_blank">Contact</a>
		<a class="pullright" href="http://proxy.cluffle.com" target=_blank>Proxypage</a>
	</span>
</div>
</body>';	
	
?>
