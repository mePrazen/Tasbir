<?php

namespace Src\AdminUser\DTO\Request;

use Src\Shared\DTO\Constructor;

class CreateAdminUserDTO extends Constructor
{

    public string $name;

    public string $email;

    public string $password;
    public string $confirm_password;



}
