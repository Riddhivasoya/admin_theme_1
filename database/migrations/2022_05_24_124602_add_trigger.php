<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrigger extends Migration {
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER add_Customer_city AFTER INSERT ON `customers` FOR EACH ROW

                BEGIN

                   INSERT INTO customer_city (`customer_data_id`) VALUES (NEW.id);

                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                DB::unprepared('DROP TRIGGER `add_Customer_city`');


    }
};
