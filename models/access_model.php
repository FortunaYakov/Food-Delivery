<?php
  class AccessModel extends BaseModel {
    private $cleanRoutes = [];

    public function getRoutes($access_lvl) {
      $tempRoutes = $this->getAvailableRoutes($access_lvl);
      foreach ($tempRoutes as $key => $route) {
        $this->cleanRoutes[] = $route['url'];
      }
      return $this->cleanRoutes;
    }

    private function getAvailableRoutes($access_lvl){

        $stmt = $this->conn->prepare('SELECT url FROM routes WHERE access_lvl <= ?');
        $stmt->execute([$access_lvl]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
  }
