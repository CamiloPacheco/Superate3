<?php 
require '../db/conexion.php';
 
require 'base.php';
if (isset($_POST['nombreC']) && isset($_POST['desc']) && isset($_POST['tipo'])  && isset($_FILES['file'])  ) {
 

     if ($_FILES['file']['type']=="image/png" ||$_FILES['file']['type']=="image/jpeg"  ) {
        $db=database::conectar();
        $nombre=$db->real_escape_string($_POST['nombreC']);
        $desc=$db->real_escape_string($_POST['nombreC']);
        $tipo = (int) $db->real_escape_string($_POST['tipo']);
        move_uploaded_file($_FILES['file']['tmp_name'],"img/imgcursos/".$_FILES['file']['name']);
        $img=$_FILES['file']['name'];

        $db->query("insert into curso values(null,'$nombre','$desc',$tipo,'$img')");
        $id=$db->insert_id;
        session_start();
        $uid=$_SESSION['id'];
        $db->query("insert into usuarios_cursos values($uid,$id)");
 
         
        echo "<script> window.location='inicio.php'; </script>";
     }else{
       
      echo "<script> window.location='estudiante.php?nosepudo'; </script>";
     }


}





?>