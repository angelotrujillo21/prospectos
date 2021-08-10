<?php
require_once 'config.php';
require_once 'vendor/autoload.php';
 
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

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

    public function onMessage(ConnectionInterface $from,  $data)
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

$server = IoServer::factory(
    new HttpServer(new WsServer(new Chat())),
    PORT
);
$server->run();
