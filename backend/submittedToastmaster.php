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

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "bryllup";
$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
    die('0');
else{
   
    if( $sql = mysqli_prepare($conn, "INSERT INTO toastmaster (navn, email, hva, kjenner, minutter) 
        VALUES (?,?,?,?,?)")) {
            mysqli_stmt_bind_param($sql, "ssssi", $_POST["name"], $_POST["email"], $_POST["what"], $_POST["relationship"], $_POST["minutes"]);
            mysqli_stmt_execute($sql);
            echo "1";
        }
    else {
        echo "0";
    }
    
    mysqli_stmt_close($sql);
    mysqli_close($conn);
}

// mail
if(!mail($to,$subject, $message, "From: 'Toastmaster bryllup EEH' <toastmaster@eshteremilieoghakon.no>")) {
    echo '0';
}
?>