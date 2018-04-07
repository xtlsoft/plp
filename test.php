<?php

    require_once "vendor/autoload.php";

    $parser = new \PL\Parser\Parser;

    $parser->addRule("plus", "/(.+)\+(.+)/", function ($util, $collection, $parser, $match, $result) {
        return $result(
            "Expr_Plus",
            [
                "left" => $parser -> parse($match[1]) [0],
                "right" => $parser -> parse($match[2]) [0]
            ]
        );
    });

    $parser->addRule("minus", "/(.+)\-(.+)/", function ($util, $collection, $parser, $match, $result) {
        return $result(
            "Expr_Minus",
            [
                "left" => $parser -> parse($match[1]) [0],
                "right" => $parser -> parse($match[2]) [0]
            ]
        );
    });

    $parser->addRule("integer", "/([0-9]+)/", function($util, $collection, $parser, $match, $result){
        return $result(
            "Const_Integer",
            $match[1]
        );
    });

    @ob_start();
    echo json_encode($parser->parse("1 + 2 + 3 + 4 - 10"), JSON_PRETTY_PRINT);
    file_put_contents("test.txt", ob_get_clean());