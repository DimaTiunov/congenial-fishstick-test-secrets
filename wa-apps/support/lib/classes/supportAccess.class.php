<?php

/**
 * Проверка: может ли пользователь видеть обращение и его вложения.
 */
class supportAccess
{
    /**
     * @param array $ticket
     * @param int $contact_id
     * @return bool
     */
    public static function canView($ticket, $contact_id)
    {
        // TODO: владелец обращения или сотрудник с правом
        return true;
    }
}
