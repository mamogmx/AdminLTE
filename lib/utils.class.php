<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class utils{
    static function loadCss($files){
        $text = <<<EOT
        <link rel="stylesheet" href="%s">        
EOT;
        for($i=0;$i<count($files);$i++){
            if(is_array($files[$i])){
                $html = sprintf($text,implode(DIRECTORY_SEPARATOR,$files[$i]));
            }
            else{
                $html = $files[$i];
            }
            print $html;
        }
        return;
    }
    static function loadJs($files){
        $text = <<<EOT
        <script src="%s"></script>        
EOT;
        for($i=0;$i<count($files);$i++){
            if(is_array($files[$i])){
                $html = sprintf($text,implode(DIRECTORY_SEPARATOR,$files[$i]));
            }
            else{
                $html = $files[$i];
            }
            print $html;
        }
        return;
    }
    static function loadMenu($menuFile="",$menuList=Array(),$params){
        if (!file_exists($menuFile)){
            $message = <<<EOT
<div class="alert alert-danger alert-dismissible">Menu File $menuFile not found!</div>             
EOT;
            echo $message;
            return;
        }
        $text = file_get_contents($menuFile);
        $menu = json_decode($text, true);
        $noList = (!is_array($menuList) || empty($menuList))?(1):(0);
        foreach($menu as $k=>$v){
            $r[] = self::getMenuItem($v,$menuList,$params);
        } 
        $html = implode("\n",$r);
        print $html;
    }
    
    function getMenuItem($obj,$menuList=Array(),$params){
        $title = $obj["title"];
        $icon = ($obj["icon"])?("fa fa-".$obj["icon"]):("fa");
        $prms = json_encode($obj["params"]);
        $pratica = $params["pratica"];
        $app = $params["app"];
        $action=($obj["action"] && $obj["action"]!='#')?("/$app/$pratica/".$obj["action"]):('#');
        $noList = (!is_array($menuList) || empty($menuList))?(1):(0);
        if (array_key_exists('submenu',$obj)){
            
            $res = Array();
            foreach($obj["submenu"] as $key=>$val){
                //echo "<pre><p>Considero il nodo $title</p>";print_r($val);echo "</pre>";
                if ($noList || in_array($key, $menuList)){
                    $res[] = self::getMenuItem($val,$menuList,$params);
                }
                
            }
            $menuItems = implode("\n",$res);
            $menuItem=<<<EOT
<li class="treeview">
    <a href="#">
        <i class="$icon"></i> 
        <span>$title</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        $menuItems
    </ul>
</li>
EOT;
            return $menuItem;
        }
        else{
            //print "<p>Considero Foglia $title</p>";
            $menuItem=<<<EOT
<li>
    <a href="$action" data-plugin="menuItem" data-params="$prms">
        <i class="$icon"></i> <span>$title</span>
    </a>
</li>
EOT;
            return $menuItem;
        }
    }
}