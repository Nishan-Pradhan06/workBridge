@extends('components.freelancer.freelan_nav')
@section('content')
<!-- <title>@yield('Setup Profile')</title> -->

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .main-container {
        max-width: 800px;
        margin: 50px auto;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1,
    h2,
    h3 {
        color: #333;
        margin-bottom: 10px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    input,
    textarea,
    select {
        margin-bottom: 15px;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #218838;
    }

    .step {
        display: none;
    }

    .step.active {
        display: block;
    }

    .navigation-buttons {
        display: flex;
        justify-content: space-between;
    }

    /* Profile Picture Styles */
    .profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: #ddd;
        overflow: hidden;
        margin: 10px auto 15px;
        position: relative;
        cursor: pointer;
    }

    .profile-picture img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
        /* Hidden by default */
    }

    .profile-picture label {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        font-size: 14px;
        opacity: 1;
        transition: opacity 0.3s;
    }

    .profile-picture:hover label {
        background: rgba(0, 0, 0, 0.8);
    }

    /* Certificate Preview */
    .certificate-preview {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .certificate-preview img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
</style>

<div class="main-container">
    <h3>Setup Profile</h3>
    <form id="multiStepForm" action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Step 1: Basic Information -->
        <div class="step active">
            <h2>Basic Information</h2>
            <label for="profilePic">Profile Picture</label>
            <div class="profile-picture">
                <img id="profilePicPreview" src="" alt="Profile Picture">
                <label for="profilePic" id="uploadLabel">Click to Upload</label>
                <input type="file" id="profilePic" name="profilePic" accept="image/*">
            </div>
            <label for="location">Location</label>
            <input type="text" id="location" name="location">
        </div>

        <!-- Step 2: Professional Summary -->
        <div class="step">
            <h2>Professional Summary</h2>
            <label for="bio">About Me</label>
            <textarea id="bio" name="bio" rows="4"></textarea>
            <label for="skills">Skills</label>
            <input type="text" id="skills" name="skills" placeholder="Add your skills separated by commas">
            <label for="skillLevel">Skill Level</label>
            <select id="skillLevel" name="skillLevel">
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="expert">Expert</option>
            </select>
        </div>

        <!-- Step 3: Work Experience and Rates -->
        <div class="step">
            <h2>Work Experience</h2>
            <label for="jobTitle">Job Title</label>
            <input type="text" id="jobTitle" name="jobTitle">
            <label for="jobDesc">Job Description</label>
            <textarea id="jobDesc" name="jobDesc" rows="3"></textarea>
            <label for="portfolio">Portfolio Link</label>
            <input type="url" id="portfolio" name="portfolio">
            <label for="hoursPerWeek">Hours per Week</label>
            <input type="number" id="hoursPerWeek" name="hoursPerWeek" min="0">
        </div>

        <!-- Step 4: Availability and Certifications -->
        <div class="step">
            <h2>Educations</h2>

            <label for="multipleFiles">Upload Certifications</label>
            <input type="file" id="multipleFiles" name="certificationFiles[]" multiple accept="image/*,application/pdf">
            <div class="certificate-preview" id="certificatePreview"></div>
        </div>

        <!-- Navigation Buttons -->
        <div class="navigation-buttons">
            <button type="button" id="prevBtn" style="display: none;">Previous</button>
            <button type="button" id="nextBtn">Next</button>
        </div>
    </form>
</div>

<script>
    const steps = document.querySelectorAll(".step");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const profilePicInput = document.getElementById("profilePic");
    const profilePicPreview = document.getElementById("profilePicPreview");
    const uploadLabel = document.getElementById("uploadLabel");
    const multipleFilesInput = document.getElementById("multipleFiles");
    const certificatePreviewContainer = document.getElementById("certificatePreview");

    let currentStep = 0;

    // Show steps
    function showStep(step) {
        steps.forEach((stepDiv, index) => {
            stepDiv.classList.toggle("active", index === step);
        });
        prevBtn.style.display = step === 0 ? "none" : "inline";
        nextBtn.textContent = step === steps.length - 1 ? "Submit" : "Next";
    }

    // Profile Picture Preview Functionality
    profilePicInput.addEventListener("change", function() {
        const file = profilePicInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePicPreview.src = e.target.result;
                profilePicPreview.style.display = "block";
                uploadLabel.style.display = "none";
            };
            reader.readAsDataURL(file);
        }
    });

    // Certificate Preview Functionality
    multipleFilesInput.addEventListener("change", function() {
        certificatePreviewContainer.innerHTML = ""; // Clear previous previews
        Array.from(multipleFilesInput.files).forEach((file) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                certificatePreviewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });

    // Navigation buttons
    nextBtn.addEventListener("click", () => {
        if (currentStep < steps.length - 1) {
            // If not on the last step, move to the next step
            currentStep++;
            showStep(currentStep);
        } else {
            // On the last step, submit the form
            document.getElementById("multiStepForm").submit();
        }
    });

    prevBtn.addEventListener("click", () => {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    });

    showStep(currentStep); // Initialize the form
</script>


@include('components.footer')
@endsection