<?php
/*
    $servername = "fdb28.awardspace.net";
    $username = "3513425_bryllup";
    $password = "hkhy9od2GBcvvk";
    $dbname = "3513425_bryllup";
    */
    ob_start();
//   echo $_POST;
    class Gift {
        public $id;
        public $price;
        public $store;
        public $antall;
        public $gjenstaende;
        public $kjopt;
        public $navn;
        public $link;

    }
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "bryllup";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    $data = array();
   
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
        while($row = mysqli_fetch_array($result))
        {
            $obj = new Gift();
            $obj->id = $row['id'];
            $obj->price = $row['price'];
            $obj->antall = $row['antall'];
            $obj->gjenstaende = $row['gjenstaende'];
            $obj->kjopt = $row['kjopt'];
            $obj->link = $row['link'];
            $obj->navn = $row['navn'];
            $obj->store = $row['store'];
            $obj->picture = $row['picture'];
            
            array_push($data, json_encode($obj));
        }
        
        mysqli_close($conn);
        ob_end_clean();
        var_dump(json_encode($data));

    }
?>