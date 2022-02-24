<?php

use Intervention\Image\ImageManagerStatic as Image;

/**
 * 
 */
class Filesystem
{
	public function moveUpload($file, $data, $filetype = array('jpg', 'jpeg', 'gif', 'png', 'pdf', 'svg'))
	{
		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		if (!empty($filetype)) {
			if (!in_array(strtolower($ext), $filetype)) {
				return array("error" => true, "message" => "Supported file type ".implode(',', $filetype));
			}
		}

		if ($file['error'] != 0) {
			return array("error" => true, "message" => "No file uploaded.");
		}

		if ($file['size'] > 4999999) {
			return array("error" => true, "message" => "Docuement under 5MB are accepted for upload.");
		}
		
		// Create folder if its not exist
		if (!file_exists($data['filedir'])) {
			mkdir($data['filedir'], 0777, true);
		}

		$name = $data['file_name'].'.'.$ext;
		$target_file = $data['filedir'].$name;
		if (move_uploaded_file($file['tmp_name'], $target_file)) {
			if(in_array($ext, array('jpg', 'jpeg', 'gif', 'png', 'svg'))){
				$this->reduceImageSize($target_file);
			}
			return array("error" => false, "name" => $name);
		} else {
			return array("error" => false, "message" => "No file uploaded.");
		}
	}

	/*
     * Reduce the size(in regards of qulity) of image file according to the definded 
     * constant FILE_QLT_REDUCE_PERCENT in config/constants.php file
     * 
     * @param valid image file path
     * 
     * How to call: app('common')->reduceImageSize(<valid image path>)
     */

    function reduceImageSize($path){
		//$file_size = File::size($path);
		$filesize_in_bytes = filesize($path); // bytes
		$file_size = round($filesize_in_bytes / 1024 / 1024, 1); // megabytes with 1 digit
        $file_qlt_reduce_percent = FILE_QLT_REDUCE_PERCENT;
        if(krsort($file_qlt_reduce_percent)){
            foreach ($file_qlt_reduce_percent as $size_in_mb => $percent) {
                if($file_size > $size_in_mb){
					$img = Image::make($path)->save($path, $percent%100);
                    break;
                }
            }
        }
	}
}