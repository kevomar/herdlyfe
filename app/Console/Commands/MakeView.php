<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeView extends Command
{
    protected $signature = 'make:view {path : The path for the views} {views* : The names of the views}';
    protected $description = 'Create new view files and folders if not exist';

    public function handle()
    {
        $path = $this->argument('path');
        $views = $this->argument('views');
        $viewsPath = resource_path('views/' . $path);

        // Create the nested folders if they don't exist
        if (!File::exists($viewsPath)) {
            File::makeDirectory($viewsPath, 0755, true);
            $this->info("Folder '$path' created successfully!");
        }

        foreach ($views as $view) {
            $viewPath = $viewsPath . '/' . $view . '.blade.php';

            if (File::exists($viewPath)) {
                $this->error("The view '$view' already exists in the '$path' folder!");
            } else {
                File::put($viewPath, '');
                $this->info("View '$view' created successfully in the '$path' folder!");
            }
        }
    }
}
