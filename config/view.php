<?php

class View {

    private $file;
    private $titre;

    public function __construct($action) {

        $this->file = "views/view_".$action.".php";
        $this->css = "css/css_".$action.".css";

    }


    public function generate($data=[]) {

        $content = $this->generateFile($this->file, $data);
        $view = $this->generateFile('config/layout.php', array('title' => $this->title, 'content' => $content, 'css' => $this->css));
        echo $view;

    }


    private function generateFile($file, $data) {

        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }

        else {
            throw new Exception("File '$file' not found");
        }

    }

}
