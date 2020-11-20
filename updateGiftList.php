<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bryllup";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
        echo '0';
    else{
        
        $id=$_POST['id'];
        $sqlGet = "SELECT kjopt, antall, gjenstaende FROM gaveliste WHERE id='$id'";
        $kjopt = (int)$conn->query($sqlGet)->fetch_assoc()['kjopt'];
        $gjenstaende = (int)$conn->query($sqlGet)->fetch_assoc()['gjenstaende'];
        $antall = (int)$conn->query($sqlGet)->fetch_assoc()['antall'];
        
        $kjopt += (int) $_POST['bought'];
        $gjenstaende -= (int) $_POST['bought'];
        if($kjopt<=$antall){
            $sql1 = "UPDATE gaveliste SET kjopt='$kjopt' WHERE id='$id'";
            $sql2 = "UPDATE gaveliste SET gjenstaende='$gjenstaende' WHERE id='$id'";
            if(!$conn->query($sql1))
                echo "Det skjedde en feil";
            else if(!$conn->query($sql2)){
                echo "Det skjedde en feil";
            }
            else 
                echo "1";
        }
        
    }
    mysqli_close($conn);
?>