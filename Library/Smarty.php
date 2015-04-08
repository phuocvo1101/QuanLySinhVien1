<?php 
@session_start();
include_once 'Smarty/libs/Smarty.class.php';
global $template;
$template = new Smarty();
$template->template_dir = $_SERVER['DOCUMENT_ROOT'].'/'.'view/templates';
$template->compile_dir = $_SERVER['DOCUMENT_ROOT'].'/'.'application/templates_c';
$template->config_dir = $_SERVER['DOCUMENT_ROOT'].'/'.'application/configs';
$template->cache_dir = $_SERVER['DOCUMENT_ROOT'].'/'.'application/cache';


?>