@extends('components.freelancer.freelan_nav')
@section('content')
<!-- @include('components.freelancer.side_nav') -->
<!-- @section('main') -->
<main class="main-content">
    <div class="content-wrapper">
        <div class="content-header">
            <h2>Edit Profile</h2>
        </div>
        <form>
            <section>
                <h3>User Information</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" value="lucky.jesse">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" value="jesse@example.com">
                    </div>
                    <div class="form-group">
                        <label for="firstName">First name</label>
                        <input type="text" id="firstName" value="Jesse">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last name</label>
                        <input type="text" id="lastName" value="Lucky">
                    </div>
                </div>
            </section>

            <section>
                <h3>Contact Information</h3>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="address">Address</label>
                        <input type="text" id="address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" value="New York">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" id="country" value="United States">
                    </div>
                    <div class="form-group">
                        <label for="postalCode">Postal code</label>
                        <input type="text" id="postalCode" value="437300">
                    </div>
                </div>
            </section>

            <section>
                <h3>About Me</h3>
                <div class="form-group">
                    <label for="aboutMe">About me</label>
                    <textarea id="aboutMe" rows="4">A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.</textarea>
                </div>
            </section>
        </form>
    </div>
</main>
<!-- @endsection -->

@endsection