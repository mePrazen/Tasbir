<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use phpDocumentor\Reflection\Types\Parent_;
use Src\Config\Service\AddSystemConfigService;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Parser;

class LoadSystemConfigFromFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:system-config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    public function __construct(private AddSystemConfigService $addSystemConfigService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $finder = new Finder();
        $finder->files()->name('*.yaml')->in(config_path('config/'));

        if (!$finder->hasResults()) {
            $this->error('config file not found.');
            return null;
        }

        $yaml = new Parser();
        $configs = array();
        foreach ($finder as $file) {
            $config = $yaml->parse(file_get_contents($file));

            if (!$config) {
                $this->error('config not found.');
                return null;
            }

            $configs = array_merge($configs, $config);

        }

        foreach ($configs as $config) {
            $this->addSystemConfigService->addSystemConfig($config);
        }


        $this->info('Configurations have been inserted successfully.');
        return null;

    }
}
