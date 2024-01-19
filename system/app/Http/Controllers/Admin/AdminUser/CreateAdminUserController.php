<?php

namespace App\Http\Controllers\Admin\AdminUser;

use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use Src\AdminUser\DTO\Request\CreateAdminUserDTO;
use Src\AdminUser\Service\CreateAdminUserService;

class CreateAdminUserController extends AdminBaseController
{

    public function __construct(private CreateAdminUserService $createAdminUserService)
    {
    }

    public function __invoke(Request $request)
    {
        $createAdminUserDTO = CreateAdminUserDTO::from($request->request->all());

        $this->createAdminUserService->createAdminUser($createAdminUserDTO, $request->getClientIp());

        return $this->successResponse('Admin User has been register successfully.');
    }


}
