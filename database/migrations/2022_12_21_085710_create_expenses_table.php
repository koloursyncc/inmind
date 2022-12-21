<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
         Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('bank_payer');
            $table->string('to_payee');
            $table->string('pay_brand');
            $table->integer('supplier_type');
            $table->string('expense_category')->nullable();
            $table->text('expense_description')->nullable();
            $table->string('name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('mobile')->nullable();
            $table->double('amount')->nullable();
            $table->string('currency')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
