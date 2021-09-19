<?php
class Collection{
	
	// properties
	public array $users;
	
	// methods
	function createClassObject($user){
		return new User($user->id,$user->name,$user->username,$user->email,$user->address,$user->phone,$user->website,$user->company);
	}
	
	
	function getUsers($url='users.json'){
		//var_dump(json_decode(file_get_contents($url))); return;
		$this->users = array_map('self::createClassObject',json_decode(file_get_contents($url)));
	}
	
	
	
	
	function outputToCsv($users){
		$fp = fopen('output.csv','w');
		foreach ($users as $u){
			// build the csv
			$val = array(
				'first name'=>$u->firstname,
				'surname'=>$u->surname,
				'company name'=>$u->company->name,
				'email'=>$u->email,
				'phone'=>$u->phone,
				'extension'=>$u->phone_extension,
				'city'=>$u->address->city
			);
			// echo to screen
			echo implode(',',$val).'<br/>';
			fputcsv($fp,$val);
		}
		fclose($fp);
		
	}
	
}
?>