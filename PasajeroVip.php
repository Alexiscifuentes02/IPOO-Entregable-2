<?php
class PasajeroVip extends Pasajero{
    private $numViajeroFrecuente;
    private $cantidadMillas;

    // Metodo constructor de la clase PasajeroVip
    public function __construct($nombre,$apellido,$dni,$phone,$nAsiento,$nTicket,$nViajero,$cantMillas){
        parent::__construct($nombre,$apellido,$dni,$phone,$nAsiento,$nTicket);
        $this->numViajeroFrecuente = $nViajero;
        $this->cantidadMillas = $cantMillas;
    }

    // Metodos GET de la clase PasajeroVip
    public function getNumViajero(){
        return $this->numViajeroFrecuente;
    }

    public function getCantMillas(){
        return $this->cantidadMillas;
    }


    // Metodos SET de la clase PasajeroVip
    public function setNumViajero($nViajero){
        $this->numViajeroFrecuente = $nViajero;
    }

    public function setCantMillas($cantMillas){
        $this->cantidadMillas = $cantMillas;
    }

    // Metodos que muestran la informacion de la clase PasajeroVip
    public function __toString(){
        $cadena = parent::__toString();
        return $cadena. "Num Viajero Frecuente: " . $this->getNumViajero() ."\n".
                        "Cant Millas: " . $this->getCantMillas() ."\n";
    }

    // 
    public function modificarPasajero($infoPasajero){
        parent:: modificarPasajero($infoPasajero);
        $this->setNumViajero($infoPasajero["numViajero"]);
        $this->setCantMillas($infoPasajero["cantMillas"]);;
    }


    // Metodo que
    public function darPorcentajeIncremento(){
        $cantMillas = $this->getCantMillas();
        if($cantMillas > 300){
            $porcentajeIncremento = 30;
        }else{
            $porcentajeIncremento = 35;
        }
        return $porcentajeIncremento;
    }
}