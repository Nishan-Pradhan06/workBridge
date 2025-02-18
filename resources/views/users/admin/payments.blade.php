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
                <a class="nav-link active" aria-current="page" href="#payments-received" data-bs-toggle="tab">Payment Received</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#freelancer-requests" data-bs-toggle="tab">Release Amount</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#transactions" data-bs-toggle="tab">Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#settings" data-bs-toggle="tab">Settings</a>
            </li>
        </ul>
        <div class="tab-content mt-3">


            <!-- Payments Received Tab -->
            <div class="tab-pane fade show active" id="payments-received">
                <h5 class="mb-3">Payments Received from Clients</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Client ID</th>
                            <th>Job ID</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paymentDetails as $payment)
                        <tr>
                            <td>{{ $payment->transaction_id }}</td>
                            <td>{{ $payment->client_id }}</td>
                            <td>{{$payment->job_id}}</td>
                            <td>NPR. {{ number_format($payment->amount/100, 2) }}</td>
                            <td>Khalti/online</td>
                            <td>{{ $payment->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- Freelancer Requests Tab -->
            <div class="tab-pane fade " id="freelancer-requests">
                <h5 class="mb-3">Freelancer Payment Requests</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Transacation Id</th>
                            <th>Client Id</th>
                            <th>Freelance Id</th>
                            <th>Job Id</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paymentDetails as $payment)
                        <tr>
                            <td>{{ $payment->transaction_id }}</td>
                            <td>{{ $payment->client_id }}</td>
                            <td>Freelancer 1</td>
                            <td>Job 1</td>
                            <td>NPR. {{ number_format($payment->amount/100, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('Y-m-d') }}</td>
                            <td>{{ $payment->release_status }}</td>
                            <td>
                                <button class="btn btn-success btn-sm">Release</button>
                            </td>
                        </tr>
                        @endforeach
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