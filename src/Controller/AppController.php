<?php
namespace App\Controller;

use Cake\Controller\Controller;



class AppController extends Controller
{
    public function initialize()
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'identity',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],'loginRedirect' => [
            'controller' => 'Materials',
            'action' => 'index'
        ],
        'logoutRedirect' => [
            'controller' => 'Users',
            'action' => 'login'],

        ]);

        // Allow the display action so our pages controller
        // continues to work.
        $this->Auth->allow(['display']);

    }
}
