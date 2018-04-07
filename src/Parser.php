<?php
    /**
     * PLP - PHP Language Parser
     * 
     * @author  Tianle Xu <xtl@xtlsoft.top>
     * @license MIT
     * @package PLP
     * 
     */

    namespace PL\Parser;

    class Parser {

        protected $rules = [];

        public function addRule($name, $match, $callback, $priority = 50, $fillWithBlank = true){

            @$this->rules[$priority][$name] = ["match" => $match, "callback" => $callback, "fillWithBlank" => $fillWithBlank];
            return $this;

        }

        public function addRules($arr){
            foreach($arr as $v){
                $this->addRule($v[0], $v[1], $v[2], isset($v[3]) ? $v[3] : true);
            }
            return $this;
        }

        public function getRules($priority){

            return $this->rules[$priority];

        }

        public function getPriorities(){

            $arr = [];
            foreach($this->rules as $k=>$v){
                $arr[] = $k;
            }

            return $arr;

        }

        public function parse($code){

            $collection = new \PL\Parser\Utils\ParserCollection($code, $this);

            foreach($this->getPriorities() as $v){
                $rules = $this->getRules($v);
                $parser = $collection->newParser($rules);
                $parser->parse();
            }

            return $collection->getResult();

        }

    }