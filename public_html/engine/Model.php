<?phpabstract class Model {    protected $db;    function __construct(array $attr = []) {        if (!defined('DB_HOSTNAME')) Core::exception('DB : missed hostname');        if (!defined('DB_USERNAME')) Core::exception('DB : missed username');        if (!defined('DB_PASSWORD')) Core::exception('DB : missed password');        if (!defined('DB_NAME'))     Core::exception('DB : missed dbname');        echo DB_HOSTNAME;        echo DB_USERNAME;        echo DB_PASSWORD;        echo DB_NAME;        $this->db = new PDO("mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);        $this->db->query("SET NAMES 'utf8'");    }}