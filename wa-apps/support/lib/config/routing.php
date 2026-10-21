<?php

return array(
    'my/support/'                  => 'frontend/myTickets',
    'my/support/list/'             => 'frontend/list',
    'my/support/create/'           => 'frontend/create',
    'my/support/comment/'          => 'frontend/comment',
    'my/support/<id:\d+>/'         => 'frontend/ticket',
    'my/support/file/<id:\d+>/'    => 'frontend/file',
    'support/t/<token:[a-z0-9]+>/' => 'frontend/public',
);
