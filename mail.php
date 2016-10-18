<?php 
var_dump($_POST);
if($_POST){
	$name = $_POST['name'];  
    $phone = $_POST['phone'];
   $email = $_POST['email'];
   $themes = $_POST['themes'];
   $message = $_POST['message'];
  
    $to = "shop@antoniobiaggi.com" ;
    $subject = "Contact us"; 
    $msg=" 
          Ім'я: $name
          Телефон: $phone
          E-mail: $email
          Тема: $themes
          Сообщение: $message
		  ";
            //$headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
            $headers .= "From:shop@antoniobiaggi.com\r\n";
           if( mail($to, $subject, $msg, $headers)){
           	  return true;
           }

   }


?> 
