<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectImage;

class SampleProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample projects
        $projects = [
            [
                'title' => 'Luxury Residential Complex',
                'slug' => 'luxury-residential-complex',
                'description' => 'Experience modern living in our premium residential development with world-class amenities and contemporary design. This project offers spacious apartments with stunning views and state-of-the-art facilities.',
                'short_description' => 'Premium residential development with world-class amenities',
                'category' => 'new_launch',
                'location' => 'Mumbai, Maharashtra',
                'start_date' => now()->addMonths(2),
                'end_date' => now()->addMonths(18),
                'area' => '2.5 Acres',
                'price' => 15000000, // 1.5 Crore
                'features' => [
                    'Premium Location',
                    'Modern Architecture',
                    'Green Building Design',
                    'High-Speed Elevators',
                    '24/7 Security',
                    'Power Backup'
                ],
                'amenities' => [
                    'Swimming Pool',
                    'Gymnasium',
                    'Club House',
                    'Children Play Area',
                    'Landscaped Gardens',
                    'Parking Space',
                    'CCTV Surveillance',
                    'Fire Safety System'
                ],
                'is_featured' => true,
                'is_active' => true,
                'meta_title' => 'Luxury Residential Complex - Premium Apartments in Mumbai',
                'meta_description' => 'Discover luxury living in our premium residential complex with world-class amenities and modern design.'
            ],
            [
                'title' => 'Commercial Business Park',
                'slug' => 'commercial-business-park',
                'description' => 'State-of-the-art commercial development designed for modern businesses with premium office spaces and facilities. Perfect for corporate headquarters and business operations.',
                'short_description' => 'Modern commercial development for business excellence',
                'category' => 'ongoing',
                'location' => 'Delhi, NCR',
                'start_date' => now()->subMonths(6),
                'end_date' => now()->addMonths(12),
                'area' => '5.0 Acres',
                'price' => 25000000, // 2.5 Crore
                'features' => [
                    'Prime Business Location',
                    'Modern Office Spaces',
                    'Flexible Floor Plans',
                    'High-Speed Internet',
                    'Conference Facilities',
                    'Parking for 500+ Cars'
                ],
                'amenities' => [
                    'Food Court',
                    'Banking Facilities',
                    'Medical Center',
                    'Fitness Center',
                    'Conference Rooms',
                    'Auditorium',
                    'ATM Services',
                    'Security Services'
                ],
                'is_featured' => true,
                'is_active' => true,
                'meta_title' => 'Commercial Business Park - Premium Office Spaces in Delhi NCR',
                'meta_description' => 'Modern commercial development with premium office spaces and business facilities.'
            ],
            [
                'title' => 'Green Valley Villas',
                'slug' => 'green-valley-villas',
                'description' => 'Eco-friendly villa project surrounded by nature with sustainable living solutions. Each villa comes with private garden and modern amenities.',
                'short_description' => 'Eco-friendly villas in natural surroundings',
                'category' => 'completed',
                'location' => 'Bangalore, Karnataka',
                'start_date' => now()->subMonths(24),
                'end_date' => now()->subMonths(6),
                'area' => '8.0 Acres',
                'price' => 35000000, // 3.5 Crore
                'features' => [
                    'Eco-Friendly Design',
                    'Solar Power System',
                    'Rainwater Harvesting',
                    'Private Gardens',
                    'Natural Ventilation',
                    'Waste Management System'
                ],
                'amenities' => [
                    'Community Center',
                    'Organic Garden',
                    'Walking Trails',
                    'Children Playground',
                    'Swimming Pool',
                    'Tennis Court',
                    'Library',
                    'Meditation Center'
                ],
                'is_featured' => false,
                'is_active' => true,
                'meta_title' => 'Green Valley Villas - Eco-Friendly Living in Bangalore',
                'meta_description' => 'Sustainable villa project with eco-friendly features and natural surroundings.'
            ]
        ];

        foreach ($projects as $projectData) {
            $project = Project::create($projectData);
            
            // Create sample project images (using placeholder URLs)
            $imageUrls = [
                'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ];

            foreach ($imageUrls as $index => $imageUrl) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => 'projects/sample_' . $project->id . '_' . $index . '.jpg',
                    'alt_text' => $project->title . ' - Image ' . ($index + 1),
                    'is_primary' => $index === 0
                ]);
            }
        }
    }
}
