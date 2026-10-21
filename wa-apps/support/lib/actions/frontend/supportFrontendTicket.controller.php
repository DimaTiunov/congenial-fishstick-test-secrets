<?php

/**
 * JSON: карточка обращения с комментариями и вложениями.
 * URL: my/support/<id>/
 *
 * Доступ проверяет supportAccess::canView().
 */
class supportFrontendTicketController extends waJsonController
{
    public function execute()
    {
        $ticket_model = new supportTicketModel();
        $ticket = $ticket_model->getById(waRequest::param('id', 0, 'int'));
        if (!$ticket) {
            throw new waException('Обращение не найдено', 404);
        }

        if (!supportAccess::canView($ticket, wa()->getUser()->getId())) {
            throw new waException('Нет доступа', 403);
        }

        $comment_model = new supportCommentModel();
        $attachment_model = new supportAttachmentModel();

        $ticket['comments'] = $comment_model->getByTicket($ticket['id']);
        $ticket['attachments'] = $attachment_model->getByField('ticket_id', $ticket['id'], true);

        $this->response = $ticket;
    }
}
