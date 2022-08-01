<?php

namespace Src\Connectors;

use Src\Resources\File;

class FileConnector extends Connector
{
    /**
     * @var string
     */
    protected string $resourceName = File::class;
}