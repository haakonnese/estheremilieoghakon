<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"> 
    <title>EE&#38;H 26.06.2021</title>
    <script src="jquery-3.5.1.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site-specific.css">
    <link rel="stylesheet" type="text/css" href="css/stil.css">
    
    <!-- <link rel="stylesheet" type="text/css" href="css/pictureShow.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="css/pictureShowHorizontal.css">
    <script src="js/exif.js"></script>
</head>
<!-- onload="exifRotate()" -->
<!-- <body onload="calcHeight()"> -->
    <body  >
    <div id="nav" class="closed scrolled">
        <ul>
            <li><a class="info" onclick="scrollToPage(1)" >EE&#38;H</a></li>
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
            $query = $conn->query("SELECT * FROM images WHERE status = 1 ORDER BY id DESC");
            $number = 0;
            if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
                    $number++;
                    $imageURL = 'images/full/'.$row["file_name"];      
            ?>  
                <div class="item" id="itemimg<?php echo $number; ?>">
                <img class="image" onclick="showImage(<?php echo $number?>)" id="img<?php echo $number; ?>" src="<?php echo $imageURL; ?>" loading="lazy" alt="bilde"  />
                </div>
            <?php }
            } 
            
        }
        ?>
    
    </div>
    <div id="slideshow">
        <i id="closeSlideshow" style="display:none;" class="material-icons">clear</i>
        <div id="slideFlex" >
            <div id="slideshowControl" style="display:none;">
                <i id="previousPicture" class="material-icons">navigate_before</i>
                <i id="pausePlay" class="material-icons">pause</i>
                <i id="nextPicture" class="material-icons">navigate_next</i>
            </div>
        </div>
    </div>
    
        
        
    </div>
<script src="js/functions.js"></script>

