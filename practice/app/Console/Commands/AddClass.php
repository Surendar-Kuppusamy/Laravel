<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class AddClass extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:class';
    //protected $signature = 'make:class {name: Create Class}';

    protected $type = 'class';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create custom class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        parent::__construct();
    } */

    /**
     * Execute the console command.
     *
     * @return int
     */
    /* public function handle()
    {
        return 0;
    } */

    protected function getStub()
    {
        return app_path('Console/Stubs/ClassStub.php');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Extra';
    }
}
