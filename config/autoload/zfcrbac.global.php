<?php
return [
		'zfc_rbac' => [
				// 'identity_provider' => 'ZfcRbac\Identity\AuthenticationIdentityProvider',
				'guest_role' => 'guest',
				'guards' => [
						'ZfcRbac\Guard\RouteGuard' => [
								'home' => ['user'],
								'user/*' => ['admin'],
						],
						'ZfcRbac\Guard\ControllerGuard' => [
								[
										'controller' => 'User\Controller\User',
										'roles'      => ['admin']
								],
						]
				],

				// 'protection_policy' => \ZfcRbac\Guard\GuardInterface::POLICY_ALLOW,
				'role_provider' => [
						'ZfcRbac\Role\InMemoryRoleProvider' => [
								'admin' => [
										'children'    => ['user'],
										'permissions' => ['admin','deleteOthers','authorize']
								],
								'usuario' => [
										'children'    => ['guest'],
										'permissions' => ['user','delete']
								],
								'guest'
						]
				],

				'unauthorized_strategy' => [
						'template' => 'error/403'
				],

				'redirect_strategy' => [
						'redirect_when_connected' => true,
						'redirect_to_route_connected' => 'error/403',
						'redirect_to_route_disconnected' => 'zfcuser/login',
						'append_previous_uri' => false,
						'previous_uri_query_key' => 'redirect'
				],
				// 'guard_manager'               => [],
				// 'role_provider_manager'       => []
		]
];