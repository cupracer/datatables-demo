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
            $output = $this->twig->render('datatables.html', ['name' => 'Fabien']);
        }catch (\Exception $e) {
            $output = "Exception: " . $e->getMessage();
        }

        return $output;
    }

    public function getJson() {
        $examples = array(
            array('Kurt', 'Cobain', 'US', 'test1'),
            array('Bob', 'Marley', 'Jamaika', 'test2'),
            array('Noch', 'Einer', 'Irgendwo', 'test3')
        );

        $datatables = array(
            'data' => $examples
        );

        return json_encode($datatables);
    }
}
