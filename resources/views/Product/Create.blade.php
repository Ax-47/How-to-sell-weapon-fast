<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
    <title>Create Product</title>
</head>
<body>
    <h1>create</h1>
    <form action={{url("/productc")}} method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" id="file"  name="images[]" multiple="multiple">
        
        <input type="text" name="name">
        <input type="text" name="description">
        <input type="number" name="price">
        <input type="number" name="stock">
        <input type="submit" value="create products" onclick="FileDetails()"><br/><br/>
        <output></output>
    </form>
    <script>
        const output = document.querySelector("output")
        const input = document.getElementById("file")
        let imagesArray = []
        input.addEventListener("change", () => {
            const files = input.files
            for (let i = 0; i < files.length; i++) {
                imagesArray.push(files[i])
            }
            displayImages()
        })
        function displayImages() {
            let images = ""
            imagesArray.forEach((image, index) => {
                images += `<div class="image">
                            <img src="${URL.createObjectURL(image)}" alt="image">
                            <span onclick="deleteImage(${index})">&times;</span>
                        </div>`
            })
            output.innerHTML = images
        }
        function deleteImage(index) {
            imagesArray.splice(index, 1)
            displayImages()
        }
    </script>
</body>
</html>