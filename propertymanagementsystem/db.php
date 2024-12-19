class Database {
  private $host;
  private $username;
  private $password;
  private $dbname;
  private $conn;

  public function __construct($host, $username, $password, $dbname) {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;
  }

  public function connect() {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function query($query) {
    return $this->conn->query($query);
  }

  public function close() {
    $this->conn->close();
  }
}