<?php

class Monitor
{

    /**
     * Tempo de espera para nova verificação se um processamento já foi terminado
     */
    const WAIT_FINISH = 10;

    /**
     * @var MongoClient
     */
    private $mongoClient;

    private $collection;

    public function __construct(MongoClient $mongo)
    {
        $this->mongoClient = $mongo;
        $this->mongodb = $this->mongoClient->monitor;
        $this->collection = $this->mongodb->monitor;
    }

    /**
     * Inicializa um monitoramento, mas aguarda até outro finalizar
     * @param string $name Nome do monitoramento (processo)
     */
    public function waitForBegin($name)
    {
        while($this->hasProcessamento($name)) {
            echo "Aguardando na fila ...";
            sleep(self::WAIT_FINISH);
        }

        $this->begin($name);
    }

    public function hasProcessamento($name)
    {
        $row = $this->collection->findOne(array('collection' => $name));

        if (!$row) {
            return false;
        }
        
        return (bool)$row['processando'];
    }

    public function begin($name)
    {
        $this->createOrUpdateMonitor(array(
            'collection' => $name,
            'data_inicio' => date('Y-m-d H:i:s'),
            'processando' => (int) true,
            'error' => (int) false,
            'error_message' => '',
        ));
    }

    public function end($name, $error = false)
    {
        $this->createOrUpdateMonitor(array(
            'collection' => $name,
            'data_fim' => date('Y-m-d H:i:s'),
            'processando' => (int) false,
            'error' => (int) $error,
            'error_message' => '',
        ));
    }

    private function createOrUpdateMonitor(array $data)
    {
        $where = array('collection' => $data['collection']);
        $options = array('upsert' => true);
        $this->collection->update($where, $data, $options);
    }

} 