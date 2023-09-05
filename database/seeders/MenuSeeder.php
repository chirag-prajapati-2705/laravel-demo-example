<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['menu_name' => 'Home', 'parent_id' => 0, 'sort_order' => 0, 'slug' => '/'],
            ['menu_name' => 'Pages', 'parent_id' => 0, 'sort_order' => 1, 'slug' => '/pages'],
            ['menu_name' => 'Our Services', 'parent_id' => 2, 'sort_order' => 2, 'slug' => '/our-services'],
            ['menu_name' => 'About', 'parent_id' => 2, 'sort_order' => 3, 'slug' => '/about'],
            ['menu_name' => 'About Team', 'parent_id' => 4, 'sort_order' => 3, 'slug' => '/about-team'],
            ['menu_name' => 'About Clients', 'parent_id' => 4, 'sort_order' => 3, 'slug' => '/about-clients'],
            ['menu_name' => 'Contact Team', 'parent_id' => 5, 'sort_order' => 3, 'slug' => '/contact-team'],
            ['menu_name' => 'Contact Clients', 'parent_id' => 6, 'sort_order' => 3, 'slug' => '/contact-clients'],
            ['menu_name' => 'Contact', 'parent_id' => 2, 'sort_order' => 4, 'slug' => '/contact'],
            ['menu_name' => 'Portfolio', 'parent_id' => 2, 'sort_order' => 4, 'slug' => '/portfolio'],
            ['menu_name' => 'Gallery', 'parent_id' => 2, 'sort_order' => 4, 'slug' => '/gallery']
        ];
        foreach ($menus as $menu) {
            Menu::Create($menu);
        }
    }
}
