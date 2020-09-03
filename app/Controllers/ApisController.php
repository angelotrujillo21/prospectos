<?php

namespace Application\Controllers;

use Exception;
use ConsultarSunat\SearchService as SearchService;
use Application\Core\Controller as Controller;

class ApisController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function dni($dni)
    {
        try {
            /* Primero busco en sunat servicio gratiuto si no esta busco en la api de paga */
            $service = new SearchService();
            $busqueda  = $service->search($dni);
            if ($busqueda->success === true) {
                $response  = ["razonSocial" => $busqueda->result->razon_social];
                $this->json(array("success" => $response));
            } else {
                $busqueda = $this->getApiDev('dni', $dni);
                if ($busqueda->success === true) {
                    $response = ["razonSocial" => $busqueda->data->nombre_completo];
                    $this->json(array("success" => $response));
                } else {
                    $this->json(array("error" => 'No se encontro a la persona.'));
                }
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }



    public function getApiDev($type, $numero)
    {
        $token = "97998724bbd9aaa9cf8cdc7db419bb1f9016072ce8d7cbd02ad20315e74d0a7d";
        $ch    = curl_init("https://apiperu.dev/api/" . $type . "/" . $numero); // Initialise cURL
        $authorization = "Authorization: Bearer " . $token; // Prepare the authorisation token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization)); // Inject the token into the header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // This will follow any redirects
        $result = curl_exec($ch); // Execute the cURL statement
        curl_close($ch); // Close the cURL connection
        return json_decode($result); // Return the received data
    }


    public function ruc($ruc)
    {
        try {
            /* Primero busco en sunat servicio gratiuto si no esta busco en la api de paga */
            $service = new SearchService();
            $busqueda  = $service->search($ruc);
            if ($busqueda->success === true) {
                $response = ["razonSocial" => $busqueda->result->razon_social, "direccion" => $busqueda->result->direccion];
                $this->json(array("success" => $response));
            } else {
                $busqueda = $this->getApiDev('ruc', $ruc);
                if ($busqueda->success === true) {
                    $response = ["razonSocial" => $busqueda->data->nombre_o_razon_social, "direccion" => $busqueda->data->direccion_completa];
                    $this->json(array("success" => $response));
                } else {
                    $this->json(array("error" => 'No se encontro a la persona o empresa.'));
                }
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
