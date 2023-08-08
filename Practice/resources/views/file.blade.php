<!DOCTYPE html>
<html>
<head>
    <title>Select Image from Device</title>
</head>
<body>
    <h1>Select an Image</h1>
    <form>
        <input type="file" id="imageInput" accept="image/*">
    </form>
    <img id="previewImage" style="display: none; max-width: 300px;">
    <script>
        
        const imageInput = document.getElementById('imageInput');

        
        const previewImage = document.getElementById('previewImage');

        
        imageInput.addEventListener('change', function(event) {
            
            const selectedFile = event.target.files[0];

      
            if (selectedFile) {
               
                const reader = new FileReader();

               
                reader.onload = function(e) {
                    
                    previewImage.src = e.target.result;
                    
                    previewImage.style.display = 'block';
                };

                var  r= reader.readAsDataURL(selectedFile);
                
            }
        });
    </script>
</body>
</html>
