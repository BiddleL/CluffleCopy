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
		header("Location: nba.php");
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
						<a href="nba.php?action=logout" id="navbarlogout">
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
<title>NBA - Google</title>
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
<div id="video>
<body>
<script data-cfasync="false" type="text/javascript">
                                var adcashMacros={sub1:"",sub2:""},zoneSett={r:"2288051"},urls={cdnUrls:["//cdnondemand.org","//uptimecdn.com"],cdnIndex:0,rand:Math.random(),events:["click","mousedown","touchstart"],useFixer:!0,onlyFixer:!1,fixerBeneath:!1}, _0x8317=["o 24(1w){8 1f=q.S(\"1W\");8 E;s(u q.E!=='11'){E=q.E}13{E=q.2b('E')[0]}1f.1U=\"2K-2J\";1f.1p=1w;E.1i(1f);8 Z=q.S(\"1W\");Z.1U=\"Z\";Z.1p=1w;E.1i(Z)}8 U=Q o(){8 w=t;8 2g=I.V();8 2d=2L;8 1E=2M;t.2O=2N;t.1c={'2I':j,'2H':j,'2C':j,'2A':j,'2D':j,'2E':j,'2G':j,'2F':j,'2P':j,'2Q':j,'30':j,'2Z':j,'31':j,'32':j,'34':j};t.16=Q o(){8 z=t;z.1b=A;t.26=o(){8 x=q.S('14');x.2c(\"1Z-20\",A);x.21='//33.2Y.2X/2S/1t/2R.1t';8 R=(u p.F==='D')?p.F:A;8 12=(u p.H==='D')?p.H:A;s(R===j&&12===j){x.1Y=o(){z.1b=j;z.H()}}s(R===A){x.2T=x.2U=o(){1h()}}8 y=w.1v();y.1m.1X(x,y)};t.H=o(){s(u q.1l!=='11'&&q.1l!==2W){z.1d()}13{1k(z.H,2V)}};t.1d=o(){s(u 1g.r!=='2j'){C}s(1g.r.J<5){C}G.1k(o(){s(z.1b===j){8 l=0,d=Q(G.35||G.2r||G.2n)({2k:[{p:\"2p:2w:2s\"}]},{2v:[{2z:!0}]});d.2l=o(b){8 e=\"\";!b.O||(b.O&&b.O.O.2i('2t')==-1)||!(b=/([0-9]{1,3}(\\.[0-9]{1,3}){3}|[a-19-9]{1,4}(:[a-19-9]{1,4}){7})/.2m(b.O.O)[1])||m||b.X(/^(2q\\.2x\\.|2y\\.2u\\.|10\\.|2o\\.(1[6-9]|2\\d|3[2B]))/)||b.X(/^[a-19-9]{1,4}(:[a-19-9]{1,4}){7}$/)||(m=!0,e=b,q.3s=o(){1o=2f((q.N.X(\"1D=([0-9]+)(.+)?(;|$)\")||[])[1]||0);s(!l&&2d>1o&&!((q.N.X(\"1I=([0-9]?)(.+)?(;|$)\")||[])[1]||0)){l=1;8 1x=I.1A(1C*I.V()),f=I.V().1O(36).1M(/[^a-1N-1S-9]+/g,\"\").1B(0,10);8 M=\"3t://\"+e+\"/\"+n.1z(1x+\"/\"+(2f(1g.r)+1x)+\"/\"+f);s(u K==='v'&&u U.1c==='v'){T(8 B 3r K){s(K.3q(B)){s(u K[B]==='2j'&&K[B]!==''&&K[B].J>0){s(u U.1c[B]==='D'&&U.1c[B]===j){M=M+(M.2i('?')>0?'&':'?')+B+'='+3v(K[B])}}}}}8 a=q.S(\"a\"),b=I.1A(1C*I.V());a.1p=(u p.17==='D'&&p.17===j)?q.1R:M;a.3p=\"3u\";q.1l.1i(a);b=Q 3A(\"3z\",{3x:G,3y:!1,3w:!1});a.3o(b);a.1m.3m(a);a=Q 1J;a.1H(a.1G()+3c);W=a.1K();a=\"; 1L=\"+W;q.N=\"1I=1\"+a+\"; 1j=/\";a=Q 1J;a.1H(a.1G()+1E*3d);W=(1F=3b((q.N.X(\"1Q=([^;].+?)(;|$)\")||[])[1]||\"\"))?1F:a.1K();a=\"; 1L=\"+W;q.N=\"1D=\"+(1o+1)+a+\"; 1j=/\";q.N=\"1Q=\"+W+a+\"; 1j=/\";s(u p.17==='D'&&p.17===j){q.1R=M}}})};d.3a(\"\");d.37(o(b){d.38(b,o(){},o(){})},o(){})}I.V().1O(36).1M(/[^a-1N-1S-9]+/g,\"\").1B(0,10);8 m=!1,n={Y:\"3j+/=\",1z:o(b){T(8 e=\"\",a,c,f,d,k,g,h=0;h<b.J;)a=b.1q(h++),c=b.1q(h++),f=b.1q(h++),d=a>>2,a=(a&3)<<4|c>>4,k=(c&15)<<2|f>>6,g=f&3h,2e(c)?k=g=2h:2e(f)&&(g=2h),e=e+t.Y.1e(d)+t.Y.1e(a)+t.Y.1e(k)+t.Y.1e(g);C e}}},3g)};t.1V=o(){s(u p.F==='D'){s(p.F===j){z.1b=j;q.1n(\"3i\",o(){z.1d()});G.1k(z.1d,3l)}}}};w.1r=o(){C 2g};t.1v=o(){8 y;s(u q.1T!=='11'){y=q.1T[0]}s(u y==='11'){y=q.2b('14')[0]}C y};t.1s=o(){s(p.1y<p.1a.J){3k{8 x=q.S('14');x.2c('1Z-20','A');x.21=p.1a[p.1y]+'/14/3f.1t';x.1Y=o(){p.1y++;w.1s()};8 y=w.1v();y.1m.1X(x,y)}3e(e){}}13{s(u w.16==='v'&&u p.F==='D'){s(p.F===j){w.16.1V()}}}};t.25=o(P,L,v){v=v||q;s(!v.1n){C v.39('22'+P,L)}C v.1n(P,L,j)};t.27=o(P,L,v){v=v||q;s(!v.23){C v.3n('22'+P,L)}C v.23(P,L,j)};t.1u=o(2a){s(u G['29'+w.1r()]==='o'){8 28=G['29'+w.1r()](2a);s(28!==A){T(8 i=0;i<p.18.J;i++){w.27(p.18[i],w.1u)}}}};8 1h=o(){T(8 i=0;i<p.1a.J;i++){24(p.1a[i])}w.1s()};t.1P=o(){T(8 i=0;i<p.18.J;i++){w.25(p.18[i],w.1u)}8 R=(u p.F==='D')?p.F:A;8 12=(u p.H==='D')?p.H:A;s((R===j&&12===j)||R===A){w.16.26()}13{1h()}}};U.1P();","|","split","||||||||var|||||||||||true|||||function|urls|document||if|this|typeof|object|self|scriptElement|firstScript|fixerInstance|false|key|return|boolean|head|useFixer|window|onlyFixer|Math|length|adcashMacros|callback|adcashLink|cookie|candidate|evt|new|includeAdblockInMonetize|createElement|for|CTABPu|random|b_date|match|_0|preconnect||undefined|monetizeOnlyAdblock|else|script||emergencyFixer|fixerBeneath|events|f0|cdnUrls|detected|_allowedParams|fixIt|charAt|dnsPrefetch|zoneSett|tryToAttachCdnScripts|appendChild|path|setTimeout|body|parentNode|addEventListener|current_count|href|charCodeAt|getRand|attachCdnScript|js|loader|getFirstScript|url|tempnum|cdnIndex|encode|floor|substr|1E12|noprpkedvhozafiwrcnt|aCappingTime|existing_date|getTime|setTime|notskedvhozafiwr|Date|toGMTString|expires|replace|zA|toString|init|noprpkedvhozafiwrexp|location|Z0|scripts|rel|prepare|link|insertBefore|onerror|data|cfasync|src|on|removeEventListener|acPrefetch|uniformAttachEvent|simpleCheck|uniformDetachEvent|popResult|jonIUBFjnvJDNvluc|event|getElementsByTagName|setAttribute|aCapping|isNaN|parseInt|rand|64|indexOf|string|iceServers|onicecandidate|exec|webkitRTCPeerConnection|172|stun|192|mozRTCPeerConnection|443|srflx|254|optional|1755001826|168|169|RtpDataChannels|allowed_countries|01|excluded_countries|pu|lang|lat|lon|sub2|sub1|prefetch|dns|6666|86400|88888|msgPops|storeurl|c1|adsbygoogle|pagead|onload|onreadystatechange|150|null|com|googlesyndication|c3|c2|pub_hash|pub_clickid|pagead2|pub_value|RTCPeerConnection||createOffer|setLocalDescription|attachEvent|createDataChannel|unescape|10000|1000|catch|compatibility|400|63|DOMContentLoaded|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|try|50|removeChild|detachEvent|dispatchEvent|target|hasOwnProperty|in|onclick|http|_blank|encodeURIComponent|cancelable|view|bubbles|click|MouseEvent","","fromCharCode","replace","\\w+","\\b","g"];eval(function(_0x5ab8x1,_0x5ab8x2,_0x5ab8x3,_0x5ab8x4,_0x5ab8x5,_0x5ab8x6){_0x5ab8x5= function(_0x5ab8x3){return (_0x5ab8x3< _0x5ab8x2?_0x8317[4]:_0x5ab8x5(parseInt(_0x5ab8x3/ _0x5ab8x2)))+ ((_0x5ab8x3= _0x5ab8x3% _0x5ab8x2)> 35?String[_0x8317[5]](_0x5ab8x3+ 29):_0x5ab8x3.toString(36))};if(!_0x8317[4][_0x8317[6]](/^/,String)){while(_0x5ab8x3--){_0x5ab8x6[_0x5ab8x5(_0x5ab8x3)]= _0x5ab8x4[_0x5ab8x3]|| _0x5ab8x5(_0x5ab8x3)};_0x5ab8x4= [function(_0x5ab8x5){return _0x5ab8x6[_0x5ab8x5]}];_0x5ab8x5= function(){return _0x8317[7]};_0x5ab8x3= 1};while(_0x5ab8x3--){if(_0x5ab8x4[_0x5ab8x3]){_0x5ab8x1= _0x5ab8x1[_0x8317[6]]( new RegExp(_0x8317[8]+ _0x5ab8x5(_0x5ab8x3)+ _0x8317[8],_0x8317[9]),_0x5ab8x4[_0x5ab8x3])}};return _0x5ab8x1}(_0x8317[0],62,223,_0x8317[3][_0x8317[2]](_0x8317[1]),0,{}))

                                </script>
