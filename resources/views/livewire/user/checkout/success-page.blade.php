<div>
    <section class="section profile">
        <div>
            <h2>Payment Successful</h2>
            <p>Thank you for your payment. Your transaction has been completed successfully.</p>
            <p>Transaction ID: {{ $transactionID }}</p>
            <p>Amount: {{ $amount }}</p>
            <p>User ID: {{ $user_id }}</p>
        </div>
        <p>
            Not Redirecting? Click here
            <button>
                <a href="{{ route('user.payment.success', ['amount' => $amount, 'transactionID' => $transactionID]) }}">
                    Redirect Back
                </a>
            </button>
        </p>
    </section>

    <script>
        // Auto redirect after 3 seconds
        setTimeout(function () {
            window.location.href = "{!! route('user.payment.success', ['amount' => $amount, 'transactionID' => $transactionID]) !!}"; // Replace with your desired route
        }, 3000);
    </script>

</div>



