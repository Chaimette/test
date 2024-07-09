<?php

class UserModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT id, username, email, profile_picture, description FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch();
    }

    public function getUserLastMessages($userId, $limit = 3) {
        $stmt = $this->db->prepare("SELECT content FROM messages WHERE user_id = ? ORDER BY created_at DESC LIMIT ?");
        $stmt->execute([$userId, $limit]);
        return $stmt->fetchAll();
    }
}
