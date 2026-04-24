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
    public function findByUsername($username)
    {

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ? ");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

// -------------------------
// READ - Récuperer tous les utilisateurs
// --------------------------
    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM users ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
