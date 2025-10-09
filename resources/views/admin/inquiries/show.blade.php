@extends('layouts.admin')

@section('title', 'View Inquiry')
@section('page-title', 'Inquiry Details')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $inquiry->subject }}</h1>
            <div class="flex items-center space-x-4 mt-2">
                <span class="px-2 py-1 text-xs font-medium rounded-full
                    @if($inquiry->status === 'new') bg-blue-100 text-blue-800
                    @elseif($inquiry->status === 'read') bg-yellow-100 text-yellow-800
                    @elseif($inquiry->status === 'replied') bg-green-100 text-green-800
                    @else bg-red-100 text-red-800
                    @endif">
                    {{ ucfirst($inquiry->status) }}
                </span>
                <span class="text-sm text-gray-500">
                    {{ $inquiry->created_at->format('M d, Y \a\t g:i A') }}
                </span>
            </div>
        </div>
        <div class="flex space-x-2">
            @if($inquiry->status === 'new')
            <form method="POST" action="{{ route('admin.inquiries.mark-read', $inquiry) }}" class="inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
                    Mark as Read
                </button>
            </form>
            @endif
            
            @if($inquiry->status === 'read')
            <form method="POST" action="{{ route('admin.inquiries.mark-replied', $inquiry) }}" class="inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300">
                    Mark as Replied
                </button>
            </form>
            @endif
            
            @if($inquiry->status !== 'closed')
            <form method="POST" action="{{ route('admin.inquiries.mark-closed', $inquiry) }}" class="inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">
                    Close Inquiry
                </button>
            </form>
            @endif
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-600">Name</label>
                    <p class="text-gray-900">{{ $inquiry->name }}</p>
                </div>
                
                <div>
                    <label class="text-sm font-medium text-gray-600">Email</label>
                    <p class="text-gray-900">
                        <a href="mailto:{{ $inquiry->email }}" class="text-primary hover:text-yellow-600">
                            {{ $inquiry->email }}
                        </a>
                    </p>
                </div>
                
                @if($inquiry->phone)
                <div>
                    <label class="text-sm font-medium text-gray-600">Phone</label>
                    <p class="text-gray-900">
                        <a href="tel:{{ $inquiry->phone }}" class="text-primary hover:text-yellow-600">
                            {{ $inquiry->phone }}
                        </a>
                    </p>
                </div>
                @endif
                
                <div>
                    <label class="text-sm font-medium text-gray-600">Inquiry Date</label>
                    <p class="text-gray-900">{{ $inquiry->created_at->format('M d, Y \a\t g:i A') }}</p>
                </div>
                
                @if($inquiry->updated_at != $inquiry->created_at)
                <div>
                    <label class="text-sm font-medium text-gray-600">Last Updated</label>
                    <p class="text-gray-900">{{ $inquiry->updated_at->format('M d, Y \a\t g:i A') }}</p>
                </div>
                @endif
            </div>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <a href="mailto:{{ $inquiry->email }}?subject=Re: {{ $inquiry->subject }}" 
                   class="block w-full bg-primary text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300 text-center">
                    Reply via Email
                </a>
                
                @if($inquiry->phone)
                <a href="tel:{{ $inquiry->phone }}" 
                   class="block w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300 text-center">
                    Call Customer
                </a>
                @endif
                
                <button onclick="copyInquiryInfo()" 
                        class="block w-full bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">
                    Copy Inquiry Info
                </button>
            </div>
        </div>
    </div>
    
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Message</h3>
        <div class="bg-gray-50 rounded-lg p-6">
            <div class="prose max-w-none text-gray-700">
                {!! nl2br(e($inquiry->message)) !!}
            </div>
        </div>
    </div>
    
    @if($inquiry->project_id)
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Related Project</h3>
        <div class="bg-blue-50 rounded-lg p-4">
            <p class="text-sm text-blue-800">
                This inquiry is related to a specific project. 
                <a href="{{ route('admin.projects.show', $inquiry->project_id) }}" class="font-medium underline hover:text-blue-600">
                    View Project Details
                </a>
            </p>
        </div>
    </div>
    @endif
</div>

<div class="mt-6 flex justify-between">
    <a href="{{ route('admin.inquiries.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
        Back to Inquiries
    </a>
    
    <form method="POST" action="{{ route('admin.inquiries.destroy', $inquiry) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">
            Delete Inquiry
        </button>
    </form>
</div>

<script>
function copyInquiryInfo() {
    const info = `Name: {{ $inquiry->name }}
Email: {{ $inquiry->email }}
Phone: {{ $inquiry->phone ?? 'N/A' }}
Subject: {{ $inquiry->subject }}
Date: {{ $inquiry->created_at->format('M d, Y \a\t g:i A') }}
Status: {{ ucfirst($inquiry->status) }}

Message:
{{ $inquiry->message }}`;
    
    navigator.clipboard.writeText(info).then(function() {
        alert('Inquiry information copied to clipboard!');
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}
</script>
@endsection
