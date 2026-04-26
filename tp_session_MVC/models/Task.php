<?php

class Task
{

    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($titre, $description, $statut, $priorite, $user_id)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (titre, description, statut, priorite, user_id) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$titre, $description, $statut, $priorite, $user_id]);
    }

    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function update($id, $titre, $description, $statut, $priorite)
    {
        $stmt = $this->pdo->prepare("UPDATE tasks set titre = ?, description = ?, statut = ?, priorite = ? WHERE id = ?");
        return $stmt->execute([$titre, $description, $statut, $priorite, $id]);

    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
