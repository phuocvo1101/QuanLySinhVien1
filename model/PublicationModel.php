<?php

class PublicationModel extends Database
{
	public function PublicationModel()
	{
		$this->host = 'localhost';
		$this->user = 'root';
		$this->db = 'dethi';
		$this->pass = '';
		 parent::__construct();
		
	}
	public function getPublicationList()
	{
		$query= 'select idpublic, name, diachi from publication';
		$this->setQuery($query);
		$result=$this->loadAllRows();
		return $result;
	}
	public function getPublicationListLimit($start,$limit)
	{
		$query= 'select idpublic, name,diachi from publication LIMIT ?,?';
		$this->setQuery($query);
		$result= $this->loadAllRows(array(array($start,PDO::PARAM_INT),array($limit,PDO::PARAM_INT)));
		return $result;
	}
	public function getPublication($id)
	{
		$query='select idpublic,name,diachi from publication where id=?';
		$this->setQuery($query);
		$result=$this->loadRow(array($id,PDO::PARAM_INT));
		return $result;
	}
	public function insertPublication($name,$diachi)
	{
		try {
    		$query= 'insert into publication(name, diachi) values(?,?)';
			$this->setQuery($query);
			$result = $this->execute(array(array($name,PDO::PARAM_STR),array($diachi,PDO::PARAM_STR)));
			return $result;
		}
		catch( PDOException $ex ) {
			echo '<pre>'.print_r($ex,true).'</pre>';die();
		  	return 0;
		}
				
		
	}
	public function deletePublication($id)
	{
		$query='delete from publication where id=?';
		$this->setQuery($query);
		$this->execute(array($id,PDO::PARAM_INT));
	}
	public function updatePublication($id,$name,$diachi)
	{
		$query='update publication set name=?, diachi=? where id=?';
		$this->setQuery($query);
		$this->execute(array(array($id,PDO::PARAM_INT),array($name,PDO::PARAM_STR),array($diachi,PDO::PARAM_STR)));
	}
}