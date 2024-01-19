<?php

namespace App\Http\Controllers\Admin\AdminUser;

use App\Http\Controllers\Admin\AdminBaseController;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use WpOrg\Requests\Auth;

class ListAdminUserControllerAdmin extends AdminBaseController
{

    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $adminUsers = AdminUser::all();
        return $this->successResponse($adminUsers, 'Admin Users List has been fetched successfully.');
    }

}
