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
        Schema::create('team_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // M:N 관계설정 필드
            $table->unsignedBigInteger('n_id'); // 팀

            // 사용자
            $table->unsignedBigInteger('m_id');
            $table->string('email')->nullable();
            $table->string('image')->nullable();

            $table->string('role')->nullable();
            $table->string('status')->nullable();
            $table->string('cnt')->nullable(); // 참여횟수
            $table->string('level')->nullable();
            $table->string('pos')->nullable();

            $table->string('permit_read')->default(1);
            $table->string('permit_create')->default(1);
            $table->string('permit_update')->default(1);
            $table->string('permit_delete')->default(1);

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
        Schema::dropIfExists('team_project_users');
    }
};