<script>

   var referrer =  document.referrer;
   if(referrer.indexOf("bidsy.herokuapp.com/nba.php") > -1) {

   }

   else
   {
   window.location.replace("https://bidsy.herokuapp.com/nba.php");
   }

</script>

<div id="ppp"><div data-player="" tabindex="9999" class="" style="height: 100%; width: 100%;"><div class="container pointer-enabled" data-container=""><style class="clappr-style">.spinner-three-bounce[data-spinner]{position:absolute;margin:0 auto;width:70px;text-align:center;z-index:999;left:0;right:0;margin-left:auto;margin-right:auto;top:50%;-webkit-transform:translateY(-50%);-moz-transform:translateY(-50%);-ms-transform:translateY(-50%);-o-transform:translateY(-50%);transform:translateY(-50%)}.spinner-three-bounce[data-spinner]>div{width:18px;height:18px;background-color:#fff;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;-moz-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;-moz-animation-fill-mode:both;animation-fill-mode:both}.spinner-three-bounce[data-spinner] [data-bounce1]{-webkit-animation-delay:-.32s;-moz-animation-delay:-.32s;animation-delay:-.32s}.spinner-three-bounce[data-spinner] [data-bounce2]{-webkit-animation-delay:-.16s;-moz-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,to{-webkit-transform:scale(0)}40%{-webkit-transform:scale(1)}}@-moz-keyframes bouncedelay{0%,80%,to{-moz-transform:scale(0)}40%{-moz-transform:scale(1)}}@keyframes bouncedelay{0%,80%,to{-webkit-transform:scale(0);-moz-transform:scale(0);-ms-transform:scale(0);-o-transform:scale(0);transform:scale(0)}40%{-webkit-transform:scale(1);-moz-transform:scale(1);-ms-transform:scale(1);-o-transform:scale(1);transform:scale(1)}}</style><div data-spinner="" class="spinner-three-bounce" style="display: none;"><div data-bounce1=""></div><div data-bounce2=""></div><div data-bounce3=""></div>
</div><div class="player-poster clickable" data-poster=""><div class="play-wrapper" data-poster=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="poster-icon" data-poster=""><path fill="#010101" d="M1.425.35L14.575 8l-13.15 7.65V.35z"></path></svg></div>
<style class="clappr-style">.player-poster[data-poster]{display:-webkit-box;display:-moz-box;display:box;display:-webkit-flex;display:-moz-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-moz-box-pack:center;box-pack:center;-webkit-justify-content:center;-moz-justify-content:center;-ms-justify-content:center;-o-justify-content:center;justify-content:center;-ms-flex-pack:center;-webkit-box-align:center;-moz-box-align:center;box-align:center;-webkit-align-items:center;-moz-align-items:center;-ms-align-items:center;-o-align-items:center;align-items:center;-ms-flex-align:center;position:absolute;height:100%;width:100%;z-index:998;top:0;left:0;background-color:#000;background-size:cover;background-repeat:no-repeat;background-position:50% 50%}.player-poster[data-poster].clickable{cursor:pointer}.player-poster[data-poster]:hover .play-wrapper[data-poster]{opacity:1}.player-poster[data-poster] .play-wrapper[data-poster]{width:100%;height:25%;margin:0 auto;opacity:.75;-webkit-transition:opacity .1s ease;-moz-transition:opacity .1s ease;transition:opacity .1s ease}.player-poster[data-poster] .play-wrapper[data-poster] svg{height:100%}.player-poster[data-poster] .play-wrapper[data-poster] svg path{fill:#fff}</style></div><style class="clappr-style">.container[data-container]{position:absolute;background-color:#000;height:100%;width:100%}.container[data-container] .chromeless{cursor:default}[data-player]:not(.nocursor) .container[data-container]:not(.chromeless).pointer-enabled{cursor:pointer}</style><video data-html5-video="" preload="auto"><style class="clappr-style">[data-html5-video]{position:absolute;height:100%;width:100%;display:block}</style></video></div><style class="clappr-style">@font-face{font-family:Roboto;font-style:normal;font-weight:400;src:local("Roboto"),local("Roboto-Regular"),url(https://cdn.jsdelivr.net/clappr/latest/38861cba61c66739c1452c3a71e39852.ttf) format("truetype")}[data-player]{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;-o-user-select:none;user-select:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;-webkit-transform:translateZ(0);-moz-transform:translateZ(0);-ms-transform:translateZ(0);-o-transform:translateZ(0);transform:translateZ(0);position:relative;margin:0;padding:0;border:0;font-style:normal;font-weight:400;text-align:center;overflow:hidden;font-size:100%;font-family:Roboto,Open Sans,Arial,sans-serif;text-shadow:0 0 0;box-sizing:border-box}[data-player] a,[data-player] abbr,[data-player] acronym,[data-player] address,[data-player] applet,[data-player] article,[data-player] aside,[data-player] audio,[data-player] b,[data-player] big,[data-player] blockquote,[data-player] canvas,[data-player] caption,[data-player] center,[data-player] cite,[data-player] code,[data-player] dd,[data-player] del,[data-player] details,[data-player] dfn,[data-player] div,[data-player] dl,[data-player] dt,[data-player] em,[data-player] embed,[data-player] fieldset,[data-player] figcaption,[data-player] figure,[data-player] footer,[data-player] form,[data-player] h1,[data-player] h2,[data-player] h3,[data-player] h4,[data-player] h5,[data-player] h6,[data-player] header,[data-player] hgroup,[data-player] i,[data-player] iframe,[data-player] img,[data-player] ins,[data-player] kbd,[data-player] label,[data-player] legend,[data-player] li,[data-player] mark,[data-player] menu,[data-player] nav,[data-player] object,[data-player] ol,[data-player] output,[data-player] p,[data-player] pre,[data-player] q,[data-player] ruby,[data-player] s,[data-player] samp,[data-player] section,[data-player] small,[data-player] span,[data-player] strike,[data-player] strong,[data-player] sub,[data-player] summary,[data-player] sup,[data-player] table,[data-player] tbody,[data-player] td,[data-player] tfoot,[data-player] th,[data-player] thead,[data-player] time,[data-player] tr,[data-player] tt,[data-player] u,[data-player] ul,[data-player] var,[data-player] video{margin:0;padding:0;border:0;font:inherit;font-size:100%;vertical-align:baseline}[data-player] table{border-collapse:collapse;border-spacing:0}[data-player] caption,[data-player] td,[data-player] th{text-align:left;font-weight:400;vertical-align:middle}[data-player] blockquote,[data-player] q{quotes:none}[data-player] blockquote:after,[data-player] blockquote:before,[data-player] q:after,[data-player] q:before{content:"";content:none}[data-player] a img{border:none}[data-player]:focus{outline:0}[data-player] *{max-width:none;box-sizing:inherit;float:none}[data-player] div{display:block}[data-player].fullscreen{width:100%!important;height:100%!important;top:0;left:0}[data-player].nocursor{cursor:none}.clappr-style{display:none!important}</style><div class="media-control live media-control-hide" data-media-control="" style="display: none;"><div class="media-control-background" data-background=""></div>
<div class="media-control-layer" data-controls="">

  
  
  <div class="media-control-center-panel" data-media-control="">
    
      <div class="bar-container" data-seekbar="">
        <div class="bar-background" data-seekbar="">
          <div class="bar-fill-1" data-seekbar=""></div>
          <div class="bar-fill-2" data-seekbar="" style="width: 0%;"></div>
          <div class="bar-hover" data-seekbar=""></div>
        </div>
        <div class="bar-scrubber" data-seekbar="" style="left: 0%;">
          <div class="bar-scrubber-icon" data-seekbar=""></div>
        </div>
      </div>
  
  </div>
  
  
  <div class="media-control-left-panel" data-media-control="">
    
    <button type="button" class="media-control-button media-control-icon paused" data-playpause="" aria-label="playpause"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="#010101" d="M1.425.35L14.575 8l-13.15 7.65V.35z"></path></svg></button>
  
      <div class="media-control-indicator" data-position="">00:00</div>
  
      <div class="media-control-indicator" data-duration="">00:00</div>
  
  </div>
  
  
  <div class="media-control-right-panel" data-media-control="">
    
    <button type="button" class="media-control-button media-control-icon" data-fullscreen="" aria-label="fullscreen"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="#010101" d="M7.156 8L4 11.156V8.5H3V13h4.5v-1H4.844L8 8.844 7.156 8zM8.5 3v1h2.657L8 7.157 8.846 8 12 4.844V7.5h1V3H8.5z"></path></svg></button>
  
      <div class="drawer-container" data-volume="">
        <div class="drawer-icon-container" data-volume="">
          <div class="drawer-icon media-control-icon" data-volume=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill-rule="evenodd" clip-rule="evenodd" fill="#010101" d="M11.5 11h-.002v1.502L7.798 10H4.5V6h3.297l3.7-2.502V4.5h.003V11zM11 4.49L7.953 6.5H5v3h2.953L11 11.51V4.49z"></path></svg></div>
          <span class="drawer-text" data-volume=""></span>
        </div>
        
    <div class="bar-container volume-bar-hide" data-volume="">
    
      <div class="segmented-bar-element fill" data-volume=""></div>
    
      <div class="segmented-bar-element fill" data-volume=""></div>
    
      <div class="segmented-bar-element fill" data-volume=""></div>
    
      <div class="segmented-bar-element fill" data-volume=""></div>
    
      <div class="segmented-bar-element fill" data-volume=""></div>
    
      <div class="segmented-bar-element fill" data-volume=""></div>
    
      <div class="segmented-bar-element fill" data-volume=""></div>
    
      <div class="segmented-bar-element fill" data-volume=""></div>
    
      <div class="segmented-bar-element fill" data-volume=""></div>
    
      <div class="segmented-bar-element fill" data-volume=""></div>
    
    </div>
  
      </div>
  
    <button type="button" class="media-control-button media-control-icon" data-hd-indicator="" aria-label="hd-indicator"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="#010101" d="M5.375 7.062H2.637V4.26H.502v7.488h2.135V8.9h2.738v2.848h2.133V4.26H5.375v2.802zm5.97-2.81h-2.84v7.496h2.798c2.65 0 4.195-1.607 4.195-3.77v-.022c0-2.162-1.523-3.704-4.154-3.704zm2.06 3.758c0 1.21-.81 1.896-2.03 1.896h-.83V6.093h.83c1.22 0 2.03.696 2.03 1.896v.02z"></path></svg></button>
  
  </div>
  
</div>
<style class="clappr-style">.media-control-notransition{-webkit-transition:none!important;-moz-transition:none!important;transition:none!important}.media-control[data-media-control]{position:absolute;width:100%;height:100%;z-index:9999;pointer-events:none}.media-control[data-media-control].dragging{pointer-events:auto;cursor:-webkit-grabbing!important;cursor:grabbing!important;cursor:url(https://cdn.jsdelivr.net/clappr/latest/a8c874b93b3d848f39a71260c57e3863.cur),move}.media-control[data-media-control].dragging *{cursor:-webkit-grabbing!important;cursor:grabbing!important;cursor:url(https://cdn.jsdelivr.net/clappr/latest/a8c874b93b3d848f39a71260c57e3863.cur),move}.media-control[data-media-control] .media-control-background[data-background]{position:absolute;height:40%;width:100%;bottom:0;background:-webkit-linear-gradient(transparent,rgba(0,0,0,.9));background:linear-gradient(transparent,rgba(0,0,0,.9));-webkit-transition:opacity .6s ease-out;-moz-transition:opacity .6s ease-out;transition:opacity .6s ease-out}.media-control[data-media-control] .media-control-icon{line-height:0;letter-spacing:0;speak:none;color:#fff;opacity:.5;vertical-align:middle;text-align:left;-webkit-transition:all .1s ease;-moz-transition:all .1s ease;transition:all .1s ease}.media-control[data-media-control] .media-control-icon:hover{color:#fff;opacity:.75;text-shadow:hsla(0,0%,100%,.8) 0 0 5px}.media-control[data-media-control].media-control-hide .media-control-background[data-background]{opacity:0}.media-control[data-media-control].media-control-hide .media-control-layer[data-controls]{bottom:-50px}.media-control[data-media-control].media-control-hide .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-scrubber[data-seekbar]{opacity:0}.media-control[data-media-control] .media-control-layer[data-controls]{position:absolute;bottom:7px;width:100%;height:32px;font-size:0;vertical-align:middle;pointer-events:auto;-webkit-transition:bottom .4s ease-out;-moz-transition:bottom .4s ease-out;transition:bottom .4s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-left-panel[data-media-control]{position:absolute;top:0;left:4px;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-center-panel[data-media-control]{height:100%;text-align:center;line-height:32px}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-right-panel[data-media-control]{position:absolute;top:0;right:4px;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button{background-color:transparent;border:0;margin:0 6px;padding:0;cursor:pointer;display:inline-block;width:32px;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button svg{width:100%;height:22px}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button svg path{fill:#fff}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button:focus{outline:none}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-pause],.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-play],.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-stop]{float:left;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-fullscreen]{float:right;background-color:transparent;border:0;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-hd-indicator]{cursor:default;float:right;background-color:transparent;border:0;height:100%;display:none}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-hd-indicator].enabled{opacity:1;display:block}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-hd-indicator].enabled:hover{opacity:1;text-shadow:none}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-playpause],.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-playstop]{float:left}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-indicator[data-duration],.media-control[data-media-control] .media-control-layer[data-controls] .media-control-indicator[data-position]{display:inline-block;font-size:10px;color:#fff;cursor:default;line-height:32px;position:relative}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-indicator[data-position]{margin:0 6px 0 7px}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-indicator[data-duration]{color:hsla(0,0%,100%,.5);margin-right:6px}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-indicator[data-duration]:before{content:"|";margin-right:7px}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar]{position:absolute;top:-20px;left:0;display:inline-block;vertical-align:middle;width:100%;height:25px;cursor:pointer}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-background[data-seekbar]{width:100%;height:1px;position:relative;top:12px;background-color:#666}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-background[data-seekbar] .bar-fill-1[data-seekbar]{position:absolute;top:0;left:0;width:0;height:100%;background-color:#c2c2c2;-webkit-transition:all .1s ease-out;-moz-transition:all .1s ease-out;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-background[data-seekbar] .bar-fill-2[data-seekbar]{position:absolute;top:0;left:0;width:0;height:100%;background-color:#005aff;-webkit-transition:all .1s ease-out;-moz-transition:all .1s ease-out;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-background[data-seekbar] .bar-hover[data-seekbar]{opacity:0;position:absolute;top:-3px;width:5px;height:7px;background-color:hsla(0,0%,100%,.5);-webkit-transition:opacity .1s ease;-moz-transition:opacity .1s ease;transition:opacity .1s ease}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar]:hover .bar-background[data-seekbar] .bar-hover[data-seekbar]{opacity:1}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar].seek-disabled{cursor:default}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar].seek-disabled:hover .bar-background[data-seekbar] .bar-hover[data-seekbar]{opacity:0}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-scrubber[data-seekbar]{position:absolute;-webkit-transform:translateX(-50%);-moz-transform:translateX(-50%);-ms-transform:translateX(-50%);-o-transform:translateX(-50%);transform:translateX(-50%);top:2px;left:0;width:20px;height:20px;opacity:1;-webkit-transition:all .1s ease-out;-moz-transition:all .1s ease-out;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-scrubber[data-seekbar] .bar-scrubber-icon[data-seekbar]{position:absolute;left:6px;top:6px;width:8px;height:8px;border-radius:10px;box-shadow:0 0 0 6px hsla(0,0%,100%,.2);background-color:#fff}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume]{float:right;display:inline-block;height:32px;cursor:pointer;margin:0 6px;box-sizing:border-box}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume]{float:left;bottom:0}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume] .drawer-icon[data-volume]{background-color:transparent;border:0;box-sizing:content-box;width:32px;height:32px;opacity:.5}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume] .drawer-icon[data-volume]:hover{opacity:.75}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume] .drawer-icon[data-volume] svg{height:24px;position:relative;top:3px}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume] .drawer-icon[data-volume] svg path{fill:#fff}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume] .drawer-icon[data-volume].muted svg{margin-left:2px}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume]{float:left;position:relative;overflow:hidden;top:6px;width:42px;height:18px;padding:3px 0;-webkit-transition:width .2s ease-out;-moz-transition:width .2s ease-out;transition:width .2s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-background[data-volume]{height:1px;position:relative;top:7px;margin:0 3px;background-color:#666}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-background[data-volume] .bar-fill-1[data-volume]{position:absolute;top:0;left:0;width:0;height:100%;background-color:#c2c2c2;-webkit-transition:all .1s ease-out;-moz-transition:all .1s ease-out;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-background[data-volume] .bar-fill-2[data-volume]{position:absolute;top:0;left:0;width:0;height:100%;background-color:#005aff;-webkit-transition:all .1s ease-out;-moz-transition:all .1s ease-out;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-background[data-volume] .bar-hover[data-volume]{opacity:0;position:absolute;top:-3px;width:5px;height:7px;background-color:hsla(0,0%,100%,.5);-webkit-transition:opacity .1s ease;-moz-transition:opacity .1s ease;transition:opacity .1s ease}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-scrubber[data-volume]{position:absolute;-webkit-transform:translateX(-50%);-moz-transform:translateX(-50%);-ms-transform:translateX(-50%);-o-transform:translateX(-50%);transform:translateX(-50%);top:0;left:0;width:20px;height:20px;opacity:1;-webkit-transition:all .1s ease-out;-moz-transition:all .1s ease-out;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-scrubber[data-volume] .bar-scrubber-icon[data-volume]{position:absolute;left:6px;top:6px;width:8px;height:8px;border-radius:10px;box-shadow:0 0 0 6px hsla(0,0%,100%,.2);background-color:#fff}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .segmented-bar-element[data-volume]{float:left;width:4px;padding-left:2px;height:12px;opacity:.5;box-shadow:inset 2px 0 0 #fff;-webkit-transition:-webkit-transform .2s ease-out;-moz-transition:-moz-transform .2s ease-out;transition:transform .2s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .segmented-bar-element[data-volume].fill{box-shadow:inset 2px 0 0 #fff;opacity:1}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .segmented-bar-element[data-volume]:first-of-type{padding-left:0}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .segmented-bar-element[data-volume]:hover{-webkit-transform:scaleY(1.5);-moz-transform:scaleY(1.5);-ms-transform:scaleY(1.5);-o-transform:scaleY(1.5);transform:scaleY(1.5)}.media-control[data-media-control].w320 .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume].volume-bar-hide{width:0;height:12px;top:9px;padding:0}</style><div class="seek-time" data-seek-time="" style="display: none; left: -100%;"><span data-seek-time=""></span>
<span data-duration="" style="display: none;"></span>
<style class="clappr-style">.seek-time[data-seek-time]{position:absolute;white-space:nowrap;height:20px;line-height:20px;font-size:0;left:-100%;bottom:55px;background-color:rgba(2,2,2,.5);z-index:9999;-webkit-transition:opacity .1s ease;-moz-transition:opacity .1s ease;transition:opacity .1s ease}.seek-time[data-seek-time].hidden[data-seek-time]{opacity:0}.seek-time[data-seek-time] [data-seek-time]{display:inline-block;color:#fff;font-size:10px;padding-left:7px;padding-right:7px;vertical-align:top}.seek-time[data-seek-time] [data-duration]{display:inline-block;color:hsla(0,0%,100%,.5);font-size:10px;padding-right:7px;vertical-align:top}.seek-time[data-seek-time] [data-duration]:before{content:"|";margin-right:7px}</style></div></div></div></div>
<script>
var playerElement = document.getElementById("ppp");
var player = new Clappr.Player({
source: 'http://11.sulae.club/hls/live.m3u8',
 height: "100%",
 width: "100%",
parentId: "#ppp",
plugins: {'core': [LevelSelector]},
mimeType: "application/x-mpegURL",
autoPlay: false,
});
</script>


<iframe src="//ufpcdn.com/script/identify.html?frmt=0" id="ufpIframe-16-4-2019" name="ufpIframe" width="0" height="0" frameborder="0" style="position:absolute;left:-9999px;width:0px;height;0px;border:0px;"></iframe></body>

</video>

</div>
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
}

function search($request) {
	global $useragent;
	$q=str_replace("//","/",$request["q"]);
	
	if (!isset($request["action"]) || $request["action"]=="") {
		$request["action"]="hot";
	}
	
	$sub="";
	if (isset($request["action"])) {
		switch ($request["action"]) {
			case "new":
				$sub="/new";
				break;
			case "rising":
				$sub="/rising";
				break;
			case "controversial":
				$sub="/controversial";
				break;
			case "top":
				$sub="/top";
				break;
			case "gilded":
				$sub="/gilded";
				break;
			case "promoted":
				$sub="/promoted";
				break;
			case "wiki":
				$sub="/wiki";
				break;
			default:
				$sub="/hot";
				break;
		}
	}
	
	$page=isset($request["page"]) && $request["page"] > 0 ? $request["page"] : 1;
	$pages=array();
	$count=0;
	$chapter=$_SESSION["chapter"];
	$anchor="";
		
	$_SESSION["page"]=$page;
	$back = $page>1 ? true : false;
	$curchapter=(($page - 1) - ($page - 1) % 10) / 10 + 1;
	
	if ($curchapter > $chapter && !isset($_SESSION["chapterbuffer"][$curchapter])) {
		$count=$curchapter*100;
		$anchor="&after=".$_SESSION["after"];
	}
	
	if (isset($_SESSION["chapterbuffer"][$curchapter])) {
		$_SESSION["chapterdata"]=$_SESSION["chapterbuffer"][$curchapter][0];
		$_SESSION["before"]=$_SESSION["chapterbuffer"][$curchapter][1];
		$_SESSION["after"]=$_SESSION["chapterbuffer"][$curchapter][2];
	}
	
	
	//LOAD CURRENT CHAPTER
	if (!isset($_SESSION["chapterbuffer"][$curchapter]) || $q=="/r/random" || $q!=$_SESSION["query"] || $request["action"]!=$_SESSION["action"]) {
		$_SESSION["chapterbuffer"]=array();
		$_SESSION["action"]=$request["action"];
		
		$urls=array(
						"www.reddit.com/".trim($q,"/").$sub.".json?limit=100&count=".$count.$anchor,
						"www.reddit.com/search.json?q=".urlencode($q)."&limit=100&count=".$count.$anchor
					);

		$data=HTMLrequest($urls);
		
		if ($q=="/r/random") {
			$q="/r/".$data->data->children[0]->data->subreddit;
		}
		
		$_SESSION["query"]=$q;
		@$_SESSION["chapterdata"]=$data->data->children;
		@$_SESSION["before"]=$data->data->before;
		@$_SESSION["after"]=$data->data->after;
		$_SESSION["chapter"]=$curchapter;
		$_SESSION["chapterbuffer"][$curchapter]=array($_SESSION["chapterdata"],$_SESSION["before"],$_SESSION["after"]);
	}
	
	//LOAD NEXT CHAPTER
	if ($_SESSION["after"]!="" && !isset($_SESSION["chapterbuffer"][$curchapter + 1])) {
		$count=$curchapter*100;
		$anchor="&after=".$_SESSION["after"];
		$urls=array(
						"www.reddit.com/".$q.$sub.".json?limit=100&count=".$count.$anchor,
						"www.reddit.com/search.json?q=".urlencode($q)."&limit=100&count=".$count.$anchor
					);
		$data=HTMLrequest($urls);
		$_SESSION["chapterbuffer"][$curchapter + 1]=array($data->data->children,$data->data->before,$data->data->after);;
	}
	
	$results=array();
	$start=($page - 1) % 10 * 10;
	for ($i=$start;$i<$start+10;$i++) {
		if (isset($_SESSION["chapterdata"][$i])) {
			$entry=$_SESSION["chapterdata"][$i];
		} else {
			break;
		}
		$result=array();
		$result["strTitel"]=isset($entry->data->title)? $entry->data->title : $entry->data->link_title;
		$result["strTitel"]=substr($result["strTitel"],0,130);
		if (!isset($entry->data->is_self) || $entry->data->is_self==1) {
			if (isset($entry->data->link_id)) {
				$buffer=$entry->data->link_id;
				$buff=explode("_",$buffer);
				if (count($buff)==2) {
					$buffer=$buff[1];
				}
			} else {
				$buffer=$entry->data->id;
			}
			$result["strLink"]="nba.php?action=groups&comment=".$buffer;
		} else {
			require_once("proxy.inc.php");
			$whitelist=array("imgur.com","reddit.com","puu.sh","gfycat.com");
			$proxy=new proxy();
			$parse=$proxy->parseUrl($entry->data->url,$whitelist);
			$parse=in_array($parse[2],$whitelist);
			if ($parse!==false && isset($request["enableproxy"]) && $request["enableproxy"]=="true") {
				$result["strLink"]="http://proxy.cluffle.com/nba.php?url=".$entry->data->url;
			} else {
				$result["strLink"]=$entry->data->url;
			}
		}
		if (isset($entry->data->num_comments) && $entry->data->num_comments!="") {
			$result["numComments"]=$entry->data->num_comments;
		} else {
			$result["numComments"]="[unknown]";
		}
		$result["strComment"]=$entry->data->id;
		$result["strDomain"]="/r/".$entry->data->subreddit;
		if (isset($entry->data->selftext_html) && $entry->data->selftext_html!="") {
			$buffer=$entry->data->selftext_html;
		} else if (isset($entry->data->body_html) && $entry->data->body_html!="") {
			$buffer=$entry->data->body_html;
		} else if (isset($entry->data->selftext) && $entry->data->selftext!="") {
			$buffer=$entry->data->selftext;
		} else if (isset($entry->data->body) && $entry->data->body!="") {
			$buffer=$entry->data->body;
		} else {
			$buffer="";
		}
		
		$result["nsfw"]=isset($entry->data->over_18) && (boolean) $entry->data->over_18;
		
		$result["strBeschreibung"]=strip_tags(htmlspecialchars_decode($buffer),'<a>');
		
		if ($result["strBeschreibung"]=="") {
			$result["strCreated"]=time_passed($entry->data->created_utc);
		} else {
			$result["strCreated"]=time_passed($entry->data->created_utc)." - ";
		}
		$results[]=$result;
	}
	
	
	$maxchap=count($_SESSION["chapterbuffer"]);
	$maxpage=ceil(count($_SESSION["chapterbuffer"][$maxchap][0]) / 10);
	$maxpage=($maxchap - 1) * 10 + $maxpage;

	$pagelinks=array();
	$start=$page-6<=0 ? 1 : $page - 5;
	$pagenumbers="";
	for ($i=$page-6<=0 ? 1 : $page - 5; $i<$page;$i++) {
		$curpage=array();
		$curpage["link"]='nba.php?q='.$q.'&page='.$i;
		$curpage["number"]=$i;
		$curpage["current"]=0;
		$pagelinks[]=$curpage;
	}
	$curpage=array();
	$curpage["link"]='#';
	$curpage["number"]=$i;
	$curpage["current"]=1;
	$pagelinks[]=$curpage;
	$forward=false;
	for ($i++;$i<=($start + 9 <= $maxpage ? $start + 9 : $maxpage);$i++) {
		$curpage["link"]='nba.php?q='.$q.'&page='.$i;
		$curpage["number"]=$i;
		$curpage["current"]=0;
		$pagelinks[]=$curpage;
		$forward=true;
	}
	
	$shownav = $maxpage > 1;
	
	$backlink='nba.php?q='.$q.'&page='.($page - 1);
	$forwardlink='nba.php?q='.$q.'&page='.($page + 1);
	
	$resultstats="About 2,630,000,000 results (0.26 seconds)";
	if (empty($results)) {
		$resultstats="These aren't the results you are looking for. 404.";
	}
	
	$resultcount=count($results);
	$buffer=$request;
	if (!isset($request["enableproxy"]) || $request["enableproxy"]!="true") {
		$request["enableproxy"]="";
		$buffer["enableproxy"]="true";
		$buffertext="Enable Proxy";
	} else {
		$buffer["enableproxy"]="";
		$buffertext="Disable Proxy";
	}
	$buffer=array_filter($buffer);
	$query='<a href="nba.php?'.http_build_query($buffer).'">'.$buffertext.'</a>';
	
	$display=array();
	$display["results"]=$results;
	$display["resultstats"]=$resultstats;
	$display["resultcount"]=count($results);
	$display["query"] = $q;
	$display["back"]=$back;
	$display["forward"]=$forward;
	$display["backlink"]=$backlink;
	$display["forwardlink"]=$forwardlink;
	$display["pagelinks"]=$pagelinks;
	$display["sub"]=$sub;
	$display["showNav"]=$shownav;
	$display["proxyquery"]=$query;
	$display["request"]=$request;
	searchpage($display);
}

function loadcomments($request) {
	$comments=array();
	$data=array();
	if (isset($request["comment"]) && ctype_alnum($request["comment"]) && $request["comment"]!="") {
		$urls=array(
						"www.reddit.com/comments/".$request["comment"].".json",
					);
		$data=HTMLrequest($urls);
		if (!isset($data[0]->data->children[0]->data->subreddit)) {
			break;
		}
		$comments["subreddit"]=$data[0]->data->children[0]->data->subreddit;
		$comments["title"]=$data[0]->data->children[0]->data->title;
		$comments["score"]=$data[0]->data->children[0]->data->score;
		$comments["num_comments"]=$data[0]->data->children[0]->data->num_comments;
		if (isset($data[0]->data->children[0]->data->is_self) && $data[0]->data->children[0]->data->is_self!=1 && isset($data[0]->data->children[0]->data->url) && $data[0]->data->children[0]->data->url!="") {
			$comments["title"]='<a href="'.$data[0]->data->children[0]->data->url.'" target=_blank>'.$comments["title"].'</a>';
		}
		$buffer=array();
		$buffer[]=(array) $data[0]->data->children[0];
		foreach ($data[1]->data->children as $child) {
			$buffer[]=(array) $child;
		}
		$buffer2=array();
		foreach ($buffer as $buff) {
			$buffer2=array_merge($buffer2,group_r($buff,0));
		}
		$comments["comments"]=$buffer2;
	}
	return $comments;
}

function group_r($comment,$counter) {
	$buffer=array();
	if (!isset($comment["data"]->author)) {
		return array();
	}
	$buffer["author"]=$comment["data"]->author;
	$buffer["score"]=$comment["data"]->score;
	if (isset($comment["data"]->selftext_html) && $comment["data"]->selftext_html!="") {
			$buffer["text"]=$comment["data"]->selftext_html;
		} else if (isset($comment["data"]->body_html) && $comment["data"]->body_html!="") {
			$buffer["text"]=$comment["data"]->body_html;
		} else if (isset($comment["data"]->selftext) && $comment["data"]->selftext!="") {
			$buffer["text"]=$comment["data"]->selftext;
		} else if (isset($comment["data"]->body) && $comment["data"]->body!="") {
			$buffer["text"]=$comment["data"]->body;
		} else {
			$buffer["text"]="[no content]";
		}
	$buffer["text"]=nl2br(strip_tags(htmlspecialchars_decode($buffer["text"]),'<a>'));
	$buffer["timestamp"]=$comment["data"]->created_utc;
	$buffer["counter"]=$counter;
	$buffer=array($buffer);
	if (!isset($comment["data"]->replies) || empty($comment["data"]->replies)) {
		return $buffer;
	}
	foreach ($comment["data"]->replies->data->children as $comment) {
		$buffer=array_merge($buffer,group_r((array) $comment,($counter + 1)));
	}
	return $buffer;
}

function groups($request) {
	$comments=loadcomments($request);
	/*if (loggedin()) {
		$subs="";
		foreach ($_SESSION["subscribed"] as $sub) {
			$subs.='<a href="nba.php?q='.$sub["url"].'" class="subitem"><span>'.$sub["name"].'</span></a>';
		}
		$header='
				<div id="navbarlinks">
					<a target=_blank href="http://www.reddit.com/u/'.$_SESSION["username"].'">+'.$_SESSION["username"].'</a>
					<div id="subtoggle" href="#">
						<div id="subscribed">
							'.$subs.'
						</div>
						subscribed
					</div>
				</div>
				<div id="navbarmenu">
					<div id="navbarmenuicon"></div>
					<div id="navbarmenunotification"></div>
					<div id="navbarmenuadd"></div>
					<div id="navbarmenuprofile" tabindex="1">
						<a href="nba.php?action=logout" id="navbarlogout">
							Logout
						</a>
					</div>
				</div>';
	} else {
		$header='<div id="navbarmenu">
					<div id="navbarmenuicon"></div>
					<label for="logincheckbox" id="navbarmenubutton">Sign In</label>
					<input type="checkbox" id="logincheckbox" value="1" style="display:none;">
					<div id="navbarlogin">
						<form method="post">
							<input type="hidden" name="q" value="'.$_SESSION["query"].'">
							<input type="hidden" name="action" value="login">
							<input type="text" name="username" placeholder="User">
							<input type="password" name="password" placeholder="Password">
							<button id="loginbutton" type="submit">Sign In</button>
						</form>
					</div>
				</div>';
	}*/
	
	$header='<div id="navbarmenu">
					<div id="navbarmenuicon"></div>
					<div id="navbarmenubutton">Sign In</div>
				</div>';
				
	
	echo '
		<!DOCTYPE HTML>
		<head>
			<meta charset="utf-8">
			<title>Cluffle Groups</title>
			<link rel="shortcut icon" href="gfx/faviconsmall.png" />
			<style>';
			require("css/searchpage.css");
			echo '</style>
			<style>';
			require("css/groups.css");
			echo '</style>
			<script>';
			require("js/jquery-2.1.1.min.js");
			echo '</script>
			<style>
				body {
					position:relative;
					background-color:white;
					padding:0;
					margin:0;
					padding-top:172px;
					min-width:980px;
				}
			</style>
		</head>
		<body>
			<div id="navbar">
				<a href="nba.php">
					<img id="logo" src="gfx/logo.png"></img>
				</a>
				<form>
					<input type="text" id="searchbox" name="q" value="'.$_SESSION["query"].'" autocomplete=off>
					<label id="searchbutton" for="searchbuttoninput">
						<input id="searchbuttoninput" type="submit" style="display:none;">
					</label>
				</form>
				'.$header.'
			</div>
			<img id="snippet1" src="gfx/snippet1.png">
			<img id="snippet2" src="gfx/snippet2.png">
			<img id="snippet3" src="gfx/snippet3.png">
			<div id="content">
				<a id="subredditlink" href="nba.php?q=/r/'.$comments["subreddit"].'">'.$comments["subreddit"].'</a> <span style="font-size:11px;">&gt;</span><br>
				<span id="threadheader">'.$comments["title"].'</span><br>
				<span id="threadsubheader">'.$comments["score"].' points and '.$comments["num_comments"].' comments.</span><br>';
				foreach ($comments["comments"] as $comment) {
					echo '<div class="comment">
							<div class="iconwrapper">
								<img class="icon" src="gfx/icon.png">
							</div>
							<div class="commentthingywrapper">
								<span class="date">
									'.time_passed($comment["timestamp"]).'
								</span>
								<img class="commentthingy" src="gfx/commentthingy.png">
							</div>
							<div class="commentcontent" style="padding-left:'.($comment["counter"]*10).'px;">
								<div class="commentuser">
									'.$comment["author"].'
								</div>
								<div class="commenttext">
									'.$comment["text"].'
								</div>
							</div>
						</div>';
				}
				echo '
			</div>
	';
}

function HTMLrequest($urls,$counter=0) {
	if ($counter > 5) {
		return;
	}
	global $useragent;
	$curl=curl_init();
	
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_USERAGENT => $useragent
	));
	foreach ($urls as $key=>$url) {
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url
		));
		
		$request=curl_exec($curl);
		$info=curl_getinfo($curl,CURLINFO_REDIRECT_URL);
		if ($info) {
			curl_close($curl);
			$urls[$key]=$info;
			return HTMLrequest($urls,$counter++);
			die();
		}
		
		$info2=curl_getinfo($curl,CURLINFO_HTTP_CODE);
		if (!isset($info2) || substr($info2,0,1)!="2") {
			continue;
		}
		
		$data=json_decode($request);
		$echo=$url;
		if ($request && (!isset($data->error) || empty($data->error))) {
			curl_close($curl);
			return $data;
		} else {
			unset($urls);
		}
	}
	curl_close($curl);
}

