<?php
$to = $_POST["email"];
$subject = $_POST["name"]. ": ".$_POST["rsvp"];
if(mail("esteilbu@online.no","Test", $_POST["name"])){
     echo "Sendt";
 }
$headers = 'From: Håkon Nese og Esther-Emilie Steilbu' . "\r\n";

    
$servername = "fdb28.awardspace.net";
$username = "3513425_bryllup";
$password = "hkhy9od2GBcvvk";
$dbname = "3513425_bryllup";

$conn = mysqli_connect($servername,$username,$password,$dbname);
$conn->set_charset("utf8");
if(!$conn)
    die("Connection failed: " . mysqli_connect_error());
$sql = "INSERT INTO kankomme (navn, allergier, melding) 
    VALUES ('".$_POST["name"]."', 'Nøtter', 'Hei')";
// mail
//!mail($to,$subject,"",$headers,'-fhaakon.nese@live.no')
if (!mysqli_query($conn, $sql)){
    echo "Svaret ble dessverre ikke registrert. Ta kontakt på 48075305 for å si i fra at du kommer.";
}

mysqli_close($conn);