<html>
    <head>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <link rel='stylesheet' href='../css/styles.css'>
        <title>Create Place</title>
    </head>
    <body>
        <div class='container'>
            <h2>Awesome Trip!</h2>
            <div>
              <p>{{ newplace.getCity }}</p>
              <p>{{ newplace.getTripDuration }}</p>
              <p><img src='{{ newplace.getImagePath }}'></p>
              <p><a href='/'>Back home!</a></p>
            </div>
        </div>
    </body>
</html>
