<?php

declare(strict_types=1);

namespace Application;


use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\Repository\MailRepository::class => function($container) {
                    $tableGateway = $container->get(Model\MailTableGateway::class);
                    return new Model\Repository\MailRepository($tableGateway);
                },
                Model\MailTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Data\Mail());
                    return new TableGateway('mails', $dbAdapter, null, $resultSetPrototype);
                },

                Model\Repository\PhoneRepository::class => function($container) {
                    $tableGateway = $container->get(Model\PhoneTableGateway::class);
                    return new Model\Repository\PhoneRepository($tableGateway);
                },
                Model\PhoneTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Data\PhoneNumber());
                    return new TableGateway('phone_numbers', $dbAdapter, null, $resultSetPrototype);
                },

                Model\Repository\UserRepository::class => function($container) {
                    $tableGateway = $container->get(Model\UserTableGateway::class);
                    return new Model\Repository\UserRepository($tableGateway);
                },
                Model\UserTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Data\User());
                    return new TableGateway('users', $dbAdapter, null, $resultSetPrototype);
                },

                Model\Repository\PostRepository::class => function($container) {
                    $tableGateway = $container->get(Model\PostTableGateway::class);
                    return new Model\Repository\PostRepository($tableGateway);
                },
                Model\PostTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Data\Post());
                    return new TableGateway('post', $dbAdapter, null, $resultSetPrototype);
                },

                Model\Repository\ImageRepository::class => function($container) {
                    $tableGateway = $container->get(Model\ImageTableGateway::class);
                    return new Model\Repository\ImageRepository($tableGateway);
                },
                Model\ImageTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Data\Image());
                    return new TableGateway('photos', $dbAdapter, null, $resultSetPrototype);
                },
                Model\Repository\ChatRepository::class => function($container) {
                    $tableGateway = $container->get(Model\ChatTableGateway::class);
                    return new Model\Repository\ChatRepository($tableGateway);
                },
                Model\ChatTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Data\Message());
                    return new TableGateway('messages', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
}
