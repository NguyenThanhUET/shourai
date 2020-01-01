<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {email} {password} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->argument('email') != null && $this->argument('email') != '' && !DB::table('users')->where('email', $this->argument('email'))->exists()) {
            DB::table('users')->insert(
                array(
                    'email' => $this->argument('email'),
                    'password'=> Hash::make($this->argument('password')),
                    'name'=>$this->argument('name')
                )
            );
        }
    }
}
