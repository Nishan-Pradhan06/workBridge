<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    nav a.active {
        background-color: #007bff;
        border-radius: 4px;
    }

    .card h2 {
        font-size: 2.5rem;
    }

    .sideMenu {
        background-color: #384259;
    }

    .nav-logo>img {
        background-color: white;
        height: 40px;

    }

    .dropdown-toggle::after {
        display: none !important;
        /* Hide the default arrow */
    }
</style>
<!-- FontAwesome for Icons -->
@include('components.admin.sidebars')


<!-- Main Content -->
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item " aria-current="page">Payments</li>
        </ol>
    </nav>
    <h3 class="mb-4">Payment Overview</h3>

    <!-- User Management Table -->
    <div class="card shadow-sm p-3">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#freelancer-requests" data-bs-toggle="tab">Freelancer Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#payments-received" data-bs-toggle="tab">Payments Received</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#transactions" data-bs-toggle="tab">Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#settings" data-bs-toggle="tab">Settings</a>
            </li>
        </ul>
        <div class="tab-content mt-3">
            <!-- Freelancer Requests Tab -->
            <div class="tab-pane fade show active" id="freelancer-requests">
                <h5 class="mb-3">Freelancer Payment Requests</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Freelancer</th>
                            <th>Requested Amount</th>
                            <th>Service Fee</th>
                            <th>Final Amount</th>
                            <th>Reason</th>
                            <th>Account Details</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Freelancer 1</td>
                            <td>$100</td>
                            <td>$5</td>
                            <td>$95</td>
                            <td>Project Completion</td>

                            <td>freelancer1@example.com</td>
                            <td>2024-12-28</td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-success btn-sm">Pay</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Freelancer 2</td>
                            <td>$200</td>
                            <td>$10</td>
                            <td>$190</td>
                            <td>Milestone Reached</td>

                            <td>1234567890</td>
                            <td>2024-12-28</td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-success btn-sm">Pay</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!-- Payments Received Tab -->
            <div class="tab-pane fade" id="payments-received">
                <h5 class="mb-3">Payments Received from Clients</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Project/Service</th>
                            <th>Amount</th>

                            <th>Transaction ID</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Client 1</td>
                            <td>Website Design</td>
                            <td>$100</td>

                            <td>TRX123456</td>
                            <td>Credit Card</td>
                            <td>Completed</td>
                            <td>2024-12-28</td>
                        </tr>
                        <tr>
                            <td>Client 2</td>
                            <td>Mobile App Development</td>
                            <td>$200</td>

                            <td>TRX987654</td>
                            <td>PayPal</td>
                            <td>Completed</td>
                            <td>2024-12-27</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!-- Transactions Tab -->
            <div class="tab-pane fade" id="transactions">
                <h5 class="mb-3">Transaction History</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Freelancer</th>
                            <th>Service Fee</th>
                            <th>Earnings</th>
                            <th>Account Details</th>
                            <th>Date</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Freelancer 1</td>
                            <td>$5</td>
                            <td>$95</td>
                            <td>980765489</td>
                            <td>2024-12-28</td>
                            <td>Completed</td>
                        </tr>
                        <tr>

                            <td>Freelancer 2</td>
                            <td>$5</td>
                            <td>$85</td>
                            <td>9807878789</td>
                            <td>2024-12-28</td>
                            <td>Completed</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Settings Tab -->
            <div class="tab-pane fade" id="settings">
                <h5 class="mb-3">Payment Settings</h5>
                <p>Configure payment-related settings here (e.g., service charge percentage, payment gateway details).</p>
            </div>
        </div>
    </div>



</div>
</div>