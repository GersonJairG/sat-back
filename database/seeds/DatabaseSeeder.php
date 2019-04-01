<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(SemesterTableSeeder::class);
        $this->call(TurnStateTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(UserStateTableSeeder::class);
        $this->call(DependenceTableSeeder::class);
        $this->call(TimeBlockTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(ServiceTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
        

    }
}

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        //seeds of roles
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'super-admin',
            'description' => 'Rol que tendrá todos los privilegios del sistema',
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'admin',
            'description' => 'Rol que tendrá privilegios en la dependecia que administre',
        ]);

        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'user',
            'description' => 'Rol que podrá apartar turnos en el sistema y dar calificaciones',
        ]);

    }
}

class TurnStateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turn_states')->delete();

         //seeds of turn_states
         DB::table('turn_states')->insert([
            'name' => 'Pendiente',
            'description' => 'Nos indica que el turno esta en la espera de ser atendido',
        ]);

        DB::table('turn_states')->insert([
            'name' => 'En proceso',
            'description' => 'Nos indica que el usuario esta siendo atendido en este momento',
        ]);

        DB::table('turn_states')->insert([
            'name' => 'Atendido',
            'description' => 'Nos indica que el turno ya ha terminado',
        ]);

        DB::table('turn_states')->insert([
            'name' => 'Cancelado',
            'description' => 'Nos indica que el turno ha sido cancelado',
        ]);
    }
}

//Semillas de la tabla semesters

class SemesterTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('semesters')->delete();

        $semesters =
        [
            ['id' => 1 , 'name' => 'Primero' , 'start_date' => '2017-02-01', 'end_date' => '2017-06-20'],
            ['id' => 2 , 'name' => 'Segundo' , 'start_date' => '2017-08-10' , 'end_date' => '2017-12-18']
        ];

        foreach ($semesters as $semester) {
            DB::table('semesters')->insert($semester);
        }

    }
}

//Semillas de la tabla modules

class ModuleTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('modules')->delete();

        $modules =
        [
            ['id' => 1 , 'name' => 'Dependencias' , 'description' => ''],
            ['id' => 2 , 'name' => 'Servicios' , 'description' => ''],
            ['id' => 3 , 'name' => 'Reportes' , 'description' => ''],
            ['id' => 4 , 'name' => 'Usuarios' , 'description' => ''],
            ['id' => 5 , 'name' => 'Roles y permisos' , 'description' => ''],
            ['id' => 6 , 'name' => 'Turnos' , 'description' => ''],
            ['id' => 7 , 'name' => 'Configuracion' , 'description' => '']
        ];

        foreach ($modules as $module) {
            DB::table('modules')->insert($module);
        }

    }
}


