<?phpclass Core{    use Config;    private $root;    private $dir = "";    private $page = "index";    private $path = "";    private $args = [];    private $models;    private $data = [];    function __construct($route)    {        $this->root = $_SERVER["DOCUMENT_ROOT"];        // check slash in the end        if (substr($this->root, 0, -1) != '/') {            $this->root .= '/';        }        $this->route($route);    }    /**     * @param array $route     */    private function route(array $route)    {        // break route on segments        $route = explode("/", strtolower($route));        if ($route[count($route) - 1] == "") array_pop($route);        # check if first segment - directory        if (isset($route[0]) AND is_dir($this->root . "include/" . $route[0])) {            $this->dir = $route[0];            $this->path .= $this->dir . "/";            array_shift($route);        }        if (isset($route[0])) {            $this->page = $route[0];        }        $this->path .= $this->page;        array_shift($route);        // current page data        if (array_key_exists($this->path, $this->routes) && array_key_exists('pattern', $this->routes[$this->path])) {            $pattern = 'pattern_' . $this->routes[$this->path]['pattern'];            if (isset($this->routes[$this->path]['data'])) {                $this->data = $this->routes[$this->path]['data'];            }            foreach ($route as $key => $value) {                $this->args[] = $value;            }        } else {            $pattern = 'pattern_error';        }        // check if exist pattern method        if (method_exists($this, $pattern)) {            $this->$pattern($this->path);        } else {            Functions::error('Pattern ' . $pattern . ' not created');        }    }    /**     * @param string $name     * @param array $data     * @return bool     */    public function include(string $name, array $data = []) {        $path = $this->root . "include/{$name}.php";        if (!file_exists($path)) Functions::error("File {$name} does not exists");        // set args variable in scope        $args = $this->args;        // set data variable in scope        $data = array_merge($this->data, $data);        // set data variable in scope        $config = $this->config;        // set models variables in scope        if (!empty($this->models)) {            foreach ($this->models as $name => $class) {                $$name = $class;            }        }        include($path);        return true;    }    /**     * @param string $name     * @param array $db     */    public function model(string $name, array $db) {        $path = $this->root . "models/$name.php";        if (!file_exists($path)) Functions::error("Model {$name} does not exists");        require_once($path);        if (!class_exists($name)) Functions::error("Class {$name} not found in models/$name.php");        $this->models[$name] = new $name($db);    }}