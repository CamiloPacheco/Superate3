<?php 
 
session_start();
if (!empty($_SESSION)) {
 
	$_SESSION['id']=  null;
	$_SESSION['email']=null ;
	$_SESSION['tipo']= null;
	$_session['Nombre']=null ;
	session_unset();
	 session_destroy();
 
	
} 
echo "<script> window.location='../index.php'; </script>";


?>