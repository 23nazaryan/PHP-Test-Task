<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use components\logger\LoggerFactory;

class LogController extends Controller
{
    public function actionLog()
    {
        try {
            $type = Yii::$app->params['logger']['defaultType'];
            $logger = LoggerFactory::createLogger($type);
            $logger->send("This is a default log message");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function actionLogTo(string $type)
    {
        try {
            $logger = LoggerFactory::createLogger($type);
            $logger->send("This is a log message for the {$type} logger");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function actionLogToAll()
    {
        $types = LoggerFactory::getTypes();

        foreach ($types as $type) {
            try {
                $logger = LoggerFactory::createLogger($type);
                $logger->send("This is a log message for the {$type} logger");
            } catch (\Exception $e) {
                echo $e->getMessage() . "\n";
            }
        }
    }
}