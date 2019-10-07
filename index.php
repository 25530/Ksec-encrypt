<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
<h3>opdracht 1</h3>
<?php
$input = "Hallo Simon";
    echo ascii($input);

    function ascii($input)
    {
        $result = [];
        for ($i = 0; $i < strlen($input); $i++) {
            $c = ord($input[$i]);

            $result[] = $c;
        }

        return implode('', $result);
    }
    ?>
</div>
<div>
<h3>Opgave 2</h3>

<p>ondersteunde coderingingen OpenSSL:<br>

AES, Blowfish, Camellia, SEED, CAST-128, DES, IDEA, RC2, RC4, RC5, Triple DES, GOST 28147-89</p>

<h3>Opgave 3<h3>


<p>encrypten: openssl_encrypt, openssl_private_encrypt, openssl_public_encrypt<br>
decrypten: openssl_decrypt, openssl_private_decrypt, openssl_public_decrypt</p>
</div>
<h3>opdracht 4</h3>
<?php


function encrypt_decrypt($action, $string) {
   $output = false;
   $encrypt_method = "AES-256-CBC";
   $secret_key = 'This is my secret key';
   $secret_iv = 'This is my secret iv';

   $key = hash('sha256', $secret_key);


   $iv = substr(hash('sha256', $secret_iv), 0, 16);
   if ( $action == 'encrypt' ) {
       $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
       $output = base64_encode($output);
   } else if( $action == 'decrypt' ) {
       $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
   }
   return $output;
}
echo "Plain Text =" .$input. "<br>";
$encrypted_txt = encrypt_decrypt('encrypt', $input);
echo "Encrypted Text = " .$encrypted_txt. "<br>";
$decrypted_txt = encrypt_decrypt('decrypt', $encrypted_txt);
echo "Decrypted Text =" .$decrypted_txt. "<br>";
?>
<div>
    <h3>opdracht 5</h3>
    <form action="registreer.php" method="post">
        <div class="container">
            <label for="firstname">Voornaam</label>
            <input type="text" placeholder="Voornaam" name="firstname"> <br>

            <label for="lastname">Achternaam</label>
            <input type="text" placeholder="Achternaam" name="lastname"> <br>

            <label for="straat">Straat</label>
            <input type="text" placeholder="Straat" name="straat"> <br>

            <label for="huisnmr">Huisnr</label>
            <input type="text" placeholder="Huisnummer" name="huisnmr"> <br>

            <label for="postcode">Postcode</label>
            <input type="text" placeholder="Postcode" name="postcode"> <br>

            <label for="woonplaats">Woonplaats</label>
            <input type="text" placeholder="Woonplaats" name="woonplaats"> <br>

            <label for="email">Email</label>
            <input type="text" placeholder="Email" name="email"> <br>

            <label for="telefoon">Telefoon</label>
            <input type="text" placeholder="Telefoonnummer" name="telefoon"> <br>

            <input type="submit" name="register">
        </div>
    </form>
</div>
</body>
</html>
