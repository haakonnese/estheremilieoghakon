<?php
/*
    $servername = "fdb28.awardspace.net";
    $username = "3513425_bryllup";
    $password = "hkhy9od2GBcvvk";
    $dbname = "3513425_bryllup";
    */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bryllup";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
        echo '0';
    else{
        $order = $_POST['order'];
        $result;
        
        if($_POST['zero']=="false"){
            $result = mysqli_query($conn,"SELECT * FROM gaveliste WHERE gjenstaende !=0 ORDER BY ".$order);
        }
        else{
            $result = mysqli_query($conn,"SELECT * FROM gaveliste ORDER BY ".$order);
        }
        echo"
        <table>
        <tr id='giftListHeader'>
        <th>Navn</th>
        <th>Pris</th>
        <th>Butikk</th>
        <th>Ønsket</th>
        <th>Kjøpt</th>
        <th>Gjenstår</th>
        <th>Antall</th>
        </tr>";
        $rowNumber = 0;
        while($row = mysqli_fetch_array($result))
        {
            if($rowNumber%2==0)
                echo "<tr id='gift".$row['id']."' style='background-color:rgba(0, 0, 0, 0.1);'>";
            else
                echo "<tr id='gift".$row['id']."'style='background-color:rgba(0, 0, 0, 0.04);'>";
            echo "<td class='giftName giftlistElement' id='name".$row['id']."' onclick=\"window.open('".$row['link']."')\" >" . $row['navn'] . "</td>";
            echo "<td class='giftlistPrice giftlistElement'>" . $row['price'] . "</td>";
            echo "<td class='giftlistStore giftlistElement'>" . $row['store'] . "</td>";
            echo "<td class='giftlistWish giftlistElement'>" . $row['antall'] . "</td>";
            echo "<td class='giftlistBought giftlistElement' id='alreadyBought".$row['id']."'>" . $row['kjopt'] . "</td>";
            echo "<td class='giftlistRemaining giftlistElement' id='remaining".$row['id']."'>" . $row['gjenstaende'] . "</td>";
            if($row['kjopt'] != $row['antall']){
                echo "<td class='giftlistNumber giftlistElement'><input class='giftlistNumberInput' id='number".$row['id']."' type='number' min='0' max=".$row['gjenstaende']." oninput="."validity.valid||(value='');"."></td>";
                echo "<td class='giftlistBuy giftlistElement'><button class='giftlistRegistrerButton' onclick='kjop(".$row['id'].")'>Registrer kjøpt</button></td>";
            }
            echo "</tr>";
            $rowNumber++;
        }
        echo "</table>";

        mysqli_close($conn);


    }
?>