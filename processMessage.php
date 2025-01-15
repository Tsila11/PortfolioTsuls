<?php
if($_SERVER['REQUEST_METHOD']===
'POST')
{
    $nom = $_POST['nom'] ;
    $email = $_POST['email'] ;
    $telephone = $_POST['telephone'] ;
    $sujet = $_POST['sujet'] ;
    $message = $_POST['message'] ;   
    if(empty($nom)||empty($email)||empty($telephone)||empty($sujet)||empty($message)){
    die('Tous les champs sont obligatoirs');      
    }
    try{
    $db= new PDO('sqlite:chat_form.db');
    $sql = 'INSERT INTO messages(nom,email,telephone,sujet,message)VALUES(:nom,:email,:telephone,:sujet,:message)';
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':nom',$nom);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':telephone',$telephone);
    $stmt->bindParam(':sujet',$sujet);
    $stmt->bindParam(':message',$message);
    if($stmt->execute())
    {
    echo 'Message envoye avec succes';
    }else{
    echo 'Erreur lors de lenvoi';
    }
    }catch(PDOException $e){
    echo 'Erreur lors de bade de donne : '.$e->getMessage();
    }
    }
?>