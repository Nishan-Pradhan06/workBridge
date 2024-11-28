<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Setup - Step 1</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            width: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
        }

        /* Header */
        header h1 {
            font-size: 20px;
            margin: 0;
            color: #333;
        }

        header p {
            margin: 5px 0 20px;
            color: #666;
        }

        /* Progress Bar */
        .progress-bar {
            width: 100%;
            height: 10px;
            background-color: #eee;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .progress {
            width: 20%;
            height: 100%;
            background-color: #4caf50;
        }

        /* Form */
        .profile-form label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .profile-form input,
        .profile-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .profile-form input[type="file"] {
            padding: 5px;
            border: none;
        }

        .profile-form .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .profile-form .btn-submit:hover {
            background-color: #45a049;
        }/* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    background: #fff;
    width: 400px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px 30px;
}

/* Header */
header h1 {
    font-size: 20px;
    margin: 0;
    color: #333;
}

header p {
    margin: 5px 0 20px;
    color: #666;
}

/* Progress Bar */
.progress-bar {
    width: 100%;
    height: 10px;
    background-color: #eee;
    border-radius: 5px;
    overflow: hidden;
    margin-bottom: 20px;
}

.progress {
    width: 20%;
    height: 100%;
    background-color: #4caf50;
}

/* Form */
.profile-form label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-weight: bold;
}

.profile-form input,
.profile-form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.profile-form input[type="file"] {
    padding: 5px;
    border: none;
}

.profile-form .btn-submit {
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.profile-form .btn-submit:hover {
    background-color: #45a049;
}

    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Complete Your Profile</h1>
            <p>Step 1 of 5: Personal Information</p>
            <div class="progress-bar">
                <div class="progress"></div>
            </div>
        </header>

        <form class="profile-form" action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
            <div>
                <p>{{ session('success') }}</p>
                <img src="{{ asset('storage/' . session('path')) }}" alt="Uploaded Image" style="max-width: 300px;">
            </div>
            @endif
            <!-- Full Name -->
            <label for="full-name">Full Name</label>
            <input type="text" id="full-name" name="full-name" placeholder="Enter your full name" required>

            <!-- Profile Picture -->
            <label for="image">Profile Picture</label>
            <input type="file" id="profile-pic" name="image" accept="image/*">

            <!-- Tagline -->
            <label for="tagline">Tagline</label>
            <input type="text" id="tagline" name="tagline" placeholder="e.g., Experienced Web Developer">

            <!-- Location -->
            <label for="location">Location</label>
            <select id="location" name="location" required>
                <option value="">Select your location</option>
                <option value="usa">United States</option>
                <option value="uk">United Kingdom</option>
                <option value="india">India</option>
                <option value="nepal">Nepal</option>
            </select>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">Next</button>
        </form>
    </div>
</body>

</html>