<?php

namespace Src\Connectors;

use Src\Resources\ResourceInterface;

interface ConnectorInterface
{
    /**
     * Connect to resource
     *
     * @param string $connectionName
     * @param array $settings = []
     * @return ResourceInterface
     */
    public function connect(string $connectionName, array $settings = []): ResourceInterface;

    /**
     * Clear connection to resource
     *
     * @param string $connectionName
     * @return mixed
     */
    public function clearConnection(string $connectionName): void;
}