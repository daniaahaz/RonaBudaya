<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class GenerateRouteDocumentation extends Command
{
    protected $signature = 'docs:routes';

    protected $description = 'Generate documentation for application routes';

    public function handle()
    {
        $routes = Route::getRoutes();

        $documentation = "# Routes Documentation\n\n";

        foreach ($routes as $route) {
            $methods = implode('|', $route->methods());

            $documentation .= "## " . $route->uri() . "\n\n";
            $documentation .= "- **Methods:** " . $methods . "\n";
            $documentation .= "- **Name:** " . ($route->getName() ?? 'N/A') . "\n";
            $documentation .= "- **Action:** " . $route->getActionName() . "\n\n";
        }

        File::ensureDirectoryExists(base_path('docs'));

        File::put(base_path('docs/routes.md'), $documentation);

        $this->info('Route documentation generated successfully!');

        return Command::SUCCESS;
    }
}