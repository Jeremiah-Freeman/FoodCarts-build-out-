<?php
    date_default_timezone_set('America/Los_angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cart.php";
    require_once __DIR__."/../src/Cuisine.php";

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
        return $app['twig']->render('index.html.twig' , array('cuisines' => Cuisine::getAll()));
    });

    $app->get('/carts', function() use ($app) {
        return $app['twig']->render('carts.html.twig' , array('carts' => Cart::getAll()));
    });

    $app->post('/carts' ,function() use ($app) {
        $cart = new Cart($_POST['name'], null, $_POST['cuisine_id'], $_POST['street'], $_POST['city'], $_POST['state'], intval($_POST['zip']), $_POST['phone'], $_POST['url']);
        $cart->save();
        return $app['twig']->render('carts.html.twig' , array('carts' => Cart::getAll()));
    });

    $app->get('/cuisines' , function() use ($app) {
        return $app['twig']->render('cuisines.html.twig' , array('cuisines' => Cart::getAll()));
    });

    $app->post("/cuisines", function() use ($app) {
        $cuisine = new Cuisine($_POST['name']);
        $cuisine->save();
        return $app['twig']->render('cuisines.html.twig', array('cuisines' => Cuisine::getAll()));
    });

    $app->post("/delete_cuisines", function() use ($app) {
        Cuisine::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    $app->post("/delete_carts", function() use ($app) {
        Cart::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    $app->get("/cuisines/{id}", function($id) use ($app) {
        $cuisine = Cuisine::find($id);
        return $app['twig']->render('cuisine.html.twig', array('cuisine' => $cuisine, 'carts' => $cuisine->getCarts()));
    });

    $app->get("/cuisines/{id}/edit", function($id) use ($app) {
        $cuisine = Cuisine::find($id);
        return $app['twig']->render('cuisine_edit.html.twig', array('cuisine' => $cuisine));
    });

    $app->patch("/cuisines/{id}", function($id) use ($app) {
        $name = $_POST['name'];
        $cuisine = Cuisine::find($id);
        $cuisine->update($name);
        return $app['twig']->render('cuisine.html.twig', array('cuisine' => $cuisine, 'carts' => $cuisine->getCarts()));
    });

    return $app;
?>
