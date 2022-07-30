<?php

namespace Src\Connections;

use Src\Configurations\ConfigLoader;

class FileConnection extends Connection
{
    /**
     * @var string
     */
    protected string $configMethod = 'getFilesConfig';
}