<?php
    namespace App;
    use PDO;

    class User {
        private int $id;
        private string $name;
        private string $email;
        private string $password;
        private $db;
    
        public function __construct() {
            // $this->id = $id;
            // $this->name = $name;
            // $this->email = $email;
            // $this->password = $password;
            $this->db = new Database();
        }

        public function getId(): int {
            return $this->id;
        }
        public function getName(): string {
            return $this->name;
        }
        public function getEmail(): string {
            return $this->email;
        }
        public function getPassword(): string {
            return $this->password;
        }
    
        //Реєстрація користувача
        public function registrationUser($username, $email, $password): int {
            $stmt = $this->db->conn->prepare("SELECT * FROM users WHERE email=?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user > 1) {
                echo "Користувач з таким іменем або поштою вже існує";
                exit;
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $this->db->conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$username, $email, $hashedPassword]);
                return $stmt->rowCount() > 0;
            }
        }
        //Авторизація користувача
        public function loginUser($login, $password): bool {
            $stmt = $this->db->conn->prepare("SELECT * FROM users WHERE email=? OR name=?");
            $stmt->execute([$login, $login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user && password_verify($password, $user['password'])) {
                return true;
            } else {
                return false;
            }
        }
        //Перевірка чи залогіненний користувач
        public static function isLogin(): bool {
            if(!empty($_SESSION['login'])) {return 1;} 
            else {return 0;}
        }
        //Вихід з аккаунта
        public static function logoutUser(): bool {
            // if(empty($_SESSION['login'])) {
            session_unset();
            return 1;
        }
    }
?>