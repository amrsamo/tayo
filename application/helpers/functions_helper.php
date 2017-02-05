<?php 
	
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