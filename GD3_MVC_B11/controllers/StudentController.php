<?php
    class StudentController {
        public $studentQuery;
        public $majorQuery;
        public function __construct() {
            $this->studentQuery = new StudentQuery();
            $this->majorQuery = new MajorQuery();
        }
        public function __destruct() {}

        public function list() {
            $danhSachStudent = $this->studentQuery->all();
            include "views/student/list.php";
        }

        public function create() {
            $student = new Student();
            $danhSachMajor = $this->majorQuery->all();
            if(isset($_POST["submitForm"])) {
                // echo "<pre>";
                // var_dump($_POST);
                // die();
                $student->name = trim($_POST["name"]);
                $student->major_id = trim($_POST["major_id"]);
                $student->account = trim($_POST["account"]);
                $student->date_of_birth = trim($_POST["date_of_birth"]);
                $student->avatar = trim($_POST["avatar"]);
                
                // var_dump($_FILES);
                // die();
                if ($_FILES["file_upload"]["size"] > 0) {
                    $student->avatar = upload_file('student', $_FILES["file_upload"]);
                }
                // gọi hàm lưu thông tin
                $data = $this->studentQuery->create($student);
                if ($data == 1) {
                    // Nếu thành công quay lại trang danh sách
                    header("Location: ?action=student-list");
                } else {
                    // ... thông báo thất bại
                }
            }
            include "views/student/create.php";
        }
    }
?>