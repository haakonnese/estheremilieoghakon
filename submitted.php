<?php
$to = $_POST["email"];
$subject = $_POST["name"]. ": ".$_POST["rsvp"];
// if(mail("haakon.nese@gmail.com","Test", $_POST["name"])){
//     echo "Sendt";
// }
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
    echo '0';
else{
    $sql = "INSERT INTO kankomme (navn, allergier, melding) 
        VALUES ('".$_POST["name"]."', 'Nøtter', 'Hei')";
// mail
//!mail($to,$subject,"",$headers,'-fhaakon.nese@live.no')
    if (!mysqli_query($conn, $sql)){
         echo '0';
    }
    else {
         echo '1';
    }  
    mysqli_close($conn);
}
?>