<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
     public function newUser ($user)
     {
        $query = "INSERT INTO users (name, alias, email, password, birthday, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
        $password = md5($user['password']);

        $values = array($user['name'], $user['alias'], $user['email'], $password, $user['birthday']);

        $this->db->query($query, $values);
        $userID = $this->db->insert_id();

        if ($userID) {
            $query = "SELECT * FROM users WHERE id = $userID";

            return $this->db->query($query)->row_array();
        }
     }
     public function findUserByEmail ($email)
     {
        $query = "SELECT * FROM users WHERE email = ?";
        $values = array($email);

        return $this->db->query($query, $values)->row_array();
     }

     public function viewProfile($user) 
     {
        $query = "SELECT * FROM users WHERE id = ?";

        return $this->db->query($query, $user)->row_array();
     }

     public function add($user) {
        $query = "INSERT INTO friends (user_id, friend_id) VALUES (?, ?)";

        $this->db->query($query, [$this->session->userdata("currentUser")['id'], $user]);

        $this->db->query($query, [$user, $this->session->userdata("currentUser")['id']]);
     }

     public function remove($user) {
        $query = "DELETE FROM friends WHERE user_id = ? AND friend_id = ?";

        $this->db->query($query, [$this->session->userdata("currentUser")['id'], $user]);

        $this->db->query($query, [$user, $this->session->userdata("currentUser")['id']]);
     }

     public function listFriends($user) {
        $query = "SELECT * FROM friends LEFT JOIN users ON friends.friend_id = users.id WHERE friends.user_id = ?";

        return $this->db->query($query, $user)->result_array();
     }

     public function listNonFriends($user) {
        $query = "SELECT * FROM users WHERE id != ? AND id NOT IN (SELECT friend_id FROM friends WHERE user_id = ?)";

        return $this->db->query($query, [$user, $user])->result_array();
     }
}

?>