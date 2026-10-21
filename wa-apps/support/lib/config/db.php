<?php

return array(
    'support_ticket' => array(
        'id'              => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'contact_id'      => array('int', 11, 'null' => 0),
        'contact_email'   => array('varchar', 255, 'null' => 0, 'default' => ''),
        'subject'         => array('varchar', 255, 'null' => 0, 'default' => ''),
        'body'            => array('text'),
        'status'          => array('varchar', 16, 'null' => 0, 'default' => 'new'),
        'public_token'    => array('varchar', 64, 'null' => 0, 'default' => ''),
        'internal_note'   => array('varchar', 255, 'null' => 0, 'default' => ''),
        'create_datetime' => array('datetime', 'null' => 0),
        ':keys'           => array(
            'PRIMARY'      => 'id',
            'contact_id'   => 'contact_id',
            'public_token' => 'public_token',
        ),
    ),
    'support_attachment' => array(
        'id'              => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'ticket_id'       => array('int', 11, 'null' => 0),
        'name'            => array('varchar', 255, 'null' => 0, 'default' => ''),
        'path'            => array('varchar', 512, 'null' => 0, 'default' => ''),
        'size'            => array('int', 11, 'null' => 0, 'default' => '0'),
        'create_datetime' => array('datetime', 'null' => 0),
        ':keys'           => array(
            'PRIMARY'   => 'id',
            'ticket_id' => 'ticket_id',
        ),
    ),
    'support_comment' => array(
        'id'              => array('int', 11, 'null' => 0, 'autoincrement' => 1),
        'ticket_id'       => array('int', 11, 'null' => 0),
        'contact_id'      => array('int', 11, 'null' => 0),
        'is_staff'        => array('tinyint', 1, 'null' => 0, 'default' => '0'),
        'body'            => array('text'),
        'create_datetime' => array('datetime', 'null' => 0),
        ':keys'           => array(
            'PRIMARY'   => 'id',
            'ticket_id' => 'ticket_id',
        ),
    ),
);
