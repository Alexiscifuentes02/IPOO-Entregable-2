<?php 
    include_once 'Pasajero.php';
    include_once 'PasajeroEspecial.php';
    include_once 'PasajeroVip.php';
    include_once 'Viaje.php';
    include_once 'ResponsableV.php';

    // Muestra el menu donde se interactua con el usuario
    function menuPrincipal(){
        echo " ____________________________________________________________________________\n";
        echo "|                                Menu Principal:                             |\n";
        echo "|                       1) Cargar informacion del viaje                      |\n";
        echo "|                     2) Modificar informacion del viaje                     |\n";
        echo "|                         3) Ver informacion del viaje                       |\n";
        echo "|                                 4) Salir                                   |\n";
        echo "|____________________________________________________________________________|\n";
        $opc = trim(fgets(STDIN));
        echo "\n";

        return $opc;
    }

    // Menu que se muestra cuando el usuario elige la opcion 2 de la funcion menuPrincipal
    function menu_Modificacion_viaje(){
        echo " ____________________________________________________________________________\n";
        echo "|                        ¿Que desea modificar del viaje?                     |\n";
        echo "|                             1) Cargar nuevo pasajero                       |\n";
        echo "|                                2) El codigo                                |\n";
        echo "|                                3) El destino                               |\n";
        echo "|                      4) La capacidad maxima de pasajeros                   |\n";
        echo "|                        5) Informacion de los pasajeros                     |\n";
        echo "|                        6) Informacion del responsable                      |\n";
        echo "|                                  7) El costo                               |\n";                
        echo "|                               8) Todos sus datos                           |\n";
        echo "|____________________________________________________________________________|\n";
        $opc2 = trim(fgets(STDIN));
        echo "\n";

        return $opc2;
    }

    // Menu que se muestra cuando el usuario elige la opcion 4 de la funcion menu_Modificacion_viaje
    function menuModifInfoPasajero(){
        echo " ____________________________________________________________________________\n";
        echo "|             ¿Que informacion del pasajero desea modificar?                 |\n";
        echo "|                                1) El Nombre                                |\n";
        echo "|                               2) El Apellido                               |\n";
        echo "|                               3) El Telefono                               |\n";
        echo "|                           4) El Numero de Asiento                          |\n";
        echo "|                            5) El Numero de Ticket                          |\n";
        echo "|                             6) Todos sus datos                             |\n";
        echo "|____________________________________________________________________________|\n";
        $opc3 = trim(fgets(STDIN));
        echo "\n";

        return $opc3;
    }

    // Menu que se muestra cuando el usuario elige la opcion 4 de la funcion menu_Modificacion_viaje
    function menuModifInfoPasajeroVip(){
        echo " ____________________________________________________________________________\n";
        echo "|              ¿Que informacion del pasajero VIP desea modificar?            |\n";
        echo "|                                1) El Nombre                                |\n";
        echo "|                               2) El Apellido                               |\n";
        echo "|                               3) El Telefono                               |\n";
        echo "|                           4) El Numero de Asiento                          |\n";
        echo "|                            5) El Numero de Ticket                          |\n";
        echo "|                       6) El Numero de Viajero Frecuente                    |\n";
        echo "|                           7) La Cantidad de Millas                         |\n";
        echo "|                             8) Todos sus datos                             |\n";
        echo "|____________________________________________________________________________|\n";
        $opc4 = trim(fgets(STDIN));
        echo "\n";

        return $opc4;
    }

    // Menu que se muestra cuando el usuario elige la opcion 4 de la funcion menu_Modificacion_viaje
    function menuModifInfoPasajeroEspecial(){
        echo " ____________________________________________________________________________\n";
        echo "|            ¿Que informacion del pasajero especial desea modificar?         |\n";
        echo "|                                1) El Nombre                                |\n";
        echo "|                               2) El Apellido                               |\n";
        echo "|                               3) El Telefono                               |\n";
        echo "|                           4) El Numero de Asiento                          |\n";
        echo "|                            5) El Numero de Ticket                          |\n";
        echo "|                        6) Si Necesita Silla de Ruedas                      |\n";
        echo "|                          7) Si Necesita Asistencia                         |\n";
        echo "|                        8) Si Necesita Comida Especial                      |\n";
        echo "|                             9) Todos sus datos                             |\n";
        echo "|____________________________________________________________________________|\n";
        $opc5 = trim(fgets(STDIN));
        echo "\n";

        return $opc5;
    }    
    

    // Menu que se muestra cuando el usuario elige la opcion 5 de la funcion menu_Modificacion_viaje
    function menu_ModifInfo_responsable(){
        echo " ____________________________________________________________________________\n";
        echo "|               ¿Que informacion del responsable desea modificar?            |\n";
        echo "|                             1) Numero empleado                             |\n";
        echo "|                                 2) Nombre                                  |\n";
        echo "|                                3) Apellido                                 |\n";
        echo "|                             4) Todos sus datos                             |\n";
        echo "|____________________________________________________________________________|\n";
        $opc6 = trim(fgets(STDIN));
        echo "\n";

        return $opc6;
    }
    
    // Metodo que carga los datos del viaje
    function cargarInfoViaje($viaje){
        echo "Ingrese el codigo del viaje: \n";
        $codigo = trim(fgets(STDIN));
        echo "Ingrese el destino del viaje: \n";
        $destino = trim(fgets(STDIN));
        echo "Ingrese el maximo de pasajeros del viaje: \n";
        $maxPasajeros = trim(fgets(STDIN));
        echo "Ingrese el costo del viaje: ";
        $costoViaje = trim(fgets(STDIN));
        $colPasajeros = cargarPasajeros($viaje,$maxPasajeros);

        "\n";
        echo "Informacion del responsable\n";
        echo "Ingrese el numero de empleado del responsable:\n";
        $numEmpleado = trim(fgets(STDIN));
        echo "Ingrese el numero de licencia del responsable:\n";
        $numLicencia = trim(fgets(STDIN));
        echo "Ingrese el nombre del responsable:\n";
        $nombreResponsable = trim(fgets(STDIN));
        echo "Ingrese el apellido del responsable:\n";
        $apellidoResponsable = trim(fgets(STDIN));
        $objResponsable = new responsableV($numEmpleado,$numLicencia,$nombreResponsable,$apellidoResponsable);
        
        // Setea los datos del viaje
        $viaje->setCodigo($codigo);
        $viaje->setDestino($destino);
        $viaje->setCantidadMaxima($maxPasajeros);
        $viaje->setCosto($costoViaje);
        $viaje->setPasajeros($colPasajeros);
        $viaje->setResponsable($objResponsable);

    }

    // Metodo que carga los datos de los pasajeros
    function cargarPasajeros($viaje,$cantMax){
        $pasajeros = array();
        $ingreso = "s";
        $cantPasajeros= 0;
        while($ingreso == "s" && $cantPasajeros <= $cantMax){
            echo "Informacion del pasajero\n";
            echo "Ingrese el nombre del pasajero:\n";
            $nombrePasajero = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero:\n";
            $apellidoPasajero = trim(fgets(STDIN));
            echo "Ingrese el dni del pasajero:\n";
            $dniPasajero = trim(fgets(STDIN));
            echo "Ingrese el telefono del pasajero:\n";
            $telefonoPasajero = trim(fgets(STDIN));
            echo "Ingrese el numero de asiento del pasajero: ";
            $numAsiento = trim(fgets(STDIN));
            echo "Ingrese el numero del ticket del pasajero: ";
            $numTicket = trim(fgets(STDIN));
            echo "Ingrese tipo de pasajero(e: estandar, v: vip, n: necesidades especiales): ";
            $tipoPasajero = trim(fgets(STDIN));

            if($tipoPasajero == "e"){
                $posiblePasajero = new Pasajero($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero,$numAsiento,$numTicket);
            }elseif($tipoPasajero == "v"){
                echo "Ingrese el numero de viajero frecuente del pasajero: ";
                $numViajero = trim(fgets(STDIN));
                echo "Ingrese la cantidad de millas que realizo ya el pasajero: ";
                $cantMillas = trim(fgets(STDIN));
                $posiblePasajero = new PasajeroVip($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero,$numAsiento,$numTicket,$numViajero,$cantMillas);
            }elseif($tipoPasajero == "n"){
                echo "Necesita una silla de ruedas? (Si/No): ";
                $necesidad1 = trim(fgets(STDIN));
                echo "Necesita asistencia para el embarque o desembarque? (Si/No): ";
                $necesidad2 = trim(fgets(STDIN));
                echo "Necesita alguna comida especial a causa de alergias/restricciones alimentarias? (Si/No): ";
                $necesidad3 = trim(fgets(STDIN));
                $posiblePasajero = new PasajeroEspecial($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero,$numAsiento,$numTicket,$necesidad1,$necesidad2,$necesidad3);
            }else{
                echo "OPCION INCORRECTA!! Debe escribir un tipo de pasajero (e/v/n) \n";
            }

            if(($tipoPasajero == "e") || ($tipoPasajero == "v") || ($tipoPasajero == "n")){
                $pagoPasajero = $viaje->venderPasaje($posiblePasajero);
                if($pagoPasajero > 0 && $ingreso == "s"){
                    echo "El precio del pasaje que abona el pasajero es $" . $pagoPasajero . "\n";
                    $cantPasajeros = $viaje->cantPasajeros();
                }else{
                    mensajePasajeroNoCargado($pagoPasajero);
                }
            }
            echo "\nDesea ingresar otro pasajero? (s/n): ";
            $ingreso = trim(fgets(STDIN));
            echo "\n";
        }
        if($cantPasajeros == $cantMax){
            echo "Se llego a la capacidad maxima de pasajeros!! \n";
        }
        $pasajeros = $viaje->getPasajeros();
        return $pasajeros;
    }



    
    // Metodo que modifica los datos del viaje
    function modificarViaje($elViaje){
        switch(menu_Modificacion_viaje()){
            case 1:
                pasajeroNuevo($elViaje);
            break;
            case 2:
                echo "Codigo actual: ".$elViaje->getCodigo()."\n";
                echo "Ingrese el nuevo codigo para cambiarlo:\n";
                $nCodigo = trim(fgets(STDIN));
                $elViaje->setCodigo($nCodigo);
                echo "El codigo se cambio correctamente\n";
            break;
            case 3:
                echo "Destino actual: ".$elViaje->getDestino()."\n";
                echo "Ingrese el nuevo destino para cambiarlo:\n";
                $nDestino = trim(fgets(STDIN));
                $elViaje->setDestino($nDestino);
                echo "El destino se cambio correctamente\n";
            break;
            case 4:
                echo "Capacidad maxima actual: ".$elViaje->getCantidadMaxima()."\n";
                echo "Ingrese la nueva capacidad maxima para cambiarla:\n";
                $nCapacidadMaxima = trim(fgets(STDIN));
                $elViaje->setCantidadMaxima($nCapacidadMaxima);
                echo "La capacidad maxima se cambio correctamente\n";
            break;
            case 5:
                tipoPasajero($elViaje);
            break;
            case 6:
                modificarInfoResponsable($elViaje);
            break;
            case 7:
                echo $elViaje->getCosto() . " es el costo actual \n";
                echo "Se cambiara a: ";
                $nuevoCosto = trim(fgets(STDIN));
                $elViaje->setCosto($nuevoCosto);
                echo "Se cambio correctamente a " . $elViaje->getCosto() . "\n";
            break;
            case 8:
                echo $elViaje->getCodigo() . " es el codigo actual \n";
                echo "Se cambiara a: ";
                $nuevoCodigo = trim(fgets(STDIN));
                echo $elViaje->getDestino() . " es el destino actual \n";
                echo "Se cambiara a: ";
                $nuevoDestino = trim(fgets(STDIN));
                echo $elViaje->getCantidadmaxima() . " es la capacidad maxima actual \n";
                echo "Se cambiara a: ";
                $nuevaCantMax = trim(fgets(STDIN));
                echo $elViaje->getCosto() . " es el costo actual \n";
                echo "Se cambiara a: ";
                $nuevoCosto = trim(fgets(STDIN));
                $elViaje->modificarViaje($nuevoCodigo,$nuevoDestino,$nuevaCantMax,$nuevoCosto);
                tipoPasajero($elViaje);
                modificarInfoResponsable($elViaje);
            break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 7) \n";
            break;
        }
    }

    // Metodo que modifica la informacion del pasajero estandar
    function modificarInfoPasajero($unPasajero){
        switch(menuModifInfoPasajero()){
            case 1:
                echo $unPasajero->getNombre() . " es el nombre actual \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                $unPasajero->setNombre($nuevoNombre);
                echo "Se cambio correctamente a " . $unPasajero->getNombre() . "\n";
            break;
            case 2:
                echo $unPasajero->getApellido() . " es el apellido actual \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                $unPasajero->setApellido($nuevoApellido);
                echo "Se cambio correctamente a " . $unPasajero->getApellido() . "\n";
            break;
            case 3:
                echo $unPasajero->getTelefono() . " es el telefono actual \n";
                echo "Se cambiara a: ";
                $nuevoTelefono = trim(fgets(STDIN));
                $unPasajero->setTelefono($nuevoTelefono);
                echo "Se cambio correctamente a " . $unPasajero->getTelefono() . "\n";
            break;
            case 4:
                echo $unPasajero->getNumAsiento() . " es el numero de asiento actual \n";
                echo "Se cambiara a: ";
                $nuevoNumAsiento = trim(fgets(STDIN));
                $unPasajero->setNumAiento($nuevoNumAsiento);
                echo "Se cambio correctamente a " . $unPasajero->getNumAsiento() . "\n";
            break;
            case 5:
                echo $unPasajero->getNumTicket() . " es el numero de ticket actual \n";
                echo "Se cambiara a: ";
                $nuevoNumTicket = trim(fgets(STDIN));
                $unPasajero->setNumTicket($nuevoNumTicket);
                echo "Se cambio correctamente a " . $unPasajero->getNumTicket() . "\n";
            break;
            case 6:
                echo $unPasajero->getNombre() . " es el nombre actual \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                echo $unPasajero->getApellido() . " es el apellido actual \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                echo $unPasajero->getTelefono() . " es el telefono actual \n";
                echo "Se cambiara a: ";
                $nuevoTelefono = trim(fgets(STDIN));
                echo $unPasajero->getNumAsiento() . " es el numero de asiento actual \n";
                echo "Se cambiara a: ";
                $nuevoNumAsiento = trim(fgets(STDIN));
                echo $unPasajero->getNumTicket() . " es el numero de ticket actual \n";
                echo "Se cambiara a: ";
                $nuevoNumTicket = trim(fgets(STDIN));

                $informacionPasajero = ["nombre" => $nuevoNombre,"apellido" => $nuevoApellido,"telefono" => $nuevoTelefono,
                                        "numAsiento" => $nuevoNumAsiento,"numTicket" => $nuevoNumTicket];
                $unPasajero->modificaInfoPasajero($informacionPasajero);
                echo "\nSe cambiaron correctamente los datos: \n";
                $unPasajero->__toString();
                break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 6) \n";
            break;
        }
    }


    // Metodo que modifica la informacion del pasajero vip
    function modificarInfoPasajeroVip($unPasajero){
        switch(menuModifInfoPasajeroVip()){
            case 1:
                echo $unPasajero->getNombre() . " es el nombre actual \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                $unPasajero->setNombre($nuevoNombre);
                echo "Se cambio correctamente a " . $unPasajero->getNombre() . "\n";
            break;
            case 2:
                echo $unPasajero->getApellido() . " es el apellido actual \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                $unPasajero->setApellido($nuevoApellido);
                echo "Se cambio correctamente a " . $unPasajero->getApellido() . "\n";
            break;
            case 3:
                echo $unPasajero->getTelefono() . " es el telefono actual \n";
                echo "Se cambiara a: ";
                $nuevoTelefono = trim(fgets(STDIN));
                $unPasajero->setTelefono($nuevoTelefono);
                echo "Se cambio correctamente a " . $unPasajero->getTelefono() . "\n";
            break;
            case 4:
                echo $unPasajero->getNumAsiento() . " es el numero de asiento actual \n";
                echo "Se cambiara a: ";
                $nuevoNumAsiento = trim(fgets(STDIN));
                $unPasajero->setNumAiento($nuevoNumAsiento);
                echo "Se cambio correctamente a " . $unPasajero->getNumAsiento() . "\n";
            break;
            case 5:
                echo $unPasajero->getNumTicket() . " es el numero de ticket actual \n";
                echo "Se cambiara a: ";
                $nuevoNumTicket = trim(fgets(STDIN));
                $unPasajero->setNumTicket($nuevoNumTicket);
                echo "Se cambio correctamente a " . $unPasajero->getNumTicket() . "\n";
            break;
            case 6:
                echo $unPasajero->getNumViajero() . " es el numero de viajero actual \n";
                echo "Se cambiara a: ";
                $nuevoNumViajero = trim(fgets(STDIN));
                $unPasajero->setNumViajero($nuevoNumViajero);
                echo "Se cambio correctamente a " . $unPasajero->getNumViajero() . "\n"; 
            break;
            case 7:
                echo $unPasajero->getCantMillas() . " es la cantidad de millas actual \n";
                echo "Se cambiara a: ";
                $nuevaCantMillas = trim(fgets(STDIN));
                $unPasajero->setCantMillas($nuevaCantMillas);
                echo "Se cambio correctamente a " . $unPasajero->getCantMillas() . "\n"; 
            break;
            case 8:
                echo $unPasajero->getNombre() . " es el nombre actual \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                echo $unPasajero->getApellido() . " es el apellido actual \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                echo $unPasajero->getTelefono() . " es el telefono actual \n";
                echo "Se cambiara a: ";
                $nuevoTelefono = trim(fgets(STDIN));
                echo $unPasajero->getNumAsiento() . " es el numero de asiento actual \n";
                echo "Se cambiara a: ";
                $nuevoNumAsiento = trim(fgets(STDIN));
                echo $unPasajero->getNumTicket() . " es el numero de ticket actual \n";
                echo "Se cambiara a: ";
                $nuevoNumTicket = trim(fgets(STDIN));
                echo $unPasajero->getNumViajero() . " es el numero de viajero actual \n";
                echo "Se cambiara a: ";
                $nuevoNumViajero = trim(fgets(STDIN));
                echo $unPasajero->getCantMillas() . " es la cantidad de millas actual \n";
                echo "Se cambiara a: ";
                $nuevaCantMillas = trim(fgets(STDIN));

                $informacionPasajero = ["nombre" => $nuevoNombre,"apellido" => $nuevoApellido,"telefono" => $nuevoTelefono,
                                        "numAsiento" => $nuevoNumAsiento,"numTicket" => $nuevoNumTicket,"numViajero" => $nuevoNumViajero,
                                        "cantMillas" => $nuevaCantMillas];
                $unPasajero->modificaInfoPasajero($informacionPasajero);
                echo "\nSe cambiaron correctamente los datos: \n";
                $unPasajero->__toString();
                break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 8) \n";
            break;
            }
    }

    // Metodo que modifica la informacion del pasajero especial
    function modificarInfoPasajeroEspecial($unPasajero){
        switch(menuModifInfoPasajeroEspecial()){
            case 1:
                echo $unPasajero->getNombre() . " es el nombre actual \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                $unPasajero->setNombre($nuevoNombre);
                echo "Se cambio correctamente a " . $unPasajero->getNombre() . "\n";
            break;
            case 2:
                echo $unPasajero->getApellido() . " es el apellido actual \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                $unPasajero->setApellido($nuevoApellido);
                echo "Se cambio correctamente a " . $unPasajero->getApellido() . "\n";
            break;
            case 3:
                echo $unPasajero->getTelefono() . " es el telefono actual \n";
                echo "Se cambiara a: ";
                $nuevoTelefono = trim(fgets(STDIN));
                $unPasajero->setTelefono($nuevoTelefono);
                echo "Se cambio correctamente a " . $unPasajero->getTelefono() . "\n";
            break;
            case 4:
                echo $unPasajero->getNumAsiento() . " es el numero de asiento actual \n";
                echo "Se cambiara a: ";
                $nuevoNumAsiento = trim(fgets(STDIN));
                $unPasajero->setNumAiento($nuevoNumAsiento);
                echo "Se cambio correctamente a " . $unPasajero->getNumAsiento() . "\n";
            break;
            case 5:
                echo $unPasajero->getNumTicket() . " es el numero de ticket actual \n";
                echo "Se cambiara a: ";
                $nuevoNumTicket = trim(fgets(STDIN));
                $unPasajero->setNumTicket($nuevoNumTicket);
                echo "Se cambio correctamente a " . $unPasajero->getNumTicket() . "\n";
            break;
            case 6:
                echo $unPasajero->getSillaRuedas() . " es el estado actual de la silla de ruedas \n";
                echo "Se cambiara a (Si/No): ";
                $estadoSillaRuedas = trim(fgets(STDIN));
                $unPasajero->setSillaRuedas($estadoSillaRuedas);
                echo "Se cambio correctamente a " . $unPasajero->getSillaRuedas() . "\n";
            break;
            case 7:
                echo $unPasajero->getAsistencia() . " es el estado actual de la asistencia \n";
                echo "Se cambiara a (Si/No): ";
                $estadoAsistencia = trim(fgets(STDIN));
                $unPasajero->setAsitencia($estadoAsistencia);
                echo "Se cambio correctamente a " . $unPasajero->getAsistencia() . "\n";
            break;
            case 8:
                echo $unPasajero->getComidaEspecial() . " es el estado actual de la comida especial \n";
                echo "Se cambiara a (Si/No): ";
                $estadoComidaEspecial = trim(fgets(STDIN));
                $unPasajero->setComidaEspecial($estadoComidaEspecial);
                echo "Se cambio correctamente a " . $unPasajero->getComidaEspecial() . "\n";
            case 9:
                echo $unPasajero->getNombre() . " es el nombre actual \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                echo $unPasajero->getApellido() . " es el apellido actual \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                echo $unPasajero->getTelefono() . " es el telefono actual \n";
                echo "Se cambiara a: ";
                $nuevoTelefono = trim(fgets(STDIN));
                echo $unPasajero->getNumAsiento() . " es el numero de asiento actual \n";
                echo "Se cambiara a: ";
                $nuevoNumAsiento = trim(fgets(STDIN));
                echo $unPasajero->getNumTicket() . " es el numero de ticket actual \n";
                echo "Se cambiara a: ";
                $nuevoNumTicket = trim(fgets(STDIN));
                echo $unPasajero->getSillaRuedas() . " es el estado actual de la silla de ruedas \n";
                echo "Se cambiara a (Si/No): ";
                $estadoSillaRuedas = trim(fgets(STDIN));
                echo $unPasajero->getAsistencia() . " es el estado actual de la asistencia \n";
                echo "Se cambiara a (Si/No): ";
                $estadoAsistencia = trim(fgets(STDIN));
                echo $unPasajero->getComidaEspecial() . " es el estado actual de la comida especial \n";
                echo "Se cambiara a (Si/No): ";
                $estadoComidaEspecial = trim(fgets(STDIN));
                $informacionPasajero = ["nombre" => $nuevoNombre,"apellido" => $nuevoApellido,"telefono" => $nuevoTelefono,
                                        "numAsiento" => $nuevoNumAsiento,"numTicket" => $nuevoNumTicket,"sillaRuedas" => $estadoSillaRuedas,
                                        "asistencia" => $estadoAsistencia,"comidaEspecial" => $estadoComidaEspecial];
                $unPasajero->modificaInfoPasajero($informacionPasajero);
                echo "\nSe cambiaron correctamente los datos: \n";
                $unPasajero->__toString();
            break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 9) \n";
            break;
        }
    }


    // Funcion que modifica la informacion del responsable
    function modificarInfoResponsable($elViaje){
        $responsable = $elViaje->getResponsable();
        switch(menu_ModifInfo_responsable()){
            case 1:
                echo $responsable->getEmpleado() . " es el numero de empleado \n";
                echo "Se cambiara a: ";
                $nuevoNumEmpleado = trim(fgets(STDIN));
                $responsable->setEmpleado($nuevoNumEmpleado);
                echo "Se cambio correctamente a " . $responsable->getEmpleado() . "\n";
            break;
            case 2:
                echo $responsable->getNombre() . " es el nombre \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                $responsable->setNombre($nuevoNombre);
                echo "Se cambio correctamente a " . $responsable->getNombre() . "\n";
            break;
            case 3:
                echo $responsable->getApellido() . " es el apellido \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                $responsable->setApellido($nuevoApellido);
                echo "Se cambio correctamente a " . $responsable->getApellido() . "\n";
            break;
            case 4:
                echo $responsable->getEmpleado() . " es el numero de empleado \n";
                echo "Se cambiara a: ";
                $nuevoNumEmpleado = trim(fgets(STDIN));
                echo $responsable->getNombre() . " es el nombre \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                echo $responsable->getApellido() . " es el apellido \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                $responsable->modificarResponsable($nuevoNumEmpleado,$nuevoNombre,$nuevoApellido);
                echo "Se cambiaron correctamente los datos \n";
            break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 4) \n";
            break;
        }
    }

    // Metodo que verifica el tipo pasajero 
    function tipoPasajero($viaje){
        $totalPasajeros = $viaje->cantPasajeros();
        $pasajeros = $viaje->getPasajeros();
        echo "En el viaje hay " . $totalPasajeros . " pasajeros \n";
        echo $viaje->mostrarDatos_pasajeros();
        echo "Ingrese el dni del pasajero que quiere modificar su informacion: ";
        $dniPasajero = trim(fgets(STDIN));
        $indPasaj = $viaje->buscarPasajero($dniPasajero);

        if($indPasaj != -1){
            $pasajero = $pasajeros[$indPasaj];
            if($pasajero instanceof Pasajero){
                modificarInfoPasajero($pasajero);
            }elseif($pasajero instanceof PasajeroVIP){
                modificarInfoPasajeroVip($pasajero);
            }elseif($pasajero instanceof PasajeroEspecial){
                modificarInfoPasajeroEspecial($pasajero);
            }
        }else{
            echo "No existe un pasajero con ese nro de documento!! \n";
        }
    }


    // Metodo que muestra un cartel distinto cuando no se pueden cargar los pasajeros
    function mensajePasajeroNoCargado($costo){
        if($costo == 0){
            echo "\n" .
             "No se pudo cargar el pasajero, ya esta registrado ese Dni!!! \n";
        }
        if($costo == -1){
            echo "\n" .
             "No se pudo cargar el pasajero, no hay mas pasajes!!! \n";
        }
    }


    // Metodo que agrega un nuevo pasajero al viaje
    function pasajeroNuevo($elViaje){
        echo "Ingrese el nombre del pasajero: ";
        $nombrePasajero = trim(fgets(STDIN));
        echo "Ingrese el apellido del pasajero: ";
        $apellidoPasajero = trim(fgets(STDIN));
        echo "Ingrese el dni del pasajero: ";
        $dniPasajero = trim(fgets(STDIN));
        echo "Ingrese el telefono del pasajero: ";
        $telefonoPasajero = trim(fgets(STDIN));
        echo "Ingrese el numero de asiento del pasajero: ";
        $numAsiento = trim(fgets(STDIN));
        echo "Ingrese el numero del ticket del pasajero: ";
        $numTicket = trim(fgets(STDIN));
        echo "Ingrese tipo de pasajero(e: estandar, v: vip, n: necesidades especiales): ";
        $tipoPasajero = trim(fgets(STDIN));

        if($tipoPasajero == "e"){
            $posiblePasajero = new Pasajero($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero,$numAsiento,$numTicket);
        }elseif($tipoPasajero == "v"){
            echo "Ingrese el numero de viajero frecuente del pasajero: ";
            $numViajero = trim(fgets(STDIN));
            echo "Ingrese la cantidad de millas que realizó ya el pasajero: ";
            $cantMillas = trim(fgets(STDIN));
            $posiblePasajero = new PasajeroVip($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero,$numAsiento,$numTicket,$numViajero,$cantMillas);
        }elseif($tipoPasajero == "n"){
            echo "Necesita una silla de ruedas?: (s/n)";
            $necesidad1 = trim(fgets(STDIN));
            echo "Necesita asistencia para el embarque o desembarque?: (s/n)";
            $necesidad2 = trim(fgets(STDIN));
            echo "Necesita alguna comida especial a causa de alergias/restricciones alimentarias?: (s/n)";
            $necesidad3 = trim(fgets(STDIN));
            $posiblePasajero = new PasajeroEspecial($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero,$numAsiento,$numTicket,$necesidad1,$necesidad2,$necesidad3);
        }else{
            echo "OPCION INCORRECTA!! Debe escribir un tipo de pasajero (e/v/n) \n";
        }

        if(($tipoPasajero == "e") || ($tipoPasajero == "v") || ($tipoPasajero == "n")){
            $pagoPasajero = $elViaje->venderPasaje($posiblePasajero);
            if($pagoPasajero > 0){
                echo "\nSe cargo el nuevo pasajero!! \n";
                echo "El precio del pasaje que abona el pasajero es $" . $pagoPasajero . "\n";
            }else{
                mensajePasajeroNoCargado($pagoPasajero);
            }
        }    
    }

    
    
    
    //MENU PRINCIPAL
    $objViaje = new Viaje(0,"",0,[],"",0,0);
    do{
        $opcion = menuPrincipal();
        switch($opcion){
            case 1:
                if($objViaje->getCodigo() > 0){
                    echo "Ya se cargaron los datos!! Debe modificarlos o cargar un nuevo pasajero\n";
                }else{
                    cargarInfoViaje($objViaje);
                    echo "\n Se cargo correctamente la informacion!! \n";
                    echo "\n";
                }
            break;
            case 2:
                if($objViaje->getCodigo() == 0){
                    echo "No es posible!! Primero debe ingresar los datos del viaje (Opcion 1) \n";
                }else{
                    modificarViaje($objViaje);
                }
            break;
            case 3:
                if($objViaje->getCodigo() == 0){
                    echo "No es posible!! Primero debe ingresar los datos del viaje (Opcion 1) \n";
                }else{
                    echo $objViaje->__toString();
                }
            break;
            case 4:
                echo "FIN PROGRAMA\n";
            break;
            default:
                echo "ERROR! Ingrese una opcion del 1 al 4\n";
            break;
        }
    }while($opcion != 4);
    