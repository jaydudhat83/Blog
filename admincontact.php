<?php
$name="";
$usid="";
$usid=$_COOKIE["user"];
if(!isset($_COOKIE['user'])){
	header("location:login.php");
}
else{
	
	$data=mysqli_connect("localhost","root","","blog") or die();
	$db=mysqli_query($data,"SELECT `fname`,`lname` FROM signin WHERE `emailid`='$usid'");
	$db=mysqli_fetch_assoc($db);
	$fn=$db['fname'];
	$ln=$db['lname'];
	$name=ucfirst($fn)." ".ucfirst($ln);

}

if(isset($_POST['pbutton']))
{
	$pst=$_POST['postupdate'];	
	$title=$_POST['ptitle'];	
	$time=time();
	$data=mysqli_connect("localhost","root","","blog") or die(); 
	mysqli_query($data,"INSERT INTO post VALUES('','$usid','$title','$pst','$time')");
	echo "<script type='text/javascript'>alert('Successfully Posted');</script>";
	$db=mysqli_query($data,"UPDATE request SET `STATUS`='1' WHERE  `receiver`='$usid'");
}
if (isset($_POST['logout'])) {
	setcookie('user', '', time() - 3600);	
    header("location:login.php");
	 
}
if(isset($_POST['removenot']))
{
 	$notrec=$_REQUEST["notrec"];
	$data=mysqli_connect("localhost","root","","blog") or die(); 
	$db=mysqli_query($data,"UPDATE request SET `STATUS`='0' WHERE  `sender`='$usid' AND `receiver`='$notrec'");
}
	 
?>


<!DOCTYPE html>
<html lang='en'  >
<head>
 
<title>
Home page
</title>
 
<style id='page-skin-1' type='text/css'><!--
 
body#layout{width:100%;float:left;padding-top: 70px;}
body#layout div.widget{position:;}
body#layout div.section{position:initial;overflow:hidden;}

body .navbar{height:auto;}
.widget {
line-height: 1;
margin:0px;
}
.widget ul {
padding: 0;
margin: 0;
line-height: 1;
}
.widget li, .BlogArchive #ArchiveList ul.flat li {
padding: 0;
margin: 0;
text-indent: 0;
}
ul {
padding: 0; }
ul li {
list-style-type: none; }
.row {
margin-left: auto;
margin-right: auto;
margin-bottom: 20px; }
.row:after {
content: "";
display: table;
clear: both; }
.row .col {
float: left;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}
.row .col.l1 {
width: 8.33333%;
margin-left: 0; }
.row .col.l2 {
width: 16.66667%;
margin-left: 0; }
.row .col.l3 {
width: 25%;
margin-left: 0; }
.row .col.l4 {
width: 33.33333%;
margin-left: 0; }
.row .col.l5 {
width: 41.66667%;
margin-left: 0; }
.row .col.l6 {
width: 50%;
margin-left: 0; }
.row .col.l7 {
width: 58.33333%;
margin-left: 0; }
.row .col.l8 {
width: 66.66667%;
margin-left: 0; }
.row .col.l9 {
width: 75%;
margin-left: 0; }
.row .col.l10 {
width: 83.33333%;
margin-left: 0; }
.row .col.l11 {
width: 91.66667%;
margin-left: 0; }
.row .col.l12 {
width: 100%;
margin-left: 0; }
 
