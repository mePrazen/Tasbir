<?php

namespace Src\Config\Interface;

use Src\Config\DTO\Request\EmailTemplateDTO;

interface EmailTemplateRepositoryInterface
{

    public function setEmailConfiguration(EmailTemplateDTO $emailTemplateDTO, $updateOption);

}
