<?php

class TasksAction extends Action{
	
	
	public function index(){
	
		$this->display();
	}
	public function do_tasks(){
		
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// ʵ�����ϴ���
		$upload->maxSize  = 3145728 ;// ���ø����ϴ���С
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg','ppt','doc','xls','wmv');// ���ø����ϴ�����
		$upload->savePath =  './Public/Uploads/';// ���ø����ϴ�Ŀ¼
		$upload->thumb = true;
		$upload->thumbPrefix        = 's_';  //����2������ͼ
        //��������ͼ�����
		$upload->thumbMaxWidth      = '400,100';
        //��������ͼ���߶�
		$upload->thumbMaxHeight     = '400,100';
		//�����ϴ��ļ�����
		$upload->saveRule           = 'uniqid';
		if(!$upload->upload()) {// �ϴ�������ʾ������Ϣ
			$this->error($upload->getErrorMsg());
		}else{// �ϴ��ɹ�
		$uploadList = $upload->getUploadFileInfo();    
		$_POST['file'] = $uploadList[0]['savename'];
		$_POST['file1']=$uploadList[1]['savename'];
			$username = $_SESSION['username'];
			$member = M('Members');
			$mid = $member->where('username="'.$username.'"')->getField('mid');
					dump($mid);
			//dump($uploadList[0]['savename']);
			//dump($uploadList[1]['savename']);
			$User = M('Picture');
			$content=$_POST['content'];
			$title=$_POST['title'];
			$data['uploadname']=$_SESSION['username'];
			$data['title']=$title;			
			$data['content']=$content;
			$data['picture']=$_POST['file'];
			$data['file']=$_POST['file1'];
			$data['logintime']= date("Y-m-d H:i:s");
			$data['mid']=$mid;
			//$data['mid']=$_SESSION['mid'];
			//dump($title);
			//dump($content);
			$User->add($data);
			//dump($username);
			$this->success('�ϴ��ɹ���');	

		}
		
		
	}
}


?>