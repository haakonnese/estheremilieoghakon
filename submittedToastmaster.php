<?php
$to = "haakon.nese@gmail.com";
$subject = "Toastmaster: ".$_POST["name"]. " ønsker å gjøre noe";
//if(!mail("haakon.nese@gmail.com","Velkommen", $_POST["name"])){
  //   echo "Ikke sendt";
//}
$message = "Navn: ". $_POST["name"]."\n";
$message .= "Email: ". $_POST["email"]."\n";
$message .= "Hva skal du gjøre: ". $_POST["what"]."\n";
$message .= "Hvordan kjenner du brudeparet: ". $_POST["relationship"]."\n";
$message .= "Antall minutt: ". $_POST["minutes"];

$headers = 'From: Håkon Nese og Esther-Emilie Steilbu' . "\r\n";

    
// $servername = "fdb28.awardspace.net";
// $username = "3513425_bryllup";
// $password = "hkhy9od2GBcvvk";
// $dbname = "3513425_bryllup";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bryllup";
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
    die('0');
else{
   
    $sql = "INSERT INTO toastmaster (navn, email, hva, kjenner, minutter) 
        VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["what"]."', '".$_POST["relationship"]."', '".$_POST["minutes"]."')";
    }
   
    
// mail

    if (!mysqli_query($conn, $sql)){
         echo '0';
    }
    else {
         echo '1';
    }  
    mysqli_close($conn);

if(!mail($to,$subject, $message, "From: 'Toastmaster bryllup EEH' <toastmaster@eshteremilieoghakon.no>")) {
    echo '0';
}
?>