<?php	$dir = "images/logos/";
	$url = $_POST['url'];
	if (is_writable($dir)) {
		if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 1048576)) {
  			if ($_FILES["file"]["error"] > 0){
    				echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    			} else {
				$_FILES["file"]["name"] = str_replace(' ', '_' , $_FILES["file"]["name"]);
    				if (file_exists($dir . $_FILES["file"]["name"])) {
     					echo $_FILES["file"]["name"] . " already exists. ";
      				} else {
					switch($_FILES["file"]["type"]) {
					case "image/jpeg" : $end = ".jpg";
					break;
					case "image/png" : $end = ".png";
					break;
					case "image/gif" : $end = ".gif";
					break;
					}
					$newname = time().$end;
      					move_uploaded_file($_FILES["file"]["tmp_name"], $dir . $newname);
					$file = $newname;
					$admin = "/wp-admin/themes.php?page=functions.php&pic=";
      					header("Location: $url$admin$file");
      				}
    			}
  		}
	} else {
	echo "Folder isn't writable please make sure this folder is able to be written to by the web server";
	}
?>
