<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Category;
use App\File;
use App\Permission;
use App\Roles_permission;
use App\Hierarchy;
use App\Teacher_category;
use App\Academic_type;
use App\Academic;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
    	$faker = Faker\Factory::create();
        $roles = [
			['role_name' =>'Administrador'],
            ['role_name' =>'Director de escuela'],
            ['role_name' =>'Academico'],
		];
      	foreach ($roles as $role) {
			Role::create($role);
        }
        $usuario =[
			[
				'role_id' => 1,
				'name'  => 'administrador',
				'email'  => 'administrador@mail.es',
				'password' => '$2y$10$6sMwLeM6t83G018kv.ftLOGI4pEso8HlAbRSj1WzTF1kcP8xTZkOm',
				'avatar_image_path' => 'images/avatars/avatar.png',
				'status' =>1,
            ],
            [
				'role_id' => 3,
				'name'  => 'Ricardo Cardenas',
				'email'  => 'ricardo.cardenas@gmail.com',
				'password' => '123456789',
				'avatar_image_path' => 'images/avatars/avatar.png',
				'status' =>1,
            ],
            [
				'role_id' => 3,
				'name'  => 'Pedrito Gonzalez',
				'email'  => 'pedrito.gonzalez@gmail.com',
				'password' => '123456789',
				'avatar_image_path' => 'images/avatars/avatar.png',
				'status' =>1,
        	],
		];
      	foreach ($usuario as $usuario) {
			User::create($usuario);
        }
        $category =[
			[
				'category_name'  => 'historia de la unidad',
				'category_level'  => 1,
				'state' => 1,
			],
					[
				'category_name'  => 'reglamentos',
				'category_level'  => 1,
				'state' => 1,
			],
			[
				'category_name'  => 'planes de estudio',
				'category_level'  => 1,
				'state' => 1,
				],
				[
				'category_name'  => 'correspondencia',
					'category_level'  => 1,
					'state' => 1,
				],
				[
				'category_name'  => 'enviada',
				'category_level'  => 2,
				'superior_category_id' => 4,
				'state' => 1,
			],
			[
				'category_name'  => 'recibida',
				'category_level'  => 2,
				'superior_category_id' => 4,
				'state' => 1,
			],
			[
				'category_name'  => 'presupuesto anual',
				'category_level'  => 1,
				'state' => 1,
			],
			[
				'category_name'  => 'contratos',
				'category_level'  => 1,
				'state' => 1
			],
			[
			'category_name'  => 'convenios docentes',
				'category_level'  => 1,
				'state' => 1,
			],
		];
      	foreach ($category as $category) {
           Category::create($category);
        }
        $permission =[
			['name'  => 'administrar', 'type' => 1],
			['name'  => 'administrar_Roles','type' => 1],
			['name'  => 'administrar_Usuario','type' => 1],
			['name'  => 'administrar_historia_de_la_unidad','type' => 2],
			['name'  => 'ver_historia_de_la_unidad','type' => 2],
			['name'  => 'administrar_reglamentos','type' => 2],
			['name'  => 'ver_reglamentos','type' => 2],
			['name'  => 'administrar_planes_de_estudio','type' => 2],
			['name'  => 'ver_planes_de_estudio','type' => 2],
			['name'  => 'administrar_correspondencia','type' => 2],
			['name'  => 'ver_correspondencia','type' => 2],
			['name'  => 'administrar_enviada','type' => 2],
			['name'  => 'ver_enviada','type' => 2],
			['name'  => 'administrar_recibida','type' => 2],
			['name'  => 'ver_recibida','type' => 2],
			['name'  => 'administrar_presupuesto_anual','type' => 2],
			['name'  => 'ver_presupuesto_anual','type' => 2],
			['name'  => 'administrar_contratos','type' => 2],
			['name'  => 'ver_contratos','type' => 2],
			['name'  => 'administrar_convenios_docentes','type' => 2],
			['name'  => 'ver_convenios_docentes','type' => 2],
		];
      	foreach ($permission as $permission) {
			Permission::create($permission);
		}
        $permissionrole =[
			[
				'role_id'=> 1,
				'permission_id'=> 1
			],
			[
				'role_id'=> 1,
				'permission_id'=> 2,
			],
			[
				'role_id'=> 1,
				'permission_id'=> 3,
			],
      	];
		foreach ($permissionrole as $permissionrole) {
			Roles_permission::create($permissionrole);
		}

		$hierarchies = [
			[
				'name'=>'Titular'
			],
			[
				'name'=>'Asociado'
			],
			[
				'name'=>'Asistente'
			],
			[
				'name'=>'Instructor'
			],
			[
				'name'=>'Ayudante'
			]
		];

		foreach($hierarchies as $hierarchy){
			Hierarchy::create($hierarchy);
		}

		$teacher_categories = [
			[
				'name'=>'Ayudante de profesor',
			],
			[
				'name'=>'Profesor adjunto categoría I',
			],
			[
				'name'=>'Profesor adjunto categoría II',
			],
			[
				'name'=>'Profesor instructor categoría I',
			],
			[
				'name'=>'Profesor instructor categoría II',
			]
		];

		foreach($teacher_categories as $teacher_category){
			Teacher_category::create($teacher_category);
		}

		$academic_types = [
			[
				'name'=>'Regular'
			],
			[
				'name'=>'Por horas'
			],
			[
				'name'=>'Honorarios'
			],
		];
		foreach($academic_types as $academic_type){
			Academic_type::create($academic_type);
        }
        $academics = [
			[
                'name'=>'Ricardo Cardenas',
                'user_id'=>'2'
            ],
            [
                'name'=>'Pedrito Gonzalez',
                'user_id'=>'3'
			],

		];
		foreach($academics as $academic){
			Academic::create($academic);
		}

    }
}
