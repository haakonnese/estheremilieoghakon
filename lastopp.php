<!DOCTYPE html>
<html lang="no">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>EE&H 26.06.2021</title>
    <script src="jquery-3.5.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="max-width:500px">
        <form onsubmit="return upload()" method="post" enctype="multipart/form-data">
            <h1>Velg bilder å laste opp</h1>
            <input type="file" name="files[]" multiple>
            <input type="submit" value="Last opp" name="submit">
        </form>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <div id="uploadStatus"></div>
    </div>
    <script>
    function upload() {
        var form_data = new FormData();
        var totalfiles = document.querySelector('input[name="files[]"]').files.length;
        for (var index = 0; index < totalfiles; index++) {
            form_data.append("files[]", document.querySelector('input[name="files[]"]').files[index]);
        }
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = Math.round((evt.loaded / evt.total) * 10000)/100;
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
                    var obj = JSON.parse(data);
                    for (var i = 0; i < obj.length; i++) {
                        document.getElementById("uploadStatus").innerHTML += obj[i] + '<br>';
                    }
                } catch (error) {}
            },
        });
        return false;
    }
    </script>
</body>

</html>