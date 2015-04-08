<?php
include_once(PATH_SERVER.'model/BookModel.php');

class BookController extends  BaseController
{
	private $bookModel;
	protected $template;
	public function __construct()
	{
		global $template;
		$this->bookModel = new BookModel();
		$this->template = $template;
	}
	public function indexAction()
	{
		
		$books = $this->bookModel->getBookList();
		$this->template->assign('books',$books);
		$this->template->display('book/index.tpl');
	
		//echo '<pre>'.print_r($books,true).'</pre>';die();
		
	}
	public function viewphantrangAction()
	{
		
		$books = $this->bookModel->getBookList();
		$limit = isset($_REQUEST['limit']) ?  $_REQUEST['limit'] : 6;
		//$base_url = $_SERVER['PHP_SELF'].'?controller=book&action=viewphantrang&';
		$Pagination = new Pagination($limit);//,$base_url
		$totalRecord = count($books); // Tổng số user có trong database
		$totalPages = $Pagination->totalPages($totalRecord); // Tổng số trang tìm được
		$limit = (int)$Pagination->limit; // Số record hiển thị trên một trang
		$stat = (int)$Pagination->start(); // Vị trí của record
		
		$books1 = $this->bookModel->getBookListlimit($stat,$limit);
		$listPage= $Pagination->listPages($totalPages);
		
		
		$this->template->assign('books1',$books1);
		$this->template->assign('listPage',$listPage);
		return $this->template->fetch('book/viewphantrang.tpl');
	}
	
	public function viewphantrangajaxAction()
	{
		
		$books = $this->bookModel->getBookList();
		$limit = isset($_REQUEST['limit']) ?  $_REQUEST['limit'] : 6;
		//$base_url = $_SERVER['PHP_SELF'].'?controller=book&action=viewphantrang&';
		$Pagination = new Pagination($limit);//,$base_url
		$totalRecord = count($books); // Tổng số user có trong database
		$totalPages = $Pagination->totalPages($totalRecord); // Tổng số trang tìm được
		$limit = (int)$Pagination->limit; // Số record hiển thị trên một trang
		$stat = (int)$Pagination->start(); // Vị trí của record
		
		$books1 = $this->bookModel->getBookListlimit($stat,$limit);
		$listPage= $Pagination->listPages($totalPages);
		$this->template->assign('books1',$books1);
		$data = $this->template->fetch('book/dataviewphantrang.tpl');
		
		$this->template->assign('listPage',$listPage);
		$phantrang = $this->template->fetch('book/listpageviewphantrang.tpl');
		
		$result = array('data'=>$data,'phantrang'=>$phantrang);
		
		$strResult = json_encode($result);
	
		echo $strResult;
		exit();
		
	}
	
	public function viewAction()
	{
		$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
		
		$book = $this->bookModel->getBook($id);
		
		
		$this->template->assign('book',$book);
	
		return $this->template->fetch('book/view.tpl');
		
	}
	
	public function createAction()
	{
		
		//if(isset($_POST["submitbutton"])) {
			// create
			// tra ket qua ra
			/*$author = isset($_POST["author"]) ? $_POST["author"] : "";
			$title =  isset($_POST["title"]) ? $_POST["title"] : "";
			$description =  isset($_POST["description"]) ? $_POST["description"] : "";
			$result = $this->bookModel->insertBook($title, $author, $description);
			$message = "";
			if($result==true) {
				header('location:index.php?action=viewphantrang');
			} else{
				$message = "Them san pham khong thanh cong. Vui long thu lai sau!";
			}*/
			 //$this->template->assign('message',$message);
			
		//}
			/*$author ='';
			$title = '';
			$description = '';
			$this->template->assign('title',$title);
			$this->template->assign('author',$author);
			$this->template->assign('description',$description);*/
		 return $this->template->fetch('book/create.tpl');
		
		
	}
	
	public function createajaxAction()
	{
			$author = isset($_POST["author"]) ? $_POST["author"] : "";
			$title =  isset($_POST["title"]) ? $_POST["title"] : "";
			$description =  isset($_POST["description"]) ? $_POST["description"] : "";
			$result = $this->bookModel->insertBook($title, $author, $description);
			if($result==false) {
				echo json_encode(array('ketqua'=>0));
				return;
			} 
			
			echo json_encode(array('ketqua'=>1));
			exit();
	}
	
	
	public function deleteAction()
	{
		if(!isset($_GET["id"])) {
			header('location:index.php?action=viewphantrang');
			return;
		}
		
		$id=$_GET["id"];
		$result = $this->bookModel->deleteBook($id);
		header('location:index.php?action=viewphantrang');
			
	}
	
	public function updateAction()
	{
		
		/*if(isset($_POST["submitbutton"])) {
			$id=isset($_POST['id']) ? $_POST['id'] : 0;
			$author = isset($_POST["author"]) ? $_POST["author"] : "";
			$title =  isset($_POST["title"]) ? $_POST["title"] : "";
			$description =  isset($_POST["description"]) ? $_POST["description"] : "";
			$result = $this->bookModel->updateBook($title, $author, $description,$id);
			$message = "";
			if($result==true) {
				header('location:index.php?action=viewphantrang');
			} else{
				$message = "Cap nhat san pham khong thanh cong. Vui long thu lai sau!";
			}*/
			//$message= isset($message) ? $message: "";
		//} else {
			$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
			$book= $this->bookModel->getBook($id);
			$title= isset($book->title) ? $book->title : "";
			$author= isset($book->author) ? $book->author : "";
			$description= isset($book->description) ? $book->description : "";
			//$id= isset($book->id) ? $book->id : "";
			$this->template->assign('title',$title);
			$this->template->assign('author',$author);
			$this->template->assign('description',$description);
			$this->template->assign('id',$id);
			return $this->template->fetch('book/update.tpl');
			
			//include_once (PATH_SERVER.'view/book/update.php');
		//}
		 
	}
	public function updateajaxAction()
	{
			$id=isset($_POST['id']) ? $_POST['id'] : 0;
			$author = isset($_POST["author"]) ? $_POST["author"] : "";
			$title =  isset($_POST["title"]) ? $_POST["title"] : "";
			$description =  isset($_POST["description"]) ? $_POST["description"] : "";
			$result = $this->bookModel->updateBook($title, $author, $description, $id);
			if($result==false) {
				echo json_encode(array('ketqua'=>0));
				return;
			} 
			
			echo json_encode(array('ketqua'=>1));
			exit();
			
	}
	
}