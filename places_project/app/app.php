<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Place.php';


    session_start();

    if (empty($_SESSION['place_entries'])) {
        $_SESSION['place_entries'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(),
        array('twig.path' => __DIR__.'/../views'
    ));


    // "/" route
    $app->get("/", function() use ($app) {

        return $app['twig']->render('home_page.php',
            array('places' => Place::getAll()));
    });

    //new place created
    $app->post('/create_place', function() use ($app) {
        $place = new Place($_POST['city'], $_POST['stay'], $_POST['image']);
        $place->save();

        return $app['twig']->render('create_place.php', array('newplace' => $place));
    });

    //delete list
    $app->post('/delete_entries', function() use ($app) {
        Place::deleteAll();

        return $app['twig']->render('delete_places.php');
    });


    return $app;
?>
