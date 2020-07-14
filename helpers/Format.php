<?php

class Format{
	public function dateFormat($date){
		return date('F j, Y, g:i a',strtotime($date));
	}
	
	public function shortTxt($text,$limit){
		$text=substr($text,0,$limit);
		$text=$text.".....";
		return $text;
	}
	
	public function validation($data){
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	public function title(){
		$path=$_SERVER['SCRIPT_FILENAME'];
		$title=basename($path,'.php');
		$title=str_replace("_", " ", $title);
		if($title=='index'){
			$title='home';
		}elseif($title=='contact'){
			$title='contact us';
		}
		return $title=ucwords($title);
	}
}

 






?>