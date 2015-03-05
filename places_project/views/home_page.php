<html>
    <head>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
        <link rel='stylesheet' href='../css/styles.css'>
        <title>Home Page</title>
    </head>
    <body>
        <div class='container'>
            <div class='jumbotron'>
                <h1>Your Obnoxiously Yellow Vacation Journal!</h1>
            </div>
            <div class='col-md-6'>
                <h1>Tell us where you've been!</h1>
                <form action='/create_place' method='post'>
                    <div class='form-group'>
                        <label for='city'>Which city?</label>
                        <input id='city' name='city' class='form-control' type='text'>
                    </div>
                    <div class='form-group'>
                        <label for='stay'>How long did you stay?</label>
                        <input id='stay' name='stay' class='form-control' type='text'>
                    </div>
                    <div class='form-group'>
                        <label for='image'>Please paste image link!</label>
                        <input id='image' name='image' class='form-control' type='text'>
                    </div>
                    <button type='submit'>Gimme</button>
                </form>
            </div>
            <div class='col-md-6'>
            {% if places is not empty %}

            <h2>Places you have been!</h2>

                {% for place in places %}
                <div class='col-md-6'>
                    <p>{{ place.getCity }}</p>
                    <p>{{ place.getTripDuration }}</p>
                    <p><img src='{{ place.getImagePath }}'></p>
                </div>
                {% endfor %}
            <form action='/delete_entries' method='post'>
                <button type='submit'>Delete all places</button>
            </form>
            {% endif %}
        </div>
    </body>
</html>
