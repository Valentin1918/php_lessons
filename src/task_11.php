<?php

class Student
{
    function __construct($studObj) {
        foreach ($studObj as $key => $value) {
            $this->$key = $value;
        }
    }

    protected $firstName = '';
    protected $lastName = '';
    protected $gender = '';
    static $genderArr = ['male', 'female'];
    protected $status = '';
    static $statusArr = ['freshman', 'sophomore', 'junior', 'senior'];
    protected $gpa = 0;

    public function showMyself()
    {
        var_export(get_object_vars($this));
        echo PHP_EOL;
    }
    public function studyTime($study_time)
    {
        if (is_numeric($study_time)) {
            $this->gpa += log($study_time);
            $this->gpa = $this->gpa > 4 ? 4 : number_format($this->gpa, 1);
        }
    }
    public function __set($name, $value) {
        $fields = get_object_vars($this);
        if (!array_key_exists($name, $fields)) return;
        $arrKey = $name."Arr";
        if (isset(self::$$arrKey) && !array_key_exists($value, self::$$arrKey)) return;
        $this->$name = $value;
    }
    public function __get($name) {
        $fields = get_object_vars($this);
        if (!array_key_exists($name, $fields)) return null;
        return $this->$name;
    }
}

$studDataArr = [
    ['firstName' => 'Mike', 'lastName' => 'Barnes', 'gender' => 'male', 'status' => 'freshman', 'gpa' => 4],
    ['firstName' => 'Jim', 'lastName' => 'Nickerson', 'gender' => 'male', 'status' => 'sophomore', 'gpa' => 3],
    ['firstName' => 'Jack', 'lastName' => 'Indabox', 'gender' => 'male', 'status' => 'junior', 'gpa' => 2.5],
    ['firstName' => 'Jane', 'lastName' => 'Miller', 'gender' => 'female', 'status' => 'senior', 'gpa' => 3.6],
    ['firstName' => 'Mary', 'lastName' => 'Scott', 'gender' => 'female', 'status' => 'senior', 'gpa' => 2.7],
];

$studyTime = [60, 100, 40, 300, 1000];

function setStudentObj($n)
{
    return new Student($n);
}

$studentList = array_map("setStudentObj", $studDataArr);

foreach ($studentList as $value) {
    $value->showMyself();
}
foreach ($studyTime as $key => $value) {
    if (isset($studentList[$key])) {
        $studentList[$key]->studyTime($value);
    }
}
foreach ($studentList as $value) {
    $value->showMyself();
}

$studentList[0]->firstName = 'Vasia';
$studentList[0]->thirdName = 'Vasilievich';
$studentList[0]->status = 'tramp';
$studentList[0]->gender = 'gay';
var_export($studentList[0]->firstName);
echo PHP_EOL;
var_export($studentList[0]->thirdName);
echo PHP_EOL;
var_export($studentList[0]);
