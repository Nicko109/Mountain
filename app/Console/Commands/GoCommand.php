<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user1 = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('123123123'),
        ]);
        $user2 = User::create([
            'name' => 'redactor',
            'email' => 'redactor@mail.ru',
            'password' => Hash::make('123123123'),
        ]);
        $user3 = User::create([
            'name' => 'moderator',
            'email' => 'moderator@mail.ru',
            'password' => Hash::make('123123123'),
        ]);

        $role1 = Role::where('title', Role::ROLE_ADMIN)->first();
        $role2 = Role::where('title', Role::ROLE_REDACTOR)->first();
        $role3 = Role::where('title', Role::ROLE_MODERATOR)->first();

        $user1->roles()->syncWithoutDetaching($role1->id);
        $user2->roles()->syncWithoutDetaching($role2->id);
        $user3->roles()->syncWithoutDetaching($role3->id);
    }
}
