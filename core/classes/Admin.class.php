<?php
  class Admin {
    public function getUsers () {
      $db = new DB();
      $sel_users = $db->query("SELECT * FROM `users`");
      $sel_users = $sel_users->fetchAll();

      return $sel_users;
    }
  }
?>
