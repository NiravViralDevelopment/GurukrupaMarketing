@extends('layouts.admin')

@section('title', 'Settings')
@section('page-title', 'Site Settings')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">General Settings</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name *</label>
                <input type="text" name="site_name" id="site_name" value="{{ $settings['site_name'] ?? '' }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('site_name') border-red-500 @enderror">
                @error('site_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email *</label>
                <input type="email" name="contact_email" id="contact_email" value="{{ $settings['contact_email'] ?? '' }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('contact_email') border-red-500 @enderror">
                @error('contact_email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="site_description" class="block text-sm font-medium text-gray-700">Site Description</label>
            <textarea name="site_description" id="site_description" rows="3"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('site_description') border-red-500 @enderror">{{ $settings['site_description'] ?? '' }}</textarea>
            @error('site_description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Contact Information</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="contact_phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="contact_phone" id="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('contact_phone') border-red-500 @enderror">
                @error('contact_phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="contact_address" class="block text-sm font-medium text-gray-700">Address</label>
                <textarea name="contact_address" id="contact_address" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('contact_address') border-red-500 @enderror">{{ $settings['contact_address'] ?? '' }}</textarea>
                @error('contact_address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Social Media Links</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="social_facebook" class="block text-sm font-medium text-gray-700">Facebook</label>
                <input type="url" name="social_facebook" id="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('social_facebook') border-red-500 @enderror">
                @error('social_facebook')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="social_twitter" class="block text-sm font-medium text-gray-700">Twitter</label>
                <input type="url" name="social_twitter" id="social_twitter" value="{{ $settings['social_twitter'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('social_twitter') border-red-500 @enderror">
                @error('social_twitter')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="social_instagram" class="block text-sm font-medium text-gray-700">Instagram</label>
                <input type="url" name="social_instagram" id="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('social_instagram') border-red-500 @enderror">
                @error('social_instagram')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="social_linkedin" class="block text-sm font-medium text-gray-700">LinkedIn</label>
                <input type="url" name="social_linkedin" id="social_linkedin" value="{{ $settings['social_linkedin'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('social_linkedin') border-red-500 @enderror">
                @error('social_linkedin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Logo</h3>
        
        <div>
            <label for="logo" class="block text-sm font-medium text-gray-700">Site Logo</label>
            <input type="file" name="logo" id="logo" accept="image/*"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('logo') border-red-500 @enderror">
            @error('logo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Advanced SEO Settings</h3>
        
        <div class="space-y-6">
            <div>
                <label for="meta_title" class="block text-sm font-medium text-gray-700">Site Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ $settings['meta_title'] ?? '' }}" maxlength="60"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('meta_title') border-red-500 @enderror">
                <p class="text-sm text-gray-500 mt-1">Recommended: 50-60 characters</p>
                @error('meta_title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="meta_description" class="block text-sm font-medium text-gray-700">Site Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="3" maxlength="160"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('meta_description') border-red-500 @enderror">{{ $settings['meta_description'] ?? '' }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Recommended: 150-160 characters</p>
                @error('meta_description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="meta_keywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                <input type="text" name="meta_keywords" id="meta_keywords" value="{{ $settings['meta_keywords'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('meta_keywords') border-red-500 @enderror"
                    placeholder="real estate, construction, homes, properties, gurukrupa">
                <p class="text-sm text-gray-500 mt-1">Separate keywords with commas</p>
                @error('meta_keywords')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="og_title" class="block text-sm font-medium text-gray-700">Open Graph Title</label>
                <input type="text" name="og_title" id="og_title" value="{{ $settings['og_title'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('og_title') border-red-500 @enderror">
                @error('og_title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="og_description" class="block text-sm font-medium text-gray-700">Open Graph Description</label>
                <textarea name="og_description" id="og_description" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('og_description') border-red-500 @enderror">{{ $settings['og_description'] ?? '' }}</textarea>
                @error('og_description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="og_image" class="block text-sm font-medium text-gray-700">Open Graph Image</label>
                <input type="file" name="og_image" id="og_image" accept="image/*"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('og_image') border-red-500 @enderror">
                <p class="text-sm text-gray-500 mt-1">Recommended: 1200x630 pixels</p>
                @error('og_image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="twitter_card" class="block text-sm font-medium text-gray-700">Twitter Card Type</label>
                <select name="twitter_card" id="twitter_card"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('twitter_card') border-red-500 @enderror">
                    <option value="summary" {{ ($settings['twitter_card'] ?? '') == 'summary' ? 'selected' : '' }}>Summary</option>
                    <option value="summary_large_image" {{ ($settings['twitter_card'] ?? '') == 'summary_large_image' ? 'selected' : '' }}>Summary Large Image</option>
                </select>
                @error('twitter_card')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="twitter_handle" class="block text-sm font-medium text-gray-700">Twitter Handle</label>
                <input type="text" name="twitter_handle" id="twitter_handle" value="{{ $settings['twitter_handle'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('twitter_handle') border-red-500 @enderror"
                    placeholder="@yourcompany">
                @error('twitter_handle')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="canonical_url" class="block text-sm font-medium text-gray-700">Canonical URL</label>
                <input type="url" name="canonical_url" id="canonical_url" value="{{ $settings['canonical_url'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('canonical_url') border-red-500 @enderror"
                    placeholder="https://yourwebsite.com">
                @error('canonical_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="robots_txt" class="block text-sm font-medium text-gray-700">Robots.txt Content</label>
                <textarea name="robots_txt" id="robots_txt" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('robots_txt') border-red-500 @enderror">{{ $settings['robots_txt'] ?? '' }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Custom robots.txt content for search engine crawling</p>
                @error('robots_txt')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="google_analytics" class="block text-sm font-medium text-gray-700">Google Analytics ID</label>
                <input type="text" name="google_analytics" id="google_analytics" value="{{ $settings['google_analytics'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('google_analytics') border-red-500 @enderror"
                    placeholder="G-XXXXXXXXXX">
                @error('google_analytics')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="google_search_console" class="block text-sm font-medium text-gray-700">Google Search Console Verification</label>
                <input type="text" name="google_search_console" id="google_search_console" value="{{ $settings['google_search_console'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('google_search_console') border-red-500 @enderror"
                    placeholder="google-site-verification=...">
                @error('google_search_console')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="bing_webmaster" class="block text-sm font-medium text-gray-700">Bing Webmaster Verification</label>
                <input type="text" name="bing_webmaster" id="bing_webmaster" value="{{ $settings['bing_webmaster'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('bing_webmaster') border-red-500 @enderror"
                    placeholder="msvalidate.01=...">
                @error('bing_webmaster')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Technical Settings</h3>
        
        <div class="space-y-6">
            <div>
                <label for="google_maps_api_key" class="block text-sm font-medium text-gray-700">Google Maps API Key</label>
                <input type="text" name="google_maps_api_key" id="google_maps_api_key" value="{{ $settings['google_maps_api_key'] ?? '' }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('google_maps_api_key') border-red-500 @enderror">
                @error('google_maps_api_key')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="schema_markup" class="block text-sm font-medium text-gray-700">Schema Markup (JSON-LD)</label>
                <textarea name="schema_markup" id="schema_markup" rows="6"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('schema_markup') border-red-500 @enderror">{{ $settings['schema_markup'] ?? '' }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Structured data for better search engine understanding</p>
                @error('schema_markup')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="custom_css" class="block text-sm font-medium text-gray-700">Custom CSS</label>
                <textarea name="custom_css" id="custom_css" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('custom_css') border-red-500 @enderror">{{ $settings['custom_css'] ?? '' }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Custom CSS styles for the website</p>
                @error('custom_css')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="custom_js" class="block text-sm font-medium text-gray-700">Custom JavaScript</label>
                <textarea name="custom_js" id="custom_js" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('custom_js') border-red-500 @enderror">{{ $settings['custom_js'] ?? '' }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Custom JavaScript code for the website</p>
                @error('custom_js')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="flex justify-end">
        <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
            Update Settings
        </button>
    </div>
</form>
@endsection
