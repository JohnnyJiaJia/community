<?php
class BannerAction extends Action{
	
	public function index(){
		
		
		$this->display();
	}
	public function do_banner(){
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
		//dump($_POST['file']);
		$User=M('Banner');
		$data['picture']=$_POST['file'];
		 $data['uploadtime']=date("Y-m-d H:i:s");
		$User->add($data);
		$this->success("��ӳɹ�");
		}
		
	}
	
	
}


?>