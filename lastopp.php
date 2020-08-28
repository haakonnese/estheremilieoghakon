<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"> 
    <title>EE&H 26.06.2021</title>
    <script src="jquery-3.5.1.min.js"></script>
</head>

<body>

<form  onsubmit="return upload()" method="post" enctype="multipart/form-data">
  Velg bilder å laste opp:
  <input type="file" name="files[]" multiple >
  <input type="submit" value="Last opp" name="submit">
</form>
<script>
    function upload(){
        var form_data = new FormData();
        var totalfiles = document.querySelector('input[name="files[]"]').files.length;
        
        for (var index = 0; index < totalfiles; index++) {
            form_data.append("files[]", document.querySelector('input[name="files[]"]').files[index]);
        }
        $.ajax({
            type:"post",
            url:"upload",
            data: form_data,
            
            contentType: false,
            processData: false,
            success: function(data){
                document.querySelector("body").innerHTML+=data;
            },
            error:  function(data){
                document.querySelector("body").innerHTML+=data;
            }
        });

        return false;
    }
</script>
</body>
</html>