<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->date('date');

            $table->string('user_code', 50)->nullable(); //default code is 20001 to 20004 for admin side, 30001 to 30009 for user side
            $table->string('item_code')->nullable();

            $table->string('location', 10)->default('Yangon');
            $table->string('supplier')->default('Supplier');
            $table->string('payment_type')->default('Cash');
            $table->string('currency', 10)->default('Kyats');

            $table->bigInteger('quantity')->default(0); // Changed to bigInteger
            $table->bigInteger('discount_and_foc')->default(0); // Changed to bigInteger
            $table->bigInteger('paid')->default(0); // Changed to bigInteger
            $table->bigInteger('total')->default(0); // Changed to bigInteger
            $table->bigInteger('balance')->default(0); // Changed to bigInteger
            
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
