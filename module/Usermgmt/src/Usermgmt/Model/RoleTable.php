<?php
namespace Usermgmt\Model;
use Zend\Db\TableGateway\TableGateway;

class RoleTable{

	protected $tableGateway;

	public function __construct(TableGateway $tableGateway){
		$this->tableGateway = $tableGateway;
 	}


 	public function fetchAll(){
 		$resultSet = $this->tableGateway->select();
 		return $resultSet;
 	}



 	public function getRole($id){
 		$id = (int) $id;
 		$rowSet	= $this->tableGateway->select(array('id' => $id));
 		$row = $rowSet->current();
 		if(!$row){
 			throw new \Exception("Could not find row with id ", $id);
 		}
 		return $row;
 	}

 	public function saveRole(Role $role){
 		$data = array(
 			'name'=>$role->name,
 		);

 		$id = (int)$role->id;
 		if($id==0){
 			$this->tableGateway->insert($data);
 		}else{
 			if($this->getRole($id)){
 				$this->tableGateway->update($data,array('id'=>$id));
 			}else{
 				throw new Exception("Role doesnot exist", 1);
 				
 			}
 		}
 	}


 	public function deleteRole($id){
 		$id = (int) $id;
 		$this->tableGateway->delete(array('id'=>$id));
 	}
}
