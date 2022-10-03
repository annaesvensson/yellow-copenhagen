<?php
// Copenhagen extension, https://github.com/annaesvensson/yellow-copenhagen

class YellowCopenhagen {
    const VERSION = "0.8.13";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "copenhagen"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="copenhagen") {
            $theme = reset(array_diff($this->yellow->system->getValues("theme"), array("copenhagen")));
            $this->yellow->system->save($fileName, array("theme" => $theme));
        }
    }
}
