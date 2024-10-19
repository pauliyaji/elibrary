<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 25,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 26,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 27,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 28,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 29,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 30,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 31,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 32,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 33,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 34,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 35,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 36,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 37,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 38,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 39,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 40,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 41,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 42,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 43,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 44,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 45,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 46,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 47,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 48,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 49,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 50,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 51,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 52,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 53,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 54,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 55,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 56,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 57,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 58,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 59,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 60,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 61,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 62,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 63,
                'title' => 'task_create',
            ],
            [
                'id'    => 64,
                'title' => 'task_edit',
            ],
            [
                'id'    => 65,
                'title' => 'task_show',
            ],
            [
                'id'    => 66,
                'title' => 'task_delete',
            ],
            [
                'id'    => 67,
                'title' => 'task_access',
            ],
            [
                'id'    => 68,
                'title' => 'task_calendar_access',
            ],
            [
                'id'    => 69,
                'title' => 'book_category_create',
            ],
            [
                'id'    => 70,
                'title' => 'book_category_edit',
            ],
            [
                'id'    => 71,
                'title' => 'book_category_delete',
            ],
            [
                'id'    => 72,
                'title' => 'book_category_access',
            ],
            [
                'id'    => 73,
                'title' => 'resource_category_create',
            ],
            [
                'id'    => 74,
                'title' => 'resource_category_edit',
            ],
            [
                'id'    => 75,
                'title' => 'resource_category_show',
            ],
            [
                'id'    => 76,
                'title' => 'resource_category_delete',
            ],
            [
                'id'    => 77,
                'title' => 'resource_category_access',
            ],
            [
                'id'    => 78,
                'title' => 'resource_create',
            ],
            [
                'id'    => 79,
                'title' => 'resource_edit',
            ],
            [
                'id'    => 80,
                'title' => 'resource_show',
            ],
            [
                'id'    => 81,
                'title' => 'resource_delete',
            ],
            [
                'id'    => 82,
                'title' => 'resource_access',
            ],
            [
                'id'    => 83,
                'title' => 'resources_management_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
