<?php
require_once(__DIR__ . '/../../../vendor/autoload.php');

/*
 1. preg_match_all('/<tr>(..*?)<\/tr>/', $this->html, $matches);
 2. preg_match_all('/<td.*?>(.*?)<\/td>/', $htmlTd, $matches);
 3. preg_match_all('/<span.*?>(.*?)<\/span>/', $listaHtml[1], $matches);
*/

class Itens
{
    private $html;
    private $itens = array();

    public function __construct($html)
    {
        $this->html = $html;
        $this->match();
    }

    private function match()
    {
        preg_match_all('/<span.*?>(.*?)<\/span>/', $this->html, $matches);

        $count = 0;
        $i = 0;
        
        $keys = array('nm_item', 'txt_complementar');
        $totalKeys = count($keys);            

        foreach ($matches[1] as $span) {
            $key = $keys[$count];

            switch($key) {
                case 'nm_item':
                    $this->itens[$i]['nu_item'] = $this->matchNuItem($span);
                    $this->itens[$i]['nm_item'] = $this->matchNmItem($span);  
                    break;

                default: 
                    $this->itens[$i][$key] = $this->br2nl($span);
                    break;
            }

            if (++$count === $totalKeys) {
                $i++;
                $count = 0;
            }

        }
    }

    private function matchNuItem($span)
    {
        $match = array();
        preg_match('/^.*?([0-9]{1,})/', $span, $match);        
        return $match[1];
    }

    private function matchNmItem($span)
    {
        $match = array();
        preg_match('/-\s*(.*?)$/', $span, $match);        
        return $match[1];
    }

    private function br2nl($string)
    {
        return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
    }

    public function getItens()
    {
        return $this->itens;
    }
}

$itens = new Itens(file_get_contents('page.html'));
print_r($itens->getItens());