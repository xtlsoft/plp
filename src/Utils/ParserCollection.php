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

    class ParserCollection {

        protected $code;
        protected $result = [];
        protected $parser = [];

        public function __construct($code, $parser){

            $this->code = $code;
            $this->parser = $parser;

        }

        public function getCode(){

            return $this->code;

        }

        public function setCode($code){

            $this->code = $code;

            return $this;

        }

        public function getParser(){

            return $this->parser;
            
        }

        public function addResult($rslt){

            $this->result[] = $rslt;

            return $this;

        }

        public function getResult(){

            return $this->result;

        }

        public function newParser($rules){

            return new \PL\Parser\Utils\Parser($rules, $this);

        }

    }