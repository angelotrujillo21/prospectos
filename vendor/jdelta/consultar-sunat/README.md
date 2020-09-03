# Consultar Sunat
Módulo para realizar consultas a SUNAT mediante el numero de RUC o DNI

# Instalación:
```ruby
composer require jdelta/consultar-sunat
````
# Uso:
```php
use ConsultarSunat\SearchService;

$service = new SearchService();
$ruc = "20169004359";
$dni = "44274795";

$result1 = $service->search($ruc);
$result2 = $service->search($dni);

var_dump($result1);
var_dump($result2);

if ($result1->success == true) {
    echo "Empresa: " . $result1->result->RazonSocial;
}

if ($result2->success == true) {
    echo "Persona: " . $result1->result->RazonSocial;
}

// Mostrar en formato XML/JSON
echo $result1->json();
echo $result1->xml('empresa');
````
# Creditos:
Josue Mazco Puma
https://github.com/jossmp/sunatphp