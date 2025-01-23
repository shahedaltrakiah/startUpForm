@extends('layouts.mainHeader')

@section('content')

<!-- Form View -->
<div id="formView">
    <div class="form-header">
        <h1>Startup Information Form</h1>
        <p class="mb-4">Tell us about your startup journey</p>
        <div class="progress-container" style="margin-top:20px;">
            <div class="progress-bar">
                <div class="progress" id="progressBar"></div>
            </div>
            <div class="progress-steps">
                <span class="step active">Company</span>
                <span class="step">Team</span>
                <span class="step">Product</span>
                <span class="step">Funding</span>
            </div>
        </div>
    </div>

    <form id="startupForm" method="POST" action="{{ route('startup.store') }}">
        @csrf

        <!-- Company Information Section -->
        <div class="form-section" data-section="1">
            <h2 class="section-header">Company Information</h2>
            <div class="form-group">
                <label for="companyName">Company Name *</label>
                <input type="text" id="companyName" name="companyName" placeholder="Enter your company name" required>
            </div>
            <div class="form-group">
                <label for="founded">Founded Date *</label>
                <input type="date" id="founded" name="founded" required>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" id="website" name="website" placeholder="https://example.com">
            </div>
        </div>

        <!-- Team Section -->
        <div class="form-section hidden" data-section="2">
            <h2 class="section-header">Team Information</h2>
            <div class="form-group">
                <label for="teamSize">Team Size *</label>
                <input type="number" id="teamSize" name="teamSize" placeholder="Number of team members" required>
            </div>
            <div class="form-group">
                <label for="founderInfo">Founder Information *</label>
                <textarea id="founderInfo" name="founderInfo"
                    placeholder="Tell us about the founding team and their background" required></textarea>
            </div>
        </div>

        <!-- Product Section -->
        <div class="form-section hidden" data-section="3">
            <h2 class="section-header">Product Information</h2>
            <div class="form-group">
                <label for="productDescription">Product Description *</label>
                <textarea id="productDescription" name="productDescription"
                    placeholder="Describe your product and its key features" required></textarea>
            </div>
            <div class="form-group">
                <label for="targetMarket">Target Market *</label>
                <textarea id="targetMarket" name="targetMarket" placeholder="Who are your target customers?"
                    required></textarea>
            </div>
        </div>

        <!-- Funding Section -->
        <div class="form-section hidden" data-section="4">
            <h2 class="section-header">Funding Information</h2>
            <div class="form-group">
                <label for="fundingStage">Current Funding Stage *</label>
                <select id="fundingStage" name="fundingStage" required>
                    <option value="">Select stage</option>
                    <option value="bootstrap">Bootstrap</option>
                    <option value="seed">Seed</option>
                    <option value="seriesA">Series A</option>
                    <option value="seriesB">Series B+</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fundingNeeds">Funding Needs *</label>
                <textarea id="fundingNeeds" name="fundingNeeds"
                    placeholder="Describe your funding requirements and plans" required></textarea>
            </div>

            <!-- Checkbox for proof -->
            <div class="form-group d-flex align-items-center">
                <input type="checkbox" id="hasProof" name="hasProof" class="mr-2">
                <label for="hasProof">Do you have a proof link or file?</label>
            </div>

            <!-- File Upload/Proof Link Section -->
            <div id="proofSection" class="form-group hidden">
                <label for="proofFile">Upload Proof File</label>
                <div class="drag-drop-area" onclick="document.getElementById('proofFile').click();">
                    <p>Drag and drop a file here, or click to select a file.</p>
                    <input type="file" id="proofFile" name="proofFile" accept="application/pdf, image/*, .docx"
                        class="file-input" />
                </div>
                <p>Or provide a link to your proof:</p>
                <input type="url" id="proofLink" name="proofLink" placeholder="Enter the proof link"
                    class="form-control" />
            </div>
        </div>

        <div class="nav-buttons">
            <button type="button" class="btn-secondary" id="prevButton">
                <i class="fas fa-chevron-left"></i> Previous
            </button>
            <button type="button" class="btn-primary" id="nextButton">
                Next <i class="fas fa-chevron-right"></i>
            </button>
        </div>

    </form>
</div>

<script>
    document.getElementById('hasProof').addEventListener('change', function () {
        const proofSection = document.getElementById('proofSection');

        if (this.checked) {
            proofSection.classList.remove('hidden');
        } else {
            proofSection.classList.add('hidden');
        }
    });

</script>

@endsection