<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Task.php';

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(),
        array('twig.path' => __DIR__.'/../views'));

    session_start();

    if (empty($_SESSION['list_of_tasks'])) {
        $_SESSION['list_of_tasks'] = array();
    }

    //prompt user for task
    $app->get("/", function() use ($app) {
        return $app['twig']->render('tasks.php',
            array('tasks' => Task::getAll()));
    });

    //create & display task
    $app->post("/tasks", function() {
        $task = new Task($_POST['description']);
        $task->save();
        return "
                <h1>Nice job, You created a task!</h1>
                <p>" . $task->getDescription() . "</p>
                <p><a href='/'>View your list of things to do.</a></p>
                ";
    });

    //delete
    $app->post("/delete_tasks", function() {
        Task::deleteAll();

        return "<h1>List cleared!</h1>
        <p><a href='/'>Home</a></p>";
    });

    return $app;
?>
