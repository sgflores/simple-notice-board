<?php

    require_once( realpath(dirname(__FILE__) . '/BaseModel.php') );

    class Story extends BaseModel {

        public function __construct()
        {
            parent::__construct('stories');
        }
        
    }
