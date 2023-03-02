<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:token {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a token for a user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $credentials = [
            'email' => $this->argument('email'),
            'password' => $this->argument('password'),
        ];

        if (Auth::once($credentials)) {
            $token = Auth::user()->createToken('console-token')->accessToken;
            $expires_at = now()->addMinute(5);
            $this->info("Token: $token\nExpires at: $expires_at");
        } else {
            $this->error('Invalid credentials');
        }
    }
}
