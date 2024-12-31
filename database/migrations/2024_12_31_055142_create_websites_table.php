<?php

use App\Models\Website;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->longText("content")->nullable();
            $table->timestamps();
        });

        $websiteExists = Website::where('name', 'About')->exists();
        if (!$websiteExists) {
            DB::table('websites')->insert([
                [
                    'name' => "Panduan",
                    'content' => ""
                ],
                [
                    'name' => "About",
                    'content' => ""
                ],
                [
                    'name' => "Perhatian",
                    'content' => ""
                ],
                [
                    'name' => "Information",
                    'content' => ""
                ]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websites');
    }
};
