<?php

    class Animal{
        var $id;
        var $type;
        function setId($id){
            $this->id = $id;
        }
        function setAnimalType($type){
            $this->type = $type;
        }
    }
    class Cow extends Animal{
        function giveMilk(){
            return rand(8, 12);
        }
    }
    class Chicken extends Animal{
        function giveEgg(){
            return rand(0, 1);
        }
    }
    //Создание массива животных
    function initFarm ($numOfCows, $numOfChickens){
        if(!is_numeric($numOfCows) && $numOfCows<=0 && !is_numeric($numOfChickens) && $numOfChickens<=0){
            return;
        }
        $animals = array();
        $id=1;
        for($i=0; $i<$numOfCows; $i++){
            $cow = new Cow;
            $cow->setId($id);
            $cow->setAnimalType("cow");
            array_push($animals, $cow);
            $id++;
        }
        for($i=0; $i<$numOfChickens; $i++){
            $chicken = new Chicken;
            $chicken->setId($id);
            $chicken->setAnimalType("chicken");
            array_push($animals, $chicken);
            $id++;
        }
        return $animals;
    }

    //Сбор продукции
    function collectProducts($animals){
        $milk=0;
        $eggs=0;
        foreach ($animals as $animal){
            if ($animal->type=="cow") $milk+=$animal->giveMilk();
            elseif ($animal->type=="chicken") $eggs+=$animal->giveEgg();
        }
        return "Collected ".$milk." liters of milk and ".$eggs." eggs";
    }

    $uncleBobsFarm = initFarm(10, 20);
    $result = collectProducts($uncleBobsFarm);
    echo $result;

?>
