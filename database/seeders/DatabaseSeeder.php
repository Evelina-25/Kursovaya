<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Zone;
use App\Models\Status;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{

        Status::insert([
        [
            'name'=>'Новая',
        ], 

        [
            'name'=>'Подтверждена',
        ], 

        [
            'name'=>'Отклонена',
        ], 

        [
            'name'=>'Завершена',
        ], 
    ]);

    User::create([
        'login'=>'admin',
        'password'=>'Foto77',
        'phone'=>'7(777)777-77-77',
        'email'=>'admin@mail.ru',
        'role'=>'admin'
    ]);

    Zone::insert([
        [
            'name'=>'Лофт',
            'description'=>'Зона в стиле лофт: кирпичная стена, большие окна, мебель'
        ],

        [
            'name'=>'Белая студия',
            'description'=>'Светлая зона с белой циклорамой для портретной и каталожной съёмки'
        ],

        [
            'name'=>'Интерьерная зона',
            'description'=>'Уютная гостиная с декорациями для семейной и жанровой съёмки'
        ],

        [
            'name'=>'Новогодняя студия',
            'description'=>'Зона с новогодним интерьером'
        ]

    ]);

    Service::insert([
        [
            'name'=>'Индивидуальная съёмка',
            'price'=>'3000',
            'duration'=>'60'
        ],

        [
            'name'=>'Семейная съёмка',
            'price'=>'4500',
            'duration'=>'90'
        ],

        [
            'name'=>'Парная съёмка',
            'price'=>'3500',
            'duration'=>'60'
        ],

        [
            'name'=>'Аренда зоны без фотографа',
            'price'=>'1500',
            'duration'=>'60'
        ],
    ]);


}

}