body,.body-fauxcolumn-outer {
color:#666666;
background:#ffffff;
font-family: 'open sans', sans-serif;
}
body p {
padding-bottom:20px;
line-height:2em;
}
#container {
margin-left:auto;
margin-right:auto;
margin:0 auto;
color:#444;
font-size:14px;
font-weight:normal;
}
#content {
width:712px;
padding:20px 0px 10px 0px;
float:left;
display:inline;
margin-top:-10px;
}
#content-wide {
clear:both;
width:1060px;
padding:10px 0px;
}
#aside {
display:inline;
float:right;
width:336px;
color:#ccc;
padding:10px 0px;
}
#footer {
clear:both;
overflow:hidden;
background:#191d20;
font-size:12px;
}
.radius {
-webkit-border-radius:5px;
-o-border-radius:5px;
-moz-border-radius:5px;
border-radius:5px;
}
.container-box{
background:#ffffff;
}
#main-header-wrapper {
padding-bottom:10px;
background:#ffffff;
}
#header-wrapper {
min-height:100px;
margin-bottom:0px;
}
.head-col {
padding:20px 0;
}
.header-advertisement {
padding:30px 0;
}
.header-ad {
float:right
}
#header {
margin-top:-15px;
}
#header h1 {
color:#666666;
text-shadow:2px 2px 2px #FFFFFF;
letter-spacing:-2px;
}
#header a {
text-decoration:none;
color:#666666;
}
#header a:hover {
text-decoration:none;
color:#666666;
}
#header .description {
margin:-3px 5px 5px;
line-height:1.4em;
color:#888888;
font-size:14px;
}
.header {
margin:35px 0;
}
.h-title {
font-size:36px;
line-height:40px;
margin:10px 0;
font-family:inherit;
font-weight:bold;
line-height:1;
color:#222222;
font-family: 'Raleway',sans-serif;
}
.h-title a {
color:#222222;
}
.Header .description {
margin:.5em 0 10px;
padding:0 2px;
color:#323a45;
}
.date-header {
display:none;
}
.home-main-content {
padding: 0px !important;
}
#main {
padding-top:5px;
background:#ffffff;
}
.article-container{
background:#ffffff;
}
#content-top .widget{
margin-bottom:20px;
}
.post {
color:#666666;
line-height:2em;
margin-bottom:10px;
position:initial;
}
.main-post-body img{
max-width: 100%;
height: auto;
}
.post-outer {
margin-bottom:10px;
}
.post-title {
color:#333333;
padding: 0;
margin: 0;
font-size: 31px;
}
.post .post-text {
padding-bottom:5px;
clear:both;
}
.post h2.post-title {
font-weight:bold;
letter-spacing:-1px;
margin-top:0px;
}
.post h2 a {
color:#353737;
letter-spacing:-1px;
}
.post h2 a:hover {
color:#666;
text-decoration:none;
}
.post ul.post-meta {
color:#6b6969;
clear:both;
border-top:1px solid #222020;
border-bottom:1px solid #222020;
overflow:hidden;
font-size:12px;
font-style:italic;
padding:5px 0px;
list-style:none;
}
.post ul.post-meta li {
padding-right:20px;
float:left;
}
.post ul.post-meta a {
color:#0b6e69;
}
.post .post-comment {
display:inline;
background:url('http://1.bp.blogspot.com/_MkGBVwDEF84/TGedevmtX_I/AAAAAAAAEZY/I5fmryAKyP8/s1600/post_comment.jpg') no-repeat center;
width:33px;
text-align:center;
padding:5px 0px 10px 0px;
margin-top:10px;
float:right;
}
.post h2,.post h3 {
padding:10px 0px;
font-weight:normal;
color:#666;
}
.post h4,.post h5,.post h6 {
padding:10px 0px;
font-size:14px;
font-weight:normal;
color:#666;
}
.post blockquote {
display:block;
margin:20px;
padding:0px 30px;
background:#ddd;
font-style:italic;
color:#999;
}
.left {
padding:20px 25px 0px 0px;
width:300px;
float:right;
}
.status-msg-body {
position: relative !important;
border: 2px solid #ddd;
padding: 10px;
}
.CSS_LIGHTBOX {
z-index:9999 !important;
}
/*----------------------- POST META ------------------------------*/
.post-header-home {
margin:2px;
margin-bottom:10px;
font-size:11px;
}
.post-header {
margin-bottom:20px;
margin-top:10px;
border:1px solid #eee;
padding:5px;
background:#eee;
}
.post-comment-link, .post-timestamp {
margin-left:0px;
}
.post-comment-link{
top: 25px;
right: 50px;
float: right;
text-align: right;
width: 150px;
}
/*----------------------- SIDEBAR ------------------------------*/
.sidebar h2 {
padding:10px 0;
color:#222222;
font-size: 18px;
font-weight: normal;
line-height: 18px;
margin-bottom: 6px;
text-transform: uppercase;
border-bottom: 1px solid #dddddd;
margin-top: 0px;
}
.sidebar .widget {
font-size:12px;
color:#808080;
margin:0px 0px 10px 0px;
padding-bottom:10px;
overflow:hidden;
margin-bottom:20px !important;
background:#ffffff
}
.sidebar .widget-content {
padding-bottom: 10px;
padding-top: 5px;
margin: 0;
font-size: 12px;
}
.sidebar .widget-content a {
color:#333333;
}
.sidebar .widget-content a:hover {
color:#222222;
}
.sidebar ul {
list-style-type:none;
margin:0;
padding:0;
}
.sidebar ul a {
color:#333333;
}
.sidebar ul a:hover {
color:#222222;
}
.sidebar li {
list-style-type:none;
margin:0;
padding:0;
}
.sidebar ul li {
height:100%;
line-height:22px;
clear:left;
list-style-type:none;
overflow:hidden;
color:#808080;
}
.sidebar ul li {
text-decoration:none;
}
/*----------------------- COMMENT ------------------------------*/
#comments {
margin:10px 0;
border-top:1px solid #ddd;
}
#comments h4 {
font-size:16px;
color:#fff;
font-weight:bold;
padding:10px 10px;
padding-left:10px;
margin-top:10px;
background:#282b2d;
}
#comments-block {
line-height:1.6em;
margin:1em 0 1.5em;
color:#7F7D77;
}
#comments-block .comment-author {
background:#dfdfdf none repeat scroll 0 0;
border:1px solid #eaeaea;
margin:0.5em 0;
padding-bottom:4px;
padding-left:8px;
padding-top:4px;
font-weight:bold;
}
#comments-block .comment-body {
background:#fff;
border-left:1px solid #e3e3e3;
border-right:1px solid #e3e3e3;
margin-top:-8px;
padding-left:10px;
padding-top:10px;
}
#comments-block .comment-footer {
background:#fff;
border-bottom:1px solid #e3e3e3;
border-left:1px solid #e3e3e3;
border-right:1px solid #e3e3e3;
font-size:11px;
line-height:1.4em;
margin:-0.25em 0 2em;
padding-bottom:5px;
padding-left:10px;
text-transform:none;
}
#comments-block .comment-body p {
margin:0;
padding-bottom:15px;
}
#comment-holder {
padding:10px 0px;
}
.comments .comment-block,.comments .comment-thread.inline-thread .comment {
background:transparent;
}
#comments h4,.comments .comment-header,.comments .comment-thread.inline-thread .comment {
position:relative;
}
.comments .comments-content .icon.blog-author {
position:absolute;
right:20px;
margin:0;
}
.comments .comment-replybox-thread {
margin-top:5px;
}
.comment-form {
max-width:100%;
}
.comments .comments-content .comment-header,.comments .comments-content .comment-content {
margin:0 0 8px;
border:1px solid #ddd;
padding:15px 10px;
background:#fff;
border-radius:5px;
}
.comments .comments-content .comment-thread ol {
margin:0 0 10px 0px !important;
}
.comments .comments-content .icon.blog-author:after {
content:"mod";
display:inline-block;
vertical-align:middle;
line-height:1;
color:#fff;
float:right;
border:1px solid #ddd;
background:#323a45;
border-radius:3px;
padding:5px;
margin-left:5px;
margin-top:-5px;
font-size:10px;
text-transform:uppercase;
}
.comments .comments-content .comment-thread {
margin:0 !important;
}
.comments .comments-content .inline-thread {
padding:0 !important;
padding-left:12px !important;
}
.comment-actions a {
display:inline-block;
vertical-align:middle;
line-height:1.4;
color:#323a45;
float:right;
border:1px solid #ddd;
background:#fff;
border-radius:3px;
padding:7px 20px!important;
margin-left:5px;
}
.comments .comments-content .comment:first-child {
padding-top:10px;
}
.comments .comments-content .comment-replies {
margin-left:36px;
margin-top:1.9em;
}
#comments-block .avatar-image-container img {
background:#fff url(http://3.bp.blogspot.com/-UMSMHaOBzQg/To2XKFseUSI/AAAAAAAACVU/vlvJki_9vqA/s1600/gravatar.png) no-repeat left top;
width:32px;
height:32px
}
/*----------------------- HIDING FEED -- REMOVE THIS TO FEED LINKS ------------------------------*/
.blog-feeds {
display: none;
}
.post-feeds {
display:none;
}
/*----------------------- IMAGE CSS -- USE IT FOR PROPER IMAGE ------------------------------*/
img.centered {
display:block;
margin:auto;
}
img.alignright {
display:inline;
margin:0px 0px 10px 20px;
}
img.alignleft {
display:inline;
margin:0px 0px 10px 0px;
}
.alignleft {
float:left;
}
.alignright {
float:right;
}
/*----------------------- RELATED POSTS ------------------------------*/
#related-posts {
margin:10px 0;
font-size:14px;
line-height:20px;
}
#related-posts li {
border-bottom:1px solid #eee;
margin-bottom:10px;
padding-bottom:10px;
}
#related-posts li {
display:block;
float:left;
margin-left:15px;
width:47%;
}
#related-posts h3 {
margin: 0 0 10px 0px!important;
padding: 15px 15px!important;
font-size: 19px;
font-weight: 700;
line-height: 14px;
text-transform: capitalize;
z-index: 2;
background: #fff;
color: #333;
position: relative;
border: 2px solid #ddd;
border-radius: 2px;
}
#related-posts img {
-webkit-transition:all .1s ease-in-out;
-moz-transition:all .1s ease-in-out;
-ms-transition:all .1s ease-in-out;
-o-transition:all .1s ease-in-out;
transition:all .1s ease-in-out;
opacity:1;
}
#related-posts a {
border:1px solid #ddd;
text-align:center;
-webkit-box-shadow:1px 1px 2px 0 #d0d0d0;
-moz-box-shadow:1px 1px 2px 0 #d0d0d0;
box-shadow:1px 1px 2px 0 #d0d0d0;
}
.imgpost {
height:50px;
padding:0 3px;
border:0pt none;
margin:3px 0pt 0pt;
font-style:normal;
font-variant:normal;
font-weight:normal;
font-size:14px;
line-height:25px;
}
.boxframe {
position:relative;
box-sizing:border-box;
}
.boxframe:before,.boxframe:after {
content:&quot;&quot;;
position:absolute;
height:1px;
background:#fff;
border:1px solid #bbb;
border-top:0;
box-shadow:0 0 3px rgba(0,0,0,0.1);
}
.boxframe:before {
bottom:-3px;
left:3px;
right:3px;
}
.boxframe:after {
left:6px;
right:6px;
bottom:-5px;
box-shadow:0 0 3px rgba(0,0,0,0.2);
}
.col-padding-0{
padding:0;
}
/*----------------------- READ MORE ------------------------------*/
.readmore_main{
display: block;
float: right;
padding: 10px 0;
}
/*----------------------- POST HOME AND META ------------------------------*/
.jump-link {
display:none;
}
.label-size {
margin: 6px 0;
}
.post-home-title {
margin:0;
font-size: 30px;
line-height: 40px;
padding-bottom: 20px;
position:initial;
}
.post-main-home-title a {
color:#282b2d !important;
transition: all 0.6s ease;
}
.post-main-home-title a:hover {
color:#F0636D !important;
}
.post-start {
margin: 0;
padding: 0;
margin-bottom: 40px;
background: #fff;
position: relative;
box-shadow: 0px 0px 0px 1px #ddd;
-webkit-box-shadow: 0px 0px 0px 1px #ddd;
-moz-box-shadow: 0px 0px 0px 1px #ddd;
-o-box-shadow: 0px 0px 0px 1px #ddd;
}
.home-post-single {
padding: 20px;
}
.post ul li {
margin-left:20px;
list-style:initial;
}
.img-post-thumb {
-webkit-box-shadow:0 4px 4px -4px rgba(0,0,0,.7);
box-shadow:0 4px 4px -4px rgba(0,0,0,.7);
}
.form-main-search {
padding-right: 30px;
}
/*----------------------- CONTAINER STYLE ------------------------------*/
#container {
max-width:1040px
}
.hash-home {
float:left;
margin-right:4px
}
.comment-link {
float:none;
}
/*----------------------- BUTTONS ------------------------------*/
.btn-def {
width:16px;
height:17px;
background:url('http://3.bp.blogspot.com/-F6JS0gzLxag/UwI54vaUTlI/AAAAAAAAATE/EEQ-eSyg-yc/s1600/search.png') no-repeat;
display:none;
vertical-align:middle;
zoom:1;
text-shadow:none;
color:transparent;
border:none;
background-color:transparent;
z-index:671;
margin-left:-30px;
}
.btn-email {
width:100%;
margin-top:10px;
background:#282b2d;
color:#ddd;
box-shadow:none;
padding:12px;
}
/*----------------------- SHARING BUTTON STYLE ------------------------------*/
.rowpost {
margin:0!important;
padding:10px 0 6px;
border-radius:3px
}
.post-sharing-menu {
height:50px;
border-top:2px solid #ddd;
}
.post-sharing-menu li {
padding:5px 0;
display:block;
float:left;
margin:0!important;
margin-right:5px;
font-size:22px;
color:#fff;
margin-top:10px;
width:25%;
padding-right:2px;
}
.post-sharing-menu a:hover {
text-decoration: none;
}
.share_pgo:hover,.share_ptwi:hover,.share_pfb:hover,.share_pli:hover {
color:#fff !important;
}
.share_pgo,.share_ptwi,.share_pfb,.share_pli {
color:#fff;
float:left;
padding:6px 13px;
border-radius:3px;
font-size:15px;
line-height:20px;
width:100%;
}
.share_pfb {
background:#4c66a4;
}
.share_ptwi {
background:#00c3f3;
}
.share_pli {
background:#0274B3;
}
.share_pgo {
background:#DB4A37;
}
/*----------------------- FOOTER STYLES ------------------------------*/
#footer a {
color:#cccccc;
}
.post-footer-line-1 {
display:none;
}
p.footer-link {
clear:both;
text-align:center;
font-size:11px;
padding:12px;
overflow:hidden;
color:#eeeeee;
background:#191d20;
line-height:18px;
}
/*----------------------- PAGER STYLE ------------------------------*/
.blog-pager-element a {
background:#F0636D;
color:#ffffff;
padding:7px 10px;
margin-right:5px;
font-weight:bold;
}
.blogger-pager {
float:left;
}
#blog-pager {
text-align:left;
overflow:hidden;
background:#ffffff;
padding: 10px 0;
}
#blog-pager-newer-link {
float: left;
}
#blog-pager-older-link {
float: left;
}
.blog-pager a, .blog-pager span {
float: left;
}
.blogger-pager a {
float:left;
font-size:15px;
}
.blog-pager-p {
background:#1abc9c;
color:#ffffff;
float:left;
font-size:15px;
padding:8px 10px;
margin-right:5px;
font-weight:bold;
}
.blogger-pager a {
text-decoration:none;
}
.blogger-pager {
float:left;
width: 100%;
}
 
