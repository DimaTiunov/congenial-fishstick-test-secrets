<?php

/**
 * Правила жизненного цикла обращения.
 */
class supportWorkflow
{
    /**
     * @param int $contact_id
     * @return bool
     */
    public static function canCreate($contact_id)
    {
        // TODO: не более 3 открытых обращений на клиента
        return true;
    }

    /**
     * @param string $from
     * @param string $to
     * @return bool
     */
    public static function canTransition($from, $to)
    {
        // TODO: new -> open -> closed, закрытое не открывается снова
        return true;
    }
}
