<?php
        ob_start();
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "bryllup";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
        class Image {
            public $id;
            public $number;
            public $url;
        }
        $data = array();
        if(!$conn)
            die();
        
        else{
            $query = $conn->query("SELECT * FROM images WHERE status = 1 ORDER BY uploaded_on ASC");
            $number = 0;
            $numberOfPictures = (int) $_GET['numberOfPictures'];
            if($query->num_rows > $numberOfPictures){
                while($row = $query->fetch_assoc()){
                    if($number++<$numberOfPictures)
                        continue;
                    
                    
                    $im = new Image();
                    
                    $imageURL = 'images/'.$row["file_name"];
                    $im->id = "itemimg".$number;
                    $im->number = $number;
                    $im->url = $imageURL;
                    array_push($data, json_encode($im));
                }
            }  
            mysqli_close($conn);
            ob_end_clean();
            echo json_encode($data);
        }
?>