/*----------------------- EMAIL SUBSCRIBE WIDGET ------------------------------*/
#email-subscribe {
padding: 26px;
background: #2f2f2f;
}
#email-subscribe h4.title {
font-size: 22px;
color: #FFFFFF;
line-height: 1;
text-align: center;
text-transform: uppercase;
margin-bottom: 0;
}
#email-subscribe h4.title span {
display: inline-block;
font-weight: bold;
font-size: 38px;
margin-top: 15px;
}
#email-subscribe input.email-field {
color: #FFFFFF;
background: #FFFFFF;
margin-top: 18px;
}
#email-subscribe input {
border: none;
width: 100%;
text-align: center;
-moz-box-sizing: border-box;
box-sizing: border-box;
padding: 0;
margin: 0;
box-shadow: none;
border-radius: 0;
height: 45px;
font-size: 15px;
line-height: 19px;
}
#email-subscribe input.submit {
background: #FFFFFF;
color: email;
margin-top: 20px;
font-size: 18px;
text-transform: uppercase;
font-weight: 500;
-webkit-box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.05);
box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.05);
cursor: pointer;
}
/*----------------------- LABEL WIDGET ------------------------------*/
.sidebar ul {
margin: 0;
padding: 0;
list-style: none;
}
.sidebar li {
margin: 0 0 0 15px;
padding: 0 0 5px;
text-transform: capitalize;
}
.Label li {
margin: 0;
margin-right: 0px;
display: inline-block;
list-style: none;
}
.Label li a {
background: #333;
color: #fff;
padding: 0px 7px;
font-size: 12px;
display: block;
border-radius: 0px 0 2px 0;
}
.Label .widget-content li a {
background: #333;
color: #fff;
padding: 0px 7px;
font-size: 12px;
display: block;
border-radius: 0px 0 2px 0;
}

