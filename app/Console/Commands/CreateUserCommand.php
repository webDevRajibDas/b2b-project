<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {password}';

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
        // Get input arguments
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        // Check if email already exists
        if (User::where('email', $email)->exists()) {
            $this->error('User with this email already exists.');
            return;
        }

        // Create user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if ($user) {
            $this->info("User {$user->email} created successfully.");
        } else {
            $this->error('Failed to create user.');
        }
    }
}
