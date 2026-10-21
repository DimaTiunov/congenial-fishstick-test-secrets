<?php

/**
 * JSON: карточка обращения для сотрудника в бэкенде.
 * URL: support/?module=backend&action=ticket&id=<id>
 */
class supportBackendTicketController extends waJsonController
{
    public function execute()
    {
        $ticket_model = new supportTicketModel();
        $ticket = $ticket_model->getById(waRequest::get('id', 0, 'int'));
        if (!$ticket) {
            throw new waException('Обращение не найдено', 404);
        }

        $comment_model = new supportCommentModel();
        $ticket['comments'] = $comment_model->getByTicket($ticket['id']);

        $this->response = $ticket;
    }
}
