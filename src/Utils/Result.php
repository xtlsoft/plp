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

    class Result {
        
        protected $type;
        protected $data;

        public function __invoke($type, $var){

            $this->type = $type;
            $this->data = $var;

            return $this;

        }

        public function toArray(){

            return [
                "type" => $this->type,
                "data" => $this->data
            ];

        }

    }