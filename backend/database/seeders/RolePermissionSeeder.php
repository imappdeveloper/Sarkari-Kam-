<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'api']);
        $vendorRole = Role::create(['name' => 'vendor', 'guard_name' => 'api']);
        $customerRole = Role::create(['name' => 'customer', 'guard_name' => 'api']);

        // Admin permissions
        $adminPermissions = [
            'view_users',
            'create_user',
            'update_user',
            'delete_user',
            'view_vendors',
            'approve_vendor',
            'reject_vendor',
            'view_orders',
            'manage_categories',
            'manage_services',
            'view_analytics',
            'view_audit_logs',
            'manage_settings',
            'manage_coupons',
            'manage_support_tickets',
        ];

        foreach ($adminPermissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'api']);
            $adminRole->givePermissionTo($permission);
        }

        // Vendor permissions
        $vendorPermissions = [
            'view_profile',
            'update_profile',
            'manage_services',
            'view_proposals',
            'submit_proposal',
            'view_orders',
            'complete_order',
            'view_wallet',
            'view_analytics',
            'manage_support_tickets',
        ];

        foreach ($vendorPermissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission, 'guard_name' => 'api']);
            }
            $vendorRole->givePermissionTo($permission);
        }

        // Customer permissions
        $customerPermissions = [
            'view_profile',
            'update_profile',
            'create_requirement',
            'view_requirements',
            'view_proposals',
            'accept_proposal',
            'view_orders',
            'view_wallet',
            'submit_review',
            'manage_support_tickets',
        ];

        foreach ($customerPermissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission, 'guard_name' => 'api']);
            }
            $customerRole->givePermissionTo($permission);
        }
    }
}
