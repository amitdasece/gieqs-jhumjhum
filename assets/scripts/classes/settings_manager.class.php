<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 26-10-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class settings_manager {

	private $id; //int(11)
	private $connection;

	public function __construct(){
        require_once 'DatabaseMyssqlPDOLearning.class.php';
		$this->connection = new DataBaseMysqlPDOLearning();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */

    public function live_blog_toggle(){


        $q = "SELECT `live_blog` FROM `global_settings` WHERE `id` = 1";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			
                        $live = $row['live_blog'];


				}

                if ($live == 1){

                    //set 0

                    $q = "UPDATE `global_settings` SET `live_blog` = '0' WHERE `id` = '1'";

		
                    $stmt = $this->connection->RunQuery($q); 
                    echo 'Live Blog Deactivated';             


                }

                if ($live == 0){

                    //set 0

                    $q = "UPDATE `global_settings` SET `live_blog` = '1' WHERE `id` = '1'";

		
                    $stmt = $this->connection->RunQuery($q); 
                    echo 'Live Blog Activated';             


                }


    }




    }

    public function isBlogActive(){

        $q = "SELECT `live_blog` FROM `global_settings` WHERE `id` = 1";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			
                        $live = $row['live_blog'];


				}


        if ($live == 1){


            return true;
        }else if ($live == 0){


            return false;
        }

            

    }

}






	
	public function endsettings_manager(){
		$this->connection->CloseMysql();
	}

}