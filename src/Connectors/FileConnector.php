<?php

namespace Src\Connectors;

use Src\Resources\File;

class FileConnector extends Connector
{
    protected string $resourceName = File::class;
}