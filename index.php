<?php
const DEFAULT_CONTROLLER = 'users';
const DEFAULT_ACTION = 'loginOrRegister';

include 'autoloader.php';
include 'helper.php';

session_start();

$uri = $_SERVER['REQUEST_URI'];
$self = $_SERVER['PHP_SELF'];

$self = str_replace('index.php', '', $self);

if ($self != '/') {
    $uri = str_replace($self, '', $uri);
} else {
    $uri = substr($uri, 1);
}

$getParams = explode('?', $uri);

$uri = array_shift($getParams);

if(! empty($getParams)) {
    $getParams = $getParams[0];
    $getParams = explode('&', $getParams);
    foreach ($getParams as $key => $value) {
        parse_str($value, $arr);
        unset($getParams[$key]);
        $getParams[$key] = $arr;
    }
}

foreach ($getParams as $key => $value) {
    if (is_array($value)) {
        $temporaryKey = key($value);
        if (key_exists($temporaryKey, $getParams)) {
            $secondKey = key($value[$temporaryKey]);
            if (key_exists($secondKey, $getParams[$temporaryKey])) {
                $takeKey = key($value[$temporaryKey][$secondKey]);
                $getParams[$temporaryKey][$secondKey][$takeKey] = $value[$temporaryKey][$secondKey][$takeKey];
            } else {
                $getParams[$temporaryKey][$secondKey] = $value[$temporaryKey][$secondKey];
            }
        } else {
            $getParams[$temporaryKey] = $value[$temporaryKey];
        }
    }
    unset($getParams[$key]);
}


$args = explode('/', $uri);

$controllerName = array_shift($args);

$actionName = array_shift($args);

$dbInstanceName = 'default';

\FPopov\Adapter\Database::setInstance(
    \FPopov\Config\DbConfig::DB_HOST,
    \FPopov\Config\DbConfig::DB_USER,
    \FPopov\Config\DbConfig::DB_PASS,
    \FPopov\Config\DbConfig::DB_NAME,
    $dbInstanceName
);

if (empty($controllerName) && empty($actionName)) {
    $controllerName = DEFAULT_CONTROLLER;
    $actionName = DEFAULT_ACTION;
}

$mvcContext = new \FPopov\Core\MVC\MVCContext($controllerName, $actionName, $self, $args, $getParams);

$app = new \FPopov\Core\Application($mvcContext);

$app->addClass(\FPopov\Core\MVC\MVCContext::class, $mvcContext);
$app->addClass(\FPopov\Adapter\DatabaseInterface::class, \FPopov\Adapter\Database::getInstance($dbInstanceName));
$app->addClass(\FPopov\Core\MVC\SessionInterface::class, new \FPopov\Core\MVC\Session($_SESSION));

$app->registerDependency(\FPopov\Core\ViewInterface::class, \FPopov\Core\View::class);
$app->registerDependency(\FPopov\Services\User\UserServiceInterface::class, \FPopov\Services\User\UserService::class);
$app->registerDependency(\FPopov\Services\Application\EncryptionServiceInterface::class, \FPopov\Services\Application\BCryptEncryptionService::class);
$app->registerDependency(\FPopov\Services\Application\AuthenticationServiceInterface::class, \FPopov\Services\Application\AuthenticationService::class);
$app->registerDependency(\FPopov\Services\Application\ResponseServiceInterface::class, \FPopov\Services\Application\ResponseService::class);
$app->registerDependency(\FPopov\Repositories\User\UserRepositoryInterface::class, \FPopov\Repositories\User\UserRepository::class);
$app->registerDependency(\FPopov\Repositories\Role\RoleRepositoryInterface::class, \FPopov\Repositories\Role\RoleRepository::class);
$app->registerDependency(\FPopov\Repositories\UserRole\UserRoleRepositoryInterface::class, \FPopov\Repositories\UserRole\UserRoleRepository::class);
$app->registerDependency(\FPopov\Services\Application\FileServiceInterface::class, \FPopov\Services\Application\FileService::class);
$app->registerDependency(\FPopov\Services\Book\BookServiceInterface::class, \FPopov\Services\Book\BookService::class);
$app->registerDependency(\FPopov\Repositories\Book\BookRepositoryInterface::class, \FPopov\Repositories\Book\BookRepository::class);
$app->registerDependency(\FPopov\Repositories\BookFormat\FormatRepositoryInterface::class, \FPopov\Repositories\BookFormat\FormatRepository::class);

$app->start();