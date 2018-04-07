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

        public function parseCallback($match, $rule){

            $result = call_user_func($rule['callback'], $this, $this->collection, $this->collection->getParser(), $match, new \PL\Parser\Utils\Result());
            
            $this->collection->addResult($result->toArray());

        }

        public function parse(){

            $parser = $this;

            foreach($this->rules as $rule){

                $this->collection->setCode(preg_replace_callback($rule["match"], function($match) use ($parser, $rule){
                    $parser->parseCallback($match, $rule);
                    if($rule['fillWithBlank']){
                        return "";
                    }else{
                        return $match[0];
                    }
                }, $this->collection->getCode()));

            }

        }

    }