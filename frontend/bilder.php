<!DOCTYPE html>
<html lang="no">

<head>

    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>EE&#38;H Bilder</title>
    <script src="jquery-3.5.1.min.js"></script>
    <link href="background-images/logo.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site-specific.css">
    <link rel="stylesheet" type="text/css" href="css/stil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="css/pictureShowHorizontal.css">
</head>
<style>
.info {
    color: whitesmoke;
}

@media only screen and (max-width: 1279px) {
    .info {
        color: black;
    }
}
</style>

<body>
    <div id="nav" class="closed scrolled">
        <ul>
            <li><a class="info a" onclick="scrollToPage(1)">EE&#38;H</a></li>
            <li><a class="info a" onclick="scrollToPage(2)">Korona</a></li>
            <li><a class="info a" onclick="scrollToPage(3)">Vielse</a></li>
            <li><a class="info a" onclick="scrollToPage(4)">Fest</a></li>
            <li><a class="info a" onclick="scrollToPage(5)">Registrer</a></li>
            <li><a class="info a" onclick="scrollToPage(6)">Toastmaster</a></li>
            <li><a class="info a" onclick="scrollToPage(7)">Reise og overnatting</a></li>
            <li><a class="info a" onclick="scrollToPage(8)">Ønskeliste</a></li>


        </ul>
        <a id="ham" class="hamClass a" onclick="openNav(false)"><i class="material-icons">menu</i></a>
    </div>
    <div id="picture">
        <?php
        $servername = "localhost:3307";
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
                    $imageURL = 'images/'.$row["file_name"];      
            ?>
        <div class="item" id="itemimg<?php echo $number; ?>">
            <img class="image" onclick="showImage(<?php echo $number?>)" id="img<?php echo $number; ?>"
                src="<?php echo $imageURL; ?>" loading="lazy" alt="bilde" />
        </div>
        <?php }
            } 
            
        }
        ?>

    </div>
    <div id="slideshow">
        <i id="closeSlideshow" style="display:none;" class="material-icons">clear</i>
        <div id="slideFlex">
            <div id="slideshowControl" style="display:none;">
                <i id="previousPicture" class="material-icons">navigate_before</i>
                <i id="pausePlay" class="material-icons">play_arrow</i>
                <i id="nextPicture" class="material-icons">navigate_next</i>
            </div>
        </div>
    </div>

    </div>
    <script src="js/functions.js"></script>

    <script>
    setInterval(() => {
        checkForNewImages();

    }, 20000);

    function checkForNewImages() {
        var numberOfPictures = document.querySelectorAll(".item").length;
        $.ajax({
            type: "get",
            url: "fetch",
            data: "numberOfPictures=" + numberOfPictures,
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < data.length; i++) {
                        try {
                            var obj = JSON.parse(data[i]);
                            document.getElementById("picture").innerHTML = "<div class='item' id='" + obj
                                .id + "'><img class='image' onclick='showImage(" + obj.number +
                                ")' id='img" + obj.number + "' src='" + obj.url +
                                "' loading='lazy' alt='bilde'\></div>" + document.getElementById("picture")
                                .innerHTML;
                        } catch (error) {}
                    }
                    addImageToSlideshow();

                }
            },

        });
    }

    function scrollToPage(page, number) {
        window.location = 'http://localhost:8080/bryllup/#' + page;
    }
    document.getElementById("slideshow").addEventListener("click", close);
    document.getElementById("slideshow").addEventListener("mousemove", showClose);
    document.getElementById("closeSlideshow").addEventListener("click", close);
    document.getElementById("previousPicture").addEventListener("click", prevImage);
    document.getElementById("nextPicture").addEventListener("click", nextImage);
    document.getElementById("pausePlay").addEventListener("click", pausePlay);
    var scrollHeight = 0;


    var closeTimeout;
    document.getElementById("closeSlideshow").style.transition = "0.5s ease";

    function showClose() {
        clearTimeout(closeTimeout);
        document.getElementById("closeSlideshow").style.display = "block";
        document.getElementById("slideshowControl").style.display = "block";
        document.querySelector("body").style.cursor = "auto";
        if ($('#closeSlideshow:hover').length == 0 && $('#slideshowControl:hover').length == 0) {
            closeTimeout = setTimeout(() => {
                document.getElementById("closeSlideshow").style.display = "none";
                document.getElementById("slideshowControl").style.display = "none";
                document.querySelector("body").style.cursor = "none";
            }, 2000);
        }
    }

    function addImageToSlideshow() {

        var imagesEl = document.querySelectorAll(".image");
        var imagesEl = document.querySelectorAll(".image");
        var slideshowEl = document.getElementById("slideshow");
        for (var i = 0; i < imagesEl.length; i++) {

            if (document.getElementById("slideshowimg" + (i + 1)) == null) {

                var clone = document.createElement("img");
                clone.id = "slideshowimg" + (i + 1);
                clone.className = "slideshowimg";
                clone.style.display = "none";
                clone.src = document.getElementById("img" + (i + 1)).src;
                slideshowEl.appendChild(clone);
            }
        }
    }

    function showImage(number) {
        scrollHeight = window.scrollY;
        var imagesEl = document.querySelectorAll(".image");
        var slideshowEl = document.getElementById("slideshow");
        slideshowEl.style.display = "block";
        addImageToSlideshow();
        for (var i = 0; i < imagesEl.length; i++) {
            document.getElementById("slideshowimg" + (i + 1)).classList.remove("activeImg");
        }
        slideshowEl.style.setProperty("z-index", 5);

        document.getElementById("slideshowimg" + number).classList.add("activeImg");
        document.getElementById("picture").style.display = "none";
        showClose();
        document.body.requestFullscreen();
        var pausePlayEl = document.getElementById("pausePlay");
        if (pausePlayEl.innerHTML == "pause") {
            runSlideshow();

        } else {
            clearTimeout(slide);
        }

    }
    var slide;

    function runSlideshow() {
        slide = setTimeout(() => {
            nextImage(1);
        }, 4500);
        // var slideshowImg = document.querySelectorAll(".slideshowimg");
        // var img = document.querySelector(".activeImg");
        // var idNum = parseInt(img.id.substr(12));
        // if (idNum != slideshowImg.length) {
        //     slide = setTimeout(() => {

        //         var activeImage = document.getElementById("slideshowimg" + (++idNum));
        //         activeImage.classList.add("activeImg");
        //         img.classList.remove("activeImg");
        //         runSlideshow();
        //     }, 4500);
        // } else {

        //     slide = setTimeout(() => {
        //         var activeImage = document.getElementById("slideshowimg" + 1);
        //         activeImage.classList.add("activeImg");
        //         img.classList.remove("activeImg");
        //         runSlideshow();
        //     }, 4500);
        // }
    }

    function close(e) {
        if (e.target == this) {
            document.exitFullscreen();
            clearTimeout(slide);
            clearTimeout(closeTimeout);
            document.querySelector("body").style.cursor = "auto";
            document.getElementById("picture").style.display = "flex";
            document.getElementById("slideshow").style.display = "none";
            window.scrollTo(0, scrollHeight);
        }
    }

    function pausePlay(e) {
        var pausePlayEl = document.getElementById("pausePlay");
        if (pausePlayEl.innerHTML == "pause") {
            pausePlayEl.innerHTML = "play_arrow";
            clearTimeout(slide);
        } else {
            pausePlayEl.innerHTML = "pause";
            runSlideshow();
        }
    }

    function prevImage(e) {
        var pausePlayEl = document.getElementById("pausePlay");
        var activeImageEl;
        var imagesEl = document.querySelectorAll(".slideshowimg");
        var imgEl = document.querySelectorAll(".image");
        var num = 0;
        for (var i = 0; i < imagesEl.length; i++) {
            if (imagesEl[i].classList.contains("activeImg")) {
                activeImageEl = imagesEl[i];
                var idNum = activeImageEl.id.substr(12);
                for (var j = 0; j < imgEl.length; j++) {
                    if (imgEl[j].id == "img" + idNum) {
                        num = j;
                        break;
                    }
                }
            }
        }
        var idNum;
        if (num != 0) {
            var idNum = imgEl[--num].id.substr(3);
        } else {
            var idNum = imgEl[imgEl.length - 1].id.substr(3);
        }
        var activeImage = document.querySelector("#slideshowimg" + idNum);
        activeImage.classList.add("activeImg");
        activeImageEl.classList.remove("activeImg");
        if (pausePlayEl.innerHTML == "pause") {
            clearTimeout(slide);
            runSlideshow();
        }
    }

    function nextImage(e) {
        var pausePlayEl = document.getElementById("pausePlay");
        var activeImageEl;
        var imagesEl = document.querySelectorAll(".slideshowimg");
        var imgEl = document.querySelectorAll(".image");
        var num = 0;
        for (var i = 0; i < imagesEl.length; i++) {
            if (imagesEl[i].classList.contains("activeImg")) {
                activeImageEl = imagesEl[i];
                var idNum = activeImageEl.id.substr(12);
                for (var j = 0; j < imgEl.length; j++) {
                    if (imgEl[j].id == "img" + idNum) {
                        num = j;
                        break;
                    }
                }
            }
        }
        var idNum;
        if (num != imgEl.length - 1) {
            var idNum = imgEl[++num].id.substr(3);
        } else {
            var idNum = imgEl[0].id.substr(3);
        }
        var activeImage = document.querySelector("#slideshowimg" + idNum);
        activeImage.classList.add("activeImg");
        activeImageEl.classList.remove("activeImg");

        if (pausePlayEl.innerHTML == "pause") {
            clearTimeout(slide);
            runSlideshow()
        }
    }
    </script>
</body>

</html>