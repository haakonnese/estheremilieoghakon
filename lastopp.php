<!DOCTYPE html>
<html lang="no">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>EE&H 26.06.2021</title>
    <script src="jquery-3.5.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</head>
<style>
.uploadBtn {
    position: relative;
    word-wrap: break-word;
    width: calc(50% - 4px);
    padding: 10px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border: 1px dashed #BBB;
    text-align: center;
    background-color: #DDD;
    cursor: pointer;
    display: inline-block;
    margin-bottom: 3px;
}

#uploadSubmit {
    -webkit-box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1) !important;
    -moz-box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1) !important;
    box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1) !important;
    cursor: pointer;
    transition: 0.2s ease;
    height: 3.5em;
    align-self: center;
    background-color: rgba(0, 0, 0, 0.822);
    color: whitesmoke;
    border: 1px solid rgba(0, 0, 0, 0.1);
    width: 100%;
}

.middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    background-color: rgba(0, 0, 0, 0.5);
}

#moreButton {
    -webkit-box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1) !important;
    -moz-box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1) !important;
    box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1) !important;
    cursor: pointer;
    transition: 0.2s ease;
    height: 3.5em;
    align-self: center;
    background-color: rgba(0, 0, 0, 0.822);
    color: whitesmoke;
    padding: .3em 2%;
    /* margin-bottom: 1em; */
    width: 100%;
    box-sizing: border-box;
    box-shadow: none;
    outline: none;
    border: none;
    border: 1px solid rgba(0, 0, 0, 0.1);
    font-size: larger;
}

.divUp {
    width: 150px;
    margin: 3px;
    border-radius: 5px;
    height: 150px;
    position: relative;
    display: inline-block
}

.imUp {
    width: 150px;
    height: 150px;
    object-fit: cover;
    padding: 0.5em;
    vertical-align: unset;
}

.vidUp {
    width: 150px;
    height: 150px;
    object-fit: cover;
    padding: 0.5em;
}

.remove {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: grey;
    color: white;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    text-align: center;
    font-size: larger;
    cursor: pointer;
}
</style>

