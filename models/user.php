<?php

class User extends BaseModel {
  public function createUser($username, $password) {
    $stmt = $this->conn->prepare('INSERT INTO users (username, password)
                                  VALUES (?, ?)');

    $hashedPass = md5($password);
    $stmt->execute([$username, $hashedPass]);
  }

  public function checkUserByName($username) {
    $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (is_null($user)) {
      return false;
    } else {
      return $user;
    }
  }

  public function findUserById($id) {
    $stmt = $this->conn->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function isAdmin($userId) {
    $user = $this->findUserById($userId);

    return $user['role_id'] == 1;
  }

  public function checkUser($username, $password) {
    $stmt = $this->conn->prepare('SELECT * FROM users
                                  WHERE username = ? AND password = ?');
    $hashedPass = md5($password);
    $stmt->execute([$username, $hashedPass]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (is_null($user)) {
      return false;
    } else {
      return $user;
    }
  }
}
