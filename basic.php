<?php
// Basic extension, https://github.com/schulle4u/yellow-extension-basic

class YellowBasic {
    const VERSION = "0.8.16";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "basic"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="basic") {
            $theme = reset(array_diff($this->yellow->system->getValues("theme"), array("basic")));
            $this->yellow->system->save($fileName, array("theme" => $theme));
        }
    }
}
