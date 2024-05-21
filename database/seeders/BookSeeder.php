<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Orgulho e Preconceito',
                'author' => 'Jane Austen',
                'description' => 'Este clássico da literatura inglesa aborda temas como amor, preconceito e as dificuldades da vida social e matrimonial na Inglaterra do século XIX.',
                'isbn' => '978-0141040349',
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'Um romance distópico que descreve uma sociedade totalitária sob o controle do Grande Irmão, explorando temas de vigilância, controle social e repressão.',
                'isbn' => '978-0451524935',
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cem Anos de Solidão',
                'author' => 'Gabriel García Márquez',
                'description' => 'A história épica da família Buendía em Macondo, mesclando realismo mágico com temas de amor, solidão e destino.',
                'isbn' => '978-0307474728',
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'O Apanhador no Campo de Centeio',
                'author' => 'J.D. Salinger',
                'description' => 'A história do adolescente Holden Caulfield, que narra suas experiências e reflexões em Nova York após ser expulso de uma escola preparatória.',
                'isbn' => '978-0316769488',
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Matar a Cotovia',
                'author' => 'Harper Lee',
                'description' => 'Um romance que trata de questões raciais e injustiça no sul dos Estados Unidos durante a Grande Depressão, contado do ponto de vista da jovem Scout Finch.',
                'isbn' => '978-0061120084',
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'O Grande Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'description' => 'A história trágica de Jay Gatsby e seu amor obsessivo por Daisy Buchanan, ambientada na era do jazz dos anos 1920 nos Estados Unidos.',
                'isbn' => '978-0743273565',
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Crime e Castigo',
                'author' => 'Fiódor Dostoiévski',
                'description' => 'A jornada psicológica de Raskólnikov, um estudante que comete um assassinato e enfrenta as consequências morais e psicológicas de seu ato.',
                'isbn' => '978-0486454115',
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'O Morro dos Ventos Uivantes',
                'author' => 'Emily Brontë',
                'description' => 'Uma história de amor e vingança entre Heathcliff e Catherine Earnshaw, ambientada nos ermos de Yorkshire.',
                'isbn' => '978-0141439556',
                'quantity' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
