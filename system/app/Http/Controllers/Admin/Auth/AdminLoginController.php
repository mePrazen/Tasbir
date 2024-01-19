<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\AdminBaseController;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends AdminBaseController
{

    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if ($validateUser->fails()) {
                throw new ValidationException($validateUser);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return $this->errorResponse('Email & Password does not match with our record.', [], 401);
            }

            $adminUser = AdminUser::where('email', $request->email)->first();

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $token = $adminUser->createToken($request['email'])->plainTextToken;
                return $this->successResponse('User login successfully.', null, 200, 0, ['Authorization' => $token]);
            }

        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

}
