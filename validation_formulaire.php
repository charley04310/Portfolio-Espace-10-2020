
<?php require 'header.php'; 
$Activity = $_POST['activity'];?>
<?php

function verifier($variable){
    $variable = htmlspecialchars($variable);
    $variable = trim($variable);

    return $variable;
}

if(array_key_exists('project_web', $_POST)){
    $Projects[] = $_POST['project_web'];
}
if(array_key_exists('project_print', $_POST)){
    $Projects[] = $_POST['project_print'];
}
if(array_key_exists('project_digital', $_POST)){
    $Projects[] = $_POST['project_digital'];
}
if(array_key_exists('project_video', $_POST)){
    $Projects[] = $_POST['project_video'];
}
if(array_key_exists('project_stand', $_POST)){
    $Projects[] = $_POST['project_stand'];
}

if(array_key_exists('divers', $_POST)){
    $Projects[] = $_POST['divers'];
}

if(empty($Projects)){
header('Location: index-contact.php');
}

if(isset($_POST['full_name']) && $_POST['full_name'] != ''){
    $userName = $_POST['full_name'];
    $userName = verifier($userName);

    }else{
    $errors['full_name'] = 'vous devez renseigner un mail valide';   
    }

if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $userMail = $_POST['email'];
    $userMail = verifier($userMail);
    

    }else{
        $errors['email'] = 'Vous devez renseigner un mail valide';   
    }

if(isset($_POST['phone']) && preg_match($code_syntaxe, $_POST['phone'])){
    $userPhone = $_POST['phone'];
    $userPhone = verifier($userPhone);


    }else{
    $errors['phone'] = 'Vous devez renseigner un numéro valide'; 

}

if(isset($_POST['message']) && $_POST['message'] != ''){
    $userMessage = $_POST['message'];
    $userMessage = verifier($userMessage);
   

    }else{
    $errors['message'] = 'Vous devez renseigner un message';
                
            }

if(!empty($errors)){

    session_start();
    $_SESSION['errors'] = $errors;
    header('Location: index-contact.php');

}else{

    session_start();
    $headerMessage = 'Demande de contact site Djack';
    $body = "";
    $body .= "From: " .$userName. "\r\n";
    $body .= "Type d'activité : " .$Activity. "\r\n";
    $body .= "Email : " .$userMail. "\r\n";
    $body .= "Téléphone : " .$userPhone. "\r\n";
    $body .= "Projet.(s) : " .implode('-', $Projects). "\r\n";
    $body .= "Message : " .$userMessage. "\r\n";
    mail('geoffroy-charley@hotmail.fr',$headerMessage, $body);
    $succes = 'Votre demande a bien été enregistré';
    $_SESSION['succes'] = $succes;
    header('Location:http://index-contact.php');
    

    } 

             
               
            






