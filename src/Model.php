<?php

namespace Yemisi;

class Model extends Connection implements ModelInterface
{
    public function getAllTasks()
    {
        $stmt = $this->db->query("SELECT * FROM Tasks");

        foreach ($stmt as $row)
        {
            echo $row['id'] . ' - ' . $row['name'] .' - '. $row['description'] . ' - ' . '<br />';
        }
    }

    public function getTask($id)
    {
        $stmt = $this->db->prepare("Select * from Tasks where id = ?");
        $stmt->execute(array($id));

        foreach ($stmt as $row)
        {
            return $row['id'] . ' - ' . $row['name'] .' - '. $row['description'] . ' - ' . '<br />';
        }
    }

    public function addNewTask($name, $description)
    {
        $count = $this->db->prepare("INSERT INTO Tasks(name, description) VALUES (?, ?)");
        $count->execute(array($name, $description));
    }

    public function editTaskName($id, $name)
    {
        $count = $this->db->prepare("UPDATE Tasks SET name = ? WHERE id = ?");
        $count->execute(array($name, $id));
    }

    public function editTaskDescription($id, $description)
    {
        $count = $this->db->prepare("UPDATE Tasks SET description = ? WHERE id = ?");
        $count->execute(array($description, $id));
    }

    public function deleteTask($id)
    {
        $count = $this->db->prepare("DELETE FROM Tasks WHERE id = ?");
        $count->execute(array($id));
    }
}