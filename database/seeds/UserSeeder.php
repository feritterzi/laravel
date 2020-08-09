<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create demo users
        $adminRole = Role::findByName('admin','web');
        Factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ])->assignRole($adminRole);

        $agentRole = Role::findByName('agent','web');
        Factory(User::class)->create([
            'name' => 'Agent',
            'email' => 'agent@example.com',
        ])->assignRole($agentRole);

        $advisorRole = Role::findByName('advisor','web');
        Factory(User::class)->create([
            'name' => 'Advisor',
            'email' => 'advisor@example.com',
        ])->assignRole($advisorRole);

        $userRole = Role::findByName('user','web');
        Factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@example.com',
        ])->assignRole($userRole);
    }
}
