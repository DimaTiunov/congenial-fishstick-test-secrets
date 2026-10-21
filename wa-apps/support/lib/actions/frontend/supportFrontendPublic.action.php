<?php

/**
 * Публичная страница обращения по ссылке (без входа в кабинет).
 * URL: support/t/<token>/
 */
class supportFrontendPublicAction extends waViewAction
{
    public function execute()
    {
        $model = new supportTicketModel();
        $ticket = $model->getByToken(waRequest::param('token', '', 'string'));
        if (!$ticket) {
            throw new waException('Обращение не найдено', 404);
        }

        $comment_model = new supportCommentModel();
        $this->view->assign('ticket', $ticket);
        $this->view->assign('comments', $comment_model->getByTicket($ticket['id']));
    }
}