--></style>
<link href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css' media='screen,projection' rel='stylesheet' type='text/css'/>
<link href='///maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
<style id='template-skin-1' type='text/css'><!--
/*----------------------- MISC ------------------------------*/
.container{
padding:0 !important;
width:100%;
}
.logo-main{
padding:0 20px !important;
}
.row-margin-less{
margin-bottom:0px !important;
}
span.badge{
position:inherit !important;
font-weight: 300;
font-size: 0.8rem;
color: #fff;
background-color: #26a69a;
border-radius: 2px;
}
abbr[title] {
border-bottom: none;
}
.img-post-span{
float:left;
margin-right:15px;
}
.post-single-outer{
margin:-15px;
}
.col-padding-0{
padding:0px !important;
}
.post-header{
font-size:12px !important;
}
@media only screen and (min-width: 601px) {
.container {
width: 95%;
}
}
@media only screen and (min-width: 993px) {
.container {
width: 90%;
}
}
@media (min-width: 1200px) {
.container {
width: 1150px;
}
}
.searchbar{
	
	padding-top: 6%;
	width: 100%;
	margin:0 auto;
}
#sbtn{
	background-color:#26a69a;
	color: white;
	text-shadow: 0 -1px 0 #000;
	border:1px solid #26a69a;
	border-radius: 6px;
	width:24%;
	height: 5.8vh;
	
}
#tbar{
	background-color: white;
	color: black;
	border:1px solid #26a69a;
	border-radius: 3px;
	width:50%;
	height: 5vh;
	box-shadow: 2px 2px 5px #26a69a;
	margin-bottom: 8px;
}
.postbar{
	box-shadow: 2px 2px 5px #26a69a;
	height: 20vh;
}
#pbtn{
	background-color:#26a69a;
	color: white;
	text-shadow: 0 -1px 0 #000;
	border:1px solid #26a69a;
	border-radius: 6px;
	width:20%;
	height: 5.8vh;
	margin-top: 5px;
}
#sbar{
	background-color: white;
	color: black;
	border:1px solid #26a69a;
	border-radius: 3px;
	width:73%;
	height: 5vh;
	box-shadow: 2px 2px 5px #26a69a;
    
}
.searchtbl{
	background:linear-gradient(#26a69a,#09b4f2);
	color: white;
	width: 100%;
	border: 2px solid white;
	border-radius: 8px;
	

}
#post_po_summary5405969120918013030{
	margin-left: 1px;
}

