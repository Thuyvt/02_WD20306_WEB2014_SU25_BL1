<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'student-list' => (new StudentController)->list(),
    'student-create' => (new StudentController)->create()
};