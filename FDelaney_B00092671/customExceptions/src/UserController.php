<?php
/**
 * Created by PhpStorm.
 * User: matt smith
 * Date: 27/06/2016
 * Time: 13:44
 */

namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserController
 *
 * @package Itb
 */
class UserController
{
    /**
     * action to show login form
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function loginAction(Request $request, Application $app)
    {
        $args = [];
        $template = 'login';
        return $app['twig']->render($template . '.html.twig', $args);
    }

    /**
     * action to process values entered in login form
     *
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function loginCheckAction(Request $request, Application $app)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $userRole = 'admin';

        $app['session']->set('user', [
                'username' => $username,
                'userRole' => 'admin'
            ]
        );

        $args = [
            'username' => $username,
            'userRole' => $userRole,
        ];
        $template = 'loginSuccess';
        return $app['twig']->render($template . '.html.twig', $args);
    }

}