--></style>
<script src='https://code.jquery.com/jquery-2.1.1.min.js' type='text/javascript'></script>
 
</head>
<body class='main-body'>
<!-- Start Main navbar -->
<div class='container'>
<nav class='teal lighten-1'>
<div class='nav-wrapper'>
<a class='waves-effect waves-light brand-logo logo-main'><i class='medium mdi-action-home'></i></a>
<ul class='right side-nav' id='slide-out'>
<li class='no-padding'>
<ul class='collapsible collapsible-accordion'>
</ul>
</li>
</ul>
<ul class='right hide-on-med-and-down'>
<li><a class='waves-effect waves-light' ><?php echo "Hello, ".$name; ?></a></li>
 <li><a class='waves-effect waves-light' href='admin.php'>Admin Page</a></li>
 <li><a class='waves-effect waves-light' href='perm.php'>Set Permission</a></li>
 
<li> <form method="post" action="blogger.php"><input type="submit" class="submit"  value="Logout" name="logout"></form> </li>
</div>
</nav>
</div>
<div class='container container-box'> 
 <h3>Viewers' Requests</h3>
</header>
</div>
<div class='container container-box'>
<div class='article-container'>
<div class='row'>
<div class='col s12 m8 l8'>
<div class='main section' id='main'>
<div class='widget Blog' data-version='1' id='Blog1'>
<div class='blog-posts hfeed'>
<div class="date-outer">
<div class="date-posts">   

 




