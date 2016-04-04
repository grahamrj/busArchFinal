<?php

    /**
     * Created by PhpStorm.
     * User: ericl_000
     * Date: 3/12/2016
     * Time: 6:19 PM
     */
    class CommCouncil
    {
        protected $db;

        public function __construct(Database $db)
        {
            $this->db = $db;
        }


        public function getCouncilMembers()
        {

        }
    }