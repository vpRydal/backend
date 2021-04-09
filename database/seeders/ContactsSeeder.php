<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                "value" => "+7(978) 801-43-83",
                "type" => Contact::TYPE_PHONE,
                'header' => 'Менеджер проекта',
                "is_rent_department" => false,
                'user_id' => 1
            ],
            [
                "value" => "elena@sferos.com",
                "type" => Contact::TYPE_EMAIL,
                'header' => 'email',
                "is_rent_department" => false,
                'user_id' => 1
            ],
            [
                "value" => "irina@sferos.com",
                'header' => 'email',
                "type" => Contact::TYPE_EMAIL,
                "is_rent_department" => false,
                'user_id' => 1
            ],
            [
                "value" => "+7 (978) 734-58-55",
                "type" => Contact::TYPE_PHONE,
                "is_rent_department" => true,
                'user_id' => 1,
                'header' => ''
            ],
            [
                "value" => "+7 (978) 268-72-55",
                "type" => Contact::TYPE_PHONE,
                "is_rent_department" => true,
                'user_id' => 1,
                'header' => ''
            ],
            [
                "value" => "+7 (978) 734-58-99",
                "type" => Contact::TYPE_PHONE,
                "is_rent_department" => true,
                'user_id' => 1,
                'header' => ''
            ],
            [
                "value" => "+7 (918) 473-08-39",
                "type" => Contact::TYPE_PHONE,
                "is_rent_department" => true,
                'user_id' => 1,
                'header' => ''
            ]
        ];

        Contact::insert($contacts);
    }
}
