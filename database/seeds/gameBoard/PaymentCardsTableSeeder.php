<?php

use Illuminate\Database\Seeder;
use Database\childFactories\CardChildFactory;

class PaymentCardsTableSeeder extends Seeder
{
    protected $table = 'payment_cards';

    protected $file = 'paymentCards';

    protected $action = 'pay';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new CardChildFactory(
            $this->table,
            $this->file,
            'original',
            $this->action
        ))->create();
    }
}
