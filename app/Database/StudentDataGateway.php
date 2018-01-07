<?php

namespace Studentlist\Database;

use Studentlist\Entities\Student;


class StudentDataGateway

{
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function countStudents($search = null): string
    {
        $sql = "SELECT COUNT(*) FROM `students`";
        if ($search != null) {
            $search = trim($search);
            $sql .= " WHERE CONCAT_WS(' ', `name`, `surname`, `groupNumber`) LIKE :search";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':search', '%' . addCslashes($search, '\%_') . '%', \PDO::PARAM_STR);
        } else {
            $stmt = $this->pdo->prepare($sql);
        }
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getStudents($orderField, $direction, $limit, $offset, $search = null): array
    {
        $orderFields = ['name', 'surname', 'groupNumber', 'examPoints'];
        $directions = ['asc', 'desc'];
        if (!in_array($orderField, $orderFields) || !in_array($direction, $directions)) {
            throw new \PDOException('Неверный параметр сортировки');
        }

        $sql = "SELECT `name`, `surname`, `groupNumber`,`examPoints` FROM `students`";

        if ($search !== null) {
            $sql .= " WHERE CONCAT_WS(' ', `name`, `surname`, `groupNumber`) LIKE :search";

            $sql .= " ORDER BY $orderField $direction LIMIT :limit OFFSET :offset";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':search', '%' . addCslashes($search, '\%_') . '%', \PDO::PARAM_STR);

        } else {
            $sql .= " ORDER BY $orderField $direction LIMIT :limit OFFSET :offset";
            $stmt = $this->pdo->prepare($sql);
        }
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        $students = $stmt->fetchAll(\PDO::FETCH_CLASS, 'Studentlist\Entities\Student');
        return $students;
    }

    public function addStudent(Student $student)
    {
        $sql = "INSERT INTO `students` (`name`, `surname`, `groupNumber`, `examPoints`, `gender`, `email`, `year`, `residence`, `token`)
		        VALUES (:name, :surname, :groupNumber, :examPoints, :gender, :email, :year, :residence, :token)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $student->getName(), \PDO::PARAM_STR);
        $stmt->bindValue(':surname', $student->getSurname(), \PDO::PARAM_STR);
        $stmt->bindValue(':groupNumber', $student->getGroupNumber(), \PDO::PARAM_STR);
        $stmt->bindValue(':examPoints', $student->getExamPoints(), \PDO::PARAM_STR);
        $stmt->bindValue(':gender', $student->getGender(), \PDO::PARAM_STR);
        $stmt->bindValue(':email', $student->getEmail(), \PDO::PARAM_INT);
        $stmt->bindValue(':year', $student->getYear(), \PDO::PARAM_INT);
        $stmt->bindValue(':residence', $student->getResidence(), \PDO::PARAM_STR);
        $stmt->bindValue(':token', $student->getToken(), \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateStudent(Student $student)
    {
        $sql = "UPDATE `students` SET `name`=:name, `surname`=:surname, `groupNumber`=:groupNumber, `examPoints`=:examPoints, `email`=:email,
                `gender`=:gender, `year`=:year, `residence`=:residence WHERE `token`=:token";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $student->getName(), \PDO::PARAM_STR);
        $stmt->bindValue(':surname', $student->getSurname(), \PDO::PARAM_STR);
        $stmt->bindValue(':groupNumber', $student->getGroupNumber(), \PDO::PARAM_STR);
        $stmt->bindValue(':examPoints', $student->getExamPoints(), \PDO::PARAM_STR);
        $stmt->bindValue(':gender', $student->getGender(), \PDO::PARAM_STR);
        $stmt->bindValue(':email', $student->getEmail(), \PDO::PARAM_INT);
        $stmt->bindValue(':year', $student->getYear(), \PDO::PARAM_INT);
        $stmt->bindValue(':residence', $student->getResidence(), \PDO::PARAM_STR);
        $stmt->bindValue(':token', $student->getToken(), \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getStudentByToken(string $token): Student
    {
        $sql = "SELECT * FROM students WHERE `token` = :token";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":token", $token, \PDO::PARAM_STR);
        $stmt->execute();
        $student = $stmt->fetchObject('Studentlist\Entities\Student');
        return $student;

    }

    public function checkEmail($email, $id)
    {
        $sql = "SELECT COUNT(*)FROM `students` WHERE `email` = :email";
        if ($id !== null) {
            $sql .= " AND `id` <> :id";
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        if ($id !== null) {
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}