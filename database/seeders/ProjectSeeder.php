<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Luxury Heights Apartments',
                'description' => 'Premium residential complex with world-class amenities and modern architecture. Located in the heart of the city with easy access to business districts.',
                'short_description' => 'Premium residential complex with world-class amenities.',
                'category' => 'completed',
                'location' => 'Bandra West, Mumbai',
                'start_date' => '2022-01-01',
                'end_date' => '2024-06-30',
                'area' => '2.5 Acres',
                'price' => 25000000,
                'features' => ['Swimming Pool', 'Gymnasium', 'Parking', 'Security', 'Garden', 'Club House'],
                'map_lat' => 19.0544,
                'map_lng' => 72.8406,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Business Park Towers',
                'description' => 'Modern commercial complex designed for corporate offices with state-of-the-art facilities and sustainable design.',
                'short_description' => 'Modern commercial complex for corporate offices.',
                'category' => 'ongoing',
                'location' => 'Andheri East, Mumbai',
                'start_date' => '2023-03-01',
                'end_date' => '2025-12-31',
                'area' => '5.0 Acres',
                'price' => 50000000,
                'features' => ['Conference Rooms', 'Cafeteria', 'Parking', 'Security', 'Landscaping', 'Power Backup'],
                'map_lat' => 19.1136,
                'map_lng' => 72.8697,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Green Valley Villas',
                'description' => 'Eco-friendly residential villas with sustainable living features and beautiful landscaping.',
                'short_description' => 'Eco-friendly residential villas with sustainable features.',
                'category' => 'new_launch',
                'location' => 'Pune, Maharashtra',
                'start_date' => '2024-01-01',
                'end_date' => '2026-06-30',
                'area' => '10.0 Acres',
                'price' => 15000000,
                'features' => ['Solar Panels', 'Rainwater Harvesting', 'Organic Garden', 'Electric Vehicle Charging', 'Smart Home Features'],
                'map_lat' => 18.5204,
                'map_lng' => 73.8567,
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($projects as $projectData) {
            $project = Project::create($projectData);
            
            // Create sample images (placeholder paths)
            for ($i = 1; $i <= 3; $i++) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => "projects/sample-{$project->id}-{$i}.jpg",
                    'alt_text' => "{$project->title} - Image {$i}",
                    'is_primary' => $i === 1,
                    'sort_order' => $i - 1,
                ]);
            }
        }
    }
}