<body>
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
        <div id="uploadStatus"></div>
        <div id="preview" style="display: flex; flex-wrap:wrap;"></div>
    </div>
    <script>
    let imagesToUpload = [];

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
                // console.log(divEl);
                divEl.id = file.name + "div";
                divEl.className = "divUp";
                const canvas = document.createElement('canvas');
                canvas.height = 150;
                canvas.width = 150;
                canvas.id = file.name;
                canvas.className = "imUp";
                const ctx = canvas.getContext('2d');
                var vid = document.createElement("video")
                // const source = document.createElement("source");
                vid.addEventListener("loadeddata", getmetadata);
                const source = document.createElement("source");
                vid.appendChild(source);

                function getmetadata(e) {
                    // console.log(vid);
                    // vid.muted = true;
                    // vid.controls = true;
                    vid.play();
                    vid.pause()
                    vid.currentTime = vid.duration / 2;
                    setTimeout(() => {
                        const len = Math.min(vid.videoWidth, vid.videoHeight);
                        // console.log(len);
                        // console.log(vid, vid.videoWidth - len, vid.videoHeight - len, len, len, 0, 0, 150, 150);
                        ctx.drawImage(vid, vid.videoWidth - len, vid.videoHeight - len, len, len, 0, 0,
                            150, 150);
                        // console.log(ctx);
                        source.src = "";
                        URL.revokeObjectURL(source.src);
                    }, 1000);

                    // vid.removeEventListener("canplaythrough", getmetadata);
                }
                source.src = URL.createObjectURL(file);
                // vid.play();
                // console.log(img);
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
                    // console.log(imagesToUpload);
                }
                // divEl.append(vid);
                previewEl.append(divEl);
                // var reader = new FileReader();
                // reader.onload = function(e) {
                //     submit.disabled = false;
                //     const divEl = document.createElement("div");
                //     divEl.id = file.name + "div";
                //     divEl.className = "divUp";
                //     const videoEl = document.createElement("video");
                //     videoEl.id = file.name;
                //     videoEl.className = "vidUp";
                //     videoEl.autoplay = true;
                //     videoEl.muted = true;
                //     videoEl.loop = true;
                //     const sourceEl = document.createElement("source");
                //     sourceEl.src = e.target.result;
                //     sourceEl.type = file.type;
                //     if (file.size > 50000000) {
                //         videoEl.preload = "none";
                //     }
                //     const removeEl = document.createElement("div");
                //     removeEl.className = "remove";
                //     removeEl.innerHTML = "X";
                //     removeEl.addEventListener("click", function() {
                //         remove(file.name)
                //     });
                //     videoEl.append(sourceEl);
                //     divEl.append(videoEl);
                //     divEl.append(removeEl);
                //     previewEl.append(divEl);
                // }
                // reader.readAsDataURL(file);
            });
        }
        document.querySelector("form").reset();
        // var file = obj.value;
        // var fileName = file.split("\\");
        // var numbFiles = document.querySelector('input[name="filesVideo[]"]').files.length;
        // if (numbFiles.length > 1) {
        //     document.getElementById("videoBtn").innerHTML = numbFiles + " videoer";
        // } else {
        //     document.getElementById("videoBtn").innerHTML = fileName[fileName.length - 1];
        // }
        // document.myForm.submit();
        // event.preventDefault();
    }

    function imageInList(file, list) {
        for (let i = 0; i < list.length; i++) {
            if (file.name == list[i].name &&
                file.lastModified == list[i].lastModified && file.size == list[i]
                .size)
                return true;
        }
        return false;
    }

    function subIm(obj) {
        const newImages = [];
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
                // console.log(divEl);
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
                    // console.log(img);
                    ctx.drawImage(img, img.width - len, img.height - len, len, len, 0, 0, 150, 150);
                    URL.revokeObjectURL(img.src)
                }
                img.src = URL.createObjectURL(file);

                // console.log(img);
                const removeEl = document.createElement("div");
                removeEl.className = "remove";
                removeEl.innerHTML = "X";
                removeEl.addEventListener("click", function() {
                    remove(file.name)
                });
                divEl.append(canvas);
                divEl.append(removeEl);
                previewEl.append(divEl);
                // var reader = new FileReader();
                // reader.onload = function(e) {
                //     const divEl = document.createElement("div");
                //     divEl.id = file.name + "div";
                //     divEl.className = "divUp";
                //     const imgEl = document.createElement("img");
                //     imgEl.src = e.target.result;
                //     imgEl.id = file.name
                //     imgEl.className = "imUp";
                //     const removeEl = document.createElement("div");
                //     removeEl.className = "remove";
                //     removeEl.innerHTML = "X";
                //     removeEl.addEventListener("click", function() {
                //         remove(file.name)
                //     });
                //     divEl.append(imgEl);
                //     divEl.append(removeEl);
                //     previewEl.append(divEl);
                // }
                // reader.readAsDataURL(file);
            });
        }
        document.querySelector("form").reset();

    }

    function remove(file) {
        imagesToUpload = imagesToUpload.filter(f => f.name != file);
        const elementToRemove = document.getElementById(file + "div");
        document.getElementById("preview").removeChild(elementToRemove);
    }

    function upload() {
        const percentage = new Array(Math.floor((imagesToUpload.length - 1) / 20) + 1).fill(0);
        const total = new Array(Math.floor((imagesToUpload.length - 1) / 20) + 1).fill(0);
        for (let i = 0; i <= (imagesToUpload.length - 1) / 20; i++) {
            var form_data = new FormData();
            const len = Math.min(imagesToUpload.length - 20 * i, 20);
            for (var index = 0 + 20 * i; index < 20 * i + len; index++) {
                form_data.append("files[]", imagesToUpload[index]);
            }

            if (imagesToUpload.length > 0) {
                $.ajax({
                    xhr: function() {
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
                                    percentComplete = (percentage.reduce((a, b) => a + b, 0) / total
                                        .reduce((a, b) => a + b, 0)) * 100;
                                }
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete + '%');
                            }
                        }, false);

                        return xhr;
                    },
                    type: "post",
                    url: "upload",
                    data: form_data,

                    contentType: false,
                    processData: false,
                    success: function(data) {
                        try {
                            // console.log(data);
                            var obj = JSON.parse(data);
                            // console.log(obj);
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
                            if (filteredArray.length == imagesToUpload.length) {
                                $(".progress-bar").css("background-color", "green");
                            } else if (filteredArray.length == 0 && imagesToUpload.length > obj
                                .exists.length) {
                                $(".progress-bar").css("background-color", "red");
                            } else {
                                $(".progress-bar").css("background-color", "#F9C802");
                            }
                            document.querySelector("form").style.display = "none";
                            document.getElementById("more").style.display = "block";
                            // for (var i = 0; i < obj.length; i++) {

                            //     if (obj[i] == "Bildene dine ble lastet opp.<br/>") {
                            //         $(".progress-bar").html("Bildene dine ble lastet opp.");
                            //         $(".progress-bar").css("background-color", "green");
                            //         uploaded = true;
                            //     } else if (uploaded || obj[i].includes(
                            //             "Bildene dine ble lastet opp.<br/>")) {
                            //         $(".progress-bar").html("Noen av bildene dine ble lastet opp.");
                            //         $(".progress-bar").css("background-color", "#F9C802");
                            //         document.getElementById("uploadStatus").innerHTML += obj[i].substr(
                            //             obj[i]
                            //             .indexOf("<br/>") + 5) + '<br>';
                            //         uploaded = true;
                            //     } else {
                            //         document.getElementById("uploadStatus").innerHTML += obj[i] +
                            //             '<br>';
                            //     }
                            // }
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