<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // User module
        Permission::create([
            'name' => 'Create Users',
            'parent' => 'Users'
        ]);

        Permission::create([
            'name' => 'View Users',
            'parent' => 'Users'
        ]);
        Permission::create([
            'name' => 'Delete Users',
            'parent' => 'Users'
        ]);
        Permission::create([
            'name' => 'Update User',
            'parent' => 'Users'
        ]);

        // Patients module
        Permission::create([
            'name' => 'Create Patient',
            'parent' => 'Patients',
        ]);
        Permission::create([
            'name' => 'Update Patient',
            'parent' => 'Patients',
        ]);
        Permission::create([
            'name' => 'Delete Patient',
            'parent' => 'Patients',
        ]);
        Permission::create([
            'name' => 'View Patients',
            'parent' => 'Patients',
        ]);

        // Appointments module
        Permission::create([
            'name' => 'View Appointments',
            'parent' => 'Appointment',
        ]);
        Permission::create([
            'name' => 'Create Appointments',
            'parent' => 'Appointment',
        ]);
        Permission::create([
            'name' => 'Update Appointments',
            'parent' => 'Appointment',
        ]);
        Permission::create([
            'name' => 'Delete Appointments',
            'parent' => 'Appointment',
        ]);

          // Billing module
          Permission::create([
            'name' => 'View Treatments',
            'parent' => 'Treatments',
        ]);
        Permission::create([
            'name' => 'Create Treatments',
            'parent' => 'Treatments',
        ]);
        Permission::create([
            'name' => 'Update Treatments',
            'parent' => 'Treatments',
        ]);
        Permission::create([
            'name' => 'Delete Treatments',
            'parent' => 'Treatments',
        ]);

        // Departments module
        Permission::create([
            'name' => 'View Departments',
            'parent' => 'Department',
        ]);
        Permission::create([
            'name' => 'Create Department',
            'parent' => 'Department',
        ]);
        Permission::create([
            'name' => 'Update Department',
            'parent' => 'Department',
        ]);
        Permission::create([
            'name' => 'Delete Department',
            'parent' => 'Department',
        ]);

        // Done procedures
        Permission::create([
            'name' => 'Manage Charting',
            'parent' => 'Charting',
        ]);

        // Done procedures
        Permission::create([
            'name' => 'Manage Transactions',
            'parent' => 'Transactions',
        ]);

        Permission::create([
            'name' => 'Create Invoice',
            'parent' => 'Invoices',
        ]);

        Permission::create([
            'name' => 'Delete Invoice',
            'parent' => 'Invoices',
        ]);

        Permission::create([
            'name' => 'View Invoices',
            'parent' => 'Invoices',
        ]);
    }
}
