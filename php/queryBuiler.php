<?php
class QueryBuilder {
    private $type;
    private $table;
    private $columns;
    private $values;
    private $condition;

    public function __construct($type, $table, $columns = NULL, $values = NULL, $condition = NULL) {
        $this->type = $type;
        $this->table = $table;
        $this->columns = $columns;
        $this->values = $values;
        $this->condition = $condition;
    }

    public function getQuery() {
        switch ($this->type) {
            case 'select':
                return "SELECT $this->columns FROM $this->table;";
            case 'update':
                return "UPDATE $this->table SET $this->columns = '$this->values' WHERE $this->condition;";
            case 'delete':
                return "DELETE FROM $this->table WHERE $this->condition;";
            case 'insert':
                return "INSERT INTO $this->table $this->columns VALUES $this->values;";
        }
    }
}
// Example usage:
//$query = new QueryBuilder('update', 'users', 'name', 'Bob', 'id = 5');
//echo $query->getQuery();
?>