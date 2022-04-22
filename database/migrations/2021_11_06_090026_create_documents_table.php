<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_no');
            $table->tinyInteger('document_type')->default('1'); // 1: return , 2: exchange
            $table->bigInteger('branch_id');
            $table->string('supplier_id')->nullable();
            $table->date('document_date')->nullable();
            
            $table->bigInteger('operation_id')->nullable();
            $table->datetime('operation_updated_datetime')->nullable();
            $table->bigInteger('branch_manager_id')->nullable();
            $table->datetime('branch_manager_updated_datetime')->nullable();
            $table->string('operation_remark')->nullable();
            $table->string('operation_attach_file')->nullable();
            
            $table->bigInteger('category_head_id')->nullable();
            $table->datetime('category_head_updated_datetime')->nullable();
            $table->bigInteger('merchandising_manager_id')->nullable();
            $table->datetime('merchandising_manager_updated_datetime')->nullable();
            $table->string('merchandising_remark')->nullable();
            $table->string('merchandising_attach_file')->nullable();
            
            $table->bigInteger('operation_rg_out_id')->nullable();
            $table->datetime('operation_rg_out_updated_datetime')->nullable();
            $table->string('operation_rg_out_attach_file')->nullable();
            
            $table->bigInteger('accounting_cn_id')->nullable();
            $table->datetime('accounting_cn_updated_datetime')->nullable();
            $table->string('accounting_cn_attach_file')->nullable();
            
            $table->bigInteger('operation_rg_in_id')->nullable();
            $table->datetime('operation_rg_in_updated_datetime')->nullable();
            $table->string('operation_rg_in_attach_file')->nullable();
            
            $table->bigInteger('accounting_db_id')->nullable();
            $table->datetime('accounting_db_updated_datetime')->nullable();
            $table->string('accounting_remark')->nullable();
            $table->string('accounting_db_attach_file')->nullable();
            
            $table->datetime('supplier_cancel_datetime')->nullable();
            $table->bigInteger('exchange_to_return_bm')->nullable();
            $table->datetime('exchange_to_return')->nullable();
            $table->bigInteger('discount_amount')->nullable();
            $table->datetime('delivery_date')->nullable();
            $table->bigInteger('exchange_deducted_id')->nullable();
            $table->datetime('exchange_deducted_updated_datetime')->nullable();
            $table->bigInteger('document_remark')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->tinyInteger('document_status')->default('1'); 
            // 1: op created, 
            // 2: bm , 
            // 3: bm cancel 
            // 4: cat head ,
            // 5: ct cancel  
            // 6: mer manager , 
            // 7: mm cancel 
            // 8: rg_out , 
            // 9: cn , 
            // 10: rg_in , 
            // 11: db , 
            // 12: supplier cancel , 
            // 1: Not, 
            // 2: Changed , 
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
        Schema::dropIfExists('documents');
    }
}
