<?php 
	

	function current_url_querystring()
{
    $CI =& get_instance();

    $url = $CI->config->site_url($CI->uri->uri_string());
    if (strpos($_SERVER['QUERY_STRING'], 'category') !== false) 
    {
    	$q = get_string_between($_SERVER['QUERY_STRING'],'=','&');
        return $url.'?q='.$q;
    }
    return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
}
	

	function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

	function cleanHashtag($x)
	{	

		$hashtags = array('restaurant','petcare','daycar','airline','airlines','travel','weddingphotography','makeupartist','makeup','influencer','influencers','traveler','travelers','fitness','hotel','brands','hairstylist','interiordesign','interiordesigner','eventplanner','weddingplanner','fashiondesigner','fashionstylist','barber','grocery','supermarket','photographer','blogger','dj','artist','stylist');

		switch ($x) {
	    case "weddingphotography":
	        return "Wedding Photographer";
	        break;
	    case "petcare":
	        return "Pet Care";
	        break;
	    case "daycar":
	        return "Day Care";
	        break;
	    case "makeupartist":
	        return "Makeup Artist";
	        break;
	    case "interiordesign":
	        return "Interior Design";
	        break;
	    case "grocery":
	        return "Interior Designer";
	        break;
	    case "eventplanner":
	        return "Event Planner";
	        break;
	    case "weddingplanner":
	        return "Wedding Planner";
	        break;
        case "fashiondesigner":
	        return "Fashion Designer";
	        break;
        case "fashionstylist":
	        return "Fashion Stylist";
	        break;
        case "weddingplanner":
	        return "Wedding Planner";
	        break;
        case "dj":
	        return "DJ";
	        break;
	    default:
	        return ucfirst($x);
}
	}
	function printme($x)
	{
		echo '<pre>'.print_r($x,true).'</pre>';
	}

	function handleUpload($video_id,$filename)
	{

		$target_dir = base_url().'public/upload/videos';
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$videoFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$imageFileType = pathinfo($_FILES["fileToUpload_image"]["name"],PATHINFO_EXTENSION);

		// Allow certain file formats
		if($videoFileType != "flv" && $videoFileType != "mp4") {
		    return false;
		}

		// Allow certain file formats
		if($imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jpg") {
		    return false;
		}

    $source_file = $_FILES["fileToUpload"]["tmp_name"];
		$destination_path = 's3://life_is_big/'.$video_id.'/'.$filename;
		$cmd = 's3cmd put --debug --acl-public --config=/home/amrbakr/.s3cfg ' . $source_file . ' ' . $destination_path;
		exec($cmd . ' >> file.log 2>&1', $out, $ret);

		if ($ret)
		{
			return false;
		}

		$source_file = $_FILES["fileToUpload_image"]["tmp_name"];
		$destination_path = 's3://life_is_big/'.$video_id.'/image/'.$filename;
		$cmd = 's3cmd put --debug --acl-public --config=/home/amrbakr/.s3cfg ' . $source_file . ' ' . $destination_path;
		exec($cmd . ' >> file.log 2>&1', $out, $ret);

		if ($ret)
		{
			return false;
		}

		return true;
	}

	
 ?>