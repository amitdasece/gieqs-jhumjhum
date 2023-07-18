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
     * Close mysql connection
     */
    public function endqueries()
    {
        $this->connection->CloseMysql();
    }

}
