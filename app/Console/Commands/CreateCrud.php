<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CreateCrud extends Command
{
    protected $signature = 'make:crud';

    protected $description = 'Generate CRUD files and update routes';

    protected $logFile;

    public function handle()
    {
        $name = $this->ask('Enter the name of the CRUD (e.g., Setting)');
        $tableName = Str::snake(Str::plural($name));
        $migrationName = "create_{$tableName}_table";
        $modelName = Str::studly($name);
        $controllerName = "Backend{$modelName}Controller";
        $serviceName = "Backend{$modelName}Service";
        $repositoryName = "{$modelName}Repository";
        $interfaceName = "{$modelName}RepositoryInterface";
        $viewsFolderName = Str::snake($name);
        $viewsFolderNamePlural = Str::snake(Str::plural($name));
        $storeRequestName = "Store{$modelName}Request";
        $updateRequestName = "Update{$modelName}Request";
        $tableClassName = "{$modelName}Table";

        $this->logFile = storage_path("logs/crud/{$name}.json");
        $this->initLogFile();

        $this->generateMigration($migrationName, $tableName);
        $this->generateModel($modelName);
        $this->generateController($controllerName, $modelName, $serviceName, $storeRequestName, $updateRequestName, $tableClassName, $viewsFolderName, $viewsFolderNamePlural, $repositoryName);
        $this->generateService($serviceName, $repositoryName);
        $this->generateRepository($repositoryName, $interfaceName, $modelName);
        $this->generateInterface($interfaceName, $modelName);
        $this->generateRequests($storeRequestName, $updateRequestName, $modelName);
        $this->generateViews($viewsFolderName, $viewsFolderNamePlural, $modelName);
        $this->generateTable($tableClassName, $modelName);
        $this->updateRoutes($controllerName, $tableName);
        $this->updateBreadcrumbs($viewsFolderNamePlural, $modelName);
        $this->updateMenu($viewsFolderNamePlural, $modelName);

        $this->info('CRUD files generated successfully.');
    }

    protected function initLogFile()
    {
        if (!File::exists(storage_path('logs/crud'))) {
            File::makeDirectory(storage_path('logs/crud'), 0755, true);
        }

        File::put($this->logFile, json_encode([]));
    }

    protected function logFileCreation($filePath)
    {
        $log = json_decode(File::get($this->logFile), true);
        $log['files'][] = $filePath;
        File::put($this->logFile, json_encode($log));
    }

    protected function logRouteCreation($routeDefinition)
    {
        $log = json_decode(File::get($this->logFile), true);
        $log['routes'][] = $routeDefinition;
        File::put($this->logFile, json_encode($log));
    }

    protected function generateMigration($name, $table)
    {
        $migrationTemplate = str_replace(
            ['{{tableName}}'],
            [$table],
            $this->getStub('Migration')
        );

        $filename = date('Y_m_d_His') . "_create_{$table}_table.php";
        $filePath = database_path("/migrations/{$filename}");
        File::put($filePath, $migrationTemplate);

        $this->logFileCreation($filePath);
    }

    protected function generateModel($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );

        $filePath = app_path("/Models/{$name}.php");
        File::put($filePath, $modelTemplate);

        $this->logFileCreation($filePath);
    }

    protected function generateController($name, $modelName, $serviceName, $storeRequestName, $updateRequestName, $tableClassName, $viewsFolderName, $viewsFolderNamePlural, $repositoryName)
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{controllerName}}',
                '{{serviceName}}',
                '{{storeRequestName}}',
                '{{updateRequestName}}',
                '{{tableClassName}}',
                '{{viewsFolderName}}',
                '{{viewsFolderNamePlural}}',
                '{{modelVariable}}',
                '{{modelVariablePlural}}',
                '{{serviceVariable}}',
                '{{modelNameLower}}',
                '{{modelNamePlural}}',
                '{{repositoryName}}'
            ],
            [
                $modelName,
                $name,
                $serviceName,
                $storeRequestName,
                $updateRequestName,
                $tableClassName,
                $viewsFolderName,
                $viewsFolderNamePlural,
                Str::camel($modelName),
                Str::camel(Str::plural($modelName)),
                Str::camel($serviceName),
                Str::lower($modelName),
                Str::pluralStudly($modelName),
                $repositoryName
            ],
            $this->getStub('Controller')
        );

        $filePath = app_path("/Http/Controllers/Backend/{$name}.php");
        File::put($filePath, $controllerTemplate);

        $this->logFileCreation($filePath);
    }

    protected function generateService($name, $repositoryName)
    {
        $serviceTemplate = str_replace(
            ['{{serviceName}}', '{{repositoryName}}', '{{serviceVariable}}'],
            [$name, $repositoryName, Str::camel($name)],
            $this->getStub('Service')
        );

        $filePath = app_path("/Services/Backend/{$name}.php");
        File::put($filePath, $serviceTemplate);

        $this->logFileCreation($filePath);
    }

    protected function generateRepository($name, $interfaceName, $modelName)
    {
        $repositoryTemplate = str_replace(
            ['{{modelName}}', '{{repositoryName}}', '{{interfaceName}}'],
            [$modelName, $name, $interfaceName],
            $this->getStub('Repository')
        );

        $filePath = app_path("/Repositories/{$name}.php");
        File::put($filePath, $repositoryTemplate);

        $this->logFileCreation($filePath);
    }

    protected function generateInterface($name, $modelName)
    {
        $interfaceTemplate = str_replace(
            ['{{modelName}}', '{{interfaceName}}'],
            [$modelName, $name],
            $this->getStub('Interface')
        );

        $filePath = app_path("/Interfaces/{$name}.php");
        File::put($filePath, $interfaceTemplate);

        $this->logFileCreation($filePath);
    }

    protected function generateRequests($storeRequestName, $updateRequestName, $modelName)
    {
        $storeRequestTemplate = str_replace(
            ['{{modelName}}', '{{requestName}}'],
            [$modelName, $storeRequestName],
            $this->getStub('StoreRequest')
        );

        $updateRequestTemplate = str_replace(
            ['{{modelName}}', '{{requestName}}'],
            [$modelName, $updateRequestName],
            $this->getStub('UpdateRequest')
        );

        $storeRequestPath = app_path("/Http/Requests/Backend/{$storeRequestName}.php");
        $updateRequestPath = app_path("/Http/Requests/Backend/{$updateRequestName}.php");
        File::put($storeRequestPath, $storeRequestTemplate);
        File::put($updateRequestPath, $updateRequestTemplate);

        $this->logFileCreation($storeRequestPath);
        $this->logFileCreation($updateRequestPath);
    }

    protected function generateViews($folder, $folderPlural, $modelName)
    {
        $viewsPath = resource_path("views/backend/pages/{$folder}");

        // Create the directory if it doesn't exist
        if (!File::exists($viewsPath)) {
            File::makeDirectory($viewsPath, 0755, true);
        }

        $views = ['index', 'create', 'edit'];

        foreach ($views as $view) {
            $viewTemplate = str_replace(
                ['{{modelName}}', '{{viewsFolderName}}', '{{viewsFolderNamePlural}}', '{{modelVariable}}', '{{modelVariablePlural}}', '{{modelNameLower}}', '{{modelNamePlural}}'],
                [$modelName, $folder, $folderPlural, Str::camel($modelName), Str::camel(Str::plural($modelName)), Str::lower($modelName), Str::pluralStudly($modelName)],
                $this->getStub("views/{$view}")
            );

            $filePath = "{$viewsPath}/{$view}.blade.php";
            File::put($filePath, $viewTemplate);

            $this->logFileCreation($filePath);
        }
    }

    protected function generateTable($name, $modelName)
    {
        $tableTemplate = str_replace(
            ['{{modelName}}', '{{tableClassName}}'],
            [$modelName, $name],
            $this->getStub('Table')
        );

        $filePath = app_path("/Tables/{$name}.php");
        File::put($filePath, $tableTemplate);

        $this->logFileCreation($filePath);
    }

    protected function updateRoutes($controllerName, $tableName)
    {
        $routesPath = base_path('routes/web.php');
        $routeDefinition = "Route::resource('{$tableName}', \\App\\Http\\Controllers\\Backend\\{$controllerName}::class)->except('show');";

        $routesContent = File::get($routesPath);

        // Find the backend prefix group
        $search = "Route::prefix('backend')->middleware('admin')->group(function () {";
        $position = strpos($routesContent, $search);

        if ($position !== false) {
            $position += strlen($search);
            $routesContent = substr_replace($routesContent, "\n            $routeDefinition\n", $position, 0);
        }

        File::put($routesPath, $routesContent);
        $this->logRouteCreation($routeDefinition);
    }

    protected function updateBreadcrumbs($viewsFolderNamePlural, $modelName)
    {
        $breadcrumbsPath = base_path('routes/breadcrumbs.php');
        if (!File::exists($breadcrumbsPath)) {
            $this->warn("Breadcrumbs file not found at path: {$breadcrumbsPath}. Creating a new one.");
            File::put($breadcrumbsPath, "<?php\n\n");
        }

        $breadcrumbTemplate = str_replace(
            ['{{modelName}}', '{{viewsFolderNamePlural}}', '{{modelVariable}}', '{{modelNamePlural}}'],
            [$modelName, $viewsFolderNamePlural, Str::camel($modelName), Str::plural($modelName)],
            $this->getStub('Breadcrumb')
        );

        File::append($breadcrumbsPath, $breadcrumbTemplate);
        $this->logFileCreation($breadcrumbsPath); // Log that breadcrumbs were updated
    }

    protected function updateMenu($viewsFolderNamePlural, $modelName)
    {
        $menuPath = resource_path('views/backend/partials/_sidebar.blade.php');

        if (!File::exists($menuPath)) {
            $this->warn("Menu file not found at path: {$menuPath}. Skipping menu update.");
            return;
        }

        $menuTemplate = str_replace(
            ['{{modelNamePlural}}', '{{viewsFolderNamePlural}}'],
            [Str::pluralStudly($modelName), $viewsFolderNamePlural],
            $this->getStub('Menu')
        );

        $menuContent = File::get($menuPath);
        $menuContent = str_replace('</ul>', $menuTemplate . "\n</ul>", $menuContent);

        File::put($menuPath, $menuContent);
        $this->logFileCreation($menuPath); // Log that the menu was updated
    }

    protected function getStub($type)
    {
        return File::get(resource_path("stubs/$type.stub"));
    }
}
