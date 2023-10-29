<?php
    namespace App;
    use PDO;

    class Music {
        private $id;
        private $title;
        private $author;
        private $dir;
        private $image;
        private $db;

        public function __construct() {
            $this->db = new Database();
        }
        public function loadMusic($title, $author, $dir, $image) {
            $stmt = $this->db->conn->prepare("SELECT * FROM musics WHERE title = ? OR dir = ?");
            $stmt->execute([$title, $dir]);
            $music = $stmt->fetch(PDO::FETCH_ASSOC);
            if($music > 1) {
                echo "Музика з такою назвою або іменем файлу вже існує";
                exit;
            } else {
                $stmt = $this->db->conn->prepare("INSERT INTO musics (title, author, dir, image) VALUES (?, ?, ?, ?)");
                $stmt->execute([$title, $author, $dir, $image]);
                return $stmt->rowCount() > 0;
            }
        }
        public function deleteMusic($id) {
            $stmt = $this->db->conn->prepare("SELECT * FROM musics WHERE id = ?");
            $stmt->execute([$id]);
            $music = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$music > 1) {
                echo "Такої музики не існує";
                exit;
            } else {
                $stmt = $this->db->conn->prepare("DELETE FROM musics WHERE id = ?");
                $stmt->execute([$id]);
                exit;
            }
        }
    }
?>