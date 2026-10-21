<?php

/**
 * JSON: смена статуса и заметки обращения сотрудником.
 * URL: support/?module=backend&action=update (POST: id, status, internal_note)
 *
 * Допустимость перехода проверяет supportWorkflow::canTransition().
 */
class supportBackendUpdateController extends waJsonController
{
    public function execute()
    {
        $ticket_model = new supportTicketModel();
        $ticket = $ticket_model->getById(waRequest::post('id', 0, 'int'));
        if (!$ticket) {
            throw new waException('Обращение не найдено', 404);
        }

        if (!supportWorkflow::canTransition($ticket['status'], waRequest::post('status'))) {
            throw new waException('Недопустимый переход', 400);
        }

        $ticket_model->updateById($ticket['id'], waRequest::post());

        $this->response = $ticket_model->getById($ticket['id']);
    }
}
