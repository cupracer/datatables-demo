<?php

namespace App;

class Demo {

    protected $twig;


    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(TEMPLATES_DIR);
        $this->twig = new \Twig\Environment($loader);
    }

    public function getPage() {
        try {
            $output = $this->twig->render('datatables.html', ['title' => 'Datatables Demo']);
        }catch (\Exception $e) {
            $output = "Exception: " . $e->getMessage();
        }

        return $output;
    }

    public function getJsonValues() {
        $examples = array(
            array('Kurt', 'Cobain', 'US', 'test1'),
            array('Bob', 'Marley', 'Jamaika', 'test2'),
            array('Noch', 'Einer', 'Irgendwo', 'test3')
        );

        return $examples;
    }

    public function getJsonKeyValues() {
        $examples = array(
            array(
                'firstName' => 'Kurt',
                'lastName' => 'Cobain',
                'location' => 'US',
                'buttonLink' => 'test1'
            ),
            array(
                'firstName' => 'Bob',
                'lastName' => 'Marley',
                'location' => 'Jamaika',
                'buttonLink' => 'test2'
            ),
            array(
                'firstName' => 'Noch',
                'lastName' => 'Einer',
                'location' => 'Irgendwo',
                'buttonLink' => 'test3'
            )
        );

        return $examples;
    }


    public function getJson($type) {
        switch ($type) {
            case 'values':
                $datatables = array('data' => $this->getJsonValues());
                break;

            case 'keyValues':
                $datatables = array('data' => $this->getJsonKeyValues());
                break;

            default:
                return false;
        }

        return json_encode($datatables);
    }
}
