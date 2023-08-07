<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	public static function prepareNewDocument(){
		Document::truncate();
	}

	public static function addData($data){
		$document = new Document();
		$document->column_one = $data->column_one;
		$document->column_two = $data->column_two;
		$document->column_three = $data->column_three;
		$document->column_four = $data->column_four;
		$usuario->save();
	}    
}