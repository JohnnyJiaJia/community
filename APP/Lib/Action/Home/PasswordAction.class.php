<?php
class PasswordAction extends Action{
	
	public function index(){
		
		
		$this->display();
	} 
	public function alter_password(){
		
		$password=$_POST['password'];
		$repassword=$_POST['repassword'];
		$username=$_SESSION['username'];
		dump($username);
		//dump($password);
		//dump($repassword);
		if($password!=$repassword)
		{
			
			$this->error("������������벻һ��");
		}
		else{
			
			$User= M('Login');
			$data['password']=$password;
			$User->where("username='$username'")->data($data)->save(); 
			
		}
		
		
	} 
	
}


?>