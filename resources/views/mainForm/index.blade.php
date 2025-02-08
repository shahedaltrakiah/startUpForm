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
                <span class="step active">Info</span>
                <span class="step ">Ideation</span>
                <span class="step">Market</span>
                <span class="step">Idea</span>
                <span class="step">Shark Tank</span>
                <span class="step">In-House</span>
                <span class="step">LIVE Show</span>
                <span class="step">The Boring Stuff</span>
                <span class="step">Scale Up</span>
            </div>
        </div>
    </div>

    <form id="startupForm" method="POST" action="">
        @csrf

        <div class="form-section" data-section="1">
            <h2 class="section-header">Info</h2>
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" placeholder="Name" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" placeholder="example@example.com" required>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Phone Number *</label>
                <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
            </div>

            <div class="form-group">
                <label for="background"> Educational Background *</label>
                <input type="text" id="background" name="background" placeholder="Background" required>
            </div>

            <div class="form-group">
                <label for="experience">Experience *</label>
                <input type="text" id="experience" name="experience" placeholder="Experience" required>
            </div>

            <div class="form-group">
                <label for="startupName">Startup Name *</label>
                <input type="text" id="startupName" name="startupName" placeholder="Startup Name" required>
            </div>

            <div class="form-group">
                <label for="founders">Founders' Names and Numbers *</label>
                <input type="text" id="founders" name="founders" placeholder="Founders' Names and Numbers" required>
            </div>

            <div class="form-group">
                <label for="website">Website (if exist) *</label>
                <input type="url" id="website" name="website" placeholder="https://example.com" required>
            </div>

        </div>

        <!-- Section -->
        <div class="form-section" data-section="2">
            <h2 class="section-header">Ideation</h2>
            <div class="form-group">
                <label for="problemDescription">Description of the problem *</label>
                <input type="text" id="problemDescription" name="problemDescription" placeholder="Describe the problem"
                    required>
            </div>
            <div class="form-group">
                <label for="targetAudience">Target Audience *</label>
                <textarea id="targetAudience" name="targetAudience" placeholder="Who are your target customers?"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="marketGap">Market Gap *</label>
                <textarea id="marketGap" name="marketGap" placeholder="What market gap does your product fill?"
                    required></textarea>
            </div>

            <!-- Proof Link Section -->
            <div class="proof-container">
                <!-- Proof Link Input Section (initially hidden) -->
                <div class="proof-input">
                    <div class="form-group">
                        <label for="proofLink">Proof Link</label>
                        <input type="url" id="proofLink" name="proofLink" class="form-control"
                            placeholder="Enter your proof link here">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="marketGap">Summary of the proposed solution and its uniqueness *</label>
                <textarea id="marketGap" name="marketGap" placeholder="What market gap does your product fill?"
                    required></textarea>
            </div>

            <!-- Checkbox and Proof Link Section -->
            <div class="proof-container">
                <!-- Proof Link Input Section (initially hidden) -->
                <div class="proof-input">
                    <div class="form-group">
                        <label for="proofLink">Proof Link</label>
                        <input type="url" id="proofLink" name="proofLink" class="form-control"
                            placeholder="Enter your proof link here">
                    </div>
                </div>
            </div>
        </div>

        <!-- Market Section -->
        <div class="form-section hidden" data-section="3">
            <h2 class="section-header">Market</h2>
            <div class="form-group">
                <label for="targetMarketSize">Target Market Size *</label>
                <input type="text" id="targetMarketSize" name="targetMarketSize" placeholder="Enter target market size"
                    required>
            </div>
            <div class="form-group">
                <label for="demographics">Demographics *</label>
                <textarea id="demographics" name="demographics" placeholder="Provide demographics and trends"
                    required></textarea>
            </div>

            <!-- Checkbox and Proof Link Section -->
            <div class="proof-container">
                <!-- Proof Link Input Section (initially hidden) -->
                <div class="proof-input">
                    <div class="form-group">
                        <label for="proofLink">Proof Link</label>
                        <input type="url" id="proofLink" name="proofLink" class="form-control"
                            placeholder="Enter your proof link here">
                    </div>
                </div>
            </div>
        </div>

        <!-- Idea Section -->
        <div class="form-section hidden" data-section="4">
            <h2 class="section-header">Idea</h2>
            <div class="form-group">
                <label for="solutionStructure">Detailed Structure of the Solution *</label>
                <textarea id="solutionStructure" name="solutionStructure"
                    placeholder="Describe the solution (technical or operational)" required></textarea>
            </div>
            <div class="form-group">
                <label for="proofSolution">Proof Required: Wireframes, prototypes, or process diagrams *</label>
                <input type="text" id="proofSolution" name="proofSolution" placeholder="Provide proof (links or files)"
                    required>
            </div>

            <!-- Checkbox and Proof Link Section -->
            <div class="proof-container">
                <!-- Proof Link Input Section (initially hidden) -->
                <div class="proof-input">
                    <div class="form-group">
                        <label for="proofLink">Proof Link</label>
                        <input type="url" id="proofLink" name="proofLink" class="form-control"
                            placeholder="Enter your proof link here">
                    </div>
                </div>
            </div>
        </div>

        <!-- Shark Tank Section -->
        <div class="form-section hidden" data-section="5">
            <h2 class="section-header">Market Analysis and Value Proposition</h2>
            <div class="form-group">
                <label for="competitorAnalysis">Detailed Analysis of Competitors and Market Positioning *</label>
                <textarea id="competitorAnalysis" name="competitorAnalysis"
                    placeholder="Provide a detailed analysis of your competitors and their market positioning"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="valueStatement">Clear Statement of Value Offered to Customers *</label>
                <textarea id="valueStatement" name="valueStatement"
                    placeholder="Describe the value your product/service offers to customers" required></textarea>
            </div>
            <div class="form-group">
                <label for="customerExperienceMap">Detailed Map of Customer Experience from Awareness to Loyalty
                    *</label>
                <textarea id="customerExperienceMap" name="customerExperienceMap"
                    placeholder="Outline the customer journey from awareness to loyalty" required></textarea>
            </div>
            <div class="form-group">
                <label for="revenueDescription">Description of Revenue Streams, Cost Structure, and Operational Model
                    *</label>
                <textarea id="revenueDescription" name="revenueDescription"
                    placeholder="Describe your revenue streams, cost structure, and operational model"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="swotAnalysis">Strengths, Weaknesses, Opportunities, and Threats Analysis *</label>
                <textarea id="swotAnalysis" name="swotAnalysis" placeholder="Provide a SWOT analysis of your business"
                    required></textarea>
            </div>

            <!-- Checkbox and Proof Link Section -->
            <div class="proof-container">
                <!-- Proof Link Input Section (initially hidden) -->
                <div class="proof-input">
                    <div class="form-group">
                        <label for="proofLink">Proof Link</label>
                        <input type="url" id="proofLink" name="proofLink" class="form-control"
                            placeholder="Enter your proof link here">
                    </div>
                </div>
            </div>
        </div>

        <!-- In-House Section -->
        <div class="form-section hidden" data-section="6">
            <h2 class="section-header">Operational and Branding Information</h2>
            <div class="form-group">
                <label for="staffingPlan">Staffing Plan, Hiring Strategies, and Organizational Structure *</label>
                <textarea id="staffingPlan" name="staffingPlan"
                    placeholder="Outline your staffing plan and organizational structure" required></textarea>
            </div>
            <div class="form-group">
                <label for="brandingStrategy">Branding Strategy, Logo, and Brand Guidelines *</label>
                <textarea id="brandingStrategy" name="brandingStrategy"
                    placeholder="Describe your branding strategy and guidelines" required></textarea>
            </div>
            <div class="form-group">
                <label for="marketingChannels">Marketing Channels, Campaigns, and Acquisition Metrics *</label>
                <textarea id="marketingChannels" name="marketingChannels"
                    placeholder="Outline your marketing channels and acquisition metrics" required></textarea>
            </div>
            <div class="form-group">
                <label for="goalsPlan">Detailed Plan Outlining Goals, Milestones, and Timelines *</label>
                <textarea id="goalsPlan" name="goalsPlan"
                    placeholder="Provide a detailed plan with goals, milestones, and timelines" required></textarea>
            </div>

            <!-- Checkbox and Proof Link Section -->
            <div class="proof-container">
                <!-- Proof Link Input Section (initially hidden) -->
                <div class="proof-input">
                    <div class="form-group">
                        <label for="proofLink">Proof Link</label>
                        <input type="url" id="proofLink" name="proofLink" class="form-control"
                            placeholder="Enter your proof link here">
                    </div>
                </div>
            </div>
        </div>

        <!-- LIVE Show Section -->
        <div class="form-section hidden" data-section="7">
            <h2 class="section-header">Launch and Sales Information</h2>
            <div class="form-group">
                <label for="launchPlan">Launch Plan and Results *</label>
                <textarea id="launchPlan" name="launchPlan"
                    placeholder="Describe your launch plan and the results achieved" required></textarea>
            </div>
            <div class="form-group">
                <label for="salesStrategies">Sales Strategies, Funnels, and Metrics *</label>
                <textarea id="salesStrategies" name="salesStrategies"
                    placeholder="Outline your sales strategies and key metrics" required></textarea>
            </div>
            <div class="form-group">
                <label for="customerValidation">Detailed Customer Validation Reports *</label>
                <textarea id="customerValidation" name="customerValidation"
                    placeholder="Provide detailed customer validation reports" required></textarea>
            </div>

            <!-- Checkbox and Proof Link Section -->
            <div class="proof-container">
                <!-- Proof Link Input Section (initially hidden) -->
                <div class="proof-input">
                    <div class="form-group">
                        <label for="proofLink">Proof Link</label>
                        <input type="url" id="proofLink" name="proofLink" class="form-control"
                            placeholder="Enter your proof link here">
                    </div>
                </div>
            </div>
        </div>

        <!-- The Boring Stuff Section -->
        <div class="form-section hidden" data-section="8">
            <h2 class="section-header">Financial and Compliance Information</h2>
            <div class="form-group">
                <label for="financialStatements">Financial Statements, Cost Breakdown, and Projections *</label>
                <textarea id="financialStatements" name="financialStatements"
                    placeholder="Provide your financial statements and projections" required></textarea>
            </div>

            <!-- Checkbox and Proof Link Section -->
            <div class="proof-container">
                <!-- Proof Link Input Section (initially hidden) -->
                <div class="proof-input">
                    <div class="form-group">
                        <label for="proofLink">Proof Link:Compliance Documents, Licenses, and Permits</label>
                        <input type="url" id="proofLink" name="proofLink" class="form-control"
                            placeholder="Enter your proof link here">
                    </div>
                </div>
            </div>
        </div>

        <!-- Scale Up Section -->
        <div class="form-section hidden" data-section="9">
            <h2 class="section-header">Growth and Funding Strategy</h2>
            <div class="form-group">
                <label for="scalingPlan">Plan for Scaling Up Operations and Capacity *</label>
                <textarea id="scalingPlan" name="scalingPlan" placeholder="Describe your plan for scaling up operations"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="fundingStrategy">Funding Strategy and Results of Fundraising Efforts *</label>
                <textarea id="fundingStrategy" name="fundingStrategy"
                    placeholder="Outline your funding strategy and results" required></textarea>
            </div>

            <!--  Proof Link Section -->
            <div class="proof-container">
                <!-- Proof Link Input Section (initially hidden) -->
                <div class="proof-input">
                    <div class="form-group">
                        <label for="proofLink">Proof Link:Strategic Plan for Long-Term Business Growth</label>
                        <input type="url" id="proofLink" name="proofLink" class="form-control"
                            placeholder="Enter your proof link here">
                    </div>
                </div>
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
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('startupForm');
        const sections = document.querySelectorAll('.form-section');
        const nextButton = document.getElementById('nextButton');
        const prevButton = document.getElementById('prevButton');
        const progressBar = document.getElementById('progressBar');

        let currentSection = 0;

        // Initialize progress steps with icons
        const progressSteps = document.querySelector('.progress-steps');
        const steps = [
            { icon: 'info', text: 'Info' },
            { icon: 'lightbulb', text: 'Ideation' },
            { icon: 'chart-pie', text: 'Market' },
            { icon: 'puzzle-piece', text: 'Idea' },
            { icon: 'users', text: 'Shark Tank' },
            { icon: 'building', text: 'In-House' },
            { icon: 'tv', text: 'LIVE Show' },
            { icon: 'file-contract', text: 'The Boring Stuff' },
            { icon: 'chart-line', text: 'Scale Up' }
        ];

        // Clear existing steps and create new ones with icons
        progressSteps.innerHTML = '';
        steps.forEach((step, index) => {
            const stepElement = document.createElement('div');
            stepElement.className = 'step' + (index === 0 ? ' active' : '');
            stepElement.innerHTML = `
            <i class="fas fa-${step.icon}"></i>
            <span>${step.text}</span>
        `;
            progressSteps.appendChild(stepElement);
        });

        // Validate current section
        function validateSection(section) {
            const inputs = section.querySelectorAll('input[required], textarea[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('invalid');
                    // Add error message below the input
                    let errorMsg = input.nextElementSibling;
                    if (!errorMsg || !errorMsg.classList.contains('error-message')) {
                        errorMsg = document.createElement('div');
                        errorMsg.className = 'error-message';
                        input.parentNode.insertBefore(errorMsg, input.nextSibling);
                    }
                    errorMsg.textContent = 'This field is required';
                } else {
                    input.classList.remove('invalid');
                    const errorMsg = input.nextElementSibling;
                    if (errorMsg && errorMsg.classList.contains('error-message')) {
                        errorMsg.remove();
                    }
                }
            });

            return isValid;
        }

        // Update navigation
        function updateNavigation() {
            const isLastSection = currentSection === sections.length - 1;
            const isFirstSection = currentSection === 0;

            // Always show previous button except on first section
            prevButton.style.display = isFirstSection ? 'none' : 'inline-flex';

            // Update next/submit button
            nextButton.innerHTML = isLastSection ?
                'Submit <i class="fas fa-check"></i>' :
                'Next <i class="fas fa-chevron-right"></i>';

            // Update progress bar
            const progress = ((currentSection + 1) / sections.length) * 100;
            progressBar.style.width = `${progress}%`;

            // Update step indicators
            document.querySelectorAll('.step').forEach((step, index) => {
                step.classList.toggle('active', index === currentSection);
                step.classList.toggle('completed', index < currentSection);
            });

            // Show current section, hide others
            sections.forEach((section, index) => {
                section.style.display = index === currentSection ? 'block' : 'none';
                section.classList.toggle('hidden', index !== currentSection);
            });
        }

        // Navigation event handlers
        nextButton.addEventListener('click', function () {
            const currentSectionElement = sections[currentSection];

            if (validateSection(currentSectionElement)) {
                if (currentSection < sections.length - 1) {
                    currentSection++;
                    updateNavigation();
                } else {
                    // Submit form if on last section and all fields are valid
                    if (form.checkValidity()) {
                        form.submit();
                    }
                }
            }
        });

        prevButton.addEventListener('click', function () {
            if (currentSection > 0) {
                currentSection--;
                updateNavigation();
            }
        });

        // Initialize navigation
        updateNavigation();
    });

</script>

@endsection