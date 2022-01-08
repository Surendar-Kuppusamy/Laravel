<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:command {user} {--queue=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command checking process';

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
     * @return int
     */
    public function handle()
    {
        $userId = $this->argument('user');
        $queueName = $this->option('queue');
        $this->info($userId);
        $this->info($queueName);
        $this->info('Command executed');
    }
}
