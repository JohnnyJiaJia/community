<?php

class ChangeAction extends Action{
	
	public function index(){
		$username=$_SESSION['username'];
		$Member =M('Members');
		
		$mid=$Member->where('username="'.$username.'"')->getField('mid');
		//dump($mid);
		$this->person=$Member->query("select *from project_members where mid='$mid'");
	//$username=$_SESSION['username'];
	//dump($username);
		//dump($mid);
		//����
		$this->display();
	}
		//	���Ż������ָ��һ������Ա
		//  ��������������Ա��־
		//  ��֮ǰ�����Ź���Ա����Ȩ������
		 public function do_change(){
			 $sign=$_POST['sign'];
			 $select =$_POST['select'];
			$username=$_SESSION['username'];
			$User= M('Members');
			$mid=$User->where('username="'.$username.'"')->getField('mid');
			$data['sign']=$sign;
			$User->where("mid='$mid'")->data($data)->save();
		//��ȡ����ǰ���ŵ�MID
		//�ѵ�ǰ����Ա�� IsAdmin ����
			$Login = M('Login');
			$data['IsAdmin']=0;
			$data['IsMember']=1;
			$Login->where("username='$username'")->data($data)->save(); 
			//����յ���select 
			$data['IsAdmin']=1;
			$data['IsMember']=0;
			$Login->where("username='$select'")->data($data)->save();
			//����sign�Ǻ�
			//dump($sign);
			
				
			 
			 //dump($sign);
			 //dump($select);
			 
			 
			 
		 }
	
	
}


?>