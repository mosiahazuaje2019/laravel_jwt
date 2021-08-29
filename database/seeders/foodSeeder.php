<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class foodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food')->insert([
            'name' => 'Espinacas',
            'description' => "Okay, okay, we admit that's not exactly breaking news, but did you know that when it comes to rapid weight loss some veggies reign supreme while others fall fairly flat in comparison? It's true! Thanks to their specific nutritional profiles, certain produce-aisle picks can help you trim down by revving your metabolism, turning off belly fat genes, and frying flab—and that's on top of all their other health-boosting benefits. Read on to learn which delicious picks fit the bill and discover delicious ways to incorporate them into your diet.",
            'uri' => 'https://www.eatthis.com/wp-content/uploads/sites/4/media/images/ext/243832027/raw-spinach.jpg?resize=768,563&quality=82&strip=all',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('food')->insert([
            'name' => 'Hojas de mostaza',
            'description' => "Otro vegetal digno de un lugar en su dieta son las hojas de mostaza. Cuando se cuecen al vapor, proporcionan un enorme 922 por ciento de su IDR de vitamina K , 96 por ciento de su vitamina A y 47 por ciento de su vitamina C por taza, y tienen una gran cantidad de propiedades para combatir enfermedades gracias a su alto contenido de glucosinolatos. Los glucosinolatos son sustancias químicas vegetales que su cuerpo convierte en isotiocianatos, que se ha demostrado que previenen el cáncer. De hecho, según una revisión de la revista Current Pharmaceutical Design , los glucosinolatos pueden proteger e incluso representar una estrategia terapéutica contra varias formas de la enfermedad mortal.",
            'uri' => 'https://www.eatthis.com/wp-content/uploads/sites/4/media/images/ext/336082980/natural-herb-mustard-greens.jpg?resize=768',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('food')->insert([
            'name' => 'Col rizada',
            'description' => "La col rizada definitivamente ha tenido su momento al sol (y algo más) pero en lo que respecta a las verduras saludables",
            'uri' => 'https://www.eatthis.com/wp-content/uploads/sites/4/2018/03/kale-plate-overhead.jpg?resize=768,563&quality=82&strip=all',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('food')->insert([
            'name' => 'Berro',
            'description' => "La próxima vez que prepare una ensalada",
            'uri' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('food')->insert([
            'name' => 'Tomates secados al sol',
            'description' => "Los tomates están repletos de licopeno antioxidante",
            'uri' => 'https://www.eatthis.com/wp-content/uploads/sites/4/media/images/ext/324920245/sun-dried-tomatoes.jpg?resize=768,563&quality=82&strip=all',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('food')->insert([
            'name' => 'Alcachofas',
            'description' => "La grelina es la hormona tengo hambre de su cuerpo, que se suprime cuando el estómago está lleno, por lo que comer alimentos saciantes ricos en fibra y proteínas es una obviedad. La humilde alcachofa es ganadora en ambos aspectos: tiene casi el doble de fibra que la col rizada (10,3 g por alcachofa mediana, o el 40 por ciento de la fibra diaria que necesita una mujer promedio) y uno de los recuentos de proteínas más altos entre las verduras. Hervir y comer todo el shebang como una ensalada independiente (¿por qué no agregar un poco de queso de cabra y tomates secados al sol?), Mezclar las hojas con sus verduras y aderezos favoritos, o pelar y hacer estallar los corazones en pizzas y panes planos saludables y perder grasa del vientre .",
            'uri' => 'https://www.eatthis.com/wp-content/uploads/sites/4/media/images/ext/859274371/artichokes.jpg?resize=768',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('food')->insert([
            'name' => 'Guisantes',
            'description' => "Es suficiente para hacer que Popeye lo escupiera: a pesar de su débil reputación",
            'uri' => ' https://www.eatthis.com/wp-content/uploads/sites/4/media/images/ext/323884315/green-peas.jpg?resize=768,563&quality=82&strip=all',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('food')->insert([
            'name' => 'Pimientos',
            'description' => "Es posible que haya escuchado que los pimientos picantes pueden ayudarlo a quemar calorías",
            'uri' => 'https://www.eatthis.com/wp-content/uploads/sites/4/media/images/ext/504246885/bell-peppers.jpg?resize=768,563&quality=82&strip=all',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('food')->insert([
            'name' => 'Brócoli',
            'description' => "Además de prevenir los cánceres de próstata",
            'uri' => 'https://www.eatthis.com/wp-content/uploads/sites/4/media/images/ext/773794535/broccoli.jpg?resize=768,563&quality=82&strip=all',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('food')->insert([
            'name' => 'Zanahorias',
            'description' => "Las zanahorias son una excelente fuente de vitamina A",
            'uri' => 'https://www.eatthis.com/wp-content/uploads/sites/4/media/images/ext/868845328/raw-carrots.jpg?resize=768,563&quality=82&strip=all',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
