<?php
session_start();
require_once 'model.php';

class Controller {
    private $model;
    private $puntaje;

    public function __construct() {
        $this->model = new Model();
        // PUNTO 2: Se modifica el puntaje inicial a 2000
        $this->puntaje = isset($_SESSION['puntaje']) ? $_SESSION['puntaje'] : 2000;
    }

    public function jugar() {
        $numero1 = mt_rand(1, 3);
        $numero2 = mt_rand(1, 3);
        $numero3 = mt_rand(1, 3);

        if ($numero1 === $numero2 && $numero2 === $numero3) {
            $this->puntaje += 200;
            $resultado = 'Ganaste';
        } else {
            $this->puntaje -= 10;
            $resultado = 'Perdiste';
        }

        if ($this->puntaje < 0) {
            $this->puntaje = 0;
            $resultado = 'Game Over';
        }

        $_SESSION['puntaje'] = $this->puntaje;
        $_SESSION['resultado'] = $resultado;
        $_SESSION['numeros'] = [$numero1, $numero2, $numero3];
    }

    public function guardar() {
        $this->model->guardarPuntaje($this->puntaje);
        // PUNTO 2: Al reiniciar el juego tras guardar, el puntaje vuelve a 2000
        $_SESSION['puntaje'] = 2000; 
    }
}
?>
