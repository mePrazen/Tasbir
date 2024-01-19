<?php

namespace Src\Config\Interface;

interface SystemConfigRepositoryInterface
{
    public function findSystemConfigByName(string $name);

    public function saveSystemConfig($systemConfig);

}
