<?php
$to = "haakon.nese@gmail.com";
$subject = $_POST["name"]. ": ".$_POST["rsvp"];
//if(!mail("haakon.nese@gmail.com","Velkommen", $_POST["name"])){
  //   echo "Ikke sendt";
//}

$headers = 'From: Håkon Nese og Esther-Emilie Steilbu' . "\r\n";

    
// $servername = "fdb28.awardspace.net";
// $username = "3513425_bryllup";
// $password = "hkhy9od2GBcvvk";
// $dbname = "3513425_bryllup";
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bryllup";
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
    die('0');
else{
    if ( $_POST["rsvp"] == "Kan komme") {
        $sql = "INSERT INTO kankomme (navn, telefonnummer, allergier, middag) 
        VALUES ('".$_POST["name"]."', '".$_POST["phoneNumber"]."', '".$_POST["allergier"]."', '".$_POST["dinner"]."')";
    }
    else if ( $_POST["rsvp"] == "Kan IKKE komme") {
        $sql = "INSERT INTO kanikkekomme (navn, telefonnummer) 
        VALUES ('".$_POST["name"]."', '".$_POST["phoneNumber"]."')";
    }
    
// mail

    if (!mysqli_query($conn, $sql)){
         echo '0';
    }
    else {
         echo '1';
    }  
    mysqli_close($conn);
}
if(!mail($to,$subject, $_POST["allergier"], "From: 'Registrering bryllup EEH' <registrering@estheremilieoghakon.no>")) {
    echo error_get_last()['message'];
}
?>