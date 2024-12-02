<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Freelancer Profile Form</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f7f7f7;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
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

        input, textarea, select {
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

        /* Profile Picture Preview */
        #profilePicPreview {
            width: 150px;
            height: 150px;
            border: 1px solid #ccc;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 10px auto;
        }

        /* File Preview for Certifications */
        .file-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .file-preview div {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80px;
            height: 100px;
        }

        .file-preview img,
        .file-preview span {
            width: 100%;
            height: 80px;
            object-fit: contain;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .file-preview span {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            text-align: center;
        }

        .file-preview small {
            margin-top: 5px;
            font-size: 12px;
            color: #555;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Freelancer Profile</h1>
        <form id="multiStepForm">
            <!-- Step 1: Basic Information -->
            <div class="step active">
                <h2>Basic Information</h2>
                <label for="profilePic">Profile Picture</label>
                <input type="file" id="profilePic" name="profilePic" accept="image/*">
                <img id="profilePicPreview" src="#" alt="Profile Picture Preview" style="display: none;">
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
                <h2>Rates</h2>
                <label for="hourlyRate">Hourly Rate</label>
                <input type="number" id="hourlyRate" name="hourlyRate" min="0">
            </div>

            <!-- Step 4: Availability and Certifications -->
            <div class="step">
                <h2>Availability</h2>
                <label for="hoursPerWeek">Hours per Week</label>
                <input type="number" id="hoursPerWeek" name="hoursPerWeek" min="0">

                <h2>Certifications & Education</h2>
                <label for="certifications">Certifications</label>
                <textarea id="certifications" name="certifications" rows="3"></textarea>

                <!-- Multiple File Upload -->
                <label for="multipleFiles">Upload Certifications</label>
                <input type="file" id="multipleFiles" name="certificationFiles[]" multiple accept="image/*,application/pdf">
                <div class="file-preview" id="filePreview">
                    <p>No files selected.</p>
                </div>
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
        const fileInput = document.getElementById("multipleFiles");
        const filePreview = document.getElementById("filePreview");
        let currentStep = 0;

        // Show steps
        function showStep(step) {
            steps.forEach((stepDiv, index) => {
                stepDiv.classList.toggle("active", index === step);
            });
            prevBtn.style.display = step === 0 ? "none" : "inline";
            nextBtn.textContent = step === steps.length - 1 ? "Submit" : "Next";
        }

        // Handle Profile Picture Preview
        profilePicInput.addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profilePicPreview.src = e.target.result;
                    profilePicPreview.style.display = "block";
                };
                reader.readAsDataURL(file);
            } else {
                profilePicPreview.style.display = "none";
            }
        });

        // Handle multiple file upload preview
        fileInput.addEventListener("change", (event) => {
            const files = Array.from(event.target.files);
            filePreview.innerHTML = ""; // Clear previous preview
            if (files.length > 0) {
                files.forEach(file => {
                    const fileDiv = document.createElement("div");
                    const fileName = document.createElement("small");
                    fileName.textContent = file.name;

                    if (file.type.startsWith("image/")) {
                        const img = document.createElement("img");
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            img.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                        fileDiv.appendChild(img);
                    } else {
                        const fileIcon = document.createElement("span");
                        fileIcon.textContent = "PDF";
                        fileDiv.appendChild(fileIcon);
                    }

                    fileDiv.appendChild(fileName);
                    filePreview.appendChild(fileDiv);
                });
            } else {
                filePreview.innerHTML = "<p>No files selected.</p>";
            }
        });

        // Navigation buttons
        nextBtn.addEventListener("click", () => {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
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
</body>
</html>
