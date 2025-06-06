<?php
    class StudentQuery extends BaseModel {

        // Hàm xử lý lấy danh sách
        public function all() {
            try {
                $sql = "SELECT stu. *, ma.name as major_name 
                FROM student as stu 
                JOIN major as ma
                ON stu.major_id = ma.id";

                $data = $this->pdo->query($sql)->fetchAll();
                $danhSachStudent = [];
                foreach($data as $value) {
                    $stu = new Student();
                    $stu->id = $value["id"];
                    $stu->name = $value["name"];
                    $stu->major_id = $value["major_id"];
                    $stu->account = $value["account"];
                    $stu->date_of_birth = $value["date_of_birth"];
                    $stu->major_name = $value["major_name"];

                    $danhSachStudent[] = $stu;
                }
                return $danhSachStudent;
            } catch(Exception $error) {
                echo "Lỗi: " . $error->getMessage();
            }
        }

        // Hàm xử lý tạo mới

        // Hàm lấy thông tin chi tiết
    }
?>