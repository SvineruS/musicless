$TOKENS = ['something', 'here'];  // VK TOKENS, SEE README FOR DETAILS

$TOKEN = $TOKENS[array_rand($TOKENS)];

if      (isset($_REQUEST['search']))   search($_REQUEST['search']);
else if (isset($_REQUEST['download'])) download($_REQUEST['download']);
else die("instruction for ur users here");



function search($name) {
	global $TOKEN;
	header('Content-type: application/json');

  	$name = urlencode($name);
  	$href = "https://api.vk.com/method/audio.search?q=$name&count=50&sort=2&access_token=$TOKEN&v=5.78";
  
	$s = CURL($href);
	$s = json_decode($s);
	
	if (property_exists ($s, 'error')) {
		echo json_encode(['artist' => 'blya', 'title' => 'captcha', 'url' => '']);
		exit;
	}
  
  	$s = $s->response->items;
  	$s = json_encode($s);
	echo $s;
}


function download($url) {
	include 'id3.php';
	
	$artist = $_REQUEST['artist'] ?? FALSE;
	$title = $_REQUEST['title'] ?? FALSE;
	
  	header('Content-Type: audio/mpeg');
  	header("Content-Disposition: inline; filename=svinerusmusic.mp3");
  	header("Content-Transfer-Encoding: binary");
	
	
	if ($artist || $title)
		echo id3($artist, $title);


	CURL($url, [CURLOPT_WRITEFUNCTION  => function($curl, $data) {
                                echo $data;
                                return strlen($data);
                             }
             ]);

}


function id3($artist, $title) {
	$artist = $artist ? $artist : 'Нонейм';
	$title = $title ? $title : 'Без названия';
	
	return create_id3([
		'TPE1' => $artist,
		'TIT2' => $title,
	]);
	
}



							 
function CURL($url, $also=[]) {
  	$a = Array(
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_SSL_VERIFYPEER => FALSE,
		CURLOPT_SSL_VERIFYHOST => FALSE,
		CURLOPT_URL	           => $url,
		CURLOPT_CONNECTTIMEOUT => 20,
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_HTTPHEADER     => ['User-Agent: KateMobileAndroid/52.1 lite-445 (Android 4.4.2; SDK 19; x86; unknown Android SDK built for x86; en)'],
	) + $also;
  
	$ch = curl_init();
	curl_setopt_array($ch, $a);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data; 
}
