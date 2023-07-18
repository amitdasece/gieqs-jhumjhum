<?php
/*
 * Author: David Tate  - www.endoscopy.wiki
 *
 * Create Date: 28-12-2019
 *
 * DJT 2019
 *
 * License: LGPL
 *
 * use for queries outside of entities
 * joins etc
 * 
 */
require_once 'DataBaseMysqlPDO.class.php';

class queries
{

    

    public function __construct()
    {
        $this->connection = new DataBaseMysqlPDO();
    }

    
    /**
     * 
     * further queries below here
     * 
     */

     /**
      * Return a json array for a select2 element [single]
      */

      public function select2_simplequery($field, $table)
            {
            
            $q = "Select `id`, `$field` from `$table`";
            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn['results'][] = array('id' => $row['id'], 'text' => $row[$field]);
                    //print_r($row);
                }
            
                return json_encode($rowReturn);

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn['result'] = [];
                
                return json_encode($rowReturn);
            }

        }

        /**
      * Return a json array for a select2 element [single]
      */

      public function select2_query($query, $fieldRequired)
      {
      
      $q = "Select $query";
      $result = $this->connection->RunQuery($q);
      $rowReturn = array();
      $x = 0;
      $nRows = $result->rowCount();
      if ($nRows > 0) {

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

              $rowReturn['results'][] = array('id' => $row['id'], 'text' => $row[$fieldRequired]);
              //print_r($row);
          }
      
          return json_encode($rowReturn);

      } else {
          

          //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
          $rowReturn['result'] = [];
          
          return json_encode($rowReturn);
      }

  }
      
  
  public function select2_query_where($query, $fieldRequired, $search)
      {
      
      $q = "Select $query WHERE $fieldRequired LIKE '%{$search}%'";
      $result = $this->connection->RunQuery($q);
      $rowReturn = array();
      $x = 0;
      $nRows = $result->rowCount();
      if ($nRows > 0) {

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

              $rowReturn['results'][] = array('id' => $row['id'], 'text' => $row[$fieldRequired]);
              //print_r($row);
          }
      
          return json_encode($rowReturn);

      } else {
          

          //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
          $rowReturn['result'] = [];
          
          return json_encode($rowReturn);
      }

  }



    /**
     * Close mysql connection
     */
    public function endqueries()
    {
        $this->connection->CloseMysql();
    }

}
