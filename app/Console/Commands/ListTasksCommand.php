<?php

namespace App\Console\Commands;

use App\Task;
use Illuminate\Console\Command;

class ListTasksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List tasks the assigned users';

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
        $tasks = Task::with('user')->get();

        foreach ($tasks as $task)
        {
            $this->info($task->name . ' assigned to ' . $task->user->name);
        }
    }
}
