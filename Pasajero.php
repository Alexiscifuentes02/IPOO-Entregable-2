<?php
    class Pasajero{
        private $nombrePasajero;
        private $apellidoPasajero;
        private $documento;
        private $telefono;
        private $numAsiento;
        private $numTicket;

        // Constructor de la clase pasajero
        public function __construct($nombre,$apellido,$dni,$phone,$nAsiento,$nTicket){
            $this->nombrePasajero = $nombre;
            $this->apellidoPasajero = $apellido;
            $this->documento = $dni;
            $this->telefono = $phone;
            $this->numAsiento = $nAsiento;
            $this->numTicket = $nTicket;
        }

        // Metodos GET de la clase pasajero
        public function getNombre(){
            return $this->nombrePasajero;
        }

        public function getApellido(){
            return $this->apellidoPasajero;
        }

        public function getDocumento(){
            return $this->documento;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function getNumAsiento(){
            return $this->numAsiento;
        }

        public function getNumTicket(){
            return $this->numTicket;
        }


        // Metodos SET de la clase pasajero
        public function setNombre($nombre){
            $this->nombrePasajero = $nombre;
        }

        public function setApellido($apellido){
            $this->apellidoPasajero = $apellido;
        }

        public function setDocumento($dni){
            $this->documento = $dni;
        }

        public function setTelefono($phone){
            $this->telefono = $phone;
        }

        public function setNumAsiento($nAsiento){
            $this->numAsiento = $nAsiento;
        }

        public function setNumTicket($nTicket){
            $this->numTicket = $nTicket;
        }

        // Metodos que muestran la informacion de la clase pasajero
        public function __toString(){
            return "Nombre: ".$this->getNombre()."\n".
                    "Apellido: ".$this->getApellido()."\n".
                    "Documento: ".$this->getDocumento()."\n".
                    "Telefono: ".$this->getTelefono()."\n". 
                    "Num Asiento: ".$this->getNumAsiento(). "\n" .
                    "Num Ticket: ".$this->getNumTicket(). "\n";
        }

        // Modifica la informacion del pasajero
        public function modificarPasajero($infoPasajero){
            $this->setNombre($infoPasajero["nombre"]);
            $this->setApellido($infoPasajero["apellido"]);
            $this->setTelefono($infoPasajero["telefono"]);
            $this->setNumAsiento($infoPasajero["numAsiento"]);
            $this->setNumTicket($infoPasajero["numTicket"]);
        }

        // Metodo que retorna el porcentaje que debe aplicarse como incremento
        public function darPorcentajeIncremento(){
            $porcentajeIncremento = 10;
            return $porcentajeIncremento;
        } 

    }