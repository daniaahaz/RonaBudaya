<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateControllerDocumentation extends Command
{
    protected $signature = 'docs:controllers';

    protected $description = 'Generate documentation for controllers';

    public function handle()
    {
        $controllers = File::allFiles(app_path('Http/Controllers'));

        $documentation = "# Controllers Documentation\n\n";

        foreach ($controllers as $controller) {
            $documentation .= "## " . $controller->getFilename() . "\n\n";
            $documentation .= "- **Path:** " . $controller->getRelativePathname() . "\n";
            $documentation .= "- **Type:** Laravel Controller\n\n";
        }

        File::ensureDirectoryExists(base_path('docs'));

        File::put(base_path('docs/controllers.md'), $documentation);

        $this->info('Controller documentation generated successfully!');

        return Command::SUCCESS;
    }
}