<?php

namespace Src\AdminUser\Interface;

use App\Models\AdminUser;
use Src\AdminUser\DTO\Request\CreateAdminUserDTO;

interface AdminUserRepositoryInterface
{


    public function saveAdminUser(CreateAdminUserDTO $createAdminUserDTO): AdminUser;
}
