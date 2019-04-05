<?

function create_id3($tags) {
	
	function get_len($len) {
		$res = [];
		while ($len > 0) {
			$r = $len % 128;
			$res []= chr($r);
			$len -= 128;
		}
    
		while (Count($res) < 4) 
			array_unshift($res, chr(0));
		
		return implode('', $res);
	}
	
  
	$id3 = utf8_encode('ID3') . chr(4) . chr(0) . chr(0);
	$all_len = 0;
	
	$frames = [];
	
	foreach($tags as $tag => $value) {
		$tag = $tag;
		$value = chr(3) . $value . chr(0);
		
		$len = strlen($value);
		$safelen = get_len($len);
		
		$flags = chr(0) . chr(0);
		
		$frame = "$tag$safelen$flags$value";
		$frames[] = $frame;
		
		$all_len += $len + 10;
		
	}
	
	$id3 .= get_len($all_len);
	$id3 .= implode('', $frames);
	
	return $id3;	
	
}

?>
