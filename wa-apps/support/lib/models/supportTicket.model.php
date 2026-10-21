<?php

class supportTicketModel extends waModel
{
    protected $table = 'support_ticket';

    /**
     * Обращения клиента с поиском по теме и постраничным выводом.
     *
     * @param int $contact_id
     * @param string $search
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function getByContact($contact_id, $search = '', $page = 1, $limit = 20)
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE contact_id = ".(int) $contact_id;

        if ($search) {
            $sql .= " AND subject LIKE '%".$search."%'";
        }

        $offset = ($page - 1) * $limit;
        $sql .= " ORDER BY id DESC LIMIT ".$offset.", ".$limit;

        return $this->query($sql)->fetchAll();
    }

    /**
     * Обращение по токену публичной ссылки.
     *
     * @param string $token
     * @return array|null
     */
    public function getByToken($token)
    {
        return $this->getByField('public_token', $token);
    }
}
