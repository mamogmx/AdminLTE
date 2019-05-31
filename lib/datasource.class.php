<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dataSource{
    var $dbh;
    var $dataDir;
    var $wsUrl;
    function __construct($source="",$mode="DB") {
        if ($mode=='DB'){
            try{
                $this->dbh = new PDO($dsn);
            }
            catch(Exception $e){
                $this->dbh = null;
            }
        }
        if ($mode == 'JSON'){
            if (is_dir($source)){
                $this->dataDir = $dir;
            }
        }
        $this->dataDir = $dir;
        $this->wsUrl = $ws;
    }
    function getDBData($table,$filter,$params){
        $result = Array("success"=>1,"data"=>Array(),"message"=>Array());
        $sql = ($filter)?("SELECT * FROM $table WHERE $filter"):("SELECT * FROM $table");
        $stmt = $this->dbh->prepare($sql);
        if ($stmt->execute(Array($params))){
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result["data"] = $res;
        }
        else{
            $result["success"] = 0;
            $result["message"] = $stmt->errorInfo();
        }
        return $result;
    }
}
?>