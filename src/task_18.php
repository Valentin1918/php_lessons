<?php

class Car
{
    function __construct($studObj) {
        foreach ($studObj as $key => $value) {
            $setter = 'set'.ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }

    protected $manufacturer = '';
    protected $year = '';
    protected $model = '';
    protected $vin = '';


    public function getManufacturer()
    {
        return $this->manufacturer;
    }
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    public function getYear()
    {
        return $this->year;
    }
    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getModel()
    {
        return $this->model;
    }
    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getVin()
    {
        return $this->vin;
    }
    public function setVin($vin)
    {
        $this->vin = $vin;
    }

    public function showMyself()
    {
        var_export(get_object_vars($this));
        echo PHP_EOL;
    }
}

class Passenger extends Car
{
    function __construct($studObj) {
        if (!isset($studObj['equipment'])) {
            throw new Exception('It is not a passenger car!');
        }
        parent::__construct($studObj);
        $this::setEquipment($studObj['equipment']);
    }

    protected $equipment = '';

    public function getEquipment()
    {
        return $this->equipment;
    }
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;
    }
}

class Truck extends Car
{
    function __construct($studObj) {
        if (!isset($studObj['load_capacity'])) {
            throw new Exception('It is not a truck!');
        }
        parent::__construct($studObj);
        $this::setLoadCapacity($studObj['load_capacity']);
    }

    protected $load_capacity = 0;

    public function getLoadCapacity()
    {
        return $this->load_capacity;
    }
    public function setLoadCapacity($load_capacity)
    {
        $this->load_capacity = $load_capacity;
    }
}

$cars = [
    ['type' => 'passenger', 'manufacturer' => 'Lexus', 'year' => 2008, 'model' => 'GX 470', 'vin' => 12345678, 'equipment' => 'some equipment 5544'],
    ['type' => 'passenger', 'manufacturer' => 'Alfa Romeo', 'year' => 2003, 'model' => 'GTV', 'vin' => 76465554, 'equipment' => 'some equipment 7543'],
    ['type' => 'passenger', 'manufacturer' => 'Honda', 'year' => 2013, 'model' => 'Civic', 'vin' => 83424233, 'equipment' => 'some equipment 9887'],
    ['type' => 'passenger', 'manufacturer' => 'Nissan', 'year' => 2011, 'model' => 'Juke', 'vin' => 64475243, 'equipment' => 'some equipment 4354'],
    ['type' => 'passenger', 'manufacturer' => 'VW', 'year' => 2018, 'model' => 'Tiguan', 'vin' => 56894564, 'equipment' => 'some equipment 0086'],
    ['type' => 'passenger', 'manufacturer' => 'Skoda', 'year' => 2002, 'model' => 'Fabia', 'vin' => 80765633, 'equipment' => 'some equipment 4566'],
    ['type' => 'truck', 'manufacturer' => 'Volvo', 'year' => 2016, 'model' => 'FH16', 'vin' => 87684353, 'load_capacity' => 40000],
    ['type' => 'truck', 'manufacturer' => 'Volvo', 'year' => 2016, 'model' => 'FL6', 'vin' => 99878425, 'load_capacity' => 36000],
];

$typeClassMap = ['passenger' => Passenger::class, 'truck' => Truck::class];

function makeCarList($cars, $typeClassMap)
{
    return array_map(function ($car) use ($typeClassMap)
    {
        if (!isset($car['type'])) {
            throw new Exception('There is no car type!');
        }
        return new $typeClassMap[$car['type']]($car);
    }, $cars);
}

$carList = makeCarList($cars, $typeClassMap);

foreach ($carList as $value) {
    $value->showMyself();
}
foreach ($carList as $key => $value) {
    $value->setYear($value->getYear() + 1);
}
foreach ($carList as $value) {
    $value->showMyself();
}
