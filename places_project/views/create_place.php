<html>
    <head>
        <title>Create Place</title>
    </head>
    <body>
        <p>Thing here!</p>
        {% if newplace is not empty %}
        {% for place in newplace %}
          <p>{{ place.getCity }}</p>
          <p>{{ place.getTripDuration }}</p>
          <p>{{ place.getImagePath }}</p>
          {% endfor %}
          {% endif %}
          <p><a href='/'>Back home!</a></p>
    </body>
</html>