<script>
    setInterval(()=>{
        checkForNewImages();
        
    },20000);
    function checkForNewImages(){
        var numberOfPictures = document.querySelectorAll(".item").length;
        $.ajax({
            type: "post",
            url: "fetch",
            data: "numberOfPictures="+numberOfPictures,
            success: function(data){
                if(data!=0){
                    document.getElementById("picture").innerHTML = data+document.getElementById("picture").innerHTML;
                    addImageToSlideshow();
                    
                }
            },
            
        });
    }
    function scrollToPage(page, number){
        window.location = '/bryllup/#'+page;
    }

    document.getElementById("slideshow").addEventListener("click",close);
    document.getElementById("slideshow").addEventListener("mousemove",showClose);
    document.getElementById("closeSlideshow").addEventListener("click",close);
    document.getElementById("previousPicture").addEventListener("click", prevImage);
    document.getElementById("nextPicture").addEventListener("click", nextImage);
    document.getElementById("pausePlay").addEventListener("click", pausePlay);
    var scrollHeight = 0;
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
    var closeTimeout;
    document.getElementById("closeSlideshow").style.transition ="0.5s ease";

    function showClose(){
        clearTimeout(closeTimeout);
        document.getElementById("closeSlideshow").style.display ="block";
        document.getElementById("slideshowControl").style.display="block";
        document.querySelector("body").style.cursor = "auto";
        if($('#closeSlideshow:hover').length==0 && $('#slideshowControl:hover').length==0){
            closeTimeout = setTimeout(()=>{
                document.getElementById("closeSlideshow").style.display ="none";
                document.getElementById("slideshowControl").style.display="none";
                document.querySelector("body").style.cursor = "none";
            },2000);
        }
    }
    function addImageToSlideshow(){
        
        var imagesEl = document.querySelectorAll(".image");
        var imagesEl = document.querySelectorAll(".image");
        var slideshowEl = document.getElementById("slideshow");
        for (var i = 0; i< imagesEl.length; i++){
            
            if(document.getElementById("slideshowimg"+(i+1))==null){
                
                var clone = document.createElement("img");
                clone.id = "slideshowimg"+(i+1);
                clone.className ="slideshowimg";
                clone.style.display ="none";
                clone.src = document.getElementById("img"+(i+1)).src;
                slideshowEl.appendChild(clone);
            }
            
        }
    }
    function showImage(number){
        scrollHeight = window.scrollY;
        var imagesEl = document.querySelectorAll(".image");
        var slideshowEl = document.getElementById("slideshow");
        slideshowEl.style.display ="block";
        addImageToSlideshow();
        for(var i = 0; i< imagesEl.length; i++){
            document.getElementById("slideshowimg"+(i+1)).classList.remove("activeImg");
        }
        slideshowEl.style.setProperty("z-index",5);
        
        document.getElementById("slideshowimg"+number).classList.add("activeImg");
        document.getElementById("picture").style.display = "none";
        showClose();
        runSlideshow();
        
    }
    var slide;
    function runSlideshow(){
        
        var slideshowImg = document.querySelectorAll(".slideshowimg");
        var img = document.querySelector(".activeImg");
        var idNum = parseInt(img.id.substr(12));
        if(idNum!=slideshowImg.length){
            
            slide = setTimeout(()=>{
                
                var activeImage = document.getElementById("slideshowimg"+(++idNum));
                activeImage.classList.add("activeImg");
                img.classList.remove("activeImg");
                runSlideshow();
            },4500);
        }
        else{
            
            slide = setTimeout(()=>{
                var activeImage = document.getElementById("slideshowimg"+1);
                activeImage.classList.add("activeImg");
                img.classList.remove("activeImg");
                runSlideshow();
            },4500);
        }
       
        
    }

    function close(e){
        if(e.target==this){
            clearTimeout(slide);
            clearTimeout(closeTimeout);
            document.querySelector("body").style.cursor = "auto";
            document.getElementById("picture").style.display ="flex";
            document.getElementById("slideshow").style.display ="none";
            window.scrollTo(0,scrollHeight);
        }
    }
    function pausePlay(e){
        var pausePlayEl = document.getElementById("pausePlay");
        if (pausePlayEl.innerHTML == "pause"){
            pausePlayEl.innerHTML ="play_arrow";
            clearTimeout(slide);
        } 
        else{
            pausePlayEl.innerHTML ="pause";
            runSlideshow();
        }
    }
    function prevImage(e){
        var pausePlayEl = document.getElementById("pausePlay");
        var activeImageEl;
        var imagesEl = document.querySelectorAll(".slideshowimg");
        var imgEl = document.querySelectorAll(".image");
        var num = 0;
        for (var i = 0; i < imagesEl.length; i++){
            if (imagesEl[i].classList.contains("activeImg")){
                activeImageEl = imagesEl[i];
                var idNum = activeImageEl.id.substr(12);
                for (var j = 0; j < imgEl.length; j++){
                    if (imgEl[j].id == "img"+idNum){
                        num = j;
                        break;
                    }
                } 
            }
        }
        var idNum;
        if (num!=0){
            var idNum = imgEl[--num].id.substr(3);
        }
        else{
            var idNum = imgEl[imgEl.length-1].id.substr(3);
        }
        var activeImage = document.querySelector("#slideshowimg"+idNum);
        activeImage.classList.add("activeImg");
        activeImageEl.classList.remove("activeImg");

        if (pausePlayEl.innerHTML == "pause"){
            clearTimeout(slide);
            runSlideshow();
        } 
    }
    function nextImage(e){
        var pausePlayEl = document.getElementById("pausePlay");
        var activeImageEl;
        var imagesEl = document.querySelectorAll(".slideshowimg");
        var imgEl = document.querySelectorAll(".image");
        var num = 0;
        for (var i = 0; i < imagesEl.length; i++){
            if (imagesEl[i].classList.contains("activeImg")){
                activeImageEl = imagesEl[i];
                var idNum = activeImageEl.id.substr(12);
                for (var j = 0; j < imgEl.length; j++){
                    if (imgEl[j].id == "img"+idNum){
                        num = j;
                        break;
                    }
                } 
            }
        }
        var idNum;
        if (num!=imgEl.length-1){
            var idNum = imgEl[++num].id.substr(3);
        }
        else{
            var idNum = imgEl[0].id.substr(3);
        }
        var activeImage = document.querySelector("#slideshowimg"+idNum);
        activeImage.classList.add("activeImg");
        activeImageEl.classList.remove("activeImg");
        
        if (pausePlayEl.innerHTML == "pause"){
            clearTimeout(slide);
            runSlideshow()
        } 
    }
</script>
</body>
</html>
