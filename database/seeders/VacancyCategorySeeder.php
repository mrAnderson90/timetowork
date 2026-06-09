<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacancyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vacancy_categories')->insert([
            ['name' => 'Информационные технологии', 'slug' => 'it', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Маркетинг и реклама', 'slug' => 'marketing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Продажи', 'slug' => 'sales', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Финансы и бухгалтерия', 'slug' => 'finance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Банки и инвестиции', 'slug' => 'banking', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Юриспруденция', 'slug' => 'law', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Управление персоналом', 'slug' => 'hr', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Административный персонал', 'slug' => 'administration', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Производство', 'slug' => 'manufacturing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Строительство и недвижимость', 'slug' => 'construction', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Логистика и транспорт', 'slug' => 'logistics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Медицина и фармацевтика', 'slug' => 'medicine', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Образование и наука', 'slug' => 'education', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Гостиницы и рестораны', 'slug' => 'hospitality', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Розничная торговля', 'slug' => 'retail', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Служба поддержки', 'slug' => 'support', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Безопасность и охрана', 'slug' => 'security', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Рабочий персонал', 'slug' => 'workers', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Красота и здоровье', 'slug' => 'beauty', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Другое', 'slug' => 'other', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
