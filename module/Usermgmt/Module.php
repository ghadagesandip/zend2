<?php
namespace Usermgmt;

use Usermgmt\Model\Role;
use Usermgmt\Model\RoleTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {

        return array(
            'factories'=>array(
                  'Usermgmt\Model\RoleTable' =>  function($sm) {
                     $tableGateway = $sm->get('RoleTableGateway');
                     $table = new RoleTable($tableGateway);
                     return $table;
                 },
                 'RoleTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Role());
                    return new TableGateway('role', $dbAdapter, null, $resultSetPrototype);
                },
            ),
            
        );
    }
}
