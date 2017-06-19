<?php

function upload($path, $file, $name = null)
{
	if ($_FILES[$file]["error"] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES[$file]["tmp_name"];
        
        $ext = pathinfo($_FILES[$fieldname]['name'], PATHINFO_EXTENSION);
        $name = uniqid(mt_rand(), true) .;
        move_uploaded_file($tmp_name, $path . $name . '.' . $ext);
    }
}

function download($path, $downloadName = null)
{
	if (file_exists($path))
	{
		if(!$downloadName)
		{
			$downloadName = basename($path);
		}

	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename="' . $downloadName . '"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($path));
	    readfile($path);
	    exit;
	}
}

