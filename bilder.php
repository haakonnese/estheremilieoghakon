<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"> 
    <title>EE&H 26.06.2021</title>
    <script src="jquery-3.5.1.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site-specific.css">
    <link rel="stylesheet" type="text/css" href="css/stil.css">
    
    <!-- <link rel="stylesheet" type="text/css" href="css/pictureShow.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="css/pictureShowHorizontal.css">
    <script src="js/exif.js"></script>
</head>

<!-- <body onload="calcHeight()"> -->
    <body onload="exifRotate()" >
    <div id="nav" class="closed scrolled">
        <ul>
            <li><a class="info" onclick="scrollToPage(1)" >EE&H</a></li>
            <li><a class="info" onclick="scrollToPage(2)">Vielse</a></li>
            <li><a class="info" onclick="scrollToPage(3)">Fest</a></li>
            <li><a class="info" onclick="scrollToPage(4)">Registrer</a></li>
            <li><a class="info" onclick="scrollToPage(5)">Toastmaster</a></li>
            <li><a class="info" onclick="scrollToPage(6)">Reise og overnatting</a></li>
            <li><a class="info" onclick="scrollToPage(7)">Gaveliste</a></li>
            
            
        </ul>
        <a id="ham" class="hamClass" onclick="openNav(false)"><i class="material-icons">menu</i></a>
    </div>
    <div id="picture" >
    <!-- <div class="column" id="column0"></div>
    <div class="column" id="column1"></div>
    <div class="column" id="column2"></div>
    <div class="column" id="column3"></div>
    <div class="column" id="column4"></div> -->
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bryllup";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn)
            echo '0';
        else{
            $query = $conn->query("SELECT * FROM images WHERE status = 1 ORDER BY uploaded_on DESC");
            $number = 0;
            if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
                    $number++;
                    $imageURL = 'images/'.$row["file_name"];      
            ?>  
                <div class="item" id="item<?php echo $number; ?>">
                <a onclick="showImage('<?php echo $imageURL; ?>', <?php echo $number?> )">
                <img id="img<?php echo $number; ?>" src="<?php echo $imageURL; ?>" loading="lazy" alt="bilde"  />
                </a>
                </div>
            <?php }
            } 
            
        }
        ?>
    
    </div>
<script src="js/functions.js"></script>

<script>
    setInterval(()=>{
        checkForNewImages();
    },60000);
    function checkForNewImages(){
        var numberOfPictures = document.querySelectorAll(".item").length;
        $.ajax({
            type: "post",
            url: "fetch",
            data: "numberOfPictures="+numberOfPictures,
            success: function(data){
                
                if(data!=0){
                    document.getElementById("picture").innerHTML = data+document.getElementById("picture").innerHTML;
                    exifRotate();
                }
            },
            
        });
    }
    function scrollToPage(page, number){
        window.location = '/bryllup/#'+page;
    }

    function showImage(url, number){
        // console.log(number);
    }
    
    function calcHeight(){
        var picturesEl = document.querySelectorAll(".item");
        var cols=1;
        if(window.innerWidth>1800)
            cols=5;
        else if(window.innerWidth>1279)
            cols=4;
        else if(window.innerWidth>800)
            cols=3;
        else if(window.innerWidth>500)
            cols=2;
        var columnsEl = document.querySelectorAll(".column");
        for (var i=picturesEl.length-1; i>=0; i--){
            var number = (picturesEl.length-i-1)%cols;
   
            columnsEl[number].appendChild(document.getElementById("item"+(i+1)));
        }
        while(true){
            var minCol = 0;
            var maxCol = 0;
            var minHeight = Infinity;
            var maxHeight = 0;
            for(var i = 0; i< cols; i++){
                var height = 0;
                for(var x= 0; x<columnsEl[i].children.length;x++)
                    height += columnsEl[i].children[x].clientHeight;
               
                if(height>maxHeight){
                    maxHeight = height;
                    maxCol = i;
                }
                if(height<minHeight){
                    minHeight = height;
                    minCol = i;
                }
            }
            
            if(maxHeight-minHeight>1.3*document.getElementById("column"+maxCol).lastChild.clientHeight){
                document.getElementById("column"+minCol).appendChild(document.getElementById("column"+maxCol).lastChild);
                continue;
            }
            break;
        }
    }


    function exifRotate(){
        var imgEl = document.querySelectorAll("img");
        for(var i = 0; i< imgEl.length; i++){
            EXIF.getData(imgEl[i], function() {
                    //console.log(EXIF.getTag(this, "Orientation") || 1);
                    var exifRotation = (EXIF.getTag(this, "Orientation") || 1);
                    switch(exifRotation){
                        case 8:
                            document.getElementById(this.id).style.setProperty("rotate", "90deg");
                            break;
                        case 3:
                            document.getElementById(this.id).style.setProperty("rotate", "180deg");
                            break;
                        case 6:
                            document.getElementById(this.id).style.setProperty("rotate", "270deg");
                            break;
                    }
                    if(exifRotation !=1){
                        document.getElementById(this.id).style.setProperty("object-fit", "contain");
                    }
                    });
        }
        
        
    }
</script>
</body>
</html>
