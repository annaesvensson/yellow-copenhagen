<?php
// Basic extension, https://github.com/markseu/yellow-basic
// Copyright (c) 2019 Example Name
// This file may be used and distributed under the terms of the public license.

class YellowBasic {
    const VERSION = "0.8.6";
    const TYPE = "theme";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreSettingDir").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "basic"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="basic") {
            $theme = reset(array_diff($this->yellow->extensions->getExtensions("theme"), array("basic")));
            $this->yellow->system->save($fileName, array("theme" => $theme));
        }
    }
}
