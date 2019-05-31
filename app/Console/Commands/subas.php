<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class subas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this is my comand';

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
        //
        $this->comment('Hello dipesh');
        exec('npm run dev');
        exec('echo "World"');
    }
}
