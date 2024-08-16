<?php

namespace components\logger;

class FileLogger implements LoggerInterface
{
    private string $filePath;
    private string $type = LoggerFactory::LOGGER_TYPE_FILE;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @inheritDoc
     */
    public function send(string $message): void
    {
        echo "\"{$message}\" was sent via {$this->type}\n";
    }

    /**
     * @inheritDoc
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        if ($loggerType === $this->type) {
            $this->send($message);
        }
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @inheritDoc
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}