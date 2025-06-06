<?php
    class StudentController {
        public $studentQuery;

        public function __construct() {
            $this->studentQuery = new StudentQuery();
        }
        public function __destruct() {}

        public function list() {
            $danhSachStudent = $this->studentQuery->all();
            include "views/student/list.php";
        }
    }
?>