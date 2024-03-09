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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // 팀 활성화
            $table->string('enable')->nullable();

            // 팀정보
            $table->string('code');
            $table->string('title')->nullable(); // 설명
            $table->text('description')->nullable(); // 설명

            $table->string('image')->nullable(); // 설명

            // 팀 관리
            $table->string('expire')->nullable();
            $table->string('status')->nullable();
            $table->string('reference')->nullable();
            $table->string('category')->nullable();

            // 팀 최대/최소 수량
            $table->string('max_user')->nullable();
            $table->string('min_user')->nullable();

            // 팀 승인
            $table->string('auth')->nullable();
            $table->unsignedBigInteger('auth_id')->nullable(); // 승인자


            // 담당자
            $table->string('owner')->nullable(); // 담당자
            $table->string('members')->nullable(); // 담당자
            $table->string('manager_id')->nullable();

            // 개설자
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
        Schema::dropIfExists('team_projects');
    }
};
