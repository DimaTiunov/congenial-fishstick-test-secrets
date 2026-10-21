<?php

/**
 * Страница «Мои обращения» в личном кабинете.
 * URL: my/support/
 */
class supportFrontendMyTicketsAction extends waViewAction
{
    public function execute()
    {
        $model = new supportTicketModel();
        $this->view->assign('tickets', $model->getByContact(wa()->getUser()->getId()));
    }
}
