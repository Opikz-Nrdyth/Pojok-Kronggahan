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
        Schema::create('engagements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')   // Foreign key ke tabel news
                ->constrained('news')       // Mengacu pada tabel 'news'
                ->onDelete('cascade');      // Hapus data terkait jika data 'news' dihapus
            $table->integer('clicks')->default(0); // Jumlah klik
            $table->boolean('view_hours')->default(0); // Jam tayang
            $table->integer('likes')->default(0); // Jumlah like
            $table->integer('dislikes')->default(0); // Jumlah dislike
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engagements');
    }
};
