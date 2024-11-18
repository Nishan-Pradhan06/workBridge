    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Registration Form</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/signup.css') }}">
    </head>

    <body>
        <div class="container">
            <form id="client-registration-form" action='/client-register' method="post">
                <!-- Basic Information -->
                @csrf
                <h1>Client Registration</h1>
                <section>
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <input type="hidden" name="role" value="client">

                </section>

                <!-- Submit -->

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </body>

    </html>