<?php

namespace Src\Resources;

class File extends Resource
{
    /**
     * @var mixed
     */
    protected mixed $resource;

    /**
     * @var string
     */
    protected string $filePath = __DIR__;

    /**
     * @var string
     */
    protected string $fileMode = 'r';

    /**
     * @param array $settings
     */
    public function __construct(protected array $settings) {}

    /**
     * Read data from a resource as array
     *
     * @return array
     */
    public function readData(): array
    {
        $this->setFilePath('inputPath');
        $this->setFileMode('r');
        $this->connect();

        $result = [];

        while (!feof($this->resource)) {
            $result[] = fgets($this->resource);
        }

        $this->disconnect();

        return $result;
    }

    /**
     * Write string in a resource
     *
     * @param string $input
     * @return void
     */
    public function writeData(string $input): void
    {
        $this->setFilePath('outputPath');
        $this->setFileMode('w');
        $this->connect();

        fwrite($this->resource, $input);

        $this->disconnect();
    }

    /**
     * Establish connection to resource
     *
     * @return void
     */
    protected function connect(): void
    {
        $this->resource = fopen($this->filePath, $this->fileMode);
    }

    /**
     * Destroy connection to resource
     *
     * @return void
     */
    protected function disconnect(): void
    {
        fclose($this->resource);
    }

    /**
     * Set file path
     *
     * @param string $key
     * @return void
     */
    protected function setFilePath(string $key): void
    {
        $this->filePath = $this->settings[$key];
    }

    /**
     * Set file path
     *
     * @param string $mode
     * @return void
     */
    protected function setFileMode(string $mode): void
    {
        $this->fileMode = $mode;
    }
}