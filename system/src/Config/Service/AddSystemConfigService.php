<?php

namespace Src\Config\Service;

use Src\Config\Interface\SystemConfigRepositoryInterface;

class AddSystemConfigService
{

    public function __construct(private SystemConfigRepositoryInterface $systemConfigRepository)
    {
    }

    public function addSystemConfig(array $systemConfig)
    {
        $oldSystemConfig = $this->systemConfigRepository->findSystemConfigByName($systemConfig['name']);

        if (!$oldSystemConfig) {
            $this->systemConfigRepository->saveSystemConfig($systemConfig);
        }
    }


}
