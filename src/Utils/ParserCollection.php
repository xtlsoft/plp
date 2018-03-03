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

        public function newParser($rules){

            return new \PL\Parser\Utils\Parser($rules, $this);

        }

    }