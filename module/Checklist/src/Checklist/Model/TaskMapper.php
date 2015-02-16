<?php

namespace Checklist\Model;

use Zend\Db\Adapter\Adapter;
use Checklist\Model\TaskEntity;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

class TaskMapper{

	protected $tableName = 'task_item';
	protected $dbAdaptor;
	protected $sql;

	public function __construct(Adapter $dbAdaptor){
		$this->dbAdaptor->$dbAdaptor;
		$this->sql = new Sql($dbAdaptor);
		$this->sql->setTable($this->tableName);
	} 


	public function fetchAll(){
		$select = $this->sql->select();
		$select->order(array('completed ASC','created ASC'));

		$statement = $this->sql->prepreStatementForSqlObject($select);
		$results = $statement->execute();

		$entityPrototype = new TaskEntity();
		$hydrator	new ClassMethods();
		$resultSet = new HydratingResultSet($hydrator, $entityPrototype);
		$resultSet->initialize($results);
		return $results;

	}

}

