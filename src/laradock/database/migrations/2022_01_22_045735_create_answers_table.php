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
            //$table->foreign('question_id')->references('id')->on('questions');
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
        //Schema::dropIfExists('answers');
         // カラムの削除
         $table->dropColumn('question_id');
         // 外部キー制約の削除
         $table->dropForeign(['question_id']);
    }
}
