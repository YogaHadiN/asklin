<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use Image as Img;
use Input;

class Image extends Model
{
    public static function nextId(){
    	try {
    		return Image::orderBy('id', 'desc')->first()->id;
    	} catch (\Exception $e) {
    		return '1';
    	}
    }

	public function imagable(){
		return $this->morphto();
	}

	public function imageUpload($fieldName,$dirName, $id){
		if(Input::hasFile($fieldName)) {

			$upload_cover = Input::file($fieldName);
			//mengambil extension
			$extension = $upload_cover->getClientOriginalExtension();

			$upload_cover = Img::make($upload_cover);
			$upload_cover->resize(1000, null, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			});

			//membuat nama file
			//berdasarkan id dari file terakhir
			$id = Izin::nextId();
			$filename =	 $id . '.' . $extension;

			//menyimpan bpjs_image ke folder public/img
			$destination_path = public_path() . DIRECTORY_SEPARATOR . 'img/'. $dirName;
			// Mengambil file yang di upload

			$upload_cover->save($destination_path . '/' . $filename);
			
			//mengisi field bpjs_image di book dengan filename yang baru dibuat
			return $filename;
			
		} else {
			return null;
		}
	}
    
}
