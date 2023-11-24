<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
             'first_name' => 'Elmo',
             'second_name' => 'Jerry',
             'email' => 'elmojerry@example.com',
             'password' => bcrypt("123456789"),
             'gender' => 'masculino',
        ]);
        
        \App\Models\User::create([
            'first_name' => 'Paulo',
            'second_name' => 'Fernandes',
            'email' => 'paulofernandes@example.com',
            'password' => bcrypt("123456789"),
            'gender' => 'masculino',
       ]);
       
       \App\Models\User::create([
        'first_name' => 'Paula',
        'second_name' => 'Daniela',
        'email' => 'pauladaniela@example.com',
        'password' => bcrypt("123456789"),
        'gender' =>'feminino'
   ]);
        \App\Models\User::create([
            'first_name' => 'Isabel',
            'second_name' => 'Daniela',
            'email' => 'isabeldaniela@example.com',
            'password' => bcrypt("123456789"),
            'gender' =>'feminino'
        ]);
        \App\Models\Weapons::create([
            'name' => 'AK',
            'model' => '47',
            'type' => 'Fuzil de assalto',
            'qtd_weapons_bullets' => 75,
            'quantity_stock' => 10,
        ]);
        \App\Models\Weapons::create([
            'name' => 'AK',
            'model' => '74',
            'type' => 'Fuzil de assalto',
            'qtd_weapons_bullets' => 75,
            'quantity_stock' => 30,
        ]);
        \App\Models\Weapons::create([
            'name' => 'AN',
            'model' => '94',
            'type' => 'Fuzil de assalto',
            'qtd_weapons_bullets' => 75,
            'quantity_stock' => 60,
        ]);
        \App\Models\Weapons::create([
            'name' => 'AK',
            'model' => '12',
            'type' => 'Fuzil de assalto',
            'qtd_weapons_bullets' => 35,
            'quantity_stock' => 2,
        ]);
        \App\Models\Weapons::create([
            'name' => 'AKE',
            'model' => '971',
            'type' => 'Fuzil de assalto',
            'qtd_weapons_bullets' => 40,
            'quantity_stock' => 5,
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Nascimento',
            'division' => 'PIR',
            'category' => 'Capitão',
            
            'nip' => "00012384729",
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Cardoso',
            'division' => 'SIC',
            'category' => 'Cabo',
            
            'nip' => "00012385629",
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Bento',
            'division' => 'Ordem pública',
            'category' => 'Sargento',
            
            'nip' => "00012384848893",
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Erica',
            'division' => 'PIR',
            'category' => 'Capitão',
        
            'nip' => "000123843050533",
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Delgada',
            'division' => 'SIC',
            'category' => 'Cabo',
        
            'nip' => "00012386529",
        ]);
        \App\Models\Police_officers::create([
            'name' => 'Elmo',
            'division' => 'Ordem pública',
            'category' => 'Sargento',
        
            'nip' => "000123848444393",
        ]);

        
   
    }
}
