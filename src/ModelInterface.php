<?php

namespace Yemisi;

interface ModelInterface
{
    public function getAllTasks();

    public function getTask($id);

    public function addNewTask($name, $description);

    public function editTaskName($id, $name);

    public function editTaskDescription($id, $description);

    public function deleteTask($id);
}