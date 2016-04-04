<?php

/**
 * Created by PhpStorm.
 * User: ericl_000
 * Date: 2/27/2016
 * Time: 12:36 PM
 */
class Validator
{
    protected $db;

    protected $errorHandler;

    // Array of Validation rules -- hint: each is a key
    protected $rules = ['required', 'minlength', 'maxlength', 'unique', 'email', 'phone'];


    // Array of Error keys and their corresponding values (messages).
    protected $messages = [
        'required' => 'The :field field is required',
        'minlength' => 'The :field field must be a minimum of :satisfies characters',
        'maxlength' => 'The :field field must be a maximum of :satisfies characters',
        'email' => 'Not a valid email address',
        'unique' => 'That :field already exists',
        'phone' => 'Not a valid phone number'
    ];


    // Constructor for Validator object, with Database object & ErrorHandler object as params
    // set validator database (db) and errorhandler protected fields
    public function __construct(Database $db, ErrorHandler $errorHandler)
    {
        $this->db = $db;
        $this->errorHandler = $errorHandler;
    }

    public function check($items, $rules)
    {
        // foreach passed '$items aliased $item value' or, foreach key value.
        foreach($items as $item => $value)
        {
            // if $items value exists in $rules array (see line 16) -- validate
            if(in_array($item, array_keys($rules)))
            {
                // 'field' key points to $item key,
                // 'value' key points to $value of 'item',
                // 'rules' points to value of rules array at index of $item key.
                // validate - see line 73
                $this->validate([
                    'field' => $item,
                    'value' => $value,
                    'rules' => $rules[$item]
                ]);
            }
        }
        // return this (Validator) object.
        return $this;
    }

    // fails() functions returns the return value of hasErrors() on this (Validator) object's
    // stored errorHandler object.
    public function fails()
    {
        return $this->errorHandler->hasErrors();
    }

    // errors() function returns this (Validator) object's stored errorHandler object.
    public function errors()
    {
        return $this->errorHandler;
    }


    /**
     * @param $item
     */
    public function validate($item)
    {
        // Assign $item (array) 'field' value to $field.
        $field = $item['field'];

        // For each $item (array) stored under 'rules' (alias $rule) key => value (as $satisfies)
        foreach($item['rules'] as $rule => $satisfies)
        {
            // If $rule exists in protected field rules array ($this->rules)
            if(in_array($rule, $this->rules))
            {
                // call_user_func_array(callable $callback, array $parameters_array) - first parameter
                // is equal to the callback (function to be called with the parameters of that callback
                // defined by the second parameter (array) of the call_user_func_array().
                if(!call_user_func_array([$this, $rule], [$field, $item['value'], $satisfies]))
                {
                    // Assign protected error handler field return value of protected function addError(error, key).
                    // First param = str_replace([search for :placeholders], [replace :placeholders with $field
                    // , $satisfies values] , search within protected field messages @ $rule index.
                    $this->errorHandler->addError(
                        str_replace([':field', ':satisfies'],[$field, $satisfies], $this->messages[$rule]),
                        $field
                    );
                }
            }
        }
    }

    // Following functions called by 'call_user_func_array()' function as callbacks with parameters
    // described in array.  See line 84
    protected function required($field, $value, $satisfies)
    {
        return !empty(trim($value));
    }


    protected function minlength($field, $value, $satisfies)
    {
        return mb_strlen($value) >= $satisfies;
    }


    protected function maxlength($field, $value, $satisfies)
    {
        return mb_strlen($value) <= $satisfies;
    }


    protected function email($field, $value, $satisfies)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function phone($field, $value, $satisfies)
    {
        $value = stripslashes(trim($value));
        $pattern = "/\d{3}-\d{3}-\d{4}/";
        return (preg_match($pattern, $value)===1)? true : false;
    }

    protected function unique($field, $value, $satisfies)
    {
        return !$this->db->table($satisfies)->exists([
            $field => $value
        ]);
    }

}