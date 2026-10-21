<?php

class supportRightConfig extends waRightConfig
{
    public function init()
    {
        // Сотрудник может просматривать обращения и менять их статус в бэкенде
        $this->addItem('manage_tickets', 'Работа с обращениями', 'checkbox');
    }
}
