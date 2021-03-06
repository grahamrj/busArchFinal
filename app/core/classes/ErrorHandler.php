<?php

    /**
     * Created by PhpStorm.
     * User: ericl_000
     * Date: 2/27/2016
     * Time: 12:36 PM
     */
    class ErrorHandler
    {
        protected $errors;

        public function addError($error, $key = null)
        {
            if ($key) {
                $this->errors[$key][] = $error;
            } else {
                $this->errors[] = $error;
            }
        }

        public function hasErrors()
        {
            return count($this->all()) ? true : false;
        }

        public function has($key)
        {
            return isset($this->errors[$key]);
        }

        public function all($key = null)
        {
            return isset($this->errors[$key]) ? $this->errors[$key] : $this->errors;
        }

        public function first($key = null)
        {
            return isset($this->all()[$key][0]) ? $this->all()[$key][0] : false;
        }
    }