<?php
// Basic extension, https://github.com/schulle4u/yellow-extension-basic
// Copyright (c) 2020 Example Name
// This file may be used and distributed under the terms of the public license.

class YellowBasic {
    const VERSION = "0.8.8";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreSettingDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "basic"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="basic") {
            $theme = reset(array_diff($this->yellow->system->getValues("theme"), array("basic")));
            $this->yellow->system->save($fileName, array("theme" => $theme));
        }
    }
}
