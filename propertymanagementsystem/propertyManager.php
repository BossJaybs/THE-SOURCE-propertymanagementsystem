class PropertyManager {
  private $db;

  public function __construct(Database $db) {
    $this->db = $db;
  }

  public function getAllProperties() {
    $query = "SELECT * FROM Properties";
    $result = $this->db->query($query);
    $properties = array();
    while ($row = $result->fetch_assoc()) {
      $properties[] = new Property($row['PropertyID'], $row['Address'], $row['City'], $row['State'], $row['ZIP'], $row['Type']);
    }
    return $properties;
  }

  public function addProperty(Property $property) {
    $query = "INSERT INTO Properties (Address, City, State, ZIP, Type) VALUES ('$property->getAddress()', '$property->getCity()', '$property->getState()', '$property->getZip()', '$property->getType()')";
    $this->db->query($query);
  }

  public function updateProperty(Property $property) {
    $query = "UPDATE Properties SET Address = '$property->getAddress()', City = '$property->getCity()', State = '$property->getState()', ZIP = '$property->getZip()', Type = '$property->getType()' WHERE PropertyID = '$property->getPropertyID()'";
    $this->db->query($query);
  }

  public function deleteProperty($propertyID) {
    $query = "DELETE FROM Properties WHERE PropertyID = '$propertyID'";
    $this->db->query($query);
  }
}