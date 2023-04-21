<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->enum('currency', ['EUR', 'USD', 'GBP']);
            $table->date('date');
            $table->double('amount', 8, 2);
            $table->timestamps();
        });

        DB::table('posts')->insert([
            [
                'currency' => 'EUR',
                'date' => '2023-04-13',
                'amount' => 4.66,
            ],
            [
                'currency' => 'USD',
                'date' => '2023-04-13',
                'amount' => 4.86,
            ],
            [
                'currency' => 'GBP',
                'date' => '2023-04-13',
                'amount' => 6.66,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
