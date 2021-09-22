<?php
$to = "haakon.nese@gmail.com";
$subject = $_POST["name"]. ": ".$_POST["rsvp"];
$headers = 'From: Håkon Nese og Esther-Emilie Steilbu' . "\r\n";


$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bryllup";
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
    die('0');
else{
    if ( $_POST["rsvp"] == "Kan komme") {
        if( $sql = mysqli_prepare($conn,"INSERT INTO kankomme (navn, telefonnummer, allergier, middag) 
        VALUES (?,?,?,?)")) {
            mysqli_stmt_bind_param($sql, "sisi", $_POST["name"], $_POST["phoneNumber"], $_POST["allergier"], $_POST["dinner"]);
            mysqli_stmt_execute($sql);
            echo "1";
        }
        else {
            echo "0";
        }
    }
    else if ( $_POST["rsvp"] == "Kan IKKE komme") {
        if( $sql = mysqli_prepare($conn,"INSERT INTO kanikkekomme (navn, telefonnummer) 
        VALUES (?,?)")) {
            mysqli_stmt_bind_param($sql, "si", $_POST["name"], $_POST["phoneNumber"]);
            mysqli_stmt_execute($sql);
            echo "1";
        }
        else {
            echo "0";
        }
    }
    
// mail
    mysqli_stmt_close($sql);
    mysqli_close($conn);
}
if(!mail($to,$subject, $_POST["allergier"], "From: 'Registrering bryllup EEH' <registrering@estheremilieoghakon.no>")) {
    echo error_get_last()['message'];
}
?>