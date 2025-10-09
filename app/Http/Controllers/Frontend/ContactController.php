<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $projects = Project::active()->select('id', 'title')->get();
        $settings = Setting::getAll();
        
        return view('frontend.contact', compact('projects', 'settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
            'project_id' => 'nullable|exists:projects,id',
        ]);

        $inquiry = Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'project_id' => $request->project_id,
        ]);

        // Send email notification (optional)
        try {
            $contactEmail = Setting::get('contact_email', config('mail.from.address'));
            
            Mail::send('emails.inquiry', ['inquiry' => $inquiry], function ($message) use ($contactEmail, $inquiry) {
                $message->to($contactEmail)
                    ->subject('New Inquiry: ' . $inquiry->subject ?: 'Contact Form Submission');
            });
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Log::error('Failed to send inquiry email: ' . $e->getMessage());
        }

        return redirect()->back()
            ->with('success', 'Thank you for your inquiry. We will get back to you soon.');
    }
}
