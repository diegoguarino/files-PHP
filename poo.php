<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definiciones de las clases
class Persona{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function imprimir(){}
}
//Alumno "es" Persona
class Alumno extends Persona{
    public $legajo;
    public $notaPortfolio;
    public $notaPhp;
    public $notaProyecto;

    public function __construct(){
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota PHP: " . $this->notaPhp . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "El promedio es: " . $this->calcularPromedio() . "<br>";
    }

    public function calcularPromedio(){
        return ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;
    }       
}


class Docente extends Persona{
    public $especialidad;

    public function imprimir(){}
    public function imprimirEspecialidadesHabilitadas(){}
}

$alumno1 = new Alumno();
$alumno1->dni = "3215651";
$alumno1->nombre = "Ana Valle";
$alumno1->edad = 32;
$alumno1->nacionalidad = "Uruguayo";
$alumno1->notaPhp = 8;
$alumno1->notaPortfolio = 9;
$alumno1->notaProyecto = 7;
$alumno1->imprimir();





?>