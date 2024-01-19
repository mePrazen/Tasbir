<?php

namespace Src\AdminUser\Service;

use App\Events\AdminActivityLogEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Src\AdminUser\DTO\Request\CreateAdminUserDTO;
use Src\AdminUser\Interface\AdminUserRepositoryInterface;
use Src\Shared\Constant\ActivityTypeConstant;

class CreateAdminUserService
{
    use AdminUserTrait;

    public function __construct(
        private AdminUserRepositoryInterface $adminUserRepository
    )
    {
    }

    public function createAdminUser(CreateAdminUserDTO $createAdminUserDTO, string $ipAddress)
    {
        $this->validateCreateAdminUser($createAdminUserDTO);

        try {
            DB::beginTransaction();
             $adminUser = $this->adminUserRepository->saveAdminUser($createAdminUserDTO);

            Event::Dispatch(
                new AdminActivityLogEvent(
                    $createAdminUserDTO->email,
                    $adminUser->id,
                    ActivityTypeConstant::ADMIN_USER_CREATED,
                    $ipAddress)
            );
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw $exception;
        }
    }

}
