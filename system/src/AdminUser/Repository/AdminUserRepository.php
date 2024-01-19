<?php

namespace Src\AdminUser\Repository;

use App\Models\AdminUser;
use Src\AdminUser\DTO\Request\CreateAdminUserDTO;
use Src\AdminUser\Interface\AdminUserRepositoryInterface;

class AdminUserRepository implements AdminUserRepositoryInterface
{

    public function saveAdminUser(CreateAdminUserDTO $createAdminUserDTO): AdminUser
    {
        $createAdminUserDTO->password = bcrypt($createAdminUserDTO->password);
        $createAdminUserDTO->status = AdminUser::STATUS_PENDING;
        return AdminUser::create($createAdminUserDTO);
    }
}
