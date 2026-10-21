<?php

class supportCommentModel extends waModel
{
    protected $table = 'support_comment';

    /**
     * Комментарии к обращению по порядку.
     *
     * @param int $ticket_id
     * @return array
     */
    public function getByTicket($ticket_id)
    {
        return $this->getByField('ticket_id', $ticket_id, true);
    }
}
