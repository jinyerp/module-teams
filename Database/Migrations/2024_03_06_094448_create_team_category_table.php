<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_category', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // 활성화
            $table->string('enable')->nullable();

            $table->string('title')->nullable();
            $table->string('cnt')->nullable(); // 소속된 회원
            $table->text('description')->nullable(); // 설명

            // 추가한사람
            $table->unsignedBigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_category');
    }
};
