<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;

class StartupController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'companyName' => 'required|string|max:255',
            'founded' => 'required|date',
            'website' => 'nullable|url',
            'teamSize' => 'required|integer|min:1',
            'founderInfo' => 'required|string',
            'productDescription' => 'required|string',
            'targetMarket' => 'required|string',
            'fundingStage' => 'required|string',
            'fundingNeeds' => 'required|string',
            'proofFile' => 'nullable|file|mimes:jpg,png,pdf,docx|max:10240', // Add file validation
            'proofLink' => 'nullable|url', // Add URL validation for the link
        ]);

        $startup = Startup::create([
            'companyName' => $request->companyName,
            'founded' => $request->founded,
            'website' => $request->website,
            'teamSize' => $request->teamSize,
            'founderInfo' => $request->founderInfo,
            'productDescription' => $request->productDescription,
            'targetMarket' => $request->targetMarket,
            'fundingStage' => $request->fundingStage,
            'fundingNeeds' => $request->fundingNeeds,
        ]);

        // Handle file upload if exists
        if ($request->hasFile('proofFile')) {
            $path = $request->file('proofFile')->store('proofs');
            $startup->proofFile = $path;
        }

        // Store the proof link if provided
        if ($request->proofLink) {
            $startup->proofLink = $request->proofLink;
        }

        $startup->save();

        return redirect()->back()->with('success', 'Form submitted successfully! ✨');
    }
}

