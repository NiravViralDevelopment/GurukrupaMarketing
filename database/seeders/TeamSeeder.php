<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teamMembers = [
            [
                'name' => 'Rajesh Kumar',
                'position' => 'Founder & CEO',
                'bio' => 'With over 20 years of experience in real estate development, Rajesh has led the company to become one of the most trusted names in the industry.',
                'image' => 'team/rajesh-kumar.jpg',
                'email' => 'rajesh@gurukrupa.com',
                'phone' => '+91 9876543210',
                'social_links' => [
                    'linkedin' => 'https://linkedin.com/in/rajesh-kumar',
                    'twitter' => 'https://twitter.com/rajesh_kumar',
                ],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Priya Sharma',
                'position' => 'Chief Operating Officer',
                'bio' => 'Priya brings extensive experience in project management and operations, ensuring smooth execution of all our development projects.',
                'image' => 'team/priya-sharma.jpg',
                'email' => 'priya@gurukrupa.com',
                'phone' => '+91 9876543211',
                'social_links' => [
                    'linkedin' => 'https://linkedin.com/in/priya-sharma',
                ],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Amit Patel',
                'position' => 'Head of Sales',
                'bio' => 'Amit leads our sales team with a customer-first approach, helping clients find their perfect property investment.',
                'image' => 'team/amit-patel.jpg',
                'email' => 'amit@gurukrupa.com',
                'phone' => '+91 9876543212',
                'social_links' => [
                    'linkedin' => 'https://linkedin.com/in/amit-patel',
                    'twitter' => 'https://twitter.com/amit_patel',
                ],
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($teamMembers as $memberData) {
            Team::create($memberData);
        }
    }
}
