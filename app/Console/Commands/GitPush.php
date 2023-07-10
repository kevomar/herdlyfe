<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GitPush extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'git:push {message}';

    protected $description = 'Add, commit, and push code to GitHub';

    public function handle()
    {
        $message = $this->argument('message');

        $this->info('Adding files...');
        shell_exec('git add *');

        $this->info('Committing files...');
        shell_exec('git commit -m "' . $message . '"');

        $this->info('Pushing to GitHub...');
        shell_exec('git push -u origin main');

        $this->info('Code has been successfully pushed to GitHub.');
    }
}