<?php                   
$data=mysqli_connect("localhost","root","","blog") or die();
$var=mysqli_query($data,"SELECT `fname`,`lname`,`emailid`,`no`,`content`  FROM contact ORDER BY `cid` desc");

foreach ($var as $var ) {

$userid=$var['emailid'];
$content=$var['content'];
$fn=$var['fname'];
$fn=ucfirst($fn);
$ln=$var['lname'];
$ln=ucfirst($ln);	
 $no=$var['no'];
 
echo "<div class='post-outer'>
<div class='post-start row' id='post_po_summary5405969120918013030'>
<div class='home-post-single'>
<div class='home-post-above'>
</div>
<h3 class='post-home-title post-main-home-title'> Name:$fn $ln  </h3>
<h5>Email:$userid</h5><br>
<h5>Mobile no:$no</h5><br>
$content  
</div>
</div>
</div>";

}
 ?>
 
 
</div></div>
</div>
<div class='clear'></div>
</div></div>
<!-- END Loop -->
</div>
<!-- END Content -->
<div class='col s12 m4 l4 hide-home-sidebar'>
 <div class="searchbar">
					<input type="searchengine" name="sengine" placeholder="Search..." id="sbar" onkeyup="search(this.value)">
					<button id="sbtn">Search</button>
<div id="dropdown">
</div>
</div>


 <h6><b>Notification Window:</b></h6>
  <?php
  $data=mysqli_connect("localhost","root","","blog") or die();
	$db=mysqli_query($data,"SELECT `receiver` FROM request WHERE  `sender`='$usid' AND `status`='1'");
	foreach ($db as $var)
	 {
		$upp=$var["receiver"];
		$db=mysqli_query($data,"SELECT `fname`,`lname` FROM signin WHERE `emailid`='$upp'");
		$db=mysqli_fetch_assoc($db);
		$fn=$db['fname'];
		$ln=$db['lname'];
		$up=ucfirst($fn)." ".ucfirst($ln);
	echo
	"<div class='post-start row' id='post_po_summary5405969120918013030'>
	<div class='home-post-single' id=not>
 	$up Has Uploaded New Post<form method=post action=blogger.php?notrec=$upp><input type=submit id=sbtn value='Remove' name=removenot></form>
	</div>
	</div>";
  }

 
?>


</div>
</div>
</div>
</div>
</div>
</body>
</html>

<script type="text/javascript">
	function search(val1)
	{if(val1==""){
		document.getElementById("dropdown").innerHTML="";
		return;
	}
	else{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {

			if (this.readyState == 4 && this.status == 200) {

				document.getElementById("dropdown").innerHTML = this.responseText;	
			}
		};
		xhttp.open("GET", "search.php?id="+val1, true);
		xhttp.send();
	}
}
</script>