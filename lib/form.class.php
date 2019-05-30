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
    function __construct($conf) {
        
    }
}