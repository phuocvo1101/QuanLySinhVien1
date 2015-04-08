<?php
	define('PATH_SERVER',$_SERVER['DOCUMENT_ROOT'].'/');
	include_once(PATH_SERVER.'Library/Smarty.php');
	include_once (PATH_SERVER.'controller/BaseController.php');
	include_once(PATH_SERVER.'Library/Database.php');
	include_once(PATH_SERVER.'Library/Pager.php');
	include_once(PATH_SERVER.'controller/BookController.php');
	include_once(PATH_SERVER.'controller/PublicationController.php');
	
	$basecontroller = null;
	$content = "";
	if(isset($_GET["controller"]) && isset($_GET['action'])) {
		switch($_GET["controller"]) {
			case "book":
				$basecontroller = new BookController();
				break;
			case "publication":
				$basecontroller = new PublicationController();
				break;
			default:
				$basecontroller = new BookController();
				break;	
		}
		switch(strtolower($_GET['action'])) {
			case 'view':
				$content = $basecontroller->viewAction();
				break;
			case 'create':
				$content = $basecontroller->createAction();
				break;
			case 'createajax':
				$content =$basecontroller->createajaxAction();
				break;
			case 'update':
				$content = $basecontroller->updateAction();
				break;
			case 'updateajax':
				$content = $basecontroller->updateajaxAction();
				break;
			case 'delete':
				$content =$basecontroller->deleteAction();
				break;
			case 'viewphantrang':
				 $content=$basecontroller->viewphantrangAction();
				break;
			case 'viewphantrangajax':
				$content = $basecontroller->viewphantrangajaxAction();
				break;
			//case 'update':
				//$bookController->updateAction();
			default:
				
				//$basecontroller->indexAction();
				$content =$basecontroller->viewphantrangAction();
				break;
		}	
	} else {
		$basecontroller = new BookController();
		$content = $basecontroller->viewphantrangAction();
	}	

	$template->assign('content',$content);
	$template->display('index.tpl');
	
	
	
?>