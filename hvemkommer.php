<!DOCTYPE html>
<html lang="no">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Hvem kommer EE&H</title>
    <script src="jquery-3.5.1.min.js"></script>
    <link href="background-images/logo.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site-specific.css?ver=1">
    <link rel="stylesheet" type="text/css" href="css/stil.css?ver=1">
    <link rel="stylesheet" type="text/css" href="css/table.css?ver=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<?php
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "bryllup";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
        echo '0';
    else{
        $result = mysqli_query($conn, "SELECT * FROM kankomme");
        
        
        echo "<h1>Kan komme</h1>
            <table id='tabell'><tr>
            <th>Navn</th>
            <th>Telefonnummer</th>
            <th>Allergier</th>
            <th>Grilling fredag</th>
            <th>Dato påmeldt</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            $navn = $row['navn'];
            $phone = $row['telefonnummer'];
            $allergies = $row['allergier'];
            $date = $row['dato'];
            $dinner = $row['middag'];
            if ($dinner == "1") {
                $dinner = "Ja";
            }
            else {
                $dinner = "Nei";
            }
            echo "<tr><td>".$navn."</td>
                <td>".$phone."</td>
                <td>".$allergies."</td>
                <td>".$dinner."</td>
                <td>".$date."</td>
                </tr>";
        }
        echo "</table>";

        $result = mysqli_query($conn, "SELECT * FROM kanikkekomme");
        
        
        echo "<h1>Kan <b>IKKE</b> komme</h1>
            <table id='tabell'><tr>
            <th>Navn</th>
            <th>Telefonnummer</th>
            <th>Dato påmeldt</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            $navn = $row['navn'];
            $phone = $row['telefonnummer'];
            $date = $row['dato'];
            echo "<tr><td>".$navn."</td>
                <td>".$phone."</td>
                <td>".$date."</td>
                </tr>";
        }
        echo "</table>";

        
    }
    mysqli_close($conn);
?>