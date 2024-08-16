<?php

namespace components\logger;

class EmailLogger implements LoggerInterface
{
    private string $email;

    private string $type = LoggerFactory::LOGGER_TYPE_EMAIL;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @inheritDoc
     */
    public function send(string $message): void
    {
        echo "\"{$message}\"  was sent via {$this->type}\n";
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