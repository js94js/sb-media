<?php
class User{
	
	// properties
	public int $id;
	public string $name;
	public string $firstname;
	public string $surname;
	public string $username;
	public string $email;
	public object $address;
	public string $phone;
	public string $phone_extension='';
	public string $website;
	public object $company;
	public bool $email_validated;
	
	
	
	
	// constructor
	public function __construct(int $id, string $name, string $email, string $username, object $address, string $phone, string $website, object $company){
		$this->id = $id;
		$this->name = $name;
		$this->username = $username;
		$this->email = $email;
		$this->address = $address;
		$this->phone = $phone;
		$this->website = $website;
		$this->company = $company;
		
		// get first name and surname from name
		$name_parts = explode(' ',$this->removeTitle($this->name));
		$this->firstname = $name_parts[0];
		$this->surname = $name_parts[1];
		
		// convert phone number to digits only and move extensions to a seperate property
		$phone_parts = explode(' ',$phone);
		
		if (isset($phone_parts[1])){
			$this->phone_extension = $phone_parts[1];
		}
		
		
		$this->phone = preg_replace("/[^0-9]/", "",$this->phone);
		
		
		// validate each email address (set new property, email_validated, to true or fasle based on valid or not)	
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->email_validated = true;
		} else {
			$this->email_validated = false;
		}


	}
	
	
	// methods
	
	// remove title from name
	function removeTitle($name){
		$titles = array('Mr','Mr.','Mrs','Mrs.','Ms','Ms.','Dr','Dr.');
		$name_parts = explode(' ',$name);
		foreach ($titles as $t){
			if ($name_parts[0] == $t){
				$name = str_replace($t,'',$name);
			}
		}
		return trim($name);
	}
}
?>