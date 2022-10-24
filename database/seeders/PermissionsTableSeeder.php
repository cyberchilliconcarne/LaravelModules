<?php

namespace Database\Seeders;

use App\Models\User\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 18,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 19,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 20,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 21,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 22,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 23,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 24,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 25,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 26,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 27,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 28,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 29,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 30,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 31,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 32,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 33,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 34,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 35,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 36,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 37,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 38,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 39,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 40,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 41,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 42,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 43,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 44,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 45,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 46,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 47,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 48,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 49,
                'title' => 'product_create',
            ],
            [
                'id'    => 50,
                'title' => 'product_edit',
            ],
            [
                'id'    => 51,
                'title' => 'product_show',
            ],
            [
                'id'    => 52,
                'title' => 'product_delete',
            ],
            [
                'id'    => 53,
                'title' => 'product_access',
            ],
            [
                'id'    => 54,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 55,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 56,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 57,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 58,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 59,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 60,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 61,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 62,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 63,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 64,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 65,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 66,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 67,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 68,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 69,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 70,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 71,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 72,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 73,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 74,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 75,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 76,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 77,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 78,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 79,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 80,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 81,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 82,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 83,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 84,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 85,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 86,
                'title' => 'asset_create',
            ],
            [
                'id'    => 87,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 88,
                'title' => 'asset_show',
            ],
            [
                'id'    => 89,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 90,
                'title' => 'asset_access',
            ],
            [
                'id'    => 91,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 92,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 93,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 94,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 95,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 96,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 97,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 98,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 99,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 100,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 101,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 102,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 103,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 104,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 105,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 106,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 107,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 108,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 109,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 110,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 111,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 112,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 113,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 114,
                'title' => 'task_create',
            ],
            [
                'id'    => 115,
                'title' => 'task_edit',
            ],
            [
                'id'    => 116,
                'title' => 'task_show',
            ],
            [
                'id'    => 117,
                'title' => 'task_delete',
            ],
            [
                'id'    => 118,
                'title' => 'task_access',
            ],
            [
                'id'    => 119,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 120,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
