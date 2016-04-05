<?php

    /**
     * Created by PhpStorm.
     * User: ericl_000
     * Date: 3/12/2016
     * Time: 6:19 PM
     */
    class CommCouncil
    {
        protected $database;

        protected $table = 'citycouncil';

        // private $tables_allowed = ['citycouncil','mainmotion',];

        public function __construct(Database $database)
        {
            $this->database = $database;
        }

        public function getCouncilID($City)
        {
            $temp = $this->database->table($this->table)->like('City',$City);
            if($temp->count()){
                $temp = $temp->first();
                return json_encode(['city_id' => $temp->CouncilID]);
            }
            return false;
        }

//        public function getCouncilMembers()
//        {
//            $this
//        }
    }