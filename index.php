<?php
require 'vendor/autoload.php';

use Yemisi\Model;

$conn = new Model();

$conn->editTaskName(1, 'Play');

$conn->getAllTasks();