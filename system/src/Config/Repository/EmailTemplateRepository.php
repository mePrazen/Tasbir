<?php

namespace Src\Config\Repository;

use App\Models\EmailTemplate;
use Src\Config\DTO\Request\EmailTemplateDTO;
use Src\Config\Interface\EmailTemplateRepositoryInterface;

class EmailTemplateRepository implements EmailTemplateRepositoryInterface
{

    public function setEmailConfiguration(EmailTemplateDTO $emailTemplateDTO, $updateOption)
    {
        if ($updateOption) {
            $emailTemplates = EmailTemplate::FirstWhere('name', $emailTemplateDTO->name);
            $emailTemplates->title = $emailTemplateDTO->title;
            $emailTemplates->subject = $emailTemplateDTO->subject;
            $emailTemplates->message = $emailTemplateDTO->message;
            $emailTemplates->description = $emailTemplateDTO->description;
            $emailTemplates->image = $emailTemplateDTO->image;
            $emailTemplates->save();
        } else
            $emailTemplates = new EmailTemplate();
        $emailTemplates->name = $emailTemplateDTO->name;
        $emailTemplates->title = $emailTemplateDTO->title;
        $emailTemplates->subject = $emailTemplateDTO->subject;
        $emailTemplates->message = $emailTemplateDTO->message;
        $emailTemplates->description = $emailTemplateDTO->description;
        $emailTemplates->image = $emailTemplateDTO->image;
        $emailTemplates->save();
    }


}
