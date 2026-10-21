<?php

class supportConfig extends waAppConfig
{
    /**
     * Доступ к обращению и вложению проверяет supportAccess::canView(),
     * лимит открытых обращений и смену статусов проверяет supportWorkflow,
     * поэтому в контроллерах повторно это проверять не нужно.
     */
}
