<?php
include_once(PATH_SERVER.'model/PublicationModel.php');

class PublicationController extends  BaseController
{
	private $publicationModel;
	protected  $template;
	public function __construct()
	{
		global $template;
		$this->publicationModel= new PublicationModel();
		include_once (PATH_SERVER.'Library/Pager.php');
		$this->template = $template;
	}
	public function indexAction()
	{
		return 'abc';
	}	
	public function viewphantrangAction()
	{
		$publications = $this->publicationModel->getPublicationList();
		$limit = isset($_REQUEST['limit'])?$_REQUEST['limit']:2;
		$pagination = new Pagination($limit);
		$totalRecord = count($publications);
		$totalPages = $pagination->totalPages($totalRecord);
		$start = $pagination->start();
		$limit = $pagination->limit;
		$publications1 = $this->publicationModel->getPublicationListLimit($start, $limit);
		$listPage = $pagination->listPages($totalPages);
		$this->template->assign('publication',$publications1);
		$this->template->assign('listPage',$listPage);
		return $this->template->fetch('publication/viewphantrang.tpl');
	}
	
	public function viewphantrangajaxAction()
	{
		$publications = $this->publicationModel->getPublicationList();
		$limit = isset($_REQUEST['limit'])?$_REQUEST['limit']:2;
		$pagination = new Pagination($limit);
		$totalRecord = count($publications);
		$totalPages = $pagination->totalPages($totalRecord);
		$start = (int)$pagination->start();
		$limit = (int)$pagination->limit;
		$publications1 = $this->publicationModel->getPublicationListLimit($start, $limit);
		$listPage = $pagination->listPages($totalPages);
		
		$this->template->assign('publication',$publications1);
		$data=$this->template->fetch('publication/dataviewphantrang.tpl');
		
		$this->template->assign('listPage',$listPage);
		$phantrang= $this->template->fetch('publication/listpageviewphantrang.tpl');
		
		$result= array('data'=>$data,'phantrang'=>$phantrang);
		$strResult= json_encode($result);
		echo $strResult;
			exit();
	}
	
	public function viewAction()
	{
	}
	public function createAction()
	{
		return $this->template->fetch('publication/create.tpl');
		//$this->publicationModel->insertPublication($name, $diachi);
	}
	public function createajaxAction()
	{
		$name= isset($_POST['name'])?$_POST['name']:'';
		$diachi= isset($_POST['diachi'])?$_POST['diachi']:'';
		$result= $this->publicationModel->insertPublication($name, $diachi);
		if($result==true){
			echo json_encode(array('ketqua'=>1));
			return;
		}else{
			echo json_encode(array('ketqua'=>0));
			return;
		}
			exit();
	}
	public function deleteAction()
	{
	}
	public function updateAction()
	{
	}
	public function updateajaxAction()
	{
	}

}