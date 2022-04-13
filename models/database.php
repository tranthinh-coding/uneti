<?php

class Database {
    private $_conn;

    private string $_hostname  = "localhost";
    private string $_username  = "root";
    private string $_password  = "";
    // private string $_username  = "qrgiamgia_think";
    // private string $_password  = "021220010911200210102002@";
    private string $_dbname    = "uneti";

    private string $_table     = '';
    private int $_offset       = 0;
    private int $_limit        = -1;
    private string $_orderBy   = '';
    private string $_typeOrder = "ASC";

    public function __construct() {
        $this->_conn    = mysqli_connect($this->_hostname, $this->_username, $this->_password, $this->_dbname);
        mysqli_set_charset($this->_conn, "utf8");
    }

    /**
     * @param $arr
     * @return string
     */
    private function makeWhereCondition($arr) {
        $whereCondition = [];
        foreach($arr as $column => $value) {
            $val = testInput($value);
            $whereCondition[] = "$column = '$val'";
        }
        return implode(" AND ", $whereCondition);
    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    private function runSql($sql) {
        return mysqli_query($this->_conn, $sql);
    }

    /**
    * @param string $tableName
    * @return Database
    */
    public function table(string $tableName): Database {
        $this->_table = $tableName;
        return $this;
    }

    /**
    * @param $offset
    * @return Database
    */
    public function offset($offset): Database  {
        $this->_offset = $offset;
        return $this;
    }

    /**
    * @param string $order
    * @return Database
    */
    public function orderBy(string $order): Database  {
        $this->_orderBy = $order;
        return $this;
    }

    /**
    * @param $order
    * @return Database
    */
    public function typeOrderBy($order): Database  {
        if ($order === "ASC" || $order === "DESC") {
            $this->_typeOrder = $order;
        }
        return $this;
    }

    /**
    * @param $limit
    * @return Database
    */
    public function limit($limit): Database  {
        $this->_limit = $limit;
        return $this;
    }

    /**
     * @param $valArr
     * @param $whereArr
     * @return bool|mysqli_result
     */
    public function update($valArr, $whereArr)  {
        $keyValues    = [];
        foreach($valArr as $column => $value) {
            $value = testInput($value);
            $keyValues[] = "$column = '$value'";
        }
        $keyAndValues = implode(",", $keyValues);
        $condition = $this->makeWhereCondition($whereArr);
        $sql = "UPDATE $this->_table SET $keyAndValues WHERE $condition";
        // return $sql;
        // die($sql);
        return $this->runSql($sql);
    }

    /**
    * @param $id
    * @return void
    */
    public function deleteId($id): void  {
        $id = testInput($id);
        $sql = "DELETE FROM $this->table WHERE id = '$id'";
        $this->runSql($sql);
    }

    /**
    * @param $arr
    * @return int|string
    */
    public function create($arr) {
        $fields     = implode(",", array_keys($arr));
        $values     = array_values($arr);
        $bindValues = implode(",", array_map(static function ($e) {return testInput($e);}, $values));
        $sql        = "INSERT INTO $this->_table ($fields) VALUES ($bindValues);";
        $res = $this->runSql($sql);
        if (!$res) {
            setFlashMessage("flash-message", "Tạo tài khoản không thành công");
        }
        return mysqli_insert_id($this->_conn);
    }

    /**
    * @return array|bool
    * */
    public function selectAll() {
        $sql    = "SELECT * FROM $this->_table ";
        return $this->bindOrderBy($sql);
    }

    /**
    * @param array $field
    * @return array
    */
    public function selectField(array $field = ['*']): array {
        $fields         = implode(",", $field);
        $sql            = "SELECT $fields FROM $this->_table";
        return $this->bindOrderBy($sql);
    }

    /**
    * @param array $arr
    * @param array $field
    * @return array
    */
    public function selectByField(array $arr, array $field = ['*']): array  {
        $whereCondition = $this->makeWhereCondition($arr);
        $fields         = implode(",", $field);
        $sql            = "SELECT $fields FROM $this->_table WHERE $whereCondition ";
        return $this->bindOrderBy($sql);
    }

    /**
    * @param $sql
    * @return bool|mysqli_result
    */
    public function selectCustom($sql) {
        return $this->runSql($sql);
    }

    /**
    * @param $id
    * @return false|object|null
    */
    public function selectId($id) {
        $id = testInput($id);
        $sql    = "SELECT * FROM $this->_table WHERE id = '$id'";
        $result = $this->runSql($sql);
        return mysqli_fetch_object($result);
    }

    /**
    * @param string $sql
    * @return array|bool
    */
    private function bindOrderBy(string $sql) {
        if ($this->_limit >= 0) {
            $sql .= " LIMIT $this->_offset, $this->_limit";
        }
        if ($this->_orderBy) {
            $sql .= " ORDER BY $this->_orderBy $this->_typeOrder";
        }
        $result = $this->runSql($sql);
        if ($result === false) {
            return false;
        }
        $res = [];
        while ($each = mysqli_fetch_array($result)) {
            $res[] = $each;
        }
        return $res;
    }
}
