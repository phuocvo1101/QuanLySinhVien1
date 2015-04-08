<?php

class BookModel extends Database
{
	public function BookModel()
	{
		$this->host = 'localhost';
		$this->user = 'root';
		$this->db = 'dethi';
		$this->pass = '';
		 parent::__construct();
		
	}
	public function getBookList()
	{
		$query = 'SELECT id,title,author,description FROM book';
		$this->setQuery($query);
		$result = $this->loadAllRows();
		return $result;
	}
	public function getBookListlimit($start,$limit)
		{
		
			$query = 'SELECT id,title,author,description FROM book LIMIT ?,?';
			$this->setQuery($query);
			$result = $this->loadAllRows(array(array($start,PDO::PARAM_INT),array($limit,PDO::PARAM_INT)));
			
			return $result;
		}
	public function getBook($id)
	{
		$query = 'SELECT id,title,author,description FROM book WHERE id=? order by id';
		$this->setQuery($query);
		$result = $this->loadRow($options=array(array($id,PDO::PARAM_INT)));
		return $result;
	}
	
	public function deleteBook($id)
	{
		$query = 'DELETE FROM book where id=?';
		$this->setQuery($query);
		$result= $this->execute(array(array($id,PDO::PARAM_INT)));
	}
	
	public  function  insertBook($title, $author, $description)
	{
		$query = 'INSERT INTO book(title, author, description)
		 VALUES (?,?,?)';
		$this->setQuery($query);
		$result= $this->execute(array(array($title,PDO::PARAM_STR), array($author,PDO::PARAM_STR), array($description,PDO::PARAM_STR)));
		return $result;
	}
	public  function  updateBook($title, $author, $description, $id)
	{
		
		$query = 'update book set title=?, author=?, description=? where id=?';
		$this->setQuery($query);
		$result= $this->execute(array(array($title,PDO::PARAM_STR), array($author,PDO::PARAM_STR), array($description,PDO::PARAM_STR),array($id,PDO::PARAM_INT)));
	
		return $result;
	}
}