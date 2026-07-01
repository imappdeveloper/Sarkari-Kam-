<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('vendor_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('rating');
            $table->string('title');
            $table->longText('comment')->nullable();
            $table->json('attachments')->nullable();
            $table->boolean('is_verified_purchase')->default(true);
            $table->unsignedInteger('helpful_count')->default(0);
            $table->boolean('is_approved')->default(true);
            $table->softDeletes();
            $table->timestamps();
            
            $table->index('order_id');
            $table->index('customer_id');
            $table->index('vendor_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
