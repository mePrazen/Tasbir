<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Src\Config\DTO\Request\EmailTemplateDTO;
use Src\Config\Service\AddEmailTemplateService;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Parser;

class LoadEmailTemplateFromFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:template {--update}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load settings from file, this command is not overriding db values.';

    public function __construct(private AddEmailTemplateService $addEmailTemplateService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $updateOption = $this->option('update');

        $finder = new Finder();
        $finder->files()->name('*.yaml')->in(config_path('email-templates/'));

        if (!$finder->hasResults()) {
            $this->error('Email configurations file not found.');
            return null;
        }

        $yaml = new Parser();
        $emailConfigurations = array();

        foreach ($finder as $file) {
            $configurations = $yaml->parse(file_get_contents($file));

            if (!$configurations) {
                $this->error('Email configurations not found.');
                return null;
            }
            $emailConfigurations = array_merge($emailConfigurations, $configurations);
        }

        foreach ($emailConfigurations as $emailConfiguration) {
            $emailConfigurationDTO = EmailTemplateDTO::from($emailConfiguration);

            $this->addEmailTemplateService->addEmailTemplate($emailConfigurationDTO, $updateOption);
        }

        $this->info('Email configurations have been set successfully.');
        return null;

    }
}