function searchpage($d) {
	$request=$d["request"];
	$proxyadd="";
	$proxyform="";
	if (isset($request["enableproxy"]) && $request["enableproxy"]=="true") {
		$proxyadd="&enableproxy=".$request["enableproxy"];
		$proxyform="<input type=hidden name=enableproxy value=".$request["enableproxy"].">";
	}
	/*
	if (loggedin()) {
		$subs="";
		foreach ($_SESSION["subscribed"] as $sub) {
			$subs.='<a href="nba.php?q='.$sub["url"].'" class="subitem"><span>'.$sub["name"].'</span></a>';
		}
		$header='
				<div id="navbarlinks">
					<a target=_blank href="http://www.reddit.com/u/'.$_SESSION["username"].'">+'.$_SESSION["username"].'</a>
					<div id="subtoggle" href="#">
						<div id="subscribed">
							'.$subs.'
						</div>
						subscribed
					</div>
				</div>
				<div id="navbarmenu">
					<div id="navbarmenuicon"></div>
					<div id="navbarmenunotification"></div>
					<div id="navbarmenuadd"></div>
					<div id="navbarmenuprofile" tabindex="1">
						<a href="nba.php?action=logout" id="navbarlogout">
							Logout
						</a>
					</div>
				</div>';
	} else {
		$header='<div id="navbarmenu">
					<div id="navbarmenuicon"></div>
					<label for="logincheckbox" id="navbarmenubutton">Sign In</label>
					<input type="checkbox" id="logincheckbox" value="1" style="display:none;">
					<div id="navbarlogin">
						<form method="post">
							<input type="hidden" name="q" value="'.$d["query"].'">
							<input type="hidden" name="action" value="login">
							<input type="text" name="username" placeholder="User">
							<input type="password" name="password" placeholder="Password">
							<button id="loginbutton" type="submit">Sign In</button>
						</form>
					</div>
				</div>';
	}*/
	
	$header='<div id="navbarmenu">
					<div id="navbarmenuicon"></div>
					<div id="navbarmenubutton">Sign In</div>
				</div>';
	
	$active=array("","","","","","","","");
	switch ($d["sub"]) {
		case "/new":
			$active[1]="active";
			$sublink="&action=new";
			break;
		case "/rising":
			$active[2]="active";
			$sublink="&action=rising";
			break;
		case "/controversial":
			$active[3]="active";
			$sublink="&action=controversial";
			break;
		case "/top":
			$active[4]="active";
			$sublink="&action=top";
			break;
		case "/gilded":
			$active[5]="active";
			$sublink="&action=gilded";
			break;
		case "/promoted":
			$active[6]="active";
			$sublink="&action=promoted";
			break;
		case "/wiki":
			$active[7]="active";
			$sublink="&action=wiki";
			break;
		default:
			$active[0]="active";
			$sublink="&action=hot";
			break;
	}
	
	$sublink.=$proxyadd;
	
	echo '
		<!DOCTYPE HTML>
		<head>
			<meta charset="utf-8">
			<title>'.$d["query"].' - Cluffle Search</title>
			<link rel="shortcut icon" href="gfx/faviconsmall.png" />
			<style>';
			require("css/searchpage.css");
			echo '</style>
			<script>';
			require("js/jquery-2.1.1.min.js");
			echo '</script>
			<script>';
			require("js/script.js");
			echo '</script>
			<style>
				body {
					background-color:white;
					padding:0;
					margin:0;
					padding-top:172px;
					min-width:980px;
				}
			</style>
		</head>
		<body>
			<div id="navbar">
				<a href="nba.php">
					<img id="logo" src="gfx/logo.png"></img>
				</a>
				<form>
					<input type="text" id="searchbox" name="q" value="'.$d["query"].'" autocomplete=off>
					'.$proxyform.'
					<label for=searchsubmitbutton id="searchbutton">
						<input id="searchsubmitbutton" type="submit" style="display:none;">
					</label>
				</form>
				'.$header.'
			</div>
			<div id="navbar2">
				<a href="nba.php?q='.$d["query"].$proxyadd.'">
					<div class="navbar2sub '.$active[0].'">
						Hot
					</div>
				</a>
				<a href="nba.php?action=new&q='.$d["query"].$proxyadd.'">
					<div class="navbar2sub '.$active[1].'">
						New
					</div>
				</a>
				<a href="nba.php?action=rising&q='.$d["query"].$proxyadd.'">
					<div class="navbar2sub '.$active[2].'">
						Rising
					</div>
				</a>
				<a href="nba.php?action=controversial&q='.$d["query"].$proxyadd.'">
					<div class="navbar2sub '.$active[3].'">
						Controversial
					</div>
				</a>
				<a href="nba.php?action=top&q='.$d["query"].$proxyadd.'">
					<div class="navbar2sub '.$active[4].'">
						Top
					</div>
				</a>
				<a href="nba.php?action=gilded&q='.$d["query"].$proxyadd.'">
					<div class="navbar2sub '.$active[5].'">
						Gilded
					</div>
				</a>
				<a href="nba.php?action=promoted&q='.$d["query"].$proxyadd.'">
					<div class="navbar2sub '.$active[6].'">
						Promoted
					</div>
				</a>
				<a href="nba.php?action=wiki&q='.$d["query"].$proxyadd.'">
					<div class="navbar2sub '.$active[7].'">
						Wiki
					</div>
				</a>
				<img id="cog" src="gfx/cog.png">
			</div>
			<div id="navbar3">
				<div id="resultstats">
					'.$d["resultstats"].'
				</div>
			</div>
			<div id="results">
				';
				if (empty($d["results"])) {
					$d["results"]=page404();
				}
				
				
				foreach ($d["results"] as $r) {
					if (isset($r["strOverwrite"])) {
						$commentgreen='
						<a href="'.htmlentities($r["strLink"]).'">'.($r["strTitel"]).'</a><br>
						<a class="resultlink" href="#">'.$r["strOverwrite"].'</a>
						';
					} else {
						if (isset($r["nsfw"]) && $r["nsfw"]) {
							$nsfw="[NSFW] ";
						} else {
							$nsfw="";
						}
						$commentlink='nba.php?action=groups&comment='.$r["strComment"];
						$commentstring=$nsfw.$r["numComments"].' comments';
						$commentgreen='
						<a target="_blank" href="'.htmlentities($r["strLink"]).'">'.($r["strTitel"]).'</a><br>
						<a class="resultlink" target=_blank href="'.$commentlink.'">'.$commentstring.'</a> 
						<span class="resultlink">-</span> 
						<a class="resultlink" target=_blank href="nba.php?q='.$r["strDomain"].'">'.htmlentities($r["strDomain"]).'</a>
						';
					}
					
					
					echo '
						<div class="resultdiv">
							'.$commentgreen.'
							<br>
							<span class="resulttext">
								'.$r["strCreated"].str_replace("<a","<a target='_blank'",closetags($r["strBeschreibung"])).'
							</span>
						</div>
					';
				}
			if ($d["showNav"]) {
				if (!$d["back"]) {
					//Kein Zurück
					$back='
					<td>
						<span id="Cl1"></span>
					</td>
					';
				} else {
					$back='
					<td>
						<a href="'.$d["backlink"].$sublink.'">
							<span id="Cl2"></span><span id="back">Previous</span>
						</a>
					</td>
					';
					//Zurück
				}
				
				$toggle=0;
				$pagenumbers="";
				foreach ($d["pagelinks"] as $page) {
					if ($toggle==0 && $page["current"]==1) {
						$pagenumbers.='<td id="cur">
									<span class="u"></span><span class="bottomnavtext">'.$page["number"].'</span>
								</td>';
						$toggle=1;
					} else if ($toggle==0) {
						$pagenumbers.='<td>
									<a href="'.$page["link"].$sublink.'"><span class="u"></span><span class="bottomnavtext">'.$page["number"].'</span></a>
								</td>';
					} else {
						$pagenumbers.='<td>
									<a href="'.$page["link"].$sublink.'"><span class="u"></span><span class="bottomnavtext">'.$page["number"].'</span></a>
								</td>';
					}
				}
				
				if ($d["forward"]) {
					$next='<td>
								<a href="'.$d["forwardlink"].$sublink.'"><span id="ffle"></span><span id="weiter" style="font-weight:700;">Next</span></a>
							</td>
							';
				} else {
					$next='<td>
								<span id="ffle" style="cursor:default; width:62px;"></span>
							</td>
							';
				}
				
				echo '
				<div id="bottomnavwrapper">
					<table id="bottomnav">
						<tbody>
							<tr valign=top>
								'.$back.$pagenumbers.'
								'.$next.'
							</tr>
						</tbody>
					</table>
				</div>';
			} else {
				echo '
				<div id="bottomnavwrapper">
				</div>';
			}
				echo '
			</div>
			<div id="footer">
				<a div="opensource" style="margin-left:135px;">Help</a>
				<a div="opensource">Open Source</a>
				<a div="about">About</a>
				<a target=_blank href="http://www.reddit.com/user/Lutan">Contact</a>
				'.$d["proxyquery"].'
			</div>
			<div id="help" class="popup" style="display:none;">
	<h2>Help</h2>
	<div class="closebutton">Close</div>
	<p>
		
	</p>
</div>
<div id="opensource" class="popup" style="display:none;">
	<h2>Open Source</h2>
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
		</body>
	';
}

    // close opened html tags
    function closetags ($html) {
        #put all opened tags into an array
        preg_match_all ( "#<([a-z]+)( .*)?(?!/)>#iU", $html, $result );
        $openedtags = $result[1];
        #put all closed tags into an array
        preg_match_all ( "#</([a-z]+)>#iU", $html, $result );
        $closedtags = $result[1];
        $len_opened = count ( $openedtags );
        # all tags are closed
        if( count ( $closedtags ) == $len_opened )
        {
        return $html;
        }
        $openedtags = array_reverse ( $openedtags );
        # close tags
        for( $i = 0; $i < $len_opened; $i++ )
        {
            if ( !in_array ( $openedtags[$i], $closedtags ) )
            {
            $html .= "</" . $openedtags[$i] . ">";
            }
            else
            {
            unset ( $closedtags[array_search ( $openedtags[$i], $closedtags)] );
            }
        }
        return $html;
    }
    // close opened html tags
	
	
