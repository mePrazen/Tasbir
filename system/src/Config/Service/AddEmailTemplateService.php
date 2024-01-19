<?php

namespace Src\Config\Service;

use Src\Config\Interface\EmailTemplateRepositoryInterface;

class AddEmailTemplateService
{

    public function __construct(private EmailTemplateRepositoryInterface $emailTemplateRepository)
    {
    }

    public function addEmailTemplate($emailConfigurationDTO, $updateOption)
    {
        $this->emailTemplateRepository->setEmailConfiguration($emailConfigurationDTO, $updateOption);
    }


}
