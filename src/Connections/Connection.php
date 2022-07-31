<?php

namespace Src\Connections;

use Src\Configurations\ConfigLoader;

class Connection implements ConnectionInterface
{
    /**
     * @var array
     */
    protected array $settings = [];

    /**
     * @var string
     */
    protected string $configMethod = 'getAppConfig';

    /**
     * Get settings for a connection
     *
     * @param string $connectionName
     * @return array
     */
    public function getSettings(string $connectionName): array
    {
        if (!isset($this->settings[$connectionName])) {
            $this->setSettings($connectionName);
        }

        return $this->settings[$connectionName];
    }

    /**
     * Change settings to a connection
     *
     * @param array $settings
     * @param string $connectionName
     * @return void
     */
    public function changeSettings(array $settings, string $connectionName): void
    {
        foreach($settings as $key => $value) {
            $this->settings[$connectionName][$key] = $value;
        }
    }

    protected function setSettings($connectionName): void
    {
        $configMethod = $this->configMethod;
        $this->settings[$connectionName] = ConfigLoader::getInstance()->$configMethod($connectionName);
    }
}