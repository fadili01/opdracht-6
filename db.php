<?php
class Database {
    public $pdo;
    private string $userTable = "user";

    public function __construct(String $db="op_6", String $host="localhost", 
                                String $user="root", String $pass="") {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function login($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users where email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }
}