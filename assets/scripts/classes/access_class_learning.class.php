<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 17-10-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class access_class_learning {

	private $id; //int(11)

	private $connection;

	//private $connection;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
		$this->connection = new DataBaseMysqlPDOLearning();
    }
    
    public function sanitiseGET ($data) {

		$dataSanitised = array();

		foreach ($data as $key=>$value){

			$sanitisedValue = trim($value);
			//$sanitisedValue = addslashes($sanitisedValue);
			//$sanitisedValue = htmlspecialchars($sanitisedValue);
			//consider htmlentitydecode here, this converts back so &amp to &, special chars & to &amp 
			$dataSanitised[$key] = $sanitisedValue;

		}


		return $dataSanitised;


	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	
    /**
     * Close mysql connection
     */
	public function endaccess_class_learning(){
		$this->connection->CloseMysql();
	}

}