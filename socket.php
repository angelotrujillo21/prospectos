<?php
require_once 'config.php';
require_once 'vendor/autoload.php';

use React\Socket\Server;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use React\EventLoop\Factory;
use React\Socket\SecureServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;
    protected $users;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        // $this->users[$conn->resourceId] = $conn;
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        // unset($this->users[$conn->resourceId]);
    }

    public function onMessage(ConnectionInterface $from, $data)
    {
        $from_id = $from->resourceId;
        $data = json_decode($data);
        $type = $data->type;
        $message = $data->message;
        $from->send(json_encode(array("type" => $type, "msg" => $message)));
        foreach ($this->clients as $client) {
            if ($from != $client) {
                $client->send(json_encode(array("type" => $type, "msg" => $message)));
            }
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
    }
}

// $server = IoServer::factory(
//     new HttpServer(new WsServer(new Chat())),
//     PORT
// );

// $server->run();

$loop = React\EventLoop\Factory::create();
$webSock = new React\Socket\Server('0.0.0.0:8090', $loop);
$webSock = new React\Socket\SecureServer($webSock, $loop, [
    'local_cert'        => '/etc/pki/tls/certs/ssl/www_qhaway_pe.crt', // path to your cert
    'local_pk'          => '/etc/pki/tls/certs/ssl/www.qhaway.pe.key', // path to your server private key
    'allow_self_signed' => FALSE, // Allow self signed certs (should be false in production)
    'verify_peer' => FALSE
]);
$webServer = new Ratchet\Server\IoServer(
    new Ratchet\Http\HttpServer(
        new Ratchet\WebSocket\WsServer(
            new Chat()
        )
    ),
    $webSock,
    $loop
);

$webServer->run();
