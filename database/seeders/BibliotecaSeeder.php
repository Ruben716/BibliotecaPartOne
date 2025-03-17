<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autor;
use App\Models\Libro;

class BibliotecaSeeder extends Seeder
{
    public function run()
    {
        // Crear autores
        $autor1 = Autor::create(['nombre' => 'Gabriel García Márquez']);
        $autor2 = Autor::create(['nombre' => 'Mario Vargas Llosa']);

        // Crear libros
        $libro1 = Libro::create(['titulo' => 'Cien años de soledad']);
        $libro2 = Libro::create(['titulo' => 'La ciudad y los perros']);

       
        $autor1->libros()->attach([$libro1->id]); 
        $autor2->libros()->attach([$libro2->id]);
    }
}
