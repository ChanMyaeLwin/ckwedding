<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document_id');
            $table->string('product_code_no');
            $table->string('product_name');
            $table->string('product_unit');
            $table->bigInteger('stock_quantity');
            $table->bigInteger('return_quantity');
            $table->bigInteger('operation_actual_quantity')->nullable();
            $table->bigInteger('merchandising_actual_qty')->nullable();
            $table->bigInteger('operation_rg_out_actual_qty')->nullable();
            $table->bigInteger('operation_rg_in_actual_qty')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('rg_out_doc_no')->nullable();
            $table->string('operation_attach_file')->nullable();
            $table->string('operation_remark')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
