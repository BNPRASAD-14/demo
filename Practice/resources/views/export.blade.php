<html>

<head>
    <title>reCAPTCHA demo: Running both v2 and v3</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://www.recaptcha.net/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>


<body>
    <h1>Hi everyone </h1>
    <button class="btn btn-primary dmn" onclick="exportdata();" type="submit">Export</button>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function exportdata() {
           $.ajax({
            url:'/api/exportdata',
            method:"GET",
            timeout:0,
            success: function (data){
                if(data["status"]=='success')
                {
                    alert("success");
                }
                
            },
            error: function(data)
            {
                alert("something wrong");
            }
           });
    }
</script>

</html>