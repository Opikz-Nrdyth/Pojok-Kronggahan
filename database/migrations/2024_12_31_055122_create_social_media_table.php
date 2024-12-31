<?php

use App\Models\SocialMedia;
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
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("icon");
            $table->longText("url")->nullable();
            $table->timestamps();
        });

        $socialExists = SocialMedia::where('name', 'Instagram')->exists();

        if (!$socialExists) {
            DB::table('social_media')->insert([
                [
                    'name' => "Facebook",
                    'url' => "#",
                    'icon' => '<i class="fa-brands fa-facebook"></i>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => "Instagram",
                    'url' => "#",
                    'icon' => '<i class="fa-brands fa-instagram"></i>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => "Youtube",
                    'url' => "#",
                    'icon' => '<i class="fa-brands fa-youtube"></i>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => "Twiter",
                    'url' => "#",
                    'icon' => '<i class="fa-brands fa-x-twitter"></i>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
