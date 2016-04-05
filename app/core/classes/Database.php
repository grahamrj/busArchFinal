<?php

    /**
     * Created by PhpStorm.
     * User: ericl_000
     * Date: 2/22/2016
     * Time: 8:32 PM
     */
    class Database
    {
        protected $host;

        protected $dbname;

        protected $dbuser;

        protected $dbpass;

        protected $table;

        protected $method;

        protected $stmt;

        protected $pdo;

        protected $user_array;

        public $debug = true;

        protected $usrID;


        /**
         * Database constructor.
         */
        public function __construct()
        {
            // Get rid of ini file assignments of protected members.
            $config = parse_ini_file("config.ini");
            $this->host = $config['host'];
            $this->dbname = $config['dbname'];
            $this->dbuser = $config['dbuser'];
            $this->dbpass = $config['dbpass'];

            try {
                $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->dbuser, $this->dbpass);

                if ($this->debug) {
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            } catch (PDOException $e) {
                die($this->debug ? $e->getMessage() . ' ' . $e->getTraceAsString() : 'cool');
            }
        }


        /**
         * @param $sql
         * @return \PDOStatement
         */
        public function query($sql)
        {
            return $this->pdo->query($sql);
        }


        public function method($method)
        {
            $this->method = $method;
            return $this;
        }


        /**
         * @param $table
         * @return $this
         */
        public function table($table)
        {
            $this->table = $table;
            return $this;
        }


        /**
         * @param $data
         * @return bool
         */
        public function insert($data)
        {
            try {
                $keys = array_keys($data);

                //Generate fields and placeholders
                $fields = '`' . implode('`, `', $keys) . '`';
                $placeholders = ':' . implode(', :', $keys);

                // SQL insert statement
                $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholders})";

                $this->stmt = $this->pdo->prepare($sql);

                return $this->stmt->execute($data);

            } catch (Exception $error) {
                print_r('<pre>' . $error->getTraceAsString() . ' ' . $error->getMessage() . '</pre>');
            }
            return new Exception("Your insert Exploded");
        }

// UPDATE THIS PIECE OF ....
//    public function update($data,$where)
//    {
//        $d_keys = array_keys($data);
//        $w_keys = array_keys($where);
//
//        //Generate fields and placeholders
//        $d_field = '`' . implode('`, `', $keys) . '`';
//        $d_placeholder = ':' . implode(', :', $keys);
//
//        // SQL insert statement
//        $sql = "{$this->method}" . $temp = ($this->method==="INSERT")? " INTO " : " " ."{$this->table} SET {$field} = {$placeholder} WHERE ";
//
//        $this->stmt = $this->pdo->prepare($sql);
//
//        return $this->stmt->execute($data);
//
//    }
        /**
         * @param $field
         * @param $operator
         * @param $value
         * @return $this
         */
        public function where($field, $operator, $value)
        {
            $sql = "SELECT * FROM {$this->table} WHERE {$field} {$operator} :value";

            $this->stmt = $this->pdo->prepare($sql);

            $this->stmt->execute([':value' => $value]);

            return $this;
        }


        public function like($field, $value)
        {
            $sql = "SELECT * FROM {$this->table} WHERE `{$field}` LIKE ?";
            $param = ["%$value%"];
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($param);

            return $this;
        }


        /**
         * @param $field_1
         * @param $operator_1
         * @param $value_1
         * @param $field_2
         * @param $operator_2
         * @param $value_2
         * @return $this
         */
        public function whereAnd($field_1, $operator_1, $value_1, $field_2, $operator_2, $value_2)
        {

            $field_1 = '`' . trim($field_1) . '`';
            $field_2 = '`' . trim($field_2) . '`';

            $sql = "SELECT * FROM {$this->table} WHERE {$field_1} {$operator_1} :val_1 AND {$field_2} {$operator_2} :val_2";

            $this->stmt = $this->pdo->prepare($sql);

            // Bind first and second values
            $this->stmt->bindParam(':val_1', $value_1);
            $this->stmt->bindParam(':val_2', $value_2);

            $this->stmt->execute();

            return $this;
        }


        /**
         * @param $field
         * @param $value
         * @param $userName
         */
        public function updateStatus($value, $userName)
        {
            $sql = "UPDATE {$this->table} SET `IsActive` = :value WHERE `UserName` = :UserName";

            $this->stmt = $this->pdo->prepare($sql);

            $this->stmt->bindParam(':value', $value);
            $this->stmt->bindParam(':UserName', $userName);

            $this->stmt->execute();
        }


        /**
         * @param $council_id
         * @return string
         */
        public function getCouncilMembers($council_id)
        {
            // $sql = "SELECT usr_id, usr_userName, usr_fName, usr_lName, usr_login_active FROM  WHERE council_id=:council_id ORDER BY usr_id ASC";

            $sql = "SELECT `AcctID`,`UserName`,`FName`,`LName`,`IsActive` FROM {$this->table} WHERE CouncilID = :council_id";

            $this->stmt = $this->pdo->prepare($sql);

            // Bind parameter, specifying it's data type using PDO::PARAM_*
            $this->stmt->bindParam(':council_id', $council_id, PDO::PARAM_INT);

            $this->stmt->execute();

            $members_array = [];

            while ($member = $this->stmt->fetchObject()) {
                $members_array[] = [
                    'UserName' => $member->UserName,
                    'FName'    => $member->FName,
                    'LName'    => $member->LName,
                    'IsActive' => $member->IsActive
                ];
            }

            return json_encode($members_array);
        }


        /**
         * @param $data
         * @return bool
         */
        public function exists($data)
        {
            $field = array_keys($data)[0];

            return $this->where($field, '=', $data[$field])->count() ? true : false;
        }


        /**
         * @return mixed
         */
        public function count()
        {
            return $this->stmt->rowCount();
        }


        /**
         * @return mixed
         */
        public function get()
        {
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }


        /**
         * @return mixed
         */
        public function first()
        {
            return $this->get()[0];
        }


    }