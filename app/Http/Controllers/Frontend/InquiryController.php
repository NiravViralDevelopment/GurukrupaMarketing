<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InquiryController extends Controller
{
    public function downloadBrochure(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'project_id' => 'required|exists:projects,id'
        ]);

        // Get the project
        $project = Project::findOrFail($request->project_id);

        // Check if project has a brochure
        if (!$project->brochure || empty($project->brochure)) {
            // Still store the inquiry for testing purposes
            $inquiry = Inquiry::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => 'Brochure Download Request - ' . $project->title,
                'message' => 'User requested to download brochure for project: ' . $project->title . ' (No brochure available)',
                'project_id' => $project->id,
                'status' => 'new'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your details have been recorded. We will contact you soon with the brochure information.',
                'download_url' => null
            ]);
        }

        // Store inquiry in database
        $inquiry = Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => 'Brochure Download Request - ' . $project->title,
            'message' => 'User requested to download brochure for project: ' . $project->title,
            'project_id' => $project->id,
            'status' => 'new'
        ]);

        // Get brochure file path
        $brochurePath = public_path('project/brochure/' . $project->brochure);
        
        // Check if file exists
        if (!file_exists($brochurePath)) {
            return response()->json([
                'success' => false,
                'message' => 'Brochure file not found.'
            ], 404);
        }

        // Return success response with download URL
        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your details have been recorded. You can now download the brochure.',
            'download_url' => route('brochure.download', $project->id)
        ]);
    }

    public function downloadBrochureFile($projectId)
    {
        // Find project by ID
        $project = Project::find($projectId);
        
        if (!$project) {
            abort(404, 'Project not found.');
        }

        // Check if project has a brochure
        if (!$project->brochure || empty($project->brochure)) {
            abort(404, 'Brochure not available for this project.');
        }

        // Get brochure file path
        $brochurePath = public_path('project/brochure/' . $project->brochure);
        
        // Check if file exists
        if (!file_exists($brochurePath)) {
            abort(404, 'Brochure file not found at: ' . $brochurePath);
        }

        // Return file download
        return response()->download($brochurePath, $project->title . '_Brochure.pdf');
    }
}
