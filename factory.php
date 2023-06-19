<?php
interface Car
{
    public function getModel();
}

class Sedan implements Car
{
     public function getModel()
    {
     // TODO: Implement getModel() method.
        return "Sedan";
    }
}

class SUV implements Car
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return "SUV";
    }
}

class CarFactory
{
    public static function createCar($type)
    {
        if ($type === "sedan") {
            return new Sedan();
        } elseif ($type === "suv") {
            return new SUV();
        } else {
            throw new Exception("Unknown car type");
        }
    }
}

$car1 = CarFactory::createCar("sedan");
echo $car1->getModel();

$car2 = CarFactory::createCar("suv");
echo $car2->getModel();
?>