<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('character')->comment('キャラクター名');
            $table->string('line')->comment('セリフ');
            //$table->integer('question_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('title_id')->constrained('titles');
            $table->foreignId('chapter_id')->constrained('chapters');
            $table->foreignId('question_id')->constrained('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            // 外部キー制約の削除
            $table->dropForeign(['user_id']);
            $table->dropForeign(['title_id']);
            $table->dropForeign(['chapter_id']);
            $table->dropForeign(['question_id']);
            // カラムの削除
            $table->dropColumn('user_id');
            $table->dropColumn('title_id');
            $table->dropColumn('chapter_id');
            $table->dropColumn('question_id');
            $table->dropIfExists('answers');
        });
    }
}
