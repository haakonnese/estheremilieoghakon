<?php
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bryllup";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    $conn->set_charset("utf8");
    $targetDir = "images/full/"; 
    $allowTypes = array('jpg','png','jpeg','gif','mp4','.mov','avi'); 
    $allowTypesImage = array('jpg','png','jpeg','gif'); 
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $size = $_FILES['files']['size'][$key];
            $fileName =  strval($size) . basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
            
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            $showFile = 1;
            
            if(in_array(strtolower($fileType), $allowTypes)){ 
               
                $sql_f = "SELECT * FROM images WHERE file_name='$fileName'";
                $res_f = mysqli_query($conn,$sql_f);
                if($size<=104857600){
                    if(mysqli_num_rows($res_f) ==0){
                        // Upload file to server 
                        
                        if(in_array(strtolower($fileType),$allowTypesImage)){
                            $retrunArray = compressImage($_FILES["files"]["tmp_name"][$key],$fileName, $targetFilePath, $showFile);
                            $insertValuesSQL .= $retrunArray[0];
                            $errorUpload .= $retrunArray[1];
                        }
                        else{
                            $targetFilePath =$targetDir."videoes/".$fileName;
                            $showFile = 0;
                            if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                                // Image db insert sql 
                                $insertValuesSQL .= "('".$fileName."',".$showFile."),"; 
                            }
                            else{ 
                                $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                            }
                        }
                        
                         
                    }
                    else
                        $errorUpload .= $_FILES['files']['name'][$key]. ': filen finnes fra før av | ';
                }
                else{
                    $errorUpload .= $_FILES['files']['name'][$key]. ': filen er for stor (max størrelse er 100MB) | ';
                }
            }
            else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
        
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            
            // Insert image file name into database 
           
            $insert = $conn->query("INSERT INTO images (file_name,status) VALUES $insertValuesSQL"); 
            
            if($insert){ 
                $errorUpload = !empty($errorUpload)?'Opplastingsproblem med: '.trim($errorUpload, ' | '):''; 
                $errorUploadType = !empty($errorUploadType)?'Feil med filtype: '.trim($errorUploadType, ' | '):''; 
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                $statusMsg = "Bildene dine ble lastet opp.".$errorMsg; 
            }else{ 
                $statusMsg = "Beklager, det oppstod et problem når du prøvde å laste opp filen."; 
            } 
            ob_end_clean();
        } 
        else{
            ob_end_clean();
            echo "Ingen filer lastet opp: ". $errorUpload;
        }
    }else{ 
        $statusMsg = 'Venligst velg en eller flere bilder/videoer som du ønsker å laste opp.'; 
    } 
    mysqli_close($conn);
    // Display status message 
    echo $statusMsg; 
    function compressImage($source,$filename, $targetFilePath, $showFile) {

        $info = getimagesize($source);
        
        if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);
    
        elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);
    
        elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);
     
        
        list($width, $height) = getimagesize($source);
        $newwidth = 1200/$height*$width;
        $newheight = 1200;
        $exif = exif_read_data($source);
 
        // fix the Orientation if EXIF data exists
        $degrees=0;
        if (!empty($exif['Orientation'])) {
            switch ($exif['Orientation']) {
                case 8:
                    $degrees = 90;
                    break;
                case 3:
                    $degrees = 180;
                    break;
                case 6:
                    $degrees = 270;
                    break;
            }
        }
        
        $insertValuesSQL = $errorUpload = '';
        if($degrees==0){
            if(move_uploaded_file($source, $targetFilePath)){ 
                // Image db insert sql 
                $insertValuesSQL .= "('".$filename."',".$showFile."),"; 
            }
            else{ 
                $errorUpload .= $filename.' | '; 
            }
        }
        else{
            $rotateFull = imagerotate($image, $degrees, 0);
            imagejpeg($rotateFull,"images/full/".$filename,93);
            $insertValuesSQL .= "('".$filename."',".$showFile."),"; 
        }
        // Load
        
        $web = imagecreatetruecolor($newwidth, $newheight);
        // Resize
        
        imagecopyresized($web, $image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        // Output
        $rotate = imagerotate($web, $degrees, 0);
        imagejpeg($rotate,"images/".$filename,50);
        
        return array($insertValuesSQL, $errorUpload);
    }
?>