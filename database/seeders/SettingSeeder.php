<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'site_name' => 'Gurukrupa Real Estate',
            'site_description' => 'Leading real estate developer specializing in premium residential and commercial projects.',
            'contact_email' => 'info@gurukrupa.com',
            'contact_phone' => '+91 9876543210',
            'contact_address' => '123 Business District, Mumbai, Maharashtra 400001',
            'social_facebook' => 'https://facebook.com/gurukrupa',
            'social_twitter' => 'https://twitter.com/gurukrupa',
            'social_instagram' => 'https://instagram.com/gurukrupa',
            'social_linkedin' => 'https://linkedin.com/company/gurukrupa',
            'google_maps_api_key' => '',
            // SEO Settings
            'meta_title' => 'Gurukrupa Real Estate - Premium Properties in Mumbai',
            'meta_description' => 'Discover premium residential and commercial properties by Gurukrupa Real Estate. Leading developer in Mumbai with luxury homes and commercial spaces.',
            'meta_keywords' => 'real estate, construction, homes, properties, gurukrupa, mumbai, residential, commercial, luxury homes',
            'og_title' => 'Gurukrupa Real Estate - Premium Properties',
            'og_description' => 'Leading real estate developer specializing in premium residential and commercial projects in Mumbai.',
            'twitter_card' => 'summary_large_image',
            'twitter_handle' => '@gurukrupa',
            'canonical_url' => 'https://gurukrupa.com',
            'robots_txt' => "User-agent: *\nAllow: /\nSitemap: https://gurukrupa.com/sitemap.xml",
            'google_analytics' => '',
            'google_search_console' => '',
            'bing_webmaster' => '',
            'schema_markup' => '{
                "@context": "https://schema.org",
                "@type": "Organization",
                "name": "Gurukrupa Real Estate",
                "url": "https://gurukrupa.com",
                "logo": "https://gurukrupa.com/logo.png",
                "description": "Leading real estate developer specializing in premium residential and commercial projects.",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "123 Business District",
                    "addressLocality": "Mumbai",
                    "addressRegion": "Maharashtra",
                    "postalCode": "400001",
                    "addressCountry": "IN"
                },
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "+91-9876543210",
                    "contactType": "customer service",
                    "email": "info@gurukrupa.com"
                }
            }',
            'custom_css' => '',
            'custom_js' => '',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
