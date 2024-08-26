<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function index()  
    {
        $application = Application::with('user','jobs')
        ->get();
        return response()->json($application);
    }

    public function apply(Request $request)    // Apply for job
{

    $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id',
        'job_id' => 'required|exists:jobs,id',
        'cover_letter' => 'required|string',
        'status' => 'required|string|max:255',
    ]);
    if ($validator->fails()) {
        return response()->json([
            'error' => true,
            'messages' => $validator->errors()
        ], 422);
    }

    Application::create($request->all());

    return response()->json([
        'success' => true,
        'message' => 'Job application submitted successfully.'
    ]);
} 

public function showUserJobs(Request $request)
{
    $user = User::find($request->user_id); // Fetch the user 

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404); // Handle case where user is not found
    }

    $user->jobs; // Get the jobs associated with the user

    return response()->json([
        'user' => $user,
    ]);

}

    public function get_applied_job_against_jobid(Request $request)
    {
         $get_applied_job_against_jobid = Application::with('user')
        ->where('job_id',$request->job_id)->get();

        return response()->json([
            'get_applied_job_against_jobid' => $get_applied_job_against_jobid,
        ]);
    }

    public function update_application(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'job_id' => 'required|exists:jobs,id',
            'cover_letter' => 'required|string',
            'status' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors()
            ], 422);
        }

        // Find the job application by its ID
    $job_applications = Application::find($id);

    // Check if the job application exists
    if (!$job_applications) {
        return response()->json([
            'error' => true,
            'message' => 'Job Application Not Found'
        ], 404);
    }

    // Update the job application with the validated data
    $job_applications->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Job application updeted successfully.'
        ]);
    }


}
