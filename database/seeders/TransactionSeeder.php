<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    protected $transaction = Transaction::class;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Transaction::factory(6)
                ->type()
                ->status()
                ->create();
    }
}
