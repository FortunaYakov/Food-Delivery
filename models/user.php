<?php

class User extends BaseModel {
  public function createUser($username, $password) {
    $stmt = $this->conn->prepare('INSERT INTO users (username, password, role_id)
                                  VALUES (?, ?, 2 )');

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

  public function checkAccessLevel($userId) {
    $stmt = $this->conn->prepare('SELECT r.access_lvl FROM roles as r
                                  JOIN users as u
                                  ON r.id = u.role_id AND u.id = ?');
    $stmt->execute([$userId]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
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
