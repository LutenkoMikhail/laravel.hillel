<?php

use App\Order;
use App\OrderProduct;
use App\Productie;
use App\StatusOrder;
use App\User;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_id = Order::all('id')->toArray();
        $producties_id = Productie::all('id')->toArray();
        foreach ($order_id as $index => $item) {
            shuffle($producties_id);
            $maxProduct = mt_rand(1, count($producties_id) / 2);
            for ($i = 0; $i < $maxProduct; $i++) {
                factory(OrderProduct::class)->create([
                    'order_id' => $item['id'],
                    'producties_id' => $producties_id[$i]['id']
                ]);
            }
        }
    }
}
//$users = DB::table('users')->select('name', 'email as user_email')->get();

//DB::table('users')
//    ->where('id', 1)
//    ->update(['votes' => 1]);

//$price = DB::table('orders')
//    ->where('finalized', 1)
//    ->avg('price');

//$flight = App\Flight::find(1);
//$flight->name = 'New Flight Name';
//$flight->save();
