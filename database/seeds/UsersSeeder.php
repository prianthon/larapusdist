<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // membuat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        // membuat role member
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();

        // membuat sample admin
        $admin = new User();
        $admin->name = 'Admin Larapus';
        $admin->email = 'info@prianthon.id';
        $admin->password = bcrypt('rahasia');
        $admin->is_verified = 1;
        $admin->save();
        $admin->attachRole($adminRole);

        // membuat sample member
        $member = new User();
        $member->name = "Sample Member";
        $member->email = 'member@prianthon.id';
        $member->password = bcrypt('rahasia');
        $member->is_verified = 1;
        $member->save();
        $member->attachRole($memberRole);
    }
}
