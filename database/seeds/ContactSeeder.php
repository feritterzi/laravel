<?php

use Illuminate\Database\Seeder;
use App\Models\Contact;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contact::class, 100)->create()->each(function ($message) {

        });
    }
}
