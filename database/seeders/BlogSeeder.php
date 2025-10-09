<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Future of Real Estate: Smart Homes and Sustainability',
                'content' => '<p>The real estate industry is rapidly evolving with the integration of smart home technologies and sustainable building practices. Modern homeowners are increasingly looking for properties that offer both convenience and environmental responsibility.</p><p>Smart homes equipped with IoT devices, automated systems, and energy-efficient appliances are becoming the new standard. These technologies not only provide comfort and security but also significantly reduce energy consumption and environmental impact.</p><p>Sustainability in construction involves using eco-friendly materials, implementing renewable energy sources, and designing buildings that work harmoniously with their natural surroundings. Green building certifications like LEED and IGBC are becoming essential for new developments.</p>',
                'excerpt' => 'Exploring how smart home technologies and sustainable building practices are shaping the future of real estate.',
                'featured_image' => 'blogs/smart-homes.jpg',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Investment Opportunities in Commercial Real Estate',
                'content' => '<p>Commercial real estate continues to be a lucrative investment option for both individual and institutional investors. The sector offers various opportunities including office spaces, retail properties, warehouses, and hospitality assets.</p><p>Key factors driving commercial real estate investments include location advantages, infrastructure development, and economic growth in the region. Properties in prime business districts with good connectivity and modern amenities tend to provide better returns.</p><p>Investors should consider factors like rental yields, capital appreciation potential, tenant quality, and market trends before making investment decisions. Diversification across different property types and locations can help mitigate risks.</p>',
                'excerpt' => 'A comprehensive guide to commercial real estate investment opportunities and key considerations.',
                'featured_image' => 'blogs/commercial-real-estate.jpg',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Home Buying Guide: First-Time Buyer Tips',
                'content' => '<p>Buying your first home is one of the most significant financial decisions you\'ll make. This comprehensive guide covers everything first-time buyers need to know to make informed decisions.</p><p>Start by determining your budget, including down payment, closing costs, and ongoing expenses. Get pre-approved for a mortgage to understand your borrowing capacity and strengthen your offer when you find the right property.</p><p>Location is crucial - consider factors like proximity to work, schools, healthcare facilities, and future development plans. Don\'t forget to factor in property taxes, insurance, and maintenance costs when calculating affordability.</p>',
                'excerpt' => 'Essential tips and guidance for first-time home buyers to navigate the property market successfully.',
                'featured_image' => 'blogs/first-time-buyer.jpg',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($blogs as $blogData) {
            Blog::create($blogData);
        }
    }
}
