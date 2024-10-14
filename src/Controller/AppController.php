<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;

class AppController extends Controller
{
    protected $varForSerialize      = [];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller'    => 'Dashboard',
                'action'        => 'index'
            ],
            'logoutRedirect' => [
                'controller'    => 'Users',
                'action'        => 'login',
            ],
            'unauthorizedRedirect' => [
                [
                    'prefix'        => false,
                    'controller'    => 'Users',
                    'action'        => 'login',
                ]
            ],
            'authError' => __('É necessario se logar.'),
            'flash' => [
                'element' => 'auth_error'
            ]
        ]);

        $this->loadComponent('Security');
        //$this->loadComponent('Csrf');


    }

    public function beforeFilter(Event $event){
       $this->Security->config('blackHoleCallback', 'blackhole');
    }

    public function beforeRender(Event $event){

        if (!isset($this->viewVars['_notSerialize'])) {
            if (($this->request->is('ajax')) || (in_array($this->response->type(), ['application/json', 'application/xml']))) {
                if (sizeof($this->varForSerialize) <= 0) {
                    if (isset($this->_notSerialize) && is_array($this->_notSerialize)) {
                        $this->set('_serialize', array_diff(array_keys($this->viewVars), $this->_notSerialize));
                    } else {
                        $this->set('_serialize', array_keys($this->viewVars));
                    }
                } else {
                    $this->set('_serialize', $this->varForSerialize);
                }
            }
        }

        //$session = $this->getRequest()->getSession();
        //$name = $session->read('User.name');

        $this->request->session()->write('bg_color', "blue");

        if(!$this->request->session()->read('Auth.User.id')){
            $this->viewBuilder()->setLayout('login');
        }else{
            $this->viewBuilder()->setLayout('default');
        }

    }

    public function blackhole($type, \Cake\Controller\Exception\SecurityException $exception) {
        throw $exception;
        if ($exception->getMessage() === 'Request is not SSL and the action is required to be secure') {
            // Reword the exception message with a translatable string.
            $exception->setMessage(__('Please access the requested page through HTTPS'));
        }

        // Re-throw the conditionally reworded exception.
        $this->Flash->error(__('Houve uma tentativa de burlar o preenchimento de algum campo. Processo cancelado'));
        return $this->redirect('/');
        // Alternatively, handle the error, e.g. set a flash message &
        // redirect to HTTPS version of the requested page.
    }

    public function aevOptions() {

        $aevOptions = [
            'status_fichas_save' => [
                0 => "SEM CONFERÊNCIA",
                1 => "CONFERIDAS",
                2 => "AGUARDANDO RETORNO",
                3 => "SEM FICHAS",
                4 => "JUNTO COM OUTRA LOCALIDADE",
            ],
            'status_envelopes_save' => [
                0 => "SEM CONFERÊNCIA",
                1 => "CONFERIDOS",
                2 => "AGUARDANDO RETORNO",
                3 => "SEM ENVELOPES",
                4 => "PENDÊNCIA DIÁCONO",
                5 => "PENDÊNCIA ENVELOPE",
            ],
            'status_fichas' => [
                0 => "FICHAS: SEM CONFERÊNCIA",
                1 => "FICHAS: CONFERIDAS",
                2 => "FICHAS: AGUARDANDO RETORNO",
                3 => "FICHAS: SEM FICHAS",
                4 => "FICHAS: JUNTO COM OUTRA LOCALIDADE",
            ],
            'status_envelopes' => [
                0 => "ENVELOPES: CONFERIDOS",
                1 => "ENVELOPES: SEM CONFERÊNCIA",
                2 => "ENVELOPES: AGUARDANDO RETORNO",
                3 => "ENVELOPES: SEM ENVELOPES",
                4 => "ENVELOPES: PENDÊNCIA DIÁCONO",
                5 => "ENVELOPES: PENDÊNCIA ENVELOPE",
            ],
            'status_css_ficha' => [
                0 => "bg-danger text-white",
                1 => "bg-success text-white",
                2 => "bg-warning text-white",
                3 => "bg-success text-white",
                4 => "bg-success text-white",
            ],
            'status_css_envelope' => [
                0 => "bg-danger text-white",
                1 => "bg-success text-white",
                2 => "bg-warning text-white",
                3 => "bg-success text-white",
                4 => "bg-warning text-white",
                5 => "bg-warning text-white",
            ],
            'status_css_ficha_atendimento' => [
                0 => "text-danger",
                1 => "text-success",
                2 => "text-warning",
                3 => "text-success",
                4 => "text-success",
            ],
            'status_css_envelope_atendimento' => [
                0 => "text-danger",
                1 => "text-success",
                2 => "text-warning",
                3 => "text-success",
                4 => "text-warning",
                5 => "text-warning",
            ],
        ];

        $this->set('aevOptions', $aevOptions);

        return $aevOptions;
    }

}
