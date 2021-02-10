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
        $contact1=new Contact();
        $contact1->type=Contact::TYPE_PHONE;
        $contact1->value="+73241342123";
        $contact1->user_id=1;
        $contact1->is_rent_department=true;
        $contact1->save();

        $contact2=new Contact();
        $contact2->type=Contact::TYPE_PHONE;
        $contact2->value="+73241342122";
        $contact2->user_id=1;
        $contact1->is_rent_department=false;
        $contact2->save();

        $contact3=new Contact();
        $contact3->type=Contact::TYPE_EMAIL;
        $contact3->value="advs@gmail.con";
        $contact3->user_id=1;
        $contact1->is_rent_department=true;
        $contact3->save();
    }
}
