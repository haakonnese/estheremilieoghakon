<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bryllup";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn)
            echo 0;
        else{
            $query = $conn->query("SELECT * FROM images WHERE status = 1 ORDER BY uploaded_on ASC");
            $number = 0;
            $numberOfPictures = (int) $_POST['numberOfPictures'];
            if($query->num_rows > $numberOfPictures){
                while($row = $query->fetch_assoc()){
                    if($number++<$numberOfPictures)
                        continue;
                    
                    $imageURL = 'images/'.$row["file_name"];
                    
                    echo "<div class='item' id='itemimg". $number."'>";
                    echo "<img class='image' onclick='showImage(".$number.")' id='img".$number."' src='".$imageURL."' loading='lazy' alt='bilde'\>";
                    echo"</div>";
                }
                
            }  
            else echo 0;
            mysqli_close($conn);
        }
?>   