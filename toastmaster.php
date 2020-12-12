<!DOCTYPE html>
<html lang="no">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Toastmaster-svar EE&H</title>
    <script src="jquery-3.5.1.min.js"></script>
    <link href="background-images/logo.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site-specific.css?ver=1">
    <link rel="stylesheet" type="text/css" href="css/stil.css?ver=1">
    <link rel="stylesheet" type="text/css" href="css/table.css?ver=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bryllup";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
        echo '0';
    else{
        $result = mysqli_query($conn, "SELECT navn, email, hva, kjenner, minutter FROM toastmaster");
        
        
        echo "<table id='tabell'><tr>
            <th>Navn</th>
            <th>Email</th>
            <th>Hva skal gjøres</th>
            <th>Kjenner fra</th>
            <th>Antall minutter</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            $navn = $row['navn'];
            $email = $row['email'];
            $hva = $row['hva'];
            $kjenner = $row['kjenner'];
            $minutter = $row['minutter'];
            echo "<tr><td>".$navn."</td>
                <td><a href='mailto:". $email."'>".$email."</a></td>
                <td>".$hva."</td>
                <td>".$kjenner."</td>
                <td>".$minutter."</td>
                </tr>";
        }
        echo "</table>";

        
    }
    mysqli_close($conn);
?>