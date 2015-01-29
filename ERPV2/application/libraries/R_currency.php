<?php
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class R_currency {
    
    private function get_dolares($monto, $moneda) {
        //$monto = str_replace(',', '', $monto);
        $result = file_get_contents(
            "http://www.google.com/ig/calculator?hl=en&q=$monto$moneda=?USD"
        );
        $result = explode(',', $result);
        $result = explode("\"", $result[1]);
        $result = explode(" ", $result[1]);
        $result = $result[0];
        return(round($result, 2));
    }
    
    public function get_cambio($moneda) {
        $result = file_get_contents("http://rate-exchange.appspot.com/currency?from=$moneda&to=USD");
        $result = explode(':', $result);
        $result = explode(',', $result[2]);
        $result = str_replace(' ', '', $result[0]);
        
        return $result;
    }
}
?>
