<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('チャプター名');
            //$table->integer('title_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('title_id')->constrained('titles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chapters', function (Blueprint $table) {
            // 外部キー制約の削除
            $table->dropForeign(['user_id']);
            $table->dropForeign(['title_id']);
            // カラムの削除
            $table->dropColumn('user_id');
            $table->dropColumn('title_id');
            $table->dropIfExists('chapters');
           });
    }
}
