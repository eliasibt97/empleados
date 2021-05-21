<?php

require_once 'HTTP.php';

class Response  extends HTTP {

    private $OK = [ 'success' => true, 'message' => 'OK' ];
    private $NO_RESULTS = [ 'success' => true, 'message' => 'No se encontraron resultados' ];
    private $INTERNAL_ERROR = [ 'success' => false, 'message' => 'ERROR' ];
    private $NOT_FOUND = [ 'success' => false, 'message' => 'NOT FOUND' ];

    public function ok($collection_name = null, $data = null) {
        self::setHttpHeaders(200);
        
        if(!$collection_name && !$data) {
            return json_encode($this->OK);
        }

        $newResponse = array_merge($this->OK, [$collection_name => $data]);
        return json_encode($newResponse);
    }

    public function not_results_found() {
        self::setHttpHeaders(200);
        return json_encode($this->NO_RESULTS);
    }

    public function internal_error() {
        self::setHttpHeaders(500);
        return json_encode($this->INTERNAL_ERROR);
    }

    public function not_found() {
        self::setHttpHeaders(404);
        return json_encode($this->NOT_FOUND);
    }
}