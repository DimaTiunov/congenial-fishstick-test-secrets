<?php

/**
 * JSON: комментарий клиента к обращению.
 * URL: my/support/comment/ (POST: ticket_id, body)
 *
 * Доступ проверяет supportAccess::canView().
 */
class supportFrontendCommentController extends waJsonController
{
    public function execute()
    {
        $ticket_model = new supportTicketModel();
        $ticket = $ticket_model->getById(waRequest::post('ticket_id', 0, 'int'));
        if (!$ticket) {
            throw new waException('Обращение не найдено', 404);
        }

        $contact_id = wa()->getUser()->getId();
        if (!supportAccess::canView($ticket, $contact_id)) {
            throw new waException('Нет доступа', 403);
        }

        $comment_model = new supportCommentModel();
        $data = waRequest::post();
        $data['contact_id'] = $contact_id;
        $data['create_datetime'] = date('Y-m-d H:i:s');
        $id = $comment_model->insert($data);

        $this->response = $comment_model->getById($id);
    }
}
