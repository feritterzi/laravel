<?php

use App\Models\Support;
use App\Models\Supportcat;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supportcat::create(['status'=>1,'title' => 'Üyelik','slug' => 'uyelik']);
        Supportcat::create(['status'=>1,'title' => 'Yeni Üyelik','slug' => 'yeni-uyelik']);
        Supportcat::create(['status'=>1,'title' => 'Üyelik İşlemleri','slug' => 'uyelik-islemleri']);
        Supportcat::create(['status'=>1,'title' => 'Üyelik İptali','slug' => 'uyelik-iptali']);
        Supportcat::create(['status'=>1,'title' => 'Kampanya','slug' => 'kampanya']);


        factory(App\Models\Support::class, 30)->create();

        for ($i=1; $i <= Support::count(); $i++) {
            DB::insert('insert into support_supportcat (support_id, supportcat_id,created_at) values (?, ?, ?)', [$i, rand(1,5),Carbon::now()->setTime(0,0)->format('Y-m-d H:i:s')]);
        }



    }
}