//Semillas de la tabla permissions
class PermissionTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('permissions')->delete();

        $permissions =
        [
            ['id' => 1 , 'name' => 'Acceso al modulo de dependencias' , 'description' => '' , 'id_module' => 1 ],
            ['id' => 2 , 'name' => 'Registrar dependencia' , 'description' => '' , 'id_module' => 1 ],
            ['id' => 3 , 'name' => 'Actualizar dependencia' , 'description' => '' , 'id_module' => 1 ],
            ['id' => 4 , 'name' => 'Consultar dependencia' , 'description' => '' , 'id_module' => 1 ],
            ['id' => 5 , 'name' => 'Eliminar dependencia' , 'description' => '' , 'id_module' => 1 ],
            ['id' => 6 , 'name' => 'Acceso al modulo de servicio' , 'description' => '' , 'id_module' => 2 ],
            ['id' => 7 , 'name' => 'Registrar servicio' , 'description' => '' , 'id_module' => 2 ],
            ['id' => 8 , 'name' => 'Actualizar servicio' , 'description' => '' , 'id_module' => 2 ],
            ['id' => 9 , 'name' => 'Consultar servicio' , 'description' => '' , 'id_module' => 2 ],
            ['id' => 10 , 'name' => 'Eliminar servicio' , 'description' => '' , 'id_module' => 2 ],
            ['id' => 11 , 'name' => 'Añadir tipo de servicio' , 'description' => '' , 'id_module' => 2 ],
            ['id' => 12 , 'name' => 'Editar tipo de servicio' , 'description' => '' , 'id_module' => 2 ],
            ['id' => 13 , 'name' => 'Consultar tipo de servicio' , 'description' => '' , 'id_module' => 2 ],
            ['id' => 14 , 'name' => 'Eliminar tipo de servicio' , 'description' => '' , 'id_module' => 2 ],
            ['id' => 15 , 'name' => 'Consultar feedback' , 'description' => '' , 'id_module' => 3 ],
            ['id' => 16 , 'name' => 'Consultar analitica de los tipos de servicios' , 'description' => '' , 'id_module' => 3 ],
            ['id' => 17 , 'name' => 'Consultar analitica de los servicios' , 'description' => '' , 'id_module' => 3 ],
            ['id' => 18 , 'name' => 'Consultar analitica de las dependencias' , 'description' => '' , 'id_module' => 3 ],
            ['id' => 19 , 'name' => 'Registrar usuarios' , 'description' => '' , 'id_module' => 4 ],
            ['id' => 20 , 'name' => 'Actualizar perfil' , 'description' => '' , 'id_module' => 4 ],
            ['id' => 21 , 'name' => 'Actualizar usuarios' , 'description' => '' , 'id_module' => 4 ],
            ['id' => 22 , 'name' => 'Listar usuarios' , 'description' => '' , 'id_module' => 4 ],
            ['id' => 23 , 'name' => 'Eliminar usuarios' , 'description' => '' , 'id_module' => 4 ],
            ['id' => 24 , 'name' => 'Activar usuarios' , 'description' => '' , 'id_module' => 4 ],
            ['id' => 25 , 'name' => 'Desactivar usuarios' , 'description' => '' , 'id_module' => 4 ],
            ['id' => 26 , 'name' => 'Asignar permisos a un rol' , 'description' => '' , 'id_module' => 5 ],
            ['id' => 27 , 'name' => 'Editar permisos de un rol' , 'description' => '' , 'id_module' => 5 ],
            ['id' => 28 , 'name' => 'Eliminar permisos a un rol' , 'description' => '' , 'id_module' => 5 ],
            ['id' => 29 , 'name' => 'Registrar turno' , 'description' => '' , 'id_module' => 6 ],
            ['id' => 30 , 'name' => 'Cancelar turno' , 'description' => '' , 'id_module' => 6 ],
            ['id' => 31 , 'name' => 'Editar turno' , 'description' => '' , 'id_module' => 6 ],
            ['id' => 32 , 'name' => 'Atender turno' , 'description' => '' , 'id_module' => 6 ],
            ['id' => 33 , 'name' => 'Consultar turno' , 'description' => '' , 'id_module' => 6 ],
            ['id' => 34 , 'name' => 'Eliminar turno' , 'description' => '' , 'id_module' => 6 ],
            ['id' => 35 , 'name' => 'Registrar semestre' , 'description' => '' , 'id_module' => 7 ],
            ['id' => 36 , 'name' => 'Editar semestre' , 'description' => '' , 'id_module' => 7 ],
            ['id' => 37 , 'name' => 'Consultar semestre' , 'description' => '' , 'id_module' => 7 ],
            ['id' => 38 , 'name' => 'Eliminar semestre' , 'description' => '' , 'id_module' => 7 ],
            ['id' => 39 , 'name' => 'Acceso a modulo de turnos' , 'description' => '' , 'id_module' => 6 ],
            ['id' => 40 , 'name' => 'Registrar tipos de colas' , 'description' => '' , 'id_module' => 6 ]
        ];

        foreach($permissions as $permission){
            DB::table('permissions')->insert($permission);
        }

    }
}


