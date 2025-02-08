@extends('layouts.adminHeader')

@section('adminContent')

<!-- Header Section -->
<div class="content-header mb-4">
    <h1 class="h3"><i class="fa-solid fa-file-pen"></i> Edit Form</h1>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-end mb-4 gap-2">
        <button type="button" class="btn btn-outline-primary" id="addSectionBtn">
            <i class="fa-solid fa-plus"></i> Add Section
        </button>
        <button type="submit" class="btn btn-success" id="saveFormBtn">
            <i class="fas fa-check me-2"></i> Save
        </button>
    </div>
</div>

<!-- Edit Form -->
<form id="editForm" action="{{ route('admin.editForm', $form->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Form Name and Description -->
    <div class="mb-3">
        <label class="form-label">Form Title:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $form->name) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Form Description:</label>
        <textarea name="description" class="form-control">{{ old('description', $form->description) }}</textarea>
    </div>

    <!-- Sections Container -->
    <div id="sections-container">
        @foreach ($form->sections as $section)
            <div class="response-card mb-4 section-container" data-section-id="{{ $section->id }}">
                <div class="card-header d-flex align-items-center">
                    <label class="form-label me-2">Section Name:</label>
                    <input type="text" name="sections[{{ $section->id }}][title]" class="form-control me-2"
                        value="{{ old('sections.' . $section->id . '.title', $section->name) }}">

                    <label class="form-label mx-2">Order:</label>
                    <input type="number" name="sections[{{ $section->id }}][section_order]" class="form-control order-input"
                        value="{{ old('sections.' . $section->id . '.order', $section->section_order) }}"
                        style="width: 60px;">

                    <button type="button" class="btn btn-danger ms-2 delete-section-btn">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>

                <div class="card-body">
                    @foreach ($section->questions as $index => $question)
                        <div class="mb-3 question-container p-3 border rounded" data-question-id="{{ $question->id }}">
                            <!-- First Row: Q#1, Name, Type, Required -->
                            <div class="d-flex align-items-center mb-2">
                                <label class="form-label me-2"><b>Q#{{ $index + 1 }}:</b></label>
                                <input type="text" name="sections[{{ $section->id }}][questions][{{ $question->id }}][text]"
                                    class="form-control me-2"
                                    value="{{ old('sections.' . $section->id . '.questions.' . $question->id . '.text', $question->question_text) }}">

                                <label class="form-label mx-2">Type:</label>
                                <select name="sections[{{ $section->id }}][questions][{{ $question->id }}][input_type]"
                                    class="form-control me-2" style="width: 150px;">
                                    <option value="text" {{ $question->input_type == 'text' ? 'selected' : '' }}>Text</option>
                                    <option value="tel" {{ $question->input_type == 'tel' ? 'selected' : '' }}>Telephone</option>
                                    <option value="email" {{ $question->input_type == 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="textarea" {{ $question->input_type == 'textarea' ? 'selected' : '' }}>Textarea
                                    </option>
                                    <option value="radio" {{ $question->input_type == 'radio' ? 'selected' : '' }}>Radio</option>
                                    <option value="checkbox" {{ $question->input_type == 'checkbox' ? 'selected' : '' }}>Checkbox
                                    </option>
                                    <option value="select" {{ $question->input_type == 'select' ? 'selected' : '' }}>Dropdown
                                    </option>
                                </select>

                                <label class="form-label mx-2">Required:</label>
                                <input type="checkbox"
                                    name="sections[{{ $section->id }}][questions][{{ $question->id }}][is_required]"
                                    class="form-check-input me-2" {{ $question->is_required ? 'checked' : '' }}>

                                <button type="button" class="btn btn-danger delete-question-btn ms-2">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>

                            <!-- Second Row: Proof -->
                            <div class="d-flex align-items-center">
                                <label class="form-label me-2">Proof:</label>
                                <input type="text"
                                    name="sections[{{ $section->id }}][questions][{{ $question->id }}][proof_text]"
                                    class="form-control"
                                    value="{{ old('sections.' . $section->id . '.questions.' . $question->id . '.proof', $question->proof_text) }}"
                                    style="width: 100%;">
                            </div>
                        </div>
                    @endforeach

                    <!-- Add Question Button -->
                    <button type="button" class="btn btn-outline-primary add-question-btn">+ Add Question</button>
                </div>
            </div>
        @endforeach
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const sectionsContainer = document.getElementById('sections-container');

        // Function to add a new section
        document.getElementById('addSectionBtn').addEventListener('click', function () {
            let sectionId = Date.now(); // Unique ID for new section
            let sectionHtml = `
            <div class="response-card mb-4 section-container" data-section-id="${sectionId}">
                <div class="card-header d-flex align-items-center">
                    <label class="form-label me-2">Section Name:</label>
                    <input type="text" name="sections[${sectionId}][title]" class="form-control me-2" required>

                    <label class="form-label mx-2">Order:</label>
                    <input type="number" name="sections[${sectionId}][order]" class="form-control order-input" style="width: 60px;" required>

                    <button type="button" class="btn btn-danger ms-2 delete-section-btn">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>

                <div class="card-body">
                    <div class="questions-container"></div>

                    <!-- Add Question Button -->
                    <button type="button" class="btn btn-outline-secondary add-question-btn">+ Add Question</button>
                </div>
            </div>`;

            sectionsContainer.insertAdjacentHTML('beforeend', sectionHtml);
            attachEventListeners();
        });

        // Function to add a new question
        function addQuestion(section) {
            let questionId = Date.now(); // Unique ID for new question
            let questionHtml = `
            <div class="mb-3 question-container p-3 border rounded" data-question-id="${questionId}">
                 <div class="d-flex align-items-center mb-2">
                                <label class="form-label me-2"><b>Q#{{ $index + 1 }}:</b></label>
                                <input type="text" name="sections[{{ $section->id }}][questions][{{ $question->id }}][text]"
                                    class="form-control me-2"
                                    value="{{ old('sections.' . $section->id . '.questions.' . $question->id . '.text', $question->question_text) }}">
                                
                                <label class="form-label mx-2">Type:</label>
                                <select name="sections[{{ $section->id }}][questions][{{ $question->id }}][input_type]"
                                    class="form-control me-2" style="width: 150px;">
                                    <option value="text" {{ $question->input_type == 'text' ? 'selected' : '' }}>Text</option>
                                    <option value="tel" {{ $question->input_type == 'tel' ? 'selected' : '' }}>Telephone</option>
                                    <option value="email" {{ $question->input_type == 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="textarea" {{ $question->input_type == 'textarea' ? 'selected' : '' }}>Textarea</option>
                                    <option value="radio" {{ $question->input_type == 'radio' ? 'selected' : '' }}>Radio</option>
                                    <option value="checkbox" {{ $question->input_type == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
                                    <option value="select" {{ $question->input_type == 'select' ? 'selected' : '' }}>Dropdown</option>
                                </select>

                                <label class="form-label mx-2">Required:</label>
                                <input type="checkbox" name="sections[{{ $section->id }}][questions][{{ $question->id }}][is_required]"
                                    class="form-check-input me-2" {{ $question->is_required ? 'checked' : '' }}>

                                <button type="button" class="btn btn-danger delete-question-btn ms-2">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>

                            <!-- Second Row: Proof -->
                            <div class="d-flex align-items-center">
                                <label class="form-label me-2">Proof:</label>
                                <input type="text" name="sections[{{ $section->id }}][questions][{{ $question->id }}][proof_text]"
                                    class="form-control" value="{{ old('sections.' . $section->id . '.questions.' . $question->id . '.proof', $question->proof_text) }}"
                                    style="width: 100%;">
                            </div>
            </div>`;

            section.querySelector('.questions-container').insertAdjacentHTML('beforeend', questionHtml);
            attachEventListeners();
        }

        // Function to attach event listeners to dynamically added elements
        function attachEventListeners() {
            // Delete section
            document.querySelectorAll('.delete-section-btn').forEach(button => {
                button.onclick = function () {
                    this.closest('.section-container').remove();
                };
            });

            // Delete question
            document.querySelectorAll('.delete-question-btn').forEach(button => {
                button.onclick = function () {
                    this.closest('.question-container').remove();
                };
            });

            // Add question
            document.querySelectorAll('.add-question-btn').forEach(button => {
                button.onclick = function () {
                    let section = this.closest('.section-container');
                    addQuestion(section);
                };
            });
        }

        // Attach event listeners on page load
        attachEventListeners();

        // Function to Save Form Changes
        document.getElementById('saveFormBtn').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default form submission

            let form = document.getElementById('editForm');
            let formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    alert('Form saved successfully!');
                    location.reload();
                })
                .catch(error => console.error('Error:', error));
        });

    });
</script>


@endsection