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

    }
}
