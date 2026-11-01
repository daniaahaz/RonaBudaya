<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateViewDocumentation extends Command
{
    protected $signature = 'docs:views';

    protected $description = 'Generate documentation for Blade views';

    public function handle()
    {
        $views = File::allFiles(resource_path('views'));

        $documentation = "# Blade Views Documentation\n\n";

        foreach ($views as $view) {
            $documentation .= "## " . $view->getFilename() . "\n\n";
            $documentation .= "- **Path:** " . $view->getRelativePathname() . "\n";
            $documentation .= "- **Type:** Blade Template\n\n";
        }

        File::ensureDirectoryExists(base_path('docs'));

        File::put(base_path('docs/views.md'), $documentation);

        $this->info('View documentation generated successfully!');

        return Command::SUCCESS;
    }
}