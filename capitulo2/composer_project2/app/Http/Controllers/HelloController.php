<?php

namespace App\Http\Controllers;

class HelloController extends Controller
{
      // Controlador invocable
//    public function __invoke(string $name): string
//    {
//        // Cuando se haga una llamada a la clase directamente y no a un método de este, se ejecutará el método invoke.
//        return "Hello world {$name}";
//    }

    // Método del controlador
//    public function saludo(string $name): string
//    {
//        // Para trabajar con métodos en lugar de con un controlador invocable
//        return "Hello world {$name}";
//    }

    // Método del controlador que retorna una vista
    public function saludo(string $name): string
    {
        // Para trabajar con métodos en lugar de con un controlador invocable
        return view("saludo", compact("name"));
    }
}
