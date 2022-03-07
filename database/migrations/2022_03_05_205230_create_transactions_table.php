<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transation_id')->nullable();
            $table->text('description')->nullable();
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->foreignId('sender_id')->nullable();
            $table->string('base_currency')->nullable();
            $table->string('quote_currency')->nullable();
            $table->float('value')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
