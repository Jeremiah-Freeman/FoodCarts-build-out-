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

    $app->post('/local_food_types' , function() use ($app) {
        return $app['twig']->render('local_food_types.html.twig');
    });

    $app->post('/login' , function() use ($app) {
        return $app['twig']->render('owner_portal.html.twig');
    });

    $app->get('/create_account' , function() use ($app) {
        return $app['twig']->render('create_account.html.twig');
    });

    $app->get('/cart_portal' , function() use ($app) {
        return $app['twig']->render('cart_portal.html.twig');
    });

    $app->post('/local_food_carts' , function() use ($app) {
        return $app['twig']->render('local_food_carts.html.twig');
    });

    $app->get('/cart_profile' , function() use ($app) {
        return $app['twig']->render('cart_profile.html.twig');
    });



    return $app;
?>
