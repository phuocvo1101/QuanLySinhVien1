<?php
include_once(PATH_SERVER.'controller/IController.php');
abstract class BaseController //implements IController
{
	public abstract  function indexAction();
	public abstract  function viewphantrangAction();
	public abstract  function viewphantrangajaxAction();
	public abstract  function viewAction();
	public abstract  function createAction();
	public abstract  function createajaxAction();
	public abstract  function deleteAction();
	public abstract  function updateAction();
	public abstract  function updateajaxAction();
}