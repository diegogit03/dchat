<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('name');
        $email = $this->ask('email');
        $password = $this->ask('password');

        $user = User::create([
            'name'=> $name,
            'email'=> $email,
            'password'=> Hash::make($password),
        ]);

        $this->info('Created!');
    }
}
