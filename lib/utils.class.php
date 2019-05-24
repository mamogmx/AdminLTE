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
    static function loadMenu($menuFile="",$menuList=Array()){
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
            
        foreach($menu as $key1=>$val1){
            $title = $val1["title"];
            $icon = ($val1["icon"])?("fa fa-".$val1["icon"]):("fa");
            $params = json_encode(Array());
            if (!array_key_exists('submenu', $val1)){
                //echo "<div class='alert alert-info'>".$v["title"]." è senza submenu</div>";
                if ($noList || in_array($key1, $menuList)){
                    $menuItem=<<<EOT
<li class="treeview">
    <a href="#" data-plugin="menuItem" data-params="$params">
        <i class="$icon"></i> <span>$title</span>
    </a>
</li>
EOT;
                
                    print $menuItem;
                }
            }
            else{
                $found = array_intersect(array_keys($val1["submenu"]), $menuList);
                if ($noList || count($found)>0){
                    $title = $val1["title"];
                    $icon = ($val1["icon"])?("fa fa-".$val1["icon"]):("fa");
                    $params = json_encode(Array());
                    $menuItem=<<<EOT
<li class="treeview">
    <a href="#" data-plugin="menuItem" data-params="$params">
        <i class="$icon"></i> <span>$title</span>
    </a>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
EOT;
                    print $menuItem;
                    foreach($val1["submenu"] as $key2=>$val2){
                        
                    }
                    print "</li>";
                }
            }        
            
        } //print("<div class='alert alert-info'>".$v["title"]."</div>");
    }
}