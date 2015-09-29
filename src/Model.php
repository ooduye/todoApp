<?php

namespace Yemisi;

/**
 * Class Model
 * @package Yemisi
 */
class Model extends Connection implements ModelInterface
{

    /**
     *
     */
    public function getAllTasks()
    {
        $stmt = $this->createConnection()->query("SELECT * FROM Tasks");

        foreach ($stmt as $row)
        {
            echo $row['id'] . ' - ' . $row['name'] .' - '. $row['description'] . ' - ' . $row['created_at'] . ' - ' . $row['completed'] . '<br />';
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function getTask($id)
    {
        $stmt = $this->createConnection()->prepare("Select * from Tasks where id = ?");
        $stmt->execute(array($id));

        foreach ($stmt as $row)
        {
            return $row['id'] . ' - ' . $row['name'] .' - '. $row['description'] . ' - ' . $row['created_at'] . '<br />';
        }
    }

    /**
     * @param $name
     * @param $description
     */
    public function addNewTask($name, $description)
    {
        $count = $this->createConnection()->prepare("INSERT INTO Tasks(name, description, completed) VALUES (?, ?, 0)");
        $count->execute(array($name, $description));
    }

    /**
     * @param $id
     * @param $name
     */
    public function editTaskName($id, $name)
    {
        $count = $this->createConnection()->prepare("UPDATE Tasks SET name = ? WHERE id = ?");
        $count->execute(array($name, $id));
    }

    /**
     * @param $id
     * @param $description
     */
    public function editTaskDescription($id, $description)
    {
        $count = $this->createConnection()->prepare("UPDATE Tasks SET description = ? WHERE id = ?");
        $count->execute(array($description, $id));
    }

    /**
     * @param $id
     */
    public function finishTask($id)
    {
        $count = $this->createConnection()->prepare("UPDATE Tasks SET completed = 1 WHERE id = ?");
        $count->execute(array($id));
    }

    /**
     * @param $id
     */
    public function deleteTask($id)
    {
        $count = $this->createConnection()->prepare("DELETE FROM Tasks WHERE id = ?");
        $count->execute(array($id));
    }
}