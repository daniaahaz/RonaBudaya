<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateModelDocumentation extends Command
{
    protected $signature = 'docs:models';

    protected $description = 'Generate documentation for models';

    public function handle()
    {
        $models = File::allFiles(app_path('Models'));

        $documentation = "# Models Documentation\n\n";

        foreach ($models as $model) {
            $documentation .= "## " . $model->getFilename() . "\n\n";
            $documentation .= "- **Path:** " . $model->getRelativePathname() . "\n";
            $documentation .= "- **Type:** Laravel Eloquent Model\n\n";
        }

        File::ensureDirectoryExists(base_path('docs'));

        File::put(base_path('docs/models.md'), $documentation);

        $this->info('Model documentation generated successfully!');

        return Command::SUCCESS;
    }
}