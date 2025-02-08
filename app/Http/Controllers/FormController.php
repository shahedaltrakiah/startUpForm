<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Section;
use App\Models\Question;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $form = Form::with('sections.questions')->findOrFail($id);
        return view('admin.editForm', compact('form'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateForm(Request $request)
    {
        // Iterate through the sections
        foreach ($request->input('sections') as $sectionId => $sectionData) {
            $section = Section::find($sectionId);

            if ($section) {
                // Update section details
                $section->title = $sectionData['title'];
                $section->section_order = $sectionData['section_order'];
                $section->save();

                // Update questions in this section
                foreach ($sectionData['questions'] as $questionId => $questionData) {
                    if ($questionId) {
                        // Update existing question
                        $question = Question::find($questionId);
                        if ($question) {
                            $question->question_text = $questionData['text'];
                            $question->input_type = $questionData['input_type'];
                            $question->is_required = isset($questionData['is_required']) ? true : false;
                            $question->proof_text = $questionData['proof'];
                            $question->save();
                        }
                    } else {
                        // Create new question if no ID exists
                        $question = new Question();
                        $question->question_text = $questionData['text'];
                        $question->input_type = $questionData['input_type'];
                        $question->is_required = isset($questionData['is_required']) ? true : false;
                        $question->proof_text = $questionData['proof'];
                        $question->section_id = $section->id;
                        $question->save();
                    }
                }
            }
        }

        return redirect()->route('admin.formList')->with('success', 'Form updated successfully!');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
