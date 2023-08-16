<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('transaction_no')->nullable(); // New field
            $table->string('mtn_no')->nullable();
            $table->double('USD_amt')->default(0);
            $table->double('INR_amt')->default(0);
            $table->enum('status', [1, 2, 3])->default(1)->comment('1 Deposit, 2 Withdraw, 3 Other');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('remark')->nullable();
            $table->enum('deposit_type', [1, 2, 3])->default(1)->comment('1 Cash, 2 Check, 3 Bank');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
