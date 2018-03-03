<?php
    /**
     * PLP - PHP Language Parser
     * 
     * @author  Tianle Xu <xtl@xtlsoft.top>
     * @license MIT
     * @package PLP
     * 
     */

    namespace PL\Parser\Utils;

    class Parser {

        protected $rules = [];
        protected $collection = null;

        public function __construct($rules, $collection){

            $this->rules = $rules;
            $this->collection = $collection;

        }

        public function parseCallback($match, $rule, $collection){

            $result = call_user_func($rule['callback'], $this, $collection, $match, new \PL\Parser\Utils\Result());
            

        }

    }