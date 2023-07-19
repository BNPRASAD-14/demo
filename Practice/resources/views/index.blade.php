<html>
  <head>
    <title>reCAPTCHA demo: Running both v2 and v3</title>
    <script src="https://www.google.com/recaptcha/api.js?render=6LevYjInAAAAADPgIJgpE6X_3J4jQQoLcv7aM_Z-"></script>
    <script>
      grecaptcha.ready(() => {
        grecaptcha.render('html_element', {
           'sitekey' : '6LevYjInAAAAADPgIJgpE6X_3J4jQQoLcv7aM_Z-'
        });
      });
    </script>
    <script>
    //   function onSubmit() {
    //     grecaptcha.ready(() => {
    //         grecaptcha.execute('v3_site_key', {action: 'homepage'}).then((token) => {
    //            ...
    //         });
    //     });
    //   }
    </script>
  </head>
  <body>
    <h1>Hi everyone </h1>
  </body>
</html>
    