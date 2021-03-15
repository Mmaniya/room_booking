<?php
class Admin {
	
	static function checkUserId($username) {
	 $admin_qry ="select * from `".TBL_USERS."` where mobile = '".$username."'"; 
		$rsUser = dB::sExecuteSql($admin_qry); 				 
		if($rsUser->id>0){ 			
			return 1;
		}else{
			return 0; 
		}
    }

    static function checkCredentials($username,$password) {
		$usernameExists = Admin::checkUserId($username);			
		if($usernameExists == 1) {
				 $admin_qry ="select * from `".TBL_USERS."` where mobile = '".$username."' and password='".md5($password)."'";
				$rsUser = dB::sExecuteSql($admin_qry);				
			if($rsUser->id>0) {
				if($rsUser->status == 'A') { 
					$returnArr = array("Success",$rsUser); 				 						
				} else { 
					$returnArr =  array("User is not active.Please contact webmaster"); 
				}
			} else {				
				$returnArr =  array("Invalid Password"); }
			} else {
				$returnArr =  array("Invalid UserName"); 
		}
		return $returnArr;
	}
}