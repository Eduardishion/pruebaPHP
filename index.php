<?php

include_once './CFDI.php';

class Main
{
    private $cfdi_xml;
    private $array_data = [
        "Comprobante" => [
            "LugarExpedicion" => "64000",
            "TipoDeComprobante" => "i",
            "Moneda" => "MXN",
            "SubTotal" => "100",
            "Total" => "116",
            "FormaPago" => "01",
            "NoCertificado" => "00000010101010101",
            "Fecha" => "2021-10-06 11:00:00"
        ],
        "Emisor" => [
            "Rfc" => "TME960709LR2",
            "Nombre" => "Tracto Camiones s.a de c.v",
            "RegimenFiscal" => "612"
        ]
    ];

    //cambie la visibilidad de constructor
    function __construct()
    {
        $this->cfdi_xml = new CFDI;
    }
    //elimine el static
    final public function createXML()
    {

        //Obtener el XML por medio de la clase XML
        foreach ($this->array_data as $key => $value) :
            //quite la negacion para comprobar que es comporbante
                if($key == (string) 'Comprobante'){
                    foreach ($value as $attribute => $value2) :
                        //Setear attributos
                        //echo (">>>>>>".$attribute);
                        $this->cfdi_xml->comprobante->setAtribute($attribute, $value2);
                    endforeach;
                }else{
                    if($key == (string) 'Emisor'){
                        foreach ($value as $attribute2 => $value3) :
                            //Setear attributos
                            //echo (">>>>>>".$attribute2);
                            $this->cfdi_xml->emisor->setAtribute($attribute2, $value3);
                        endforeach;
                    }
                }
        endforeach;

        //ver los atributos seteados
        echo($this->cfdi_xml->comprobante->getAtributes());
        //crear formato xml
        echo($this->cfdi_xml->getNode());


    //para ver los atributos
/*
        $valoresC = $this->cfdi_xml->comprobante->atributos;
        foreach ( $valoresC  as $key3 => $val) {
            echo("\n");
            print "$key3 = $val ";
        }

        echo("\n");
        echo ("------------");

        $valoresE = $this->cfdi_xml->emisor->atributos;
        foreach ( $valoresE  as $key4 => $val) {
            echo("\n");
            print "$key4 = $val ";
        }

        echo("\n");
        echo ("////////////////////////////////////////");
        //$this->cfdi_xml->comprobante->getAtributes();
        $valoresC = $this->cfdi_xml->comprobante->atributos;
        foreach ( $valoresC  as $key3 => $val) {
            echo("\n");
            print "$key3 = $val ";
        }
*/

    }
}

try {
    $main = new Main;
    $main->createXML();
} catch (\Exception $error) {
    echo $error->getMessage();
}
