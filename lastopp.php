<!DOCTYPE html>
<html lang="no">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>EE&H 26.06.2021</title>
    <script src="jquery-3.5.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="background-images/logo.png" rel="icon" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stil.css">
    <link rel="stylesheet" type="text/css" href="css/upload.css">
    <link rel="stylesheet" type="text/css" href="css/contact-form.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="js/functions.js"></script>
</head>


<body>
    <div id="nav" class="closed scrolled">
        <ul>
            <li><a class="info a" onclick="scrollToPage(1)">EE&#38;H</a></li>
            <li><a class="info a" onclick="scrollToPage(2)">Vielse</a></li>
            <li><a class="info a" onclick="scrollToPage(3)">Fest</a></li>
            <li><a class="info a" onclick="scrollToPage(4)">Registrer</a></li>
            <li><a class="info a" onclick="scrollToPage(5)">Toastmaster</a></li>
            <li><a class="info a" onclick="scrollToPage(6)">Reise og overnatting</a></li>
            <li><a class="info a" onclick="scrollToPage(7)">Ønskeliste</a></li>
            <li><a class="info a" href="bilder">Bilder</a></li>


        </ul>
        <a id="ham" class="hamClass a" onclick="openNav(false)"><i class="material-icons">menu</i></a>
    </div>
    <div class="container">
        <h1>Velg bilder og/eller videoer å laste opp.</h1>
        <h2>Det er mulig å laste opp bilder og videoer samtidig. Velg f.eks. bilde først og deretter video og trykk så
            last opp </h2>
        <div id="more" style="display:none; margin-top:46px; "><button id="moreButton" onClick="showForm()">Last opp
                flere bilder eller
                videoer</button>
        </div>
        <form onsubmit="return upload()" method="post" enctype="multipart/form-data">
            <div>
                <label id="imageBtn" class="uploadBtn" onclick="getFileIm()">Legg til bilder</label>
                <label id="videoBtn" class="uploadBtn" style="float: right;" onclick=" getFileVid()">Legg til
                    videoer</label>
                <div style='height: 0px;width: 0px; overflow:hidden;'>
                    <input value="upload" type="file" name="filesImage[]" style="display: none;" id="fileUploadIm"
                        accept="image/*" multiple onchange="subIm(this)" />
                </div>
                <div style='height: 0px;width: 0px; overflow:hidden;'>
                    <input value="upload" type="file" name="filesVideo[]" style="display: none;" id="fileUploadVid"
                        accept="video/*" multiple onchange="subVid(this)" />
                </div>
            </div>
            <input type="submit" value="Last opp" name="submit" id="uploadSubmit">
        </form>
        <br>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <div id="spin" style="position: fixed; z-index: 100; left:50%; 
            transform: translateX(-50%); background-color: rgba(90,90,90,0.9);
            border-radius: 5px; padding: 10px; display: none;">
            <div class="loading"></div>
            <h1>Venligst vent</h1>
        </div>
        <div id="uploadStatus"></div>
        <div id="preview" style="display: flex; flex-wrap:wrap;"></div>
    </div>
    <script>
    function scrollToPage(page, number) {
        window.location = 'http://localhost:8080/bryllup/#' + page;
    }
    let imagesToUpload = [];
    let numberOfUploads, totalNumberOfUploads, filtered, exists;
    $("#fileUpload").click(() => {
        $(".progress-bar").width(0 + '%');
        $(".progress-bar").html(0 + '%');
        $(".progress-bar").css("background-color", "blue");
    });

    function getFileIm() {
        document.getElementById("fileUploadIm").click();
    }

    function getFileVid() {
        document.getElementById("fileUploadVid").click();
    }

    function showForm() {
        document.querySelector("form").style.display = "block";
        document.getElementById("more").style.display = "none";
        document.getElementById("preview").innerHTML = "";
        imagesToUpload = [];
        $(".progress-bar").width(0 + '%');
        $(".progress-bar").html(0 + '%');
        $(".progress-bar").css("background-color", "blue");

    }

    // add new videofiles to files that is going to be uploaded
    // and draw a image from the video to a canvas. 
    function subVid(obj) {
        const newVideos = [];
        [...obj.files].forEach(file => {
            if (!imageInList(file, imagesToUpload)) {
                imagesToUpload.push(file);
                newVideos.push(file);
            }
        });
        const submit = document.getElementById("uploadSubmit");
        const previewEl = document.getElementById("preview");
        if (obj.files.length >= 1) {

            newVideos.forEach(file => {

                const divEl = document.createElement("div");
                divEl.id = file.name + "div";
                divEl.className = "divUp";
                const canvas = document.createElement('canvas');
                canvas.height = 150;
                canvas.width = 150;
                canvas.id = file.name;
                canvas.className = "imUp";
                const ctx = canvas.getContext('2d');
                var vid = document.createElement("video")
                vid.addEventListener("loadeddata", getmetadata);
                const source = document.createElement("source");
                vid.appendChild(source);

                function getmetadata(e) {
                    vid.play();
                    vid.pause()
                    vid.currentTime = vid.duration / 2;
                    setTimeout(() => {
                        const len = Math.min(vid.videoWidth, vid.videoHeight);
                        ctx.drawImage(vid, vid.videoWidth - len, vid.videoHeight - len, len, len, 0, 0,
                            150, 150);
                        source.src = "";
                        URL.revokeObjectURL(source.src);
                    }, 1000);

                }
                source.src = URL.createObjectURL(file);
                const removeEl = document.createElement("div");
                removeEl.className = "remove";
                removeEl.innerHTML =
                    "X";
                removeEl.addEventListener("click", function() {
                    remove(file.name)
                });
                divEl.append(canvas);
                divEl.append(removeEl);
                if (file.size > 104857600) {
                    divEl.style.background = "red";
                    const messageEl = document.createElement("div");
                    messageEl.innerHTML = "Filen er for stor";
                    messageEl.className = "middle";
                    divEl.appendChild(messageEl);
                    canvas.style.opacity = "0.8";
                    imagesToUpload = imagesToUpload.filter(p => !(file.name == p.name &&
                        file.lastModified == p.lastModified && file.size == p.size));
                }
                previewEl.append(divEl);
            });
        }
        document.querySelector("form").reset();
    }

    // check if image or video already in files that is going to be uploaded
    function imageInList(file, list) {
        for (let i = 0; i < list.length; i++) {
            if (file.name == list[i].name &&
                file.lastModified == list[i].lastModified && file.size == list[i]
                .size)
                return true;
        }
        return false;
    }

    function subIm() {
        const newImages = [];
        obj = document.get
        [...obj.files].forEach(file => {
            if (!imageInList(file, imagesToUpload)) {
                imagesToUpload.push(file);
                newImages.push(file);
            }
        });
        const submit = document.getElementById("uploadSubmit");
        const previewEl = document.getElementById("preview");
        if (obj.files.length >= 1) {
            newImages.forEach(file => {
                const divEl = document.createElement("div");
                divEl.id = file.name + "div";
                divEl.className = "divUp";
                const canvas = document.createElement('canvas');
                canvas.height = 150;
                canvas.width = 150;
                canvas.id = file.name;
                canvas.className = "imUp";
                const ctx = canvas.getContext('2d');
                var img = new Image;
                img.onload = function() {
                    const len = Math.min(img.width, img.height);
                    ctx.drawImage(img, img.width - len, img.height - len, len, len, 0, 0, 150, 150);
                    URL.revokeObjectURL(img.src)
                }
                img.src = URL.createObjectURL(file);

                const removeEl = document.createElement("div");
                removeEl.className = "remove";
                removeEl.innerHTML = "X";
                removeEl.addEventListener("click", function() {
                    remove(file.name)
                });
                divEl.append(canvas);
                divEl.append(removeEl);
                previewEl.append(divEl);
            });
        }
        document.querySelector("form").reset();

    }

    // remove file from the files that is going to be uploaded
    function remove(file) {
        imagesToUpload = imagesToUpload.filter(f => f.name != file);
        const elementToRemove = document.getElementById(file + "div");
        document.getElementById("preview").removeChild(elementToRemove);
    }

    // upload files to server. Send multiple async requests since php on server only allows 20 files per upload
    function upload() {
        filtered = 0;
        numberOfUploads = 0;
        exists = 0;
        totalNumberOfUploads = Math.ceil(imagesToUpload.length / 20);
        const percentage = new Array(Math.ceil(imagesToUpload.length / 20)).fill(0);
        const total = new Array(Math.ceil(imagesToUpload.length / 20)).fill(0);
        for (let i = 0; i <= (imagesToUpload.length - 1) / 20; i++) {
            var form_data = new FormData();
            const len = Math.min(imagesToUpload.length - 20 * i, 20);
            for (var index = 0 + 20 * i; index < 20 * i + len; index++) {
                form_data.append("files[]", imagesToUpload[index]);
            }

            if (imagesToUpload.length > 0) {
                $(".uploadBtn").css("cursor", "not-allowed");
                $("#uploadSubmit").css("cursor", "not-allowed");
                document.querySelector("#uploadSubmit").disabled = true;
                document.querySelectorAll("input").forEach(e => e.disabled = true);
                $.ajax({
                    xhr: function() {
                        $(".remove").css("display", "none");
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable && imagesToUpload.length > 0) {
                                percentage[i] = evt.loaded;
                                total[i] = evt.total;
                                let allUploadsBegun = true;
                                total.forEach(element => {
                                    if (element == 0) {
                                        allUploadsBegun = false;
                                    }
                                });
                                let percentComplete = 0;
                                if (allUploadsBegun) {
                                    percentComplete = Math.round((percentage.reduce((a, b) => a + b,
                                            0) / total
                                        .reduce((a, b) => a + b, 0)) * 10000) / 100;
                                }
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete + '%');

                            }

                        }, false);
                        $("#spin").css("display", "block");
                        return xhr;
                    },
                    type: "post",
                    url: "upload",
                    data: form_data,

                    contentType: false,
                    processData: false,
                    success: function(data) {
                        numberOfUploads++;
                        if (numberOfUploads === totalNumberOfUploads) {
                            $("#spin").css("display", "none");
                            $(".uploadBtn").css("cursor", "pointer");
                            $("#uploadSubmit").css("cursor", "pointer");
                            document.querySelector("#uploadSubmit").disabled = false;
                            document.querySelectorAll("input").forEach(e => e.disabled = false);
                        }
                        // add overlay witch shows if file is uploaded or not
                        try {
                            var obj = JSON.parse(data);
                            errorFiles = []
                            obj.exists.forEach(element => {
                                const divEl = document.getElementById(element + "div");
                                divEl.style.background = "#F9C802";
                                const messageEl = document.createElement("div");
                                messageEl.innerHTML = "Filen finnes fra før";
                                messageEl.className = "middle";
                                divEl.appendChild(messageEl);
                                document.getElementById(element).style.opacity = "0.8";
                                errorFiles.push(element);
                            });
                            obj.type.forEach(element => {
                                const divEl = document.getElementById(element + "div");
                                divEl.style.background = "red";
                                const messageEl = document.createElement("div");
                                messageEl.innerHTML = "Feil filtype";
                                messageEl.className = "middle";
                                divEl.appendChild(messageEl);
                                document.getElementById(element).style.opacity = "0.8";
                                errorFiles.push(element);
                            });
                            obj.large.forEach(element => {
                                const divEl = document.getElementById(element + "div");
                                divEl.style.background = "red";
                                const messageEl = document.createElement("div");
                                messageEl.innerHTML = "Filen er for stor";
                                messageEl.className = "middle";
                                divEl.appendChild(messageEl);
                                document.getElementById(element).style.opacity = "0.8";
                                errorFiles.push(element);
                            });
                            obj.other.forEach(element => {
                                const divEl = document.getElementById(element + "div");
                                divEl.style.background = "red";
                                const messageEl = document.createElement("div");
                                messageEl.innerHTML = "En feil oppstod";
                                messageEl.className = "middle";
                                divEl.appendChild(messageEl);
                                document.getElementById(element).style.opacity = "0.8";
                                errorFiles.push(element);
                            });
                            const filteredArray = imagesToUpload.slice(i * 20, i * 20 + len).filter(
                                    value =>
                                    !errorFiles
                                    .includes(value
                                        .name))
                                .map(value => value.name);
                            filteredArray.forEach(element => {
                                const divEl = document.getElementById(element + "div");
                                divEl.style.background = "green";
                                const messageEl = document.createElement("div");
                                messageEl.innerHTML = "Filen ble lastet opp";
                                messageEl.className = "middle";
                                divEl.appendChild(messageEl);
                                document.getElementById(element).style.opacity = "0.8";
                                errorFiles.push(element);
                            });
                            filtered += filteredArray.length;
                            exists += obj.exists.length
                            if (numberOfUploads === totalNumberOfUploads) {
                                if (filtered == imagesToUpload.length) {
                                    $(".progress-bar").css("background-color", "green");
                                } else if (filtered == 0 && imagesToUpload.length > exists) {
                                    $(".progress-bar").css("background-color", "red");
                                } else {
                                    $(".progress-bar").css("background-color", "#F9C802");
                                }
                            }

                            document.querySelector("form").style.display = "none";
                            document.getElementById("more").style.display = "block";
                        } catch (error) {}
                    },
                });
            }
        }
        return false;

    }
    </script>
</body>

</html>