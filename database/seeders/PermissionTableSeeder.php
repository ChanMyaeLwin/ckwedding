<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ["permission_id" => 1,"name" => "view-dashboard-return-total"],
            ["permission_id" => 2,"name" => "view-dashboard-return-finish"],
            ["permission_id" =>3,"name" => "view-dashboard-return-pending"],
            ["permission_id" =>4,"name" =>"view-dashboard-exchange-total"],
            ["permission_id" =>5,"name" =>"view-dashboard-exchange-finish"],
            ["permission_id" =>6,"name" =>"view-dashboard-exchange-pending"],
            ["permission_id" =>7,"name" =>"view-dashboard-overdue-exchange-document"],
            ["permission_id" =>8,"name" =>"view-dashboard-total-user"],
            ["permission_id" =>9,"name" =>"view-dashboard-total-supplier"],
            ["permission_id" =>10,"name" =>"view-dashboard-total-branch"],
            ["permission_id" =>11,"name" =>"view-dashboard-total-role"],
            ["permission_id" =>12,"name" =>"create-document"],
            ["permission_id" =>13,"name" =>"view-documents"],
            ["permission_id" =>14,"name" =>"edit-document"],
            ["permission_id" =>15,"name" =>"edit-document-no"],
            ["permission_id" =>16,"name" =>"edit-document-type"],
            ["permission_id" =>17,"name" =>"edit-document-date"],
            ["permission_id" =>18,"name" =>"edit-document-supplier"],
            ["permission_id" =>19,"name" =>"edit-document-remark-type"],
            ["permission_id" =>20,"name" =>"edit-document-category"],
            ["permission_id" =>21,"name" =>"edit-document-delivery-date"],
            ["permission_id" =>22,"name" =>"view-document-operation-remark"],
            ["permission_id" =>23,"name" =>"edit-document-operation-remark"],
            ["permission_id" =>24,"name" =>"view-document-operation-attach-file"],
            ["permission_id" =>25,"name" =>"edit-document-operation-attach-file"],
            ["permission_id" =>26,"name" =>"view-document-merchandising-remark"],
            ["permission_id" =>27,"name" =>"edit-document-merchandising-remark"],
            ["permission_id" =>28,"name" =>"view-document-merchandising-attach-file"],
            ["permission_id" =>29,"name" =>"edit-document-merchandising-attach-file"],
            ["permission_id" =>30,"name" =>"view-document-rgout-attach-file"],
            ["permission_id" =>31,"name" =>"edit-document-rgout-attach-file"],
            ["permission_id" =>32,"name" =>"view-document-accounting-cn-remark"],
            ["permission_id" =>33,"name" =>"edit-document-accounting-cn-remark"],
            ["permission_id" =>34,"name" =>"view-document-accounting-cn-attach-file"],
            ["permission_id" =>35,"name" =>"edit-document-accounting-cn-attach-file"],
            ["permission_id" =>36,"name" =>"view-document-rgin-attach-file"],
            ["permission_id" =>37,"name" =>"edit-document-rgin-attach-file"],
            ["permission_id" =>38,"name" =>"view-document-accounting-db-remark"],
            ["permission_id" =>39,"name" =>"edit-document-accounting-db-remark"],
            ["permission_id" =>40,"name" =>"view-document-accounting-db-attach-file"],
            ["permission_id" =>41,"name" =>"edit-document-accounting-db-attach-file"],
            ["permission_id" =>42,"name" =>"update-document-operation"],
            ["permission_id" =>43,"name" =>"update-document-bm"],
            ["permission_id" =>44,"name" =>"update-document-cm"],
            ["permission_id" =>45,"name" =>"update-document-mm"],
            ["permission_id" =>46,"name" =>"update-document-rgout"],
            ["permission_id" =>47,"name" =>"update-document-cn"],
            ["permission_id" =>48,"name" =>"update-document-rgin"],
            ["permission_id" =>49,"name" =>"update-document-db"],
            ["permission_id" =>50,"name" =>"update-document-bm-complete"],
            ["permission_id" =>51,"name" =>"update-document-bm-reject"],
            ["permission_id" =>52,"name" =>"update-document-cm-complete"],
            ["permission_id" =>53,"name" =>"update-document-cm-reject"],
            ["permission_id" =>54,"name" =>"update-document-mm-complete"],
            ["permission_id" =>55,"name" =>"update-document-mm-reject"],
            ["permission_id" =>56,"name" =>"update-document-rgout-complete"],
            ["permission_id" =>57,"name" =>"update-document-rgout-reject"],
            ["permission_id" =>58,"name" =>"update-document-cn-complete"],
            ["permission_id" =>59,"name" =>"update-document-cn-reject"],
            ["permission_id" =>60,"name" =>"update-document-rgin-complete"],
            ["permission_id" =>61,"name" =>"update-document-rgin-reject"],
            ["permission_id" =>62,"name" =>"update-document-db-complete"],
            ["permission_id" =>63,"name" =>"update-document-db-reject"],
            ["permission_id" =>64,"name" =>"export-document-cn"],
            ["permission_id" =>65,"name" =>"export-document-db"],
            ["permission_id" =>66,"name" =>"export-dcoument-rg-out"],
            ["permission_id" =>67,"name" =>"update-document-supplier-cancel"],
            ["permission_id" =>68,"name" =>"update-document-deducted"],
            ["permission_id" =>69,"name" =>"add-product"],
            ["permission_id" =>70,"name" =>"edit-product"],
            ["permission_id" =>71,"name" =>"edit-product-product-code"],
            ["permission_id" =>72,"name" =>"edit-product-rg-no"],
            ["permission_id" =>73,"name" =>"edit-product-qty"],
            ["permission_id" =>74,"name" =>"edit-product-bm-qty"],
            ["permission_id" =>75,"name" =>"edit-product-mer-qty"],
            ["permission_id" =>78,"name" =>"edit-product-rgout-qty"],
            ["permission_id" =>79,"name" =>"edit-product-rgin-qty"],
            ["permission_id" =>80,"name" =>"edit-product-attachfile"],
            ["permission_id" =>81,"name" =>"edit-product-remark"],
            ["permission_id" =>82,"name" =>"view-supplier"],
            ["permission_id" =>83,"name" =>"view-branch"],
            ["permission_id" =>84,"name" =>"create-user"],
            ["permission_id" =>85,"name" =>"edit-user"],
            ["permission_id" =>86,"name" =>"view-user"],
            ["permission_id" =>87,"name" =>"delete-user"],
            ["permission_id" =>88,"name" =>"delete-document"],
            ["permission_id" =>89,"name" =>"create-role"],
            ["permission_id" =>90,"name" =>"edit-role"],
            ["permission_id" =>91,"name" =>"view-role"],
            ["permission_id" =>92,"name" =>"delete-role"],
            ["permission_id" =>93,"name" =>"update-profile"],
         ];
      
         foreach ($permissions as $permission) {
            Permission::create($permission);
         }
    }
}
