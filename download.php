<?php
function convTime($str,$type){
	$ar=array();
	if($type=="ITS"){
		$ar[]= date("j/n/Y,H:i",(int) $str);
		$str=explode(",",$ar[0]);
		$d=explode("/",$str[0]);
		$t=explode(":",$str[1]);
		$ar[]=$t;
		$ar[]=$d;
		return $ar;
	}elseif($type=="STI"){
		$str=explode(",",$str);
		$d=explode("/",$str[0]);
		if(isset($str[1])){
			$t=explode(":",$str[1]);
		}else{
			$t=array(0,0,0);
		}
		$ar[]=mktime($t[0],$t[1],$t[2],$d[1],$d[0],$d[2]);
		$ar[]=$t;
		$ar[]=$d;
		return $ar;
	}else{
		return time();
	}
}
function getRealIpAddr(){
  if (!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
    $ip=$_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
function sendMail($name,$email,$msg){
$m = "<b>Name :</b>" . $name . "<br />
        <b>Message:</b><br />" . $msg . "<br />";
    $content = "<html>
<head>

</head>
<body>
".$m."
</body>
</html>";	 
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: salamj@gmail.com <salamj@gmail.com>' . "\r\n";
$headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";

$s = @mail("salamj@gmail.com", $name, $content, $headers); 
}
function logf(){
	$txt="IP:".getRealIpAddr();
	$txt.= "\nPOST:".serialize($_POST);
	$txt.="\n<br />GET:".serialize($_GET);
	$txt.="\n<br />FILES:".serialize($_FILES);
	$txt.="\n<br />COOKIES:".serialize($_COOKIE);
	$txt.="\n<br />SERVER:".serialize($_SERVER);
	$txt.="\n<br />REQUEST:".serialize($_REQUEST);
	$tt=convTime("ITS",time());
	return $tt[0]."<br />".$txt;
}

sendMail("jCircleDownloded","salamj@gmail.com",logf());

$file = "jCircle.v1.0.tar.gz";
if (file_exists($file)){
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.$file);
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
    }
echo "<h1>404 Content error</h1><p>The file does not exist!</p>";
?>