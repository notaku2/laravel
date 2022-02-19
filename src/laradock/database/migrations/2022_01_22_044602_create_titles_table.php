<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('タイトル名')->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('user_id')->constrained('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('titles');
        // カラムの削除
        $table->dropColumn('user_id');
        // 外部キー制約の削除
        $table->dropForeign(['user_id']);
    }
}
