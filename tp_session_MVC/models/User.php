<?php

class User

{
  private $pdo;
  public function __construct($pdo)
  {
    // stocker la conx PDO dans l'attribut de l'objet
    $this->pdo = $pdo;
  }
  //methode pour creer un user dans notre base 
  public function create($username, $email, $password, $role = "user")
  {
    //transformer le mot de passe en vesion hashé
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    //$sql="INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    //$stmt = $this->pdo->prepare($sql);
    $stmt = $this->pdo->prepare(
      "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)"
    );

    return $stmt->execute([$username, $email, $hashedpassword, $role]);
  }


  //methode pour récuperer un user à partir de son username 
  public function  findByUsername($username)
  {

    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ? ");
    $stmt->execute([$username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // -------------------------------------------------------
  // READ — Récupérer tous les utilisateurs
  // -------------------------------------------------------
   public function findAll() {
     $stmt = $this->pdo->query("SELECT * FROM users ORDER BY created_at DESC");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
  // -------------------------------------------------------
   //Trouver un utilisateur par son ID
     // Utilisé par userController pour pré-remplir edit.php
  // -------------------------------------------------------
  public function findById($id) {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
     $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // -------------------------------------------------------
    // UPDATE — Modifier un utilisateur
    // Si $password est fourni → on le hashe et on le met à jour
    // Si $password est null   → on ne touche pas au mot de passe
      // -------------------------------------------------------
 public function update($id, $username, $email, $role, $password = null) {
   if ($password) {
    $hash=password_hash($password, PASSWORD_DEFAULT);
     $stmt = $this->pdo->prepare(
                "UPDATE users
                 SET username = ?, email = ?, role = ?, password = ?
                 WHERE id = ?"
            );
            return $stmt->execute([$username, $email, $role, $hash, $id]);
   }else{
    // Pas de nouveau mot de passe : on ne le modifie pas
     $stmt = $this->pdo->prepare(
                "UPDATE users
                 SET username = ?, email = ?, role = ?
                 WHERE id = ?"
            );
            return $stmt->execute([$username, $email, $role, $id]);
        }
   
 
 }

 // -------------------------------------------------------
    // DELETE — Supprimer un utilisateur par son ID
     // -------------------------------------------------------
public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

}
