<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::getAll();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_address' => 'nullable|string|max:500',
            'social_facebook' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'google_maps_api_key' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // SEO fields
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:500',
            'twitter_card' => 'nullable|string|in:summary,summary_large_image',
            'twitter_handle' => 'nullable|string|max:50',
            'canonical_url' => 'nullable|url|max:255',
            'robots_txt' => 'nullable|string|max:1000',
            'google_analytics' => 'nullable|string|max:50',
            'google_search_console' => 'nullable|string|max:255',
            'bing_webmaster' => 'nullable|string|max:255',
            'schema_markup' => 'nullable|string|max:2000',
            'custom_css' => 'nullable|string|max:5000',
            'custom_js' => 'nullable|string|max:5000',
        ]);

        // Update basic settings
        Setting::set('site_name', $request->site_name);
        Setting::set('site_description', $request->site_description);
        Setting::set('contact_email', $request->contact_email);
        Setting::set('contact_phone', $request->contact_phone);
        Setting::set('contact_address', $request->contact_address);
        Setting::set('social_facebook', $request->social_facebook);
        Setting::set('social_twitter', $request->social_twitter);
        Setting::set('social_instagram', $request->social_instagram);
        Setting::set('social_linkedin', $request->social_linkedin);
        Setting::set('google_maps_api_key', $request->google_maps_api_key);

        // Update SEO settings
        Setting::set('meta_title', $request->meta_title);
        Setting::set('meta_description', $request->meta_description);
        Setting::set('meta_keywords', $request->meta_keywords);
        Setting::set('og_title', $request->og_title);
        Setting::set('og_description', $request->og_description);
        Setting::set('twitter_card', $request->twitter_card);
        Setting::set('twitter_handle', $request->twitter_handle);
        Setting::set('canonical_url', $request->canonical_url);
        Setting::set('robots_txt', $request->robots_txt);
        Setting::set('google_analytics', $request->google_analytics);
        Setting::set('google_search_console', $request->google_search_console);
        Setting::set('bing_webmaster', $request->bing_webmaster);
        Setting::set('schema_markup', $request->schema_markup);
        Setting::set('custom_css', $request->custom_css);
        Setting::set('custom_js', $request->custom_js);

        // Handle file uploads
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('settings', 'public');
            Setting::set('logo', $path);
        }

        if ($request->hasFile('og_image')) {
            $path = $request->file('og_image')->store('settings', 'public');
            Setting::set('og_image', $path);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
