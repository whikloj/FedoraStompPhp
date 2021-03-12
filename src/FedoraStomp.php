<?php

namespace whikloj\fedoraStompPhp;

use Stomp\Client;
use Stomp\StatefulStomp;

class FedoraStomp {

    private $client = null;

    public function __construct($brokerUri, $topicName)
    {
      $client = new Client($brokerUri);
      $this->client = new StatefulStomp($client);
      $this->client->subscribe($topicName);
    }

    public function listen()
    {
      while (($frame = $this->client->read()) === false) {
        // wait for a message nothing
      }
      print "Message received:\n";
      print "Headers are: " . var_export($frame->getHeaders(), TRUE) . "\n";
      print "Body is: " . $frame->getBody() . "\n";
      $this->client->unsubscribe();
    }
}
