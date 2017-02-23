<?php
    date_default_timezone_set('America/Los_angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cart.php";
    require_once __DIR__."/../src/Cuisine.php";
    require_once __DIR__."/../src/City.php";
    require_once __DIR__."/../src/State.php";
    require_once __DIR__."/../src/Address.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=cart_app';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get('/' , function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->post('/local_food_carts' , function() use ($app) {
        return $app['twig']->render('local_food_carts.html.twig');
    });

    $app->post('/login' , function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });



    return $app;
?>