//Semillas de la tabla role_permissions
class RolePermissionTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('role_permissions')->delete();

        $rolePermissions =
        [
            ['id' => 1 , 'id_role' => 1 , 'id_permission' => 1 , 'type' => 'ALL'],//parte de super-admin
            ['id' => 2 , 'id_role' => 1 , 'id_permission' => 2 , 'type' => 'ALL'],
            ['id' => 3 , 'id_role' => 1 , 'id_permission' => 3 , 'type' => 'ALL'],
            ['id' => 4 , 'id_role' => 1 , 'id_permission' => 4 , 'type' => 'ALL'],
            ['id' => 5 , 'id_role' => 1 , 'id_permission' => 5 , 'type' => 'ALL'],
            ['id' => 6 , 'id_role' => 1 , 'id_permission' => 6 , 'type' => 'ALL'],
            ['id' => 7 , 'id_role' => 1 , 'id_permission' => 7 , 'type' => 'ALL'],
            ['id' => 8 , 'id_role' => 1 , 'id_permission' => 8 , 'type' => 'ALL'],
            ['id' => 9 , 'id_role' => 1 , 'id_permission' => 9 , 'type' => 'ALL'],
            ['id' => 10 , 'id_role' => 1 , 'id_permission' => 10 , 'type' => 'ALL'],
            ['id' => 11 , 'id_role' => 1 , 'id_permission' => 11 , 'type' => 'ALL'],
            ['id' => 12 , 'id_role' => 1 , 'id_permission' => 12 , 'type' => 'ALL'],
            ['id' => 13 , 'id_role' => 1 , 'id_permission' => 13 , 'type' => 'ALL'],
            ['id' => 14 , 'id_role' => 1 , 'id_permission' => 14 , 'type' => 'ALL'],
            ['id' => 15 , 'id_role' => 1 , 'id_permission' => 15 , 'type' => 'ALL'],
            ['id' => 16 , 'id_role' => 1 , 'id_permission' => 16 , 'type' => 'ALL'],
            ['id' => 17 , 'id_role' => 1 , 'id_permission' => 17 , 'type' => 'ALL'],
            ['id' => 18 , 'id_role' => 1 , 'id_permission' => 18 , 'type' => 'ALL'],
            ['id' => 19 , 'id_role' => 1 , 'id_permission' => 19 , 'type' => 'ALL'],
            ['id' => 20 , 'id_role' => 1 , 'id_permission' => 20 , 'type' => 'ALL'],
            ['id' => 21 , 'id_role' => 1 , 'id_permission' => 21 , 'type' => 'ALL'],
            ['id' => 22 , 'id_role' => 1 , 'id_permission' => 22 , 'type' => 'ALL'],
            ['id' => 23 , 'id_role' => 1 , 'id_permission' => 23 , 'type' => 'ALL'],
            ['id' => 24 , 'id_role' => 1 , 'id_permission' => 24 , 'type' => 'ALL'],
            ['id' => 25 , 'id_role' => 1 , 'id_permission' => 25 , 'type' => 'ALL'],
            ['id' => 26 , 'id_role' => 1 , 'id_permission' => 26 , 'type' => 'ALL'],
            ['id' => 27 , 'id_role' => 1 , 'id_permission' => 27 , 'type' => 'ALL'],
            ['id' => 28 , 'id_role' => 1 , 'id_permission' => 28 , 'type' => 'ALL'],
            ['id' => 29 , 'id_role' => 1 , 'id_permission' => 29 , 'type' => 'ALL'],
            ['id' => 30 , 'id_role' => 1 , 'id_permission' => 30 , 'type' => 'ALL'],
            ['id' => 31 , 'id_role' => 1 , 'id_permission' => 31 , 'type' => 'ALL'],
            ['id' => 32 , 'id_role' => 1 , 'id_permission' => 32 , 'type' => 'ALL'],
            ['id' => 33 , 'id_role' => 1 , 'id_permission' => 33 , 'type' => 'ALL'],
            ['id' => 34 , 'id_role' => 1 , 'id_permission' => 34 , 'type' => 'ALL'],
            ['id' => 35 , 'id_role' => 1 , 'id_permission' => 35 , 'type' => 'ALL'],
            ['id' => 36 , 'id_role' => 1 , 'id_permission' => 36 , 'type' => 'ALL'],
            ['id' => 37 , 'id_role' => 1 , 'id_permission' => 37 , 'type' => 'ALL'],
            ['id' => 38 , 'id_role' => 1 , 'id_permission' => 38 , 'type' => 'ALL'],
            ['id' => 66 , 'id_role' => 1 , 'id_permission' => 39 , 'type' => 'ALL'],
            ['id' => 68 , 'id_role' => 1 , 'id_permission' => 40 , 'type' => 'ALL'],

            ['id' => 39 , 'id_role' => 2 , 'id_permission' => 1 , 'type' => 'OWNER'],//parte de admin
            ['id' => 40 , 'id_role' => 2 , 'id_permission' => 3 , 'type' => 'OWNER'],
            ['id' => 41 , 'id_role' => 2 , 'id_permission' => 6 , 'type' => 'OWNER'],
            ['id' => 42 , 'id_role' => 2 , 'id_permission' => 7 , 'type' => 'OWNER'],
            ['id' => 43 , 'id_role' => 2 , 'id_permission' => 8 , 'type' => 'OWNER'],
            ['id' => 44 , 'id_role' => 2 , 'id_permission' => 9 , 'type' => 'OWNER'],
            ['id' => 45 , 'id_role' => 2 , 'id_permission' => 10 , 'type' => 'OWNER'],
            ['id' => 46 , 'id_role' => 2 , 'id_permission' => 11 , 'type' => 'OWNER'],
            ['id' => 47 , 'id_role' => 2 , 'id_permission' => 12 , 'type' => 'OWNER'],
            ['id' => 48 , 'id_role' => 2 , 'id_permission' => 13 , 'type' => 'OWNER'],
            ['id' => 49 , 'id_role' => 2 , 'id_permission' => 14 , 'type' => 'OWNER'],
            ['id' => 50 , 'id_role' => 2 , 'id_permission' => 15 , 'type' => 'OWNER'],
            ['id' => 51 , 'id_role' => 2 , 'id_permission' => 16 , 'type' => 'OWNER'],
            ['id' => 52 , 'id_role' => 2 , 'id_permission' => 17 , 'type' => 'OWNER'],
            ['id' => 53 , 'id_role' => 2 , 'id_permission' => 18 , 'type' => 'OWNER'],
            ['id' => 54 , 'id_role' => 2 , 'id_permission' => 19 , 'type' => 'OWNER'],
            ['id' => 55 , 'id_role' => 2 , 'id_permission' => 20 , 'type' => 'OWNER'],
            ['id' => 56 , 'id_role' => 2 , 'id_permission' => 29 , 'type' => 'OWNER'],
            ['id' => 57 , 'id_role' => 2 , 'id_permission' => 30 , 'type' => 'OWNER'],
            ['id' => 58 , 'id_role' => 2 , 'id_permission' => 32 , 'type' => 'OWNER'],
            ['id' => 59 , 'id_role' => 2 , 'id_permission' => 33 , 'type' => 'OWNER'],
            ['id' => 67 , 'id_role' => 2 , 'id_permission' => 39 , 'type' => 'OWNER'],
            ['id' => 69 , 'id_role' => 2 , 'id_permission' => 40 , 'type' => 'OWNER'],

            ['id' => 60 , 'id_role' => 3 , 'id_permission' => 19 , 'type' => 'OWNER'],//parte de user
            ['id' => 61 , 'id_role' => 3 , 'id_permission' => 20 , 'type' => 'OWNER'],
            ['id' => 62 , 'id_role' => 3 , 'id_permission' => 25 , 'type' => 'OWNER'],
            ['id' => 63 , 'id_role' => 3 , 'id_permission' => 29 , 'type' => 'OWNER'],
            ['id' => 64 , 'id_role' => 3 , 'id_permission' => 30 , 'type' => 'OWNER'],
            ['id' => 65 , 'id_role' => 3 , 'id_permission' => 33 , 'type' => 'OWNER']

            //El ultimo id asignado fue el 69, para crear un nuevo permiso usa el id 70
        ];

        foreach($rolePermissions as $rolePermission){
            DB::table('role_permissions')->insert($rolePermission);
        }

    }
}

class UserStateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_states')->delete();

        //seeds of user_states
        DB::table('user_states')->insert([
            'id' => 1,
            'name' => 'Activo',
            'description' => 'usuario que puede solicitar turnos y documentos',
        ]);

        DB::table('user_states')->insert([
            'id' => 2,
            'name' => 'Sancionado',
            'description' => 'usuario que se ha suspendido por violar alguna regla de los terminos y condiciones',
        ]);

        DB::table('user_states')->insert([
            'id' => 3,
            'name' => 'Suspendido',
            'description' => 'usuario que por muchas sanciones se suspendio',
        ]);

        DB::table('user_states')->insert([
            'id' => 4,
            'name' => 'Por confirmar',
            'description' => 'usuario que debe confirmar la cuenta a través de su correo electronico',
        ]);

    }
}

class DependenceTableSeeder extends Seeder{
    public function run(){
        DB::table('dependences')->delete();

        $dependencies=
        [
            ['id' => 1 , 'name' => 'Sin dependencia' ],
            ['id' => 2 , 'name' => 'Divisist'],
            ['id' => 3 , 'name' => 'Biblioteca']
        ];

        foreach ($dependencies as  $dependence) {
            DB::table('dependences')->insert($dependence);
        }
    }
}


class TimeBlockTableSeeder extends Seeder{
    public function run(){
        DB::table('time_blocks')->delete();

        $timeBlocks = 
        [
            ['id' => 1, 'id_dependence' => 2 , 'week' => '{"Lunes":[],"Martes":["7","8","9","10","11","12","14","15","16","17","18","19"],"Miercoles":[],"Jueves":[],"Viernes":[]}'],
            ['id' => 2, 'id_dependence' => 3 , 'week' => '{"Lunes":[],"Martes":["7","8","9","10","11","12","14","15","16","17","18","19"],"Miercoles":[],"Jueves":[],"Viernes":[]}']            
        ];

        foreach($timeBlocks as $timeBlock){
            DB::table('time_blocks')->insert($timeBlock);
        }
    }
}


//Semillas de la tabla Services

class ServiceTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('services')->delete();

        $services =
        [
            ['id' => 1 , 'name' => 'Entrega documento' , 'id_dependence' => 2],
            ['id' => 2 , 'name' => 'Prestamo' , 'id_dependence' => 3]
        ];

        foreach ($services as $service) {
            DB::table('services')->insert($service);
        }

    }
}


//Semillas de la tabla Services

class ServiceTypeTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('service_types')->delete();

        $serviceTypes =
        [
            ['id' => 1 , 'name' => 'Entrega acta de grado', 'description' => 'El ususario solicita un acta de grado', 'average_time' => '10', 'id_service' => 1],
            ['id' => 2 , 'name' => 'Entrega constancia de estudio', 'description' => 'El ususario solicita una constancia de estudio', 'average_time' => '5', 'id_service' => 1],
            ['id' => 3 , 'name' => 'Prestamo de revista', 'description' => 'se prestara al usuario una revista', 'average_time' => '10', 'id_service' => 2],
            ['id' => 4 , 'name' => 'Prestamo de libro', 'description' => 'se prestara al usuario un libro', 'average_time' => '5', 'id_service' => 2]
            
        ];

        foreach ($serviceTypes as $serviceType) {
            DB::table('service_types')->insert($serviceType);
        }

    }
}


class UserTableSeeder extends Seeder{
    public function run(){
        DB::table('users')->delete();

        $users=
        [
            //usuario de prueba
            ['id' => 1 , 'document' => '0000000000' , 'name' => 'Anonimo' , 'lastname' => 'Anonimo' ,
            'email' => 'sat.reply@gmail.com' , 'phone' => '0000000000' , 'id_role' => 3 , 'id_user_state' => 1 ,'password' => '000000000','id_dependence' => 1],
            //password cifrada de : 1234567
            ['id' => 2 , 'document' => '1090500632' , 'name' => 'Gerson' , 'lastname' => 'Guerrero' ,
            'email' => 'ger@gmail.com' , 'phone' => '3209696161' , 'id_role' => 1 , 'id_user_state' => 1 ,
            'password' => '$2b$10$dXOlbIDtyXNz6ulvs6lBeug3ZjxY68Hq56aBAxy8eAe6HIdqA70..','id_dependence' => 1],
            //password cifrada de : 111
            ['id' => 3 , 'document' => '1090333111' , 'name' => 'Andres' , 'lastname' => 'Carrillo' ,
            'email' => 'andres@gmail.com' , 'phone' => '3157783421' , 'id_role' => 2 , 'id_user_state' => 1 ,
            'password' => '$2b$10$z597/scZIe5CTOcC7fmb/Ow7/qrUB83Gt52wSc1R14z9k6sSkuLCi','id_dependence' => 2],
            ['id' => 4 , 'document' => '1090333222' , 'name' => 'Daniel' , 'lastname' => 'Caballero' ,
            'email' => 'daniel@gmail.com' , 'phone' => '3157783222' , 'id_role' => 2 , 'id_user_state' => 1 ,
            'password' => '$2b$10$z597/scZIe5CTOcC7fmb/Ow7/qrUB83Gt52wSc1R14z9k6sSkuLCi','id_dependence' => 2],
            ['id' => 5 , 'document' => '1090333333' , 'name' => 'Jose' , 'lastname' => 'Suarez' ,
            'email' => 'jose@gmail.com' , 'phone' => '3157783333' , 'id_role' => 2 , 'id_user_state' => 1 ,
            'password' => '$2b$10$z597/scZIe5CTOcC7fmb/Ow7/qrUB83Gt52wSc1R14z9k6sSkuLCi','id_dependence' => 3],
            ['id' => 6 , 'document' => '1090333555' , 'name' => 'Elfar' , 'lastname' => 'Garcia' ,
            'email' => 'elfar@gmail.com' , 'phone' => '3157783555' , 'id_role' => 3 , 'id_user_state' => 1 ,
            'password' => '$2b$10$z597/scZIe5CTOcC7fmb/Ow7/qrUB83Gt52wSc1R14z9k6sSkuLCi','id_dependence' => 1],
            ['id' => 7 , 'document' => '1090333444' , 'name' => 'Andrea' , 'lastname' => 'Villamizar' ,
            'email' => 'andrea@gmail.com' , 'phone' => '3157783444' , 'id_role' => 3 , 'id_user_state' => 1 ,
            'password' => '$2b$10$z597/scZIe5CTOcC7fmb/Ow7/qrUB83Gt52wSc1R14z9k6sSkuLCi','id_dependence' => 1]
        ];

        foreach ($users as  $user) {
            DB::table('users')->insert($user);
        }
    }
}


