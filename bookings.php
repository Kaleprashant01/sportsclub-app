<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Style for form container */
.form-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for form text */
.form-text h1 {
    margin: 0;
    padding: 0;
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

.form-text p {
    margin-top: 10px;
    font-size: 14px;
    color: #666;
}

/* Style for form fields */
.main-form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group span {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
}

.form-group input[type="date"] {
    width: calc(100% - 22px); /* Adjust for date picker icon */
}

/* Style for error message */
.error {
    color: #d9534f;
    font-size: 14px;
    margin-top: 5px;
}

/* Style for submit button */
.form-group input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.form-group input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
    <title>Book Now</title>
</head>

<body>
    <div class="form-container">
        <div class="form-text">
            <h1><span><img src="art-1.png" alt=""></span>Book Now <span><img src="art-1.png" alt=""></span></h1>
           
        </div>
        <div class="main-form">
            <form action="booking.php" method="post" id="bookingForm">
                <div class="form-group">
                    <span>Your full name</span>
                    <input type="text" name="name" placeholder="Write your name here..." required>
                </div>
                <div class="form-group">
                    <span>Your email address</span>
                    <input type="email" name="email" placeholder="Write your email here..." required>
                </div>
                <div class="form-group">
                    <span>How many people?</span>
                    <select name="people" required>
                        <option value="">Select</option>
                        <option value="1">1 People</option>
                        <option value="2">2 People</option>
                        <option value="3">3 People</option>
                        <option value="4">4 People</option>
                    </select>
                </div>
                <div class="form-group">
                    <span>What time?</span>
                    <input type="text" name="time" placeholder="Time" required>
                </div>
                <div class="form-group">
                    <span>What is the date?</span>
                    <input type="date" name="date" required>
                </div>
                <div class="form-group">
                    <span>Your phone number</span>
                    <input type="text" name="number" id="number" placeholder="Write your number here..." required>
                    <div id="phoneError" class="error"></div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>

    <script>
        // Function to validate phone number
        function validatePhoneNumber() {
            var phoneNumberInput = document.getElementById('number');
            var phoneNumber = phoneNumberInput.value.trim();

            // Check if the phone number contains exactly 10 digits
            if (phoneNumber.length !== 10 || isNaN(phoneNumber)) {
                document.getElementById('phoneError').innerText = 'Phone number must contain exactly 10 digits';
                phoneNumberInput.focus();
                return false;
            } else {
                document.getElementById('phoneError').innerText = '';
                return true;
            }
        }

        // Validate form on submit
        document.getElementById('bookingForm').onsubmit = function() {
            return validatePhoneNumber();
        };
    </script>

</body>

</html>
