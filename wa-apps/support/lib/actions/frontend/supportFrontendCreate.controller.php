<?php

/**
 * JSON: создание обращения с вложением.
 * URL: my/support/create/ (POST: subject, body, attachment)
 *
 * Лимит открытых обращений проверяет supportWorkflow::canCreate().
 */
class supportFrontendCreateController extends waJsonController
{
    public function execute()
    {
        $contact = wa()->getUser();
        if (!supportWorkflow::canCreate($contact->getId())) {
            throw new waException('Слишком много открытых обращений', 403);
        }

        $ticket_model = new supportTicketModel();
        $id = $ticket_model->insert(array(
            'contact_id'      => $contact->getId(),
            'contact_email'   => $contact->get('email', 'default'),
            'subject'         => waRequest::post('subject'),
            'body'            => waRequest::post('body'),
            'status'          => 'new',
            'create_datetime' => date('Y-m-d H:i:s'),
        ));
        $ticket_model->updateById($id, array('public_token' => md5($id)));

        $file = waRequest::file('attachment');
        if ($file->uploaded()) {
            // проверка расширения и размера, как в новых версиях фреймворка
            if (!$file->validate(array('jpg', 'png', 'pdf'), 5 * 1024 * 1024)) {
                throw new waException('Недопустимый файл', 400);
            }

            $dir = wa()->getDataPath('attachments', true);
            $name = $file->name;
            $file->moveTo($dir, $name);

            $attachment_model = new supportAttachmentModel();
            $attachment_model->insert(array(
                'ticket_id'       => $id,
                'name'            => $name,
                'path'            => $dir.'/'.$name,
                'size'            => $file->size,
                'create_datetime' => date('Y-m-d H:i:s'),
            ));
        }

        $this->response = $ticket_model->getById($id);
    }
}
