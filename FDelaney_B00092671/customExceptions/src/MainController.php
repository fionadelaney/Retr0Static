<?php
/**
 * any old comment
 */

namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

use Itb\Exception\InvalidIdException;
use Itb\Exception\NoRecordRetrievedForThatIdException;

/**
 * Class MainController- basic public route actions
 *
 * @package Itb
 */
class MainController
{
    /**
     * action for route: \
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function indexAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $username = $user['username'];
        $userRole = $user['userRole'];

        $args = [
            'username' => $username,
            'userRole' => $userRole,
        ];
        $template = 'index';
        return $app['twig']->render($template . '.html.twig', $args);
    }

    /**
     * action for route: \about
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function aboutAction(Request $request, Application $app)
    {
        $args = [];
        $template = 'about';
        return $app['twig']->render($template . '.html.twig', $args);
    }

    /**
     * action for route: \show\{id}
     *
     * @todo unit test valid and invalid IDs for show route
     *
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function showAction(Request $request, Application $app, $id)
    {
        try{
            $product = $this->atemptToRetrieveProduct($id);
        } catch (InvalidIdException $e) {
            $args = [
                'message' => 'Id provided was not an integer: id = ' . $id
            ];
            $template = 'error';
            return $app['twig']->render($template . '.html.twig', $args);

        } catch (NoRecordRetrievedForThatIdException $e){
            $args = [
                'message' => 'No product record could be found for id = ' . $id
            ];
            $template = 'error';
            return $app['twig']->render($template . '.html.twig', $args);
        }
        //
        // if we get here then ID fine and corresponding record retrieveed
        //
        $user = $app['session']->get('user');
        $username = $user['username'];
        $userRole = $user['userRole'];

        $args = [
            'product' => $product,
            'username' => $username,
            'userRole' => $userRole,
        ];
        $template = 'show';
        return $app['twig']->render($template . '.html.twig', $args);
    }

    /**
     * action for route: \errorBadId\{id}
     *
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function badIdAction(Request $request, Application $app, $id)
    {
        $args = [
            'id' => $id
        ];
        $template = 'badId';
        return $app['twig']->render($template . '.html.twig', $args);
    }

    /**
     * action for route: \list
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function listAction(Request $request, Application $app)
    {
        $products = Product::getAll();

        $args = [
            'products' => $products
        ];
        $template = 'list';
        return $app['twig']->render($template . '.html.twig', $args);
    }

    /**
     * action for route: \errorNotInteger\{id}
     *
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function badIDNotIntegerAction(Request $request, Application $app, $id)
    {
        $args = [
            'id' => $id
        ];
        $template = 'badIdNotInteger';
        return $app['twig']->render($template . '.html.twig', $args);
    }


    public function atemptToRetrieveProduct($id)
    {
        // test 1 - is it an integer

        if(! is_numeric($id)){
            throw new InvalidIdException();
        }

        // test 2 - can we find record for this ID

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $product = Product::getOneById($id);

        if(null == $product) {
            throw new NoRecordRetrievedForThatIdException();
        }

        return $product;
    }
}