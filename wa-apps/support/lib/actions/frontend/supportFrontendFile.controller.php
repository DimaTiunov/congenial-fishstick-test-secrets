<?php

/**
 * Скачивание вложения.
 * URL: my/support/file/<id>/
 *
 * Доступ проверяет supportAccess::canView().
 */
class supportFrontendFileController extends waController
{
    public function execute()
    {
        $attachment_model = new supportAttachmentModel();
        $attachment = $attachment_model->getById(waRequest::param('id', 0, 'int'));
        if (!$attachment) {
            throw new waException('Файл не найден', 404);
        }

        $ticket_model = new supportTicketModel();
        $ticket = $ticket_model->getById($attachment['ticket_id']);
        if (!supportAccess::canView($ticket, wa()->getUser()->getId())) {
            throw new waException('Нет доступа', 403);
        }

        waFiles::readFile($attachment['path'], $attachment['name']);
    }
}
