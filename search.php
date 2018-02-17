<?php
$data=$_GET['id'];
if(isset($_COOKIE['user']))
{
$receiv=$_COOKIE['user'];
}
else
{
	$receiv="";
}
$found=0;
$length=strlen($data);
$dt=mysqli_connect("localhost","root","","blog") or die();
$db=mysqli_query($dt,"SELECT `emailid`,`fname`,`lname` FROM signin WHERE `emailid`<>'$receiv'");
$tdata="";

foreach($db as $usid){
	$id=$usid['emailid'];
	$fn=$usid['fname'];
if(stristr($data,substr($fn, 0,$length))){

   		$name=ucfirst($fn)." ".ucfirst($ln);

     $tdata=$tdata."<tr><td class=row><a class=white href=profile.php?rec=$id>$name</a></td><td class=row>$id</td><td class=row></td></tr><form method=post action=index.php?rec=$id>";
     $found=1;
 
}
}

if($found==1){
	echo "<table class=searchtbl>$tdata</table>";
}
else{
	echo "no match found";
}

?>
 