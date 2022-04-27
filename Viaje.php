<?php
class Viaje
{
    //Atributos privados
    private $codigo;
    private $destino;
    private $cantMaximaPasajeros;
    private $colPasajeros;


    public function __construct($pCodigo, $pDestino, $pCantMaxPasajeros)
    {
        $this->codigo = $pCodigo;
        $this->destino = $pDestino;
        $this->cantMaximaPasajeros = $pCantMaxPasajeros;
        $this->colPasajeros = [];
    }
    //get
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getCantMaximaPasajeros()
    {
        return $this->cantMaximaPasajeros;
    }
    public function getColPasajeros()
    {
        return $this->colPasajeros;
    }
    //set
    public function setCodigo($pCodigo)
    {
        $this->codigo = $pCodigo;
    }
    public function setDestino($pDestino)
    {
        $this->destino = $pDestino;
    }
    public function setCantMaxPasajeros($pCantMaxPasajeros)
    {
        $this->cantMaximaPasajeros = $pCantMaxPasajeros;
    }
    public function setColPasajeros($colPasajeros)
    {
        $this->colPasajeros = $colPasajeros;
    }
    //metodos
    public function mostrarDatosDePasajeros()
    {
        $losPasajeros = "";
        $colPasa = $this->getColPasajeros();
        for ($i = 0; $i < count($colPasa); $i++) {
            $losPasajeros = $losPasajeros . "\n-Pasajero" . ($i) . "--";
            $losPasajeros = $losPasajeros . $colPasa[$i]["nombre"] . "" . $colPasa[$i]["apellido"] . "DNI: " . $colPasa[$i]["documento"] . "\n";
        }
        return $losPasajeros;
    }
    function buscarPasajero($pnrodoc)
    {
        $indice = -1;
        foreach ($unViaje->getColPasajeros() as $indice => $elemento) {
            if ($elemento["documento"] == $pnrodoc) {
                $indice = $indice;
            }
        }
        return $indice;
    }

    function modificarPasajero($punViaje, $pnrodoc, $pmodnrodoc, $pnombre, $papellido)
    {
        $arregloDePasajeros = $punViaje->getColPasajeros();
        $i = 0;
        $seEncontro = false;
        while ($i < count($arregloDePasajeros) && !$seEncontro) {
            $unPasajero = $arregloDePasajeros[$i];
            $seEncontro = $unPasajero["documento"] == $pnrodoc;
            $i = $i + 1;
        }
        if ($seEncontro) {
            $modPasajero = ["nombre" => $pnombre, "apellido" => $papellido, "documento" => $pmodnrodoc];
            $arregloDePasajeros[$i - 1] = $modPasajero;
            $punViaje->setColPasajeros($arregloDePasajeros);
        }
        return $punViaje;
    }
    //toString
    public function __toString()
    {
        return "Codigo de viaje. " . $this->getCodigo() . "\n Destino del viaje: " . $this->getDestino() . "\n Cantidad maxima de pasajeros" . $this->getCantMaximaPasajeros() . "\n Pasajeros: " . $this->mostrarDatosDePasajeros();
    }
}
