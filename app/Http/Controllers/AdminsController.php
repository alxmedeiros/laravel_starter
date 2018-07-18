<?php
namespace Site\Http\Controllers;

use Illuminate\Http\Request;
use Site\Entities\User;
use Site\Services\UserService;

class AdminsController extends CrudController {

	public function __construct(UserService $service) {

		parent::__construct();
		
		$this->service = $service;

		$this->pageDefaults = [
			'class' => User::class,
			'list' => [
				'title' => 'Administradores',
				'action' => 'admin.admins.page-action',
				'view' => 'admin.admins.list',
				'policy' => 'view_user'
			],
			'create' => [
				'title' => 'Novo administrador',
				'view' => 'admin.admins.form',
				'route' => 'administradores.create',
				'policy' => 'create_user'
			],
			'save' => [
				'message' => 'Administrador criado com sucesso',
				'route' => 'administradores.index',
				'policy' => 'create_user'
			],
			'edit' => [
				'title' => 'Editar administrador',
				'view' => 'admin.admins.form',
				'policy' => 'update_user'
			],
			'update' => [
				'message' => 'Administrador editado com sucesso',
				'policy' => 'update_user',
				'route' => 'administradores.index'
			],
			'destroy' => [
				'message' => 'Administrador removido com sucesso',
				'route' => 'administradores.index',
				'policy' => 'delete_user'
			]
		];
	}

    public function beforeStore(Request $request) {

    	$req = $request->all();

    	return [
            'name' => $req['name'],
            'email' => $req['email'],
            'profile' => $req['profile'],
            'password' => bcrypt($req['password'])
        ];

    }

    public function beforeUpdate(Request $request, $id) {

        $req = $request->all();

        $data = [
            'name' => $req['name'],
            'email' => $req['email'],
            'profile' => $req['profile'],
        ];

        if ( $req['password'] ) {
            $data['password'] = bcrypt($req['password']);
        }

        return $data;

    }

}