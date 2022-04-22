<?php

namespace Database\Seeders;

use App\Models\DocumentRemark;
use Illuminate\Database\Seeder;

class DocumentRemarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            [
                "document_remark" => "Non Moved Return",
            ],
            [
                "document_remark" => "Consignment Return",
            ],
            [
                "document_remark" => "Product Damage Return",
            ],
            [
                "document_remark" => "Product Expire Return",
            ],
            [
                "document_remark" => "Product Return for Over Stock",
            ],
            [
                "document_remark" => "Promotion End Return",
            ],
            [
                "document_remark" => "Supplier Wants the items back",
            ],
            [
                "document_remark" => "Product Qty & Unit Wrong Return",
            ],
            [
                "document_remark" => "Product Wrong Return",
            ],
            [
                "document_remark" => "Supplier Vendor Wrong Return",
            ],
            [
                "document_remark" => "Out off stock Return",
            ],
            [
                "document_remark" => "Exchange Return",
            ],
           
        ];

        foreach ($data as $value) {
            $role = DocumentRemark::create($value);

        }
    }
}
