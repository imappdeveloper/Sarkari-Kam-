<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requirement_id')->constrained()->onDelete('restrict');
            $table->foreignId('proposal_id')->constrained()->onDelete('restrict');
            $table->foreignId('customer_id')->constrained()->onDelete('restrict');
            $table->foreignId('vendor_id')->constrained()->onDelete('restrict');
            $table->foreignId('service_id')->constrained()->onDelete('restrict');
            $table->string('order_number')->unique();
            $table->decimal('price', 12, 2);
            $table->string('currency', 3)->default('INR');
            $table->enum('payment_status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->enum('order_status', ['pending', 'in_progress', 'completed', 'cancelled', 'on_hold'])->default('pending');
            $table->enum('escrow_status', ['pending', 'held', 'released', 'refunded'])->default('pending');
            $table->date('delivery_date')->nullable();
            $table->timestamp('completion_date')->nullable();
            $table->text('notes')->nullable();
            $table->json('attachments')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->index('customer_id');
            $table->index('vendor_id');
            $table->index('order_status');
            $table->index('payment_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
