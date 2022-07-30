<?php

namespace Src\Connections;

class FileConnection implements ConnectionInterface
{
    /**
     * Get settings for a connection
     *
     * @param string $connectionName
     * @return array
     */
    public function getSettings(string $connectionName): array
    {
        return [];
    }

    /**
     * Add settings to a connection
     *
     * @param array $settings
     * @return void
     */
    public function addSettings(array $settings): void
    {

    }
}