@extends('layouts.admin')

@section('title', 'Settings')
@section('page-title', 'Site Settings')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">General Settings</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="site_name" class="form-label">Site Name <span class="text-danger">*</span></label>
                <input type="text" name="site_name" id="site_name" value="{{ $settings['site_name'] ?? '' }}" required
                        class="form-control @error('site_name') is-invalid @enderror">
                @error('site_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                <div class="col-md-6 mb-3">
                    <label for="contact_email" class="form-label">Contact Email <span class="text-danger">*</span></label>
                <input type="email" name="contact_email" id="contact_email" value="{{ $settings['contact_email'] ?? '' }}" required
                        class="form-control @error('contact_email') is-invalid @enderror">
                @error('contact_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
            <div class="mb-3">
                <label for="site_description" class="form-label">Site Description</label>
            <textarea name="site_description" id="site_description" rows="3"
                    class="form-control @error('site_description') is-invalid @enderror">{{ $settings['site_description'] ?? '' }}</textarea>
            @error('site_description')
                    <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Contact Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="contact_phone" class="form-label">Phone</label>
                <input type="text" name="contact_phone" id="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}"
                        class="form-control @error('contact_phone') is-invalid @enderror">
                @error('contact_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                <div class="col-md-6 mb-3">
                    <label for="contact_address" class="form-label">Address</label>
                <textarea name="contact_address" id="contact_address" rows="3"
                        class="form-control @error('contact_address') is-invalid @enderror">{{ $settings['contact_address'] ?? '' }}</textarea>
                @error('contact_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Social Media Links</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="social_facebook" class="form-label">Facebook</label>
                <input type="url" name="social_facebook" id="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}"
                        class="form-control @error('social_facebook') is-invalid @enderror">
                @error('social_facebook')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                <div class="col-md-6 mb-3">
                    <label for="social_twitter" class="form-label">Twitter</label>
                <input type="url" name="social_twitter" id="social_twitter" value="{{ $settings['social_twitter'] ?? '' }}"
                        class="form-control @error('social_twitter') is-invalid @enderror">
                @error('social_twitter')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                <div class="col-md-6 mb-3">
                    <label for="social_instagram" class="form-label">Instagram</label>
                <input type="url" name="social_instagram" id="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}"
                        class="form-control @error('social_instagram') is-invalid @enderror">
                @error('social_instagram')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                <div class="col-md-6 mb-3">
                    <label for="social_linkedin" class="form-label">LinkedIn</label>
                <input type="url" name="social_linkedin" id="social_linkedin" value="{{ $settings['social_linkedin'] ?? '' }}"
                        class="form-control @error('social_linkedin') is-invalid @enderror">
                @error('social_linkedin')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Logo</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="logo" class="form-label">Site Logo</label>
            <input type="file" name="logo" id="logo" accept="image/*"
                    class="form-control @error('logo') is-invalid @enderror">
            @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Advanced SEO Settings</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="meta_title" class="form-label">Site Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ $settings['meta_title'] ?? '' }}" maxlength="60"
                    class="form-control @error('meta_title') is-invalid @enderror">
                <div class="form-text">Recommended: 50-60 characters</div>
                @error('meta_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="meta_description" class="form-label">Site Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="3" maxlength="160"
                    class="form-control @error('meta_description') is-invalid @enderror">{{ $settings['meta_description'] ?? '' }}</textarea>
                <div class="form-text">Recommended: 150-160 characters</div>
                @error('meta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" id="meta_keywords" value="{{ $settings['meta_keywords'] ?? '' }}"
                    class="form-control @error('meta_keywords') is-invalid @enderror"
                    placeholder="real estate, construction, homes, properties, gurukrupa">
                <div class="form-text">Separate keywords with commas</div>
                @error('meta_keywords')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="og_title" class="form-label">Open Graph Title</label>
                <input type="text" name="og_title" id="og_title" value="{{ $settings['og_title'] ?? '' }}"
                    class="form-control @error('og_title') is-invalid @enderror">
                @error('og_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="og_description" class="form-label">Open Graph Description</label>
                <textarea name="og_description" id="og_description" rows="3"
                    class="form-control @error('og_description') is-invalid @enderror">{{ $settings['og_description'] ?? '' }}</textarea>
                @error('og_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="og_image" class="form-label">Open Graph Image</label>
                <input type="file" name="og_image" id="og_image" accept="image/*"
                    class="form-control @error('og_image') is-invalid @enderror">
                <div class="form-text">Recommended: 1200x630 pixels</div>
                @error('og_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="twitter_card" class="form-label">Twitter Card Type</label>
                <select name="twitter_card" id="twitter_card"
                    class="form-select @error('twitter_card') is-invalid @enderror">
                    <option value="summary" {{ ($settings['twitter_card'] ?? '') == 'summary' ? 'selected' : '' }}>Summary</option>
                    <option value="summary_large_image" {{ ($settings['twitter_card'] ?? '') == 'summary_large_image' ? 'selected' : '' }}>Summary Large Image</option>
                </select>
                @error('twitter_card')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="twitter_handle" class="form-label">Twitter Handle</label>
                <input type="text" name="twitter_handle" id="twitter_handle" value="{{ $settings['twitter_handle'] ?? '' }}"
                    class="form-control @error('twitter_handle') is-invalid @enderror"
                    placeholder="@yourcompany">
                @error('twitter_handle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="canonical_url" class="form-label">Canonical URL</label>
                <input type="url" name="canonical_url" id="canonical_url" value="{{ $settings['canonical_url'] ?? '' }}"
                    class="form-control @error('canonical_url') is-invalid @enderror"
                    placeholder="https://yourwebsite.com">
                @error('canonical_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="robots_txt" class="form-label">Robots.txt Content</label>
                <textarea name="robots_txt" id="robots_txt" rows="4"
                    class="form-control @error('robots_txt') is-invalid @enderror">{{ $settings['robots_txt'] ?? '' }}</textarea>
                <div class="form-text">Custom robots.txt content for search engine crawling</div>
                @error('robots_txt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="google_analytics" class="form-label">Google Analytics ID</label>
                <input type="text" name="google_analytics" id="google_analytics" value="{{ $settings['google_analytics'] ?? '' }}"
                    class="form-control @error('google_analytics') is-invalid @enderror"
                    placeholder="G-XXXXXXXXXX">
                @error('google_analytics')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="google_search_console" class="form-label">Google Search Console Verification</label>
                <input type="text" name="google_search_console" id="google_search_console" value="{{ $settings['google_search_console'] ?? '' }}"
                    class="form-control @error('google_search_console') is-invalid @enderror"
                    placeholder="google-site-verification=...">
                @error('google_search_console')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="bing_webmaster" class="form-label">Bing Webmaster Verification</label>
                <input type="text" name="bing_webmaster" id="bing_webmaster" value="{{ $settings['bing_webmaster'] ?? '' }}"
                    class="form-control @error('bing_webmaster') is-invalid @enderror"
                    placeholder="msvalidate.01=...">
                @error('bing_webmaster')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Technical Settings</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="google_maps_api_key" class="form-label">Google Maps API Key</label>
                <input type="text" name="google_maps_api_key" id="google_maps_api_key" value="{{ $settings['google_maps_api_key'] ?? '' }}"
                    class="form-control @error('google_maps_api_key') is-invalid @enderror">
                @error('google_maps_api_key')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="schema_markup" class="form-label">Schema Markup (JSON-LD)</label>
                <textarea name="schema_markup" id="schema_markup" rows="6"
                    class="form-control @error('schema_markup') is-invalid @enderror">{{ $settings['schema_markup'] ?? '' }}</textarea>
                <div class="form-text">Structured data for better search engine understanding</div>
                @error('schema_markup')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="custom_css" class="form-label">Custom CSS</label>
                <textarea name="custom_css" id="custom_css" rows="4"
                    class="form-control @error('custom_css') is-invalid @enderror">{{ $settings['custom_css'] ?? '' }}</textarea>
                <div class="form-text">Custom CSS styles for the website</div>
                @error('custom_css')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="custom_js" class="form-label">Custom JavaScript</label>
                <textarea name="custom_js" id="custom_js" rows="4"
                    class="form-control @error('custom_js') is-invalid @enderror">{{ $settings['custom_js'] ?? '' }}</textarea>
                <div class="form-text">Custom JavaScript code for the website</div>
                @error('custom_js')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Update Settings
        </button>
    </div>
</form>
@endsection
