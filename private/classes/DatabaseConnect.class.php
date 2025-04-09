
<?php
class DatabaseConnect {
    private $_host;
    private $_username;
    private $_password;
    private $_dbname;
    private $_pdo;

    public function __construct($host, $username, $password, $dbname) {
        $this->_host = $host;
        $this->_username = $username;
        $this->_password = $password;
        $this->_dbname = $dbname;
    }

    public function connect() {
        $dsn = "mysql:host={$this->_host};dbname={$this->_dbname};charset=utf8mb4";
        
        try {
            $this->_pdo = new PDO($dsn, $this->_username, $this->_password);
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->_pdo;
        } catch(PDOException $e) {
        
            throw new Exception('Database connection failed: ' . $e->getMessage());
        }
    }
}