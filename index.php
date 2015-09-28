<?php
require 'vendor/autoload.php';

use Yemisi\Model;

$conn = new Model();

// $conn->addNewTask("Sleep", "I need to sleep by 12");

$conn->getAllTasks();