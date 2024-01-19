<?php

namespace Src\AdminUser\Service;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Src\AdminUser\DTO\Request\CreateAdminUserDTO;

trait AdminUserTrait
{

    public function validateCreateAdminUser(CreateAdminUserDTO $createAdminUserDTO)
    {
        $validator = Validator::make($createAdminUserDTO->toArray(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
