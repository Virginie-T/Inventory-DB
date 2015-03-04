<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
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
        <form action='/delete_entries' method='post'>
            <button type='submit'>Delete all places</button>
        </form>

        {% if places is not empty %}
        <h2>Places I have been!</h2>
            {% for place in places %}
                <p>{{ place.getCity }}</p>
                <p>{{ place.getTripDuration }}</p>
                <p>{{ place.getImagePath }}</p>
            {% endfor %}
        {% endif %}
    </body>
</html>
