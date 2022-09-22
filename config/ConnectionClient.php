<?php

    include_once 'UniversalConnect.php';

    class ConnectClient
    {
        public $connectInfo;

        public function __construct()
        {
            $this->connectInfo = (new UniversalConnect)->doConnect();

        }
    }
