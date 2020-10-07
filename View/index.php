<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="Controller/ImagemController.php" method="post" enctype="multipart/form-data">
        <h2>Preview</h2>
        <img src="/View/img/placeholder.png" onclick="imageClick()" id="image" name="image">
        <hr>
        Select image to upload:
        <input type="file" onchange="exibirImagem(this)" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

</body>

<script>
    function imageClick() {
        document.getElementById("fileToUpload").click();
    }

    function exibirImagem(e){
        console.log('Antes IF');

        if(e.files[0]){
            console.log('Depois IF');
            var leitor = new FileReader();

            leitor.onload = function(e){
                document.getElementById("image").setAttribute('src', e.target.result);
            }
            
            leitor.readAsDataURL(e.files[0]);
        }
    }
</script>

</html>