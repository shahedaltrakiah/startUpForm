let currentSection = 1;
const totalSections = 5;
const formData = {};

// Update progress bar and steps
function updateProgress() {
    const progress = (currentSection / totalSections) * 100;
    document.getElementById('progressBar').style.width = `${progress}%`;

    // Update step indicators
    document.querySelectorAll('.step').forEach((step, index) => {
        if (index + 1 === currentSection) {
            step.classList.add('active');
        } else {
            step.classList.remove('active');
        }
    });
}

// Show/hide sections with animation
function showSection(sectionNumber) {
    const sections = document.querySelectorAll('.form-section');
    sections.forEach(section => {
        if (section.getAttribute('data-section') == sectionNumber) {
            section.classList.remove('hidden');
            section.classList.add('animate__animated', 'animate__fadeIn');
        } else {
            section.classList.add('hidden');
            section.classList.remove('animate__animated', 'animate__fadeIn');
        }
    });

    updateProgress();
    updateNavigationButtons();
}

// Update navigation button text and state
function updateNavigationButtons() {
    const nextButton = document.getElementById('nextButton');
    const prevButton = document.getElementById('prevButton');

    prevButton.style.visibility = currentSection === 1 ? 'hidden' : 'visible';

    if (currentSection === totalSections) {
        nextButton.textContent = 'Submit';
        nextButton.classList.add('submit-button');
    } else {
        nextButton.getElementsById = "nextButton";
        nextButton.classList.remove('submit-button');
    }
}

// Validate current section
function validateCurrentSection() {
    const currentSectionEl = document.querySelector(`[data-section="${currentSection}"]`);
    const inputs = currentSectionEl.querySelectorAll('input, textarea, select');
    let isValid = true;

    inputs.forEach(input => {
        if (input.required && !input.value.trim()) {
            isValid = false;
            highlightError(input);
        } else {
            removeError(input);
        }
    });

    return isValid;
}

// Highlight error on input
function highlightError(input) {
    input.classList.add('error');
    input.style.borderColor = '#EF4444';
    if (!input.nextElementSibling?.classList.contains('error-message')) {
        const errorMessage = document.createElement('div');
        errorMessage.className = 'error-message';
        errorMessage.style.color = '#EF4444';
        errorMessage.style.fontSize = '0.875rem';
        errorMessage.style.marginTop = '0.5rem';
        errorMessage.textContent = 'This field is required';
        input.parentNode.insertBefore(errorMessage, input.nextSibling);
    }
}

// Remove error styling
function removeError(input) {
    input.classList.remove('error');
    input.style.borderColor = '';
    const errorMessage = input.nextElementSibling?.classList.contains('error-message')
        ? input.nextElementSibling
        : null;
    if (errorMessage) {
        errorMessage.remove();
    }
}

// Navigation handlers
document.getElementById('nextButton').addEventListener('click', () => {
    if (!validateCurrentSection()) {
        return;
    }

    if (currentSection < totalSections) {
        currentSection++;
        showSection(currentSection);
    } else {
        submitForm();
    }
});

document.getElementById('prevButton').addEventListener('click', () => {
    if (currentSection > 1) {
        currentSection--;
        showSection(currentSection);
    }
});

// Submit form with loading state
async function submitForm() {
    const submitButton = document.getElementById('nextButton');
    const originalText = submitButton.textContent;
    submitButton.disabled = true;
    submitButton.textContent = 'Submitting...';

    // Collect form data
    const formElements = document.getElementById('startupForm').elements;
    for (let element of formElements) {
        if (element.id) {
            formData[element.id] = element.value;
        }
    }

    try {
        await new Promise(resolve => setTimeout(resolve, 1000));

        document.getElementById('startupForm').submit();

        showSuccessMessage();
        resetForm();
    } catch (error) {
        showErrorMessage();
    } finally {
        submitButton.disabled = false;
        submitButton.textContent = originalText;
    }
}

// Reset form
function resetForm() {
    document.getElementById('startupForm').reset();
    currentSection = 1;
    showSection(1);
}

showSection(currentSection); 
