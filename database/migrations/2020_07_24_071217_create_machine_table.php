<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num')->comment('产品编号');
            $table->string('forbidden_area')->comment('禁用区内');
            $table->string('standard')->comment('国标');
            $table->string('name')->comment('商品名');
            $table->string('product_no')->comment('产品编号');
            $table->string('brand')->comment('品牌');
            $table->string('model')->comment('型号');
            $table->string('manufacture')->comment('制造商');
            $table->string('info_status')->comment('信息状态');
            $table->timestamp('first_apply_at')->comment('首次申报时间');
            $table->string('test_results')->comment('检测结果');
            $table->timestamp('test_at')->comment('检测时间');
            $table->json('pics')->comment('轮播图片');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine');
    }
}
