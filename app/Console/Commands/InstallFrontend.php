<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

class InstallFrontend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quick:install-frontend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the frontend package';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Installing frontend package...');

        $process = new Process(['npm', 'install', '../QuickFe']);
        $process->setTimeout(null);
        $process->setWorkingDirectory(base_path());

        $process->run(function ($type, $buffer) {
            $this->info($buffer);
        });

        if ($process->isSuccessful()) {
            $this->info('Frontend package installed successfully.');
        } else {
            $this->error('Failed to install frontend package. Check the npm installation.');
        }
    }
}
