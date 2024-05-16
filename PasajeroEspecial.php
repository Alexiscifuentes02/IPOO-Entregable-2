<?php 
class PasajeroEspecial extends Pasajero{
    private $sillaRuedas;
    private $asistencia;
    private $comidaEspecial;

    // Metodo constructor de la clase PasajeroEspecial
    public function __construct($nombre,$apellido,$dni,$phone,$nAsiento,$nTicket,$sillaRuedas,$asistencia,$comidaEspecial){
        parent:: __construct($nombre,$apellido,$dni,$phone,$nAsiento,$nTicket);
        $this->sillaRuedas = $sillaRuedas;
        $this->asistencia = $asistencia;
        $this->comidaEspecial = $comidaEspecial;
    }


    // Metodos GET de la clase PasajeroEspecial
    public function getSillaRuedas(){
        return $this->sillaRuedas;
    }
    public function getAsistencia(){
        return $this->asistencia;
    }
    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }


    // Metodos SET de la clase PasajeroEspecial
    public function setSillaRuedas($sillaRuedas){
        $this->sillaRuedas = $sillaRuedas;
    }
    public function setAsistencia($asistencia){
        $this->asistencia = $asistencia;
    }
    public function setComidaEspecial($comidaEspecial){
        $this->comidaEspecial = $comidaEspecial;
    }


    // Metodos que muestran la informacion de la clase PasajeroEspecial
    public function __toString(){
        $cadena = parent:: __toString();
        return $cadena . "   Necesita? " . "\n" .
               "    Silla de Ruedas: " . $this->getSillaRuedas() . "\n" .
               "    Asistencia: " . $this->getAsistencia() . "\n" .
               "    Comida Especial: " . $this->getComidaEspecial() . "\n";
    }

    public function modificaInfoPasajero($infoPasajero){
        parent:: modificaInfoPasajero($infoPasajero);
        $this->setSillaRuedas($infoPasajero["sillaRuedas"]);
        $this->setAsistencia($infoPasajero["asistencia"]);
        $this->setComidaEspecial($infoPasajero["comidaEspecial"]);;
    }


    //Metodo que retorna el porcentaje que debe aplicarse como incremento
    public function darPorcentajeIncremento(){
        $sillaRuedas = $this->getSillaRuedas();
        $asistencia = $this->getAsistencia();
        $comidaEspecial = $this->getComidaEspecial();
        $necesidades = 0;
        if($sillaRuedas == "si" && $asistencia == "si" && $comidaEspecial == "si"){
            $porcentajeIncremento = 30;
        }else{
            $porcentajeIncremento = 15;
        }
        return $porcentajeIncremento;
    }


}