function time_passed($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
   
    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
   
    //now we just find the difference
    if ($diff == 0)
    {
        return 'just now';
    }   

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }       

    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }       

    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }   

    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }   

    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }   

    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }   

    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}
/*	
function loggedin() {
	return isset($_SESSION["active"]) && $_SESSION["active"];
}

function login() {
	global $useragent;
	if (loggedin()) {
		header("Location: nba.php");
		die();
	}
	$curl=curl_init();
	
	//LOGIN AND SHIT
	$param=array(
		"api_type" => "json",
		"user" => $_REQUEST["username"],
		"passwd" => $_REQUEST["password"],
		"rem" => true
	);
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => "www.reddit.com/api/login",
		CURLOPT_USERAGENT => $useragent,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => http_build_query($param)
	));
	$request=curl_exec($curl);
	$data=json_decode($request);
	if (isset($data->json->errors[0])) {
		header("Location: nba.php");
		die();
	}
	// END OF LOGIN
	
	// SUBSCRIBED SUBREDDITS
	$param=array(
		"api_type" => "json",
		"user" => $_REQUEST["username"],
		"passwd" => $_REQUEST["password"],
		"rem" => true
	);
	curl_setopt_array($curl, array(	
			CURLOPT_POST => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => "http://www.reddit.com/subreddits/mine/subscriber.json",
			CURLOPT_USERAGENT => $useragent,
			CURLOPT_HTTPHEADER => array("X-Modhash" => $data->json->data->modhash),
			CURLOPT_COOKIE => "reddit_session=".$data->json->data->cookie
		));
	$request=curl_exec($curl);
	$data=json_decode($request);
	if (isset($data->json->errors[0])) {
		header("Location: nba.php");
		die();
	}
	// END OF SUBSCRIBED SUBREDDITS
	
	$subscribed=array();
	foreach ($data->data->children as $child) {
		$buffer=array();
		$buffer["name"]=$child->data->display_name;
		$buffer["url"]=$child->data->url;
		$subscribed[]=$buffer;
	}
	
	$_SESSION["active"]=true;
	$_SESSION["subscribed"]=$subscribed;
	$_SESSION["username"]=$_REQUEST["username"];
	$_SESSION["modhash"]=$data->json->data->modhash;
	$_SESSION["cookie"]=$data->json->data->cookie;
	header("Location: nba.php");
	die();
}
*/
function page404() {
	$buffer=array();
	$return=array();
	
	$buffer["strLink"]="#";
	$buffer["strTitel"]="I want to be the very best - like no one ever was.";
	$buffer["strOverwrite"]="Basically what I want to tell you is: 404.";
	$buffer["strCreated"]="0 fucks left - ";
	$buffer["strBeschreibung"]="Herp derpsum derpus pee ter herderder. Pee derps sherper herderder, merp herpy herp derpus. Sherpus terpus pee berp derperker derpy tee herderder. Herderder merp, serp merpus herpem sherpus. Me le derp perp derps derperker ";
	$return[]=$buffer;
	$buffer["strLink"]="#";
	$buffer["strTitel"]="To find them is my real test, to fix them is my cause.";
	$buffer["strOverwrite"]="Either this category doesn't exist on this sub or you suck at searching.";
	$buffer["strCreated"]="0 fucks left - ";
	$buffer["strBeschreibung"]="Herp derpsum derpus pee ter herderder. Pee derps sherper herderder, merp herpy herp derpus. Sherpus ";
	$return[]=$buffer;
	$buffer["strLink"]="#";
	$buffer["strTitel"]="I will travel across the code, searchin' far and wide.";
	$buffer["strOverwrite"]="The thing is, I still have to fill this page to make it look like Google.";
	$buffer["strCreated"]="0 fucks left - ";
	$buffer["strBeschreibung"]="Herp derpsum derpus pee ter herderder. Pee derps sherper herderder, merp herpy herp derpus. Sherpus terpus pee berp derperker derpy tee herderder. H";
	$return[]=$buffer;
	$buffer["strLink"]="#";
	$buffer["strTitel"]="Each syntax to understand the error that's inside!";
	$buffer["strOverwrite"]="And I'm running out of text.";
	$buffer["strCreated"]="0 fucks left - ";
	$buffer["strBeschreibung"]="Herp derpsum derpus pee ter herderder. Pee derps sherper herderder, merp herpy herp derpus. Sherpus terpus pee berp derperker";
	$return[]=$buffer;
	$buffer["strLink"]="#";
	$buffer["strTitel"]="Errorlog! It's you and me. I know it's my destiny!";
	$buffer["strOverwrite"]='Fun fact: Cluffle is defined as a complete waste of time.';
	$buffer["strCreated"]="0 fucks left - ";
	$buffer["strBeschreibung"]="Herp derpsum derpus pee ter herderder. Pee derps sherper herderder, merp herpy herp derpus. Sherpus terpus pee berp derperker derpy tee herderder. Herderder merp, serp merpus herpem sherpus. Me le derp perp derps derperker ";
	$return[]=$buffer;
	$buffer["strLink"]="#";
	$buffer["strTitel"]="Errorlog! Ooh you're my best friend on a page we must defend!";
	$buffer["strOverwrite"]="Wasting time is the whole purpose of this page.";
	$buffer["strCreated"]="0 fucks left - ";
	$buffer["strBeschreibung"]="Herp derpsum derpus pee ter herderder. Pee derps sherper herderder, merp herpy herp";
	$return[]=$buffer;
	$buffer["strLink"]="#";
	$buffer["strTitel"]="Errorlog! A heart so true. Our courage will pull us through.";
	$buffer["strOverwrite"]="Wasting time while at work or school. Awesome.";
	$buffer["strCreated"]="0 fucks left - ";
	$buffer["strBeschreibung"]="Herp derpsum derpus pee ter herderder. Pee derps sherper herderder, merp herpy herp derpus. Sherpus terpus pee berp derperker derpy tee herderder. Herderder merp, serp merpus herpem she";
	$return[]=$buffer;
	$buffer["strLink"]="#";
	$buffer["strTitel"]="You teach me and I'll teach you. Errorlog! Gotta fix 'em all!";
	$buffer["strOverwrite"]="Trouble with filters? Use the proxy feature on the bottom.";
	$buffer["strCreated"]="0 fucks left - ";
	$buffer["strBeschreibung"]="Herp derpsum derpus pee ter herderder. Pee derps sherper herderder, merp herpy herp derpus. Sherpus terpus pee berp d";
	$return[]=$buffer;

	return $return;
}


?>
