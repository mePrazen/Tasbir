<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\AdminBaseController;
use WpOrg\Requests\Auth;

class AdminLogoutController extends AdminBaseController
{


    public function __invoke()
    {
        $user = Auth::api();
        $user->tokens()->delete();


    }
}
