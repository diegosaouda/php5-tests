<?php
header('Content-Type: text/html; charset=utf-8');
require_once('../../vendor/autoload.php');
use Symfony\Component\DomCrawler\Crawler;

class Cn
{
    private $crawler;
    private $content;

    public function __construct($content)
    {
        $this->crawler = new Crawler($content);
        $this->content = $content;
    }

    public function getListaPregoes()
    {
        $lista = [];
        $cols = ['pregao', 'uasg', 'nm_usag', 'dt_inicio_envio_proposta', 'dt_fim_envio_proposta', 'info_pregao'];


        $table = $this->crawler->filter('table.td tbody tr');
        foreach ($table as $keyTr => $tr) {
            $tr = new Crawler($tr);
            foreach ($tr->filter('td') as $keyTd => $td) {
                $lista[$keyTr][$cols[$keyTd]] = trim($td->nodeValue);
            }
        }

        return $lista;
    }

    public function getQuantidadePregoes()
    {
        $raw = $this->crawler->filter('#QtdPregoes')->text();
        return preg_replace('/[^0-9]/', '', $raw);
    }
}

$content = file_get_contents('cn.html'); //simula web curl
$cn = new Cn($content);
Zend\Debug\Debug::dump($cn->getQuantidadePregoes(), 'getQuantidadePregoes');
Zend\Debug\Debug::dump($cn->getListaPregoes(), 'getListaPregoes');