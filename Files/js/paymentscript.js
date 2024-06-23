function initiateGooglePay() {
    let name = document.getElementById("name").value;
    let upiId = document.getElementById("upiId").value;
    let amount = document.getElementById("amount").value;

    // Validate form fields
    if (name === "" || upiId === "" || amount === "") {
        alert("Please fill out all fields.");
        return;
    }

    // Create payment data object
    let paymentData = {
        priceStatus: 'FINAL',
        priceType: 'REGULAR',
        totalPrice: amount,
        currencyCode: 'INR',
        countryCode: 'IN',
        allowedPaymentMethods: ['TOKENIZED_CARD', 'CARD', 'TOKENIZED_PAYPAL', 'TOKENIZED_BILLING_ADDRESS'],
        phoneNumberRequired: true,
        billingAddressRequired: true,
        shippingAddressRequired: true,
        shippingAddressParameters: {
            phoneNumberRequired: true
        },
        merchantInfo: {
            merchantName: 'Your Merchant Name',
            merchantId: 'YourMerchantId'
        },
        transactionInfo: {
            totalPriceStatus: 'FINAL',
            totalPrice: amount,
            currencyCode: 'INR',
            countryCode: 'IN'
        }
    };

    // Call Google Pay API to initiate payment
    googlePayClient.payments.create(paymentData).then(function(response) {
        // Handle successful payment response
        console.log("Payment successful:", response);

        // Proceed to submit payment form with transaction details
        document.getElementById("paymentToken").value = response.paymentMethodData.token;
        document.getElementById("paymentForm").submit();
    }).catch(function(error) {
        // Handle payment error
        console.error("Payment error:", error);
        alert("Payment failed. Please try again.");
    });
}
