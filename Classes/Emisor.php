<?php

class Emisor extends XML
{

    public $regimenFiscal;

    //--------quite el protectes para poder accesar al constructor
    public function __construct()
    {
        $this->atributos = [];
        $this->atributos['Nombre'] = '';
        $this->atributos['RegimenFiscal'] = '';
        $this->atributos['Rfc'] = '';
        $this->rules = [];
        $this->rules['Nombre'] = 'R';
        $this->rules['RegimenFiscal'] = 'R';
        //agrege estos atributos por que no exiten en modelo pero si en el vector de ejemplo
        $this->rules['Rfc'] = 'R';

    }

    public function getNode()
    {
        $xml = '<cfdi:Emisor ' . $this->getAtributes() . ' />';
        return $xml;
    }
}
