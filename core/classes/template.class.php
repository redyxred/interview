<?php
    class Template {

        private $tpl_path;

        public $vars = array();

        public function __construct ($dir, $base_template) {
            $this->tpl_path = ROOT."/{$dir}/".$base_template;
            // echo "Template class has loaded. ({$this->tpl_path})";
        }

        public function load ($page) {
            include $this->tpl_path."/".$page.".php";
        }

        public function setVar ($name, $value) {
            $this->vars[$name] = $value;
        }

        public function __get($property) {
            if ($this->vars[$property] != null) {
                return $this->vars[$property];
            } else {
                return "";
            }
        }
    }
?>
