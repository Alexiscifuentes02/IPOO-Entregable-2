<?php
class Viaje{
    private $codigoViaje;
    private $destinoViaje;
    private $maximoPasajeros;
    private $arrayPasajeros;
    private $objResponsable;
    private $costo;
    private $sumaCostos;

    // Metodo constructor de la clase viaje
    public function __construct($codigo,$destino,$cantMaxima,$responsable,$importe,$sumaImportes){
        $this->codigoViaje = $codigo;
        $this->destinoViaje = $destino;
        $this->maximoPasajeros = $cantMaxima;
        $this->arrayPasajeros = [];
        $this->objResponsable = $responsable;
        $this->costo = $importe;
        $this->sumaCostos = $sumaImportes;
    }

    // Metodos GET de la clase viaje
    public function getCodigo(){
        return $this->codigoViaje;
    }

    public function getDestino(){
        return $this->destinoViaje;
    }

    public function getCantidadMaxima(){
        return $this->maximoPasajeros;
    }

    public function getPasajeros(){
        return $this->arrayPasajeros;
    }

    public function getResponsable(){
        return $this->objResponsable;
    }

    public function getCosto(){
        return $this->costo;
    }

    public function getSumaCostos(){
        return $this->sumaCostos;
    }


    // Metodos SET de la clase viaje
    public function setCodigo($codigo){
        $this->codigoViaje = $codigo;
    }

    public function setDestino($destino){
        $this->destinoViaje = $destino;
    }

    public function setCantidadMaxima($cantMaxima){
        $this->maximoPasajeros = $cantMaxima;
    }

    public function setPasajeros($pasajeros){
        $this->arrayPasajeros = $pasajeros;
    }

    public function setResponsable($responsable){
        $this->objResponsable = $responsable;
    }

    public function setCosto($costo){
        $this->costo = $costo;
    }

    public function setSumaCostos($sumaCostos){
        $this->sumaCostos = $sumaCostos;
    }


    // Metodos que muestran la informacion de la clase viaje
    public function __toString(){
        return "Viaje Feliz :)\n".
               "Codigo de viaje: ".$this->getCodigo()."\n".
               "Destino: ".$this->getDestino()."\n".
               "Cantidad maxima de personas: ".$this->getCantidadMaxima()."\n".
               "Pasajeros: \n" .$this->mostrarPasajeros().
               "Responsable \n".$this->getResponsable();
    }


    // Metodo que muestra los pasajeros
    public function mostrarPasajeros(){
        $colPasajeros = $this->getPasajeros();
        $cadena = "";
        $nroPasajero = 0;
        for($i=0;$i<count($colPasajeros);$i++){
            $nroPasajero++;
            $pasajero = $colPasajeros[$i];
            $cadena = $cadena."Pasajero: ".$nroPasajero.":\n".$pasajero."\n";
        }
        return $cadena;
    }

    // Metodo que cuenta la cantidad de pasajeros
    public function cantPasajeros(){
        $cantPasajeros = count($this->getPasajeros());
        return $cantPasajeros;
    }


    // Metodo que busca a un pasajero
    public function buscarPasajero($documento){
        $arrPasajeros = $this->getPasajeros();
        $encontrado = false;
        $i = 0;
        while($i<$this->cantPasajeros() && !$encontrado){
            $unPasajero = $arrPasajeros[$i];
            if($unPasajero->getDocumento() == $documento){
                $encontrado = true;
            }else{
                $i++;
            }
        }
        if(!$encontrado){
            $i = -1;
        }
        return $i;
    }

    // Metodo que verifica si el pasajero se encuentra en el viaje
    public function pasajeroYaCargado($doc){
        if($this->buscarPasajero($doc) != -1){
            $pasajCargado = true;
        }else{
            $pasajCargado = false;
        }
        return $pasajCargado;
    }


    // Modifica la informacion del viaje
    public function modificarViaje($codigo,$destino,$cantMaxima){
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantidadmaxima($cantMaxima);
    }

    //
    public function venderPasaje($objPasajero){
        $colPasajeros = $this->getPasajeros();
        if($this->cantPasajeros() == 0){
            array_push($colPasajeros,$objPasajero);
            $this->setPasajeros($colPasajeros);
            $costo = $this->getCosto();
            $porcentaje = $objPasajero->darPorcentajeIncremento();
            $costoFinal = $costo + ($costo * $porcentaje) / 100;
            $this->setSumaCostos($this->getSumaCostos() + $costoFinal);
        }else{
            $pasajeDisponible = $this->hayPasajesDisponible();
            $pasajeroCargado = $this->pasajeroYaCargado($objPasajero->getDni());
            if($pasajeDisponible){
                if(!$pasajeroCargado){
                    array_push($colPasajeros,$objPasajero);
                    $this->setPasajeros($colPasajeros);
                    $costo = $this->getCosto();
                    $porcentaje = $objPasajero->darPorcentajeIncremento();
                    $costoFinal = $costo + ($costo * $porcentaje) / 100;
                    $this->setSumaCostos($this->getSumaCostos() + $costoFinal);
                }else{
                    $costoFinal = -1;
                }
            }else{
                $costoFinal = 0;
            }
        }
        return $costoFinal;
    }


    // Metodo que retorna true o false dependiendo de la cant de pasajeros
    public function hayPasajesDisponible(){
        $cantPasajeros = $this->cantPasajeros();
        if($cantPasajeros < $this->getCantidadmaxima()){
            $hayPasaje = true;
        }else{
            $hayPasaje = false; 
        }
        return $hayPasaje;
    }
}