<?php

namespace components\logger;

use Exception;

class LoggerFactory
{
    const LOGGER_TYPE_FILE = 'file';

    const LOGGER_TYPE_EMAIL = 'email';

    const LOGGER_TYPE_DB = 'db';

    /**
     * @throws Exception
     */
    public static function createLogger(string $type): LoggerInterface
    {
        $config = \Yii::$app->params['logger'];

        switch ($type) {
            case static::LOGGER_TYPE_EMAIL:
                return new EmailLogger($config['email']);
            case static::LOGGER_TYPE_DB:
                return new DBLogger();
            case static::LOGGER_TYPE_FILE:
                return new FileLogger($config['filePath']);
            default:
                throw new Exception("Logger type '{$type}' not supported");
        }
    }

    public static function getTypes(): array
    {
        return [
            static::LOGGER_TYPE_FILE,
            static::LOGGER_TYPE_EMAIL,
            static::LOGGER_TYPE_DB
        ];
    }
}