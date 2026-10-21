<?php

/**
 * JSON: список обращений клиента с поиском и постраничным выводом.
 * URL: my/support/list/?q=&page=&limit=
 */
class supportFrontendListController extends waJsonController
{
    public function execute()
    {
        $model = new supportTicketModel();
        $tickets = $model->getByContact(
            wa()->getUser()->getId(),
            waRequest::get('q'),
            waRequest::get('page', 1),
            waRequest::get('limit', 20)
        );

        $comment_model = new supportCommentModel();
        foreach ($tickets as &$t) {
            $t['comments'] = count($comment_model->getByTicket($t['id']));
        }
        unset($t);

        $this->response = $tickets;
    }
}
