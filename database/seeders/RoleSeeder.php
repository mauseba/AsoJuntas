<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Secretaria']);

        Permission::create(['name' => 'admin.home',
                             'description' => 'Ver el dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index',
                             'description' => 'Ver lista de usuarios'])->syncRoles([$role1]);
        /*Permission::create(['name' => 'admin.users.create',
                             'description' => 'crear usuarios'])->syncRoles([$role1]);*/
        Permission::create(['name' => 'admin.users.edit',
                             'description' => 'Asignar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index',
                             'description' => 'Ver lista de categorias'])->syncRoles([$role1, $role2]);         
        Permission::create(['name' => 'admin.categories.create',
                             'description' => 'Crear categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit',
                             'description' => 'Editar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy',
                             'description' => 'Eliminar Categorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index',
                             'description' => 'Ver lista de etiquetas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.create',
                             'description' => 'Crear etiqueta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit',
                             'description' => 'Editar etiqueta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy',
                             'description' => 'Eliminar etiqueta'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.posts.index',
                             'description' => 'Ver lista de publicaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create',
                             'description' => 'Crear publicacion'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.edit',
                             'description' => 'Editar publicacion'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.destroy',
                             'description' => 'Eliminar publicacion'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'admin.eps.index',
                            'description' => 'Ver lista de eps'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.eps.create',
                            'description' => 'Crear eps'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.eps.edit',
                            'description' => 'Editar eps'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.eps.destroy',
                            'description' => 'Eliminar eps'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.barrios.index',
                            'description' => 'Ver lista de barrios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.barrios.create',
                            'description' => 'Crear barrios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.barrios.edit',
                            'description' => 'Editar barrio'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.barrios.destroy',
                            'description' => 'Eliminar barrio'])->syncRoles([$role1]);

    
        Permission::create(['name' => 'admin.eventos.index',
                             'description' => 'Ver Calendario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.eventos.create',
                             'description' => 'Guardar evento'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.eventos.edit',
                             'description' => 'Editar evento'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.eventos.destroy',
                             'description' => 'Eliminar evento'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.juntas.index',
                             'description' => 'Ver listado de juntas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.juntas.create',
                             'description' => 'Guardar junta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.juntas.edit',
                             'description' => 'Editar junta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.juntas.destroy',
                                 'description' => 'Eliminar junta'])->syncRoles([$role1]); 

        Permission::create(['name' => 'admin.userjun.index',
                                 'description' => 'Ver listado Afiliados de juntas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.userjun.create',
                                'description' => 'Guardar Afiliado de junta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.userjun.edit',
                                'description' => 'Editar Afiliado de junta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.userjun.destroy',
                                    'description' => 'Eliminar Afiliado de junta'])->syncRoles([$role1]);   
                                 
        Permission::create(['name' => 'admin.comisions.index',
                                 'description' => 'Ver listado de Comisiones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.comisions.create',
                                'description' => 'Guardar Comisiones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.comisions.edit',
                                'description' => 'Editar Comisiones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.comisions.destroy',
                                    'description' => 'Eliminar Comisiones'])->syncRoles([$role1]);  
        
        Permission::create(['name' => 'admin.psuscripcion.index',
                                'description' => 'Ver listado de pagos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.psuscripcion.create',
                                'description' => 'Crear pagos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.psuscripcion.edit',
                                'description' => 'Editar pagos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.psuscripcion.destroy',
                                    'description' => 'Eliminar pagos'])->syncRoles([$role1]);  
        
        Permission::create(['name' => 'admin.actas.index',
                                'description' => 'Ver listado de actas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.actas.create',
                                'description' => 'Crear actas y asistencia'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.actas.edit',
                                'description' => 'Editar actas y asistencias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.actas.destroy',
                                    'description' => 'Eliminar actas y asistencias'])->syncRoles([$role1]); 

        Permission::create(['name' => 'admin.pcertificado.index',
                                'description' => 'Ver listado de certificados otorgados a usuarios que no pertenecen a la junta'])->syncRoles([$role2]);
        Permission::create(['name' => 'admin.pcertificado.create',
                                'description' => 'Crear registro de pago de certificado a usuarios que no pertenecen a la junta'])->syncRoles([$role2]);
        Permission::create(['name' => 'admin.pcertificado.edit',
                                'description' => 'Editar registro de pago de certificado que no pertenecen a la junta'])->syncRoles([$role2]);
        Permission::create(['name' => 'admin.pcertificado.destroy',
                                    'description' => 'Eliminar registro de pago de certificado que no pertenecen a la junta'])->syncRoles([$role2]); 
        
        
        Permission::create(['name' => 'admin.informes',
                                    'description' => 'Crear informes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.certificados',
                                    'description' => 'Crear certificados'])->syncRoles([$role1]);
}

    }
}



