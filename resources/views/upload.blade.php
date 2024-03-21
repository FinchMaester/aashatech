<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <form id="uploadForm" enctype="multipart/form-data" action="{{ route('image.upload') }}" method="post">
        @csrf
        <input type="file" name="image" id="image">
        <button type="submit">Upload</button>
    </form>

    <div id="output"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData();
            formData.append('image', document.getElementById('image').files[0]);

            axios.post('/compress-image', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function (response) {
                document.getElementById('output').innerHTML = '<img src="' + response.data.path + '" alt="Compressed Image">';
            })
            .catch(function (error) {
                console.error('Error uploading image:', error);
            });
        });
    </script>
</body>
</html>
