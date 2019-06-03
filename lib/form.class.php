<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$templateEdit = Array(
    
);
$templateEdit["input"] =<<<EOT
<label for="$name-id">$label</label>   
<input type="$type" class="$className" name="$name" id="$name-id" value="$value" $html5Attr/>        
EOT;
$templateEdit["date"] =<<<EOT
<label for="$name-id">$label</label>
<div class="input-group date">
    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    <input type="text" class="form-control" data-plugins="datepicker" name="$name" id="$name-id" placeholder="$place_holder" value="$value" $html5Attr>
</div>
EOT;
$templateEdit["select"] =<<<EOT
<label for="$name-id">$label</label>         
<select class="$className" name="$name" id="$name-id" $html5Attr>
    $options
</select>        
EOT;
$templateEdit["textarea"] =<<<EOT
<label for="$name-id">$label</label>            
<textarea class="$className" name="$name" id="$name-id" value="$value" $html5Attr>
    $value
</textarea>        
EOT;

class form{
    var $dsn;
    var $table;
    var $mode;
    var $data;
    
    static function getConf($conf,$mode="view") {
        if (!file_exists($conf)){
            return -1;
        }
        $text = file_get_contents($conf);
        $data = json_decode($text, true);
        if (!array_key_exists($mode, $data)){
            return -5;
        }
        $table = $data["table"];
        $source= $data["data-source"];
        $dsn=($data[$dsn])?($data["dsn"]):(DSN);
        $d = $data[$mode];
        $dsn = ($d["dsn"])?($d["dsn"]):($dsn);
        $table = ($d["table"])?($data["table"]):($table);
        for($i=0;$i<count($d["sections"]);$i++){
            self::getSections($d["sections"][$i]);
        }
    }
    static function getSections(){
        
    }
    static function getRow(){
        
    }
}