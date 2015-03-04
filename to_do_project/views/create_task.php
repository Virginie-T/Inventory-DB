<html>
    <head>
        <title>To do list</title>
    </head>
    <body>
        <h1>You created a task!</h1>
        {% if tasks is not empty %}
            <p>{{ tasks.getDescription }}</p>
        {% endif %}
        <a href="/">Return Home</a>
    </body>
</html>
