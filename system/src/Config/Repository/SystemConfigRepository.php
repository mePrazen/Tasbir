<?php

namespace Src\Config\Repository;

use App\Models\SystemConfig;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Src\Config\Interface\SystemConfigRepositoryInterface;

class SystemConfigRepository implements SystemConfigRepositoryInterface
{

    public function findSystemConfigByName(string $name)
    {
        return SystemConfig::where('name', '=', $name)->first();
    }

    public function saveSystemConfig($systemConfig)
    {
        DB::table('system_configs')->insert([
            'uuid' => Str::uuid(),
            'name' => $systemConfig['name'],
            'value' => $systemConfig['value'],
            'section' => $systemConfig['section']
        ]);
    }

}
