<?php
require 'config.php';

if(isset($_POST['register'])) {
    $voornaam = $_POST['firstname'];
    $achternaam = $_POST['lastname'];
    $straat = $_POST['straat'];
    $huisnmr = $_POST['huisnmr'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $email = $_POST['email'];
    $telefoon = $_POST['telefoon'];

        try {
            $statement = $connect->prepare('INSERT INTO user (voornaam, achternaam, straat, huisnummer, postcode, woonplaats, email, telefoon) VALUES (:voornaam, :achternaam, :straat, :huisnummer, :postcode, :woonplaats, :email, :telefoon)');
            $statement->execute(array(
                ':voornaam' => $voornaam,
                ':achternaam' => $achternaam,
                ':straat' => $straat,
                ':huisnummer' => $huisnmr,
                ':postcode' => $postcode,
                ':woonplaats' => $woonplaats,
                ':email' => $email,
                ':telefoon' => $telefoon
            ));
            header('Location: index.php');
            exit;
        } catch (PDOException $error) {
            echo $error->getMessage();
        }


}
?>