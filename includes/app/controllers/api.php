<?php

namespace controllers;

/**
 * 
 */
class Api_controller extends wController implements iController {

    /**
     * creates new instance of self and parent
     */
    function Api_controller() {

    }

    /**
     * Perform the action in the URI
     */
    public function doAction() {
        switch($this->getAction()) {
            default:
                break;
        }
    }

public function __toString() {
	
}

}

?>