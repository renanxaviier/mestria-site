<?php 
$errors = '';
$myemail = 'contato@mestria.com.br';

if(empty($_POST['Nome'])  || 
   empty($_POST['email']) || 
   empty($_POST['mensagem']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['Nome']; 
$email_address = $_POST['email']; 
$message = $_POST['mensagem']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}



if( empty($errors)) {

	$to = $myemail;

	$email_subject = "Contato através do site: $name";

	$email_body = "Você recebeu uma nova mensagem. ".

	" Aqui estão os detalhes:\n Name: $name \n ".

	"Email: $email_address\n Mensagem \n $message";

	$headers = "De: $myemail\n";

	$headers .= "Responder para: $email_address";

	mail($to,$email_subject,$email_body,$headers);

}
?>