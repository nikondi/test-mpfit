<?php

use App\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer');

            $table->string('status')
                ->default(OrderStatus::NEW->value);

            $table->foreignId('product_id')
                ->nullable()
                ->constrained('products')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            // nullable - Если "случайно" удалить товар, то хотя бы останется информация о покупателе
            // лучше сделать галочку "удалить заказы" при удалении товара

            $table->integer('quantity')->default(1);
            $table->float('final_price');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
