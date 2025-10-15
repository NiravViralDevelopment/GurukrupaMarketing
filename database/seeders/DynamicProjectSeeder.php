<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectImage;

class DynamicProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create one dynamic project with actual images
        $project = Project::create([
            'title' => 'Luxury Heights Apartments',
            'slug' => 'luxury-heights-apartments',
            'description' => 'Premium residential complex with world-class amenities and modern architecture. Located in the heart of the city with easy access to business districts. This project features spacious apartments with stunning views and state-of-the-art facilities.',
            'short_description' => 'Premium residential complex with world-class amenities and modern architecture.',
            'category' => 'new_launch',
            'location' => 'Mumbai, Maharashtra',
            'start_date' => now()->addMonths(1),
            'end_date' => now()->addMonths(18),
            'area' => '2.5 Acres',
            'price' => 25000000, // 2.5 Crore
            'features' => [
                'Premium Location',
                'Modern Architecture', 
                'Green Building Design',
                'High-Speed Elevators',
                '24/7 Security',
                'Power Backup',
                'Swimming Pool',
                'Gymnasium'
            ],
            'amenities' => [
                'Swimming Pool',
                'Gymnasium',
                'Club House',
                'Children Play Area',
                'Landscaped Gardens',
                'Parking Space',
                'CCTV Surveillance',
                'Fire Safety System',
                'Concierge Service',
                'Rooftop Garden'
            ],
            'is_featured' => true,
            'is_active' => true,
            'brochure' => 'sample_brochure.pdf', // Sample brochure file
            'meta_title' => 'Luxury Heights Apartments - Premium Residential Complex in Mumbai',
            'meta_description' => 'Discover luxury living in our premium residential complex with world-class amenities and modern design in Mumbai.'
        ]);
        
        // Add actual images from the public/projects directory
        $imageFiles = [
            '1760162637_0.jpeg',
            '1760162637_1.jpeg', 
            '1760162637_2.jpeg',
            '1760162637_3.jpeg',
            '1760162637_4.jpeg',
            '1760162637_5.jpeg'
        ];
        
        foreach ($imageFiles as $index => $imageFile) {
            ProjectImage::create([
                'project_id' => $project->id,
                'image_path' => 'projects/' . $imageFile,
                'alt_text' => 'Luxury Heights Apartments - ' . ($index + 1),
                'is_primary' => $index === 0, // First image is primary
                'sort_order' => $index
            ]);
        }
        
        $this->command->info('Dynamic project created successfully with ' . count($imageFiles) . ' images!');
    }
}
