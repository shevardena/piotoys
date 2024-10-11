<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DeleteCrud extends Command
{
    protected $signature = 'delete:crud {name}';

    protected $description = 'Delete CRUD files and update routes';

    public function handle()
    {
        $name = $this->argument('name');
        $logFile = storage_path("logs/crud/{$name}.json");

        if (!File::exists($logFile)) {
            $this->error("Log file for {$name} not found!");
            return;
        }

        $log = json_decode(File::get($logFile), true);

        foreach ($log['files'] as $file) {
            if (File::exists($file) && basename($file) !== 'breadcrumbs.php' && basename($file) !== '_sidebar.blade.php') {
                File::delete($file);
                $this->info("Deleted file: {$file}");
            }
        }

        $this->removeRoutes($log['routes']);
        $this->removeBreadcrumbs($name);
        $this->removeMenuItems($name);

        File::delete($logFile);
        $this->info("Deleted log file: {$logFile}");
    }

    protected function removeRoutes($routes)
    {
        $routesPath = base_path('routes/web.php');
        $routesContent = File::get($routesPath);

        foreach ($routes as $routeDefinition) {
            $routesContent = str_replace("\n            {$routeDefinition}\n", '', $routesContent);
        }

        File::put($routesPath, $routesContent);
        $this->info("Updated routes: {$routesPath}");
    }

    protected function removeBreadcrumbs($name)
    {
        $breadcrumbsPath = base_path('routes/breadcrumbs.php');
        if (!File::exists($breadcrumbsPath)) {
            $this->warn("Breadcrumbs file not found at path: {$breadcrumbsPath}. Skipping breadcrumbs update.");
            return;
        }

        $modelVariable = Str::camel($name);
        $modelNamePlural = Str::pluralStudly($name);
        $viewsFolderNamePlural = Str::snake(Str::plural($name));

        $breadcrumbTemplate = str_replace(
            ['{{modelName}}', '{{viewsFolderNamePlural}}', '{{modelVariable}}'],
            [$name, $viewsFolderNamePlural, $modelVariable],
            $this->getStub('Breadcrumb')
        );

        $breadcrumbsContent = File::get($breadcrumbsPath);
        $breadcrumbsContent = str_replace($breadcrumbTemplate, '', $breadcrumbsContent);

        File::put($breadcrumbsPath, $breadcrumbsContent);
        $this->info("Updated breadcrumbs: {$breadcrumbsPath}");
    }

    protected function removeMenuItems($name)
    {
        $menuPath = resource_path('views/backend/partials/_sidebar.blade.php');
        if (!File::exists($menuPath)) {
            $this->warn("Menu file not found at path: {$menuPath}. Skipping menu update.");
            return;
        }

        $viewsFolderNamePlural = Str::snake(Str::plural($name));
        $modelNamePlural = Str::pluralStudly($name);

        $menuTemplate = str_replace(
            ['{{modelName}}', '{{viewsFolderNamePlural}}'],
            [$modelNamePlural, $viewsFolderNamePlural],
            $this->getStub('Menu')
        );

        $menuContent = File::get($menuPath);
        $menuContent = str_replace($menuTemplate . "\n", '', $menuContent);

        File::put($menuPath, $menuContent);
        $this->info("Updated menu: {$menuPath}");
    }

    protected function getStub($type)
    {
        return File::get(resource_path("stubs/$type.stub"));
    }
}
