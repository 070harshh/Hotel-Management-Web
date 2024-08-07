<?php
include 'includes/dbconnection.php';


session_start();
include('includes/dbconnection.php');

function checkRoomAvailability($checkin, $checkout) {
    global $dbh;
    $sql = "SELECT * FROM rooms WHERE id NOT IN (
                SELECT booking_id FROM bookings 
                WHERE 
                    (:checkin < checkout AND :checkout > checkin)
            )";
    $query = $dbh->prepare($sql);
    $query->bindParam(':checkin', $checkin, PDO::PARAM_STR);
    $query->bindParam(':checkout', $checkout, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

if (isset($_POST['check_availability'])) {
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $availableRooms = checkRoomAvailability($checkin, $checkout);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $price = $_POST['price'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Royal Orchid</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-feature-settings: 'dlig' 0, 'liga' 0, 'lnum' 1, 'kern' 1;
            margin: 0;
            color: #000000;
            font-size: 1rem;
            font-weight: 300;
            font-family: 'EB Garamond', serif;
            text-transform: none;
            line-height: 1.3;

            background-repeat: no-repeat;

        }

        .nav-container {
            background: transparent;
            position: fixed;
            width: 100%;
            z-index: 1000;
            transition: background-color 0.5s ease;
        }

        .nav-container.scrolled {
            background: rgba(0, 0, 0, 0.8);
        }

        .nav-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
        }

        .nav-logo {
            max-height: 80px;
        }

        .nav-logo img {
            max-height: 70px;
        }

        .nav-controls a {
            color: rgb(243, 189, 216);
            margin-left: 20px;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .nav-controls a:hover {
            color: #C57ED3;
        }

        .hero-section {
            position: relative;
            text-align: center;
            color: white;
        }

        .hero-section img {
            width: 100%;
            height: auto;
        }

        .form-container {
            /* background-image: url('images/bo.jpg'); */

            display: flex;
            justify-content: space-evenly;
            max-width: 1500px;
            margin: 0 auto;
            color: #FAF9F6;
            /* padding-top: 10%; */
        }

        .form-container .container {
            width: 100%;
            flex-basis: 60%;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            height: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: left 5%;


        }

        .form-container .your-stay {
            flex-basis: 35%;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f8f1e1;
            padding: left 5%;
        }

        .your-stay {
            max-height: 350px;
            max-width: 400px;
            margin-top: 15%;
            flex-basis: 35%;
            margin: 20px;
            padding: 20px;
            background-color: #f8f1e4;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 1.2rem;
            text-align: left;
            color: #333;
        }

        .your-stay h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #444;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }

        .your-stay p {
            margin: 10px 0;
            line-height: 1.5;
            font-size: 1.1rem;
        }

        .your-stay p span {
            font-weight: bold;
        }

        .your-stay p:nth-child(6) {
            margin-top: 15px;
            font-size: 1.3rem;
            color: #444;
        }

        .your-stay p:nth-child(7) {
            font-size: 1.3rem;
            color: #555;
            font-weight: bold;
        }

        }

        /* guest details--form */
        body {
            font-family: Garamond, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1500px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 100%;
            padding: left 5%;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 20px;

        }

        .header img {
            width: 200px;
            height: auto;
            margin-right: 20px;
        }

        .header .details {
            flex-grow: 1;
        }

        .header .details .title {
            font-size: 20px;
            font-weight: bold;
        }

        .header .details .rate {
            font-size: 14px;
            color: #555;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            width: 100%;
        }

        .form-group label {
            flex-basis: 20%;
            padding-right: 10px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .form-group input,
        .form-group select {
            flex-basis: 75%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group.full-width input {
            width: 90%;
        }

        .required {
            color: red;
            margin-left: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #b90f89;
            border: none;
            border-radius: 4px;
            color: #b90f89;
            font-size: 16px;
            cursor: pointer;
            display: block;
            width: 50%;


        }

        button:hover {
            background-color: #f691e6;
        }

        .cc-img {
            margin: 0 auto;
        }


        .foo {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* width: 100%;
            height: 100vh;
            background-color: #fff;*/
        }

        .doo {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        .policy-container {
            align-items: center;
            display: flex;
            justify-content: space-evenly;
            /* flex-basis: 60%;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */

            max-width: 1450px;
        }

        .policies {
            padding-top: 20px;
            text-align: center;
            margin-top: 20px;
            /* border: 1px solid black; */
            border-radius: 5px;
            width: 1200px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;

            margin-left: 5%;

            width: 1450px;
        }

        .acknowledgement-container {
            align-items: center;
            display: flex;
            justify-content: space-evenly;
            padding-bottom: 100px;
            width: 1450px;
        }


        .acknowledgement {
            padding-top: 20px;
            text-align: center;
            margin-top: 20px;
            /* border: 1px solid black; */
            border-radius: 5px;
            max-width: 1000px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;

            width: 1450px;

        }
    </style>
</head>

<body>


    <?php include 'includes/dbconnection.php'; ?>

    <?php include 'includes/header.php'; ?>

    <div class="hero-section">
        <img src="images/sealink_cover.jpg" alt="Hero Image">
    </div>
    </div>





    <script src="https://cdn02.jotfor.ms/static/prototype.forms.js?v=3.3.55270" type="text/javascript"></script>
    <script src="https://cdn03.jotfor.ms/static/jotform.forms.js?v=3.3.55270" type="text/javascript"></script>
    <script src="https://cdn01.jotfor.ms/js/vendor/maskedinput_5.0.9.min.js?v=3.3.55270"
        type="text/javascript"></script>
    <script src="https://cdn02.jotfor.ms/js/punycode-1.4.1.min.js?v=3.3.55270" type="text/javascript" defer></script>
    <script src="https://cdn01.jotfor.ms/s/umd/4d521032be2/for-widgets-server.js?v=3.3.55270"
        type="text/javascript"></script>
    <!-- <script src="https://cdn01.jotfor.ms/s/umd/4d521032be2/for-form-branding-footer.js?v=3.3.55270" type="text/javascript"
    defer></script> -->
    <script src="https://cdn03.jotfor.ms/js/vendor/smoothscroll.min.js?v=3.3.55270" type="text/javascript"></script>
    <script src="https://cdn01.jotfor.ms/js/errorNavigation.js?v=3.3.55270" type="text/javascript"></script>
    <script type="text/javascript">	JotForm.newDefaultTheme = true;
        JotForm.extendsNewTheme = false;
        JotForm.singleProduct = false;
        JotForm.newPaymentUIForNewCreatedForms = false;
        JotForm.texts = { "confirmEmail": "E-mail does not match", "pleaseWait": "Please wait...", "validateEmail": "You need to validate this e-mail", "confirmClearForm": "Are you sure you want to clear the form", "lessThan": "Your score should be less than or equal to", "incompleteFields": "There are incomplete required fields. Please complete them.", "required": "This field is required.", "requireOne": "At least one field required.", "requireEveryRow": "Every row is required.", "requireEveryCell": "Every cell is required.", "email": "Enter a valid e-mail address", "alphabetic": "This field can only contain letters", "numeric": "This field can only contain numeric values", "alphanumeric": "This field can only contain letters and numbers.", "cyrillic": "This field can only contain cyrillic characters", "url": "This field can only contain a valid URL", "currency": "This field can only contain currency values.", "fillMask": "Field value must fill mask.", "uploadExtensions": "You can only upload following files:", "noUploadExtensions": "File has no extension file type (e.g. .txt, .png, .jpeg)", "uploadFilesize": "File size cannot be bigger than:", "uploadFilesizemin": "File size cannot be smaller than:", "gradingScoreError": "Score total should only be less than or equal to", "inputCarretErrorA": "Input should not be less than the minimum value:", "inputCarretErrorB": "Input should not be greater than the maximum value:", "maxDigitsError": "The maximum digits allowed is", "minCharactersError": "The number of characters should not be less than the minimum value:", "maxCharactersError": "The number of characters should not be more than the maximum value:", "freeEmailError": "Free email accounts are not allowed", "minSelectionsError": "The minimum required number of selections is ", "maxSelectionsError": "The maximum number of selections allowed is ", "pastDatesDisallowed": "Date must not be in the past.", "dateLimited": "This date is unavailable.", "dateInvalid": "This date is not valid. The date format is {format}", "dateInvalidSeparate": "This date is not valid. Enter a valid {element}.", "ageVerificationError": "You must be older than {minAge} years old to submit this form.", "multipleFileUploads_typeError": "{file} has invalid extension. Only {extensions} are allowed.", "multipleFileUploads_sizeError": "{file} is too large, maximum file size is {sizeLimit}.", "multipleFileUploads_minSizeError": "{file} is too small, minimum file size is {minSizeLimit}.", "multipleFileUploads_emptyError": "{file} is empty, please select files again without it.", "multipleFileUploads_uploadFailed": "File upload failed, please remove it and upload the file again.", "multipleFileUploads_onLeave": "The files are being uploaded, if you leave now the upload will be cancelled.", "multipleFileUploads_fileLimitError": "Only {fileLimit} file uploads allowed.", "dragAndDropFilesHere_infoMessage": "Drag and drop files here", "chooseAFile_infoMessage": "Choose a file", "maxFileSize_infoMessage": "Max. file size", "generalError": "There are errors on the form. Please fix them before continuing.", "generalPageError": "There are errors on this page. Please fix them before continuing.", "wordLimitError": "Too many words. The limit is", "wordMinLimitError": "Too few words.  The minimum is", "characterLimitError": "Too many Characters.  The limit is", "characterMinLimitError": "Too few characters. The minimum is", "ccInvalidNumber": "Credit Card Number is invalid.", "ccInvalidCVC": "CVC number is invalid.", "ccInvalidExpireDate": "Expire date is invalid.", "ccInvalidExpireMonth": "Expiration month is invalid.", "ccInvalidExpireYear": "Expiration year is invalid.", "ccMissingDetails": "Please fill up the credit card details.", "ccMissingProduct": "Please select at least one product.", "ccMissingDonation": "Please enter numeric values for donation amount.", "disallowDecimals": "Please enter a whole number.", "restrictedDomain": "This domain is not allowed", "ccDonationMinLimitError": "Minimum amount is {minAmount} {currency}", "requiredLegend": "All fields marked with * are required and must be filled.", "geoPermissionTitle": "Permission Denied", "geoPermissionDesc": "Check your browser's privacy settings.", "geoNotAvailableTitle": "Position Unavailable", "geoNotAvailableDesc": "Location provider not available. Please enter the address manually.", "geoTimeoutTitle": "Timeout", "geoTimeoutDesc": "Please check your internet connection and try again.", "selectedTime": "Selected Time", "formerSelectedTime": "Former Time", "cancelAppointment": "Cancel Appointment", "cancelSelection": "Cancel Selection", "noSlotsAvailable": "No slots available", "slotUnavailable": "{time} on {date} has been selected is unavailable. Please select another slot.", "multipleError": "There are {count} errors on this page. Please correct them before moving on.", "oneError": "There is {count} error on this page. Please correct it before moving on.", "doneMessage": "Well done! All errors are fixed.", "invalidTime": "Enter a valid time", "doneButton": "Done", "reviewSubmitText": "Review and Submit", "nextButtonText": "Next", "prevButtonText": "Previous", "seeErrorsButton": "See Errors", "notEnoughStock": "Not enough stock for the current selection", "notEnoughStock_remainedItems": "Not enough stock for the current selection ({count} items left)", "soldOut": "Sold Out", "justSoldOut": "Just Sold Out", "selectionSoldOut": "Selection Sold Out", "subProductItemsLeft": "({count} items left)", "startButtonText": "START", "submitButtonText": "Submit", "submissionLimit": "Sorry! Only one entry is allowed. <br> Multiple submissions are disabled for this form.", "reviewBackText": "Back to Form", "seeAllText": "See All", "progressMiddleText": "of", "fieldError": "field has an error.", "error": "Error" };
        JotForm.newPaymentUI = true;
        JotForm.originalLanguage = "en";
        JotForm.replaceTagTest = true;
        JotForm.clearFieldOnHide = "disable";
        JotForm.submitError = "jumpToFirstError";
        window.addEventListener('DOMContentLoaded', function () { window.brandingFooter.init({ "formID": 241930658105455, "campaign": "powered_by_jotform_le", "isCardForm": false, "isLegacyForm": true, "formLanguage": "en" }) }); JotForm.isFullSource = true;

        JotForm.init(function () {
            /*INIT-START*/
            if (window.JotForm && JotForm.accessible) $('input_46').setAttribute('tabindex', 0);
            if (window.JotForm && JotForm.accessible) $('input_25').setAttribute('tabindex', 0);

            JotForm.calendarMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            if (!JotForm.calenderViewMonths) JotForm.calenderViewMonths = {}; JotForm.calenderViewMonths[8] = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            if (!JotForm.calenderViewDays) JotForm.calenderViewDays = {}; JotForm.calenderViewDays[8] = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            JotForm.calendarDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            JotForm.calendarOther = { "today": "Today" };
            var languageOptions = document.querySelectorAll('#langList li');
            for (var langIndex = 0; langIndex < languageOptions.length; langIndex++) {
                languageOptions[langIndex].on('click', function (e) { setTimeout(function () { JotForm.setCalendar("8", false, { "days": { "monday": true, "tuesday": true, "wednesday": true, "thursday": true, "friday": true, "saturday": true, "sunday": true }, "future": true, "past": false, "custom": false, "ranges": false, "start": "", "end": "", "countSelectedDaysOnly": false }); }, 0); });
            }
            JotForm.onTranslationsFetch(function () { JotForm.setCalendar("8", false, { "days": { "monday": true, "tuesday": true, "wednesday": true, "thursday": true, "friday": true, "saturday": true, "sunday": true }, "future": true, "past": false, "custom": false, "ranges": false, "start": "", "end": "", "countSelectedDaysOnly": false }); });

            JotForm.calendarMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            if (!JotForm.calenderViewMonths) JotForm.calenderViewMonths = {}; JotForm.calenderViewMonths[9] = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            if (!JotForm.calenderViewDays) JotForm.calenderViewDays = {}; JotForm.calenderViewDays[9] = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            JotForm.calendarDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            JotForm.calendarOther = { "today": "Today" };
            var languageOptions = document.querySelectorAll('#langList li');
            for (var langIndex = 0; langIndex < languageOptions.length; langIndex++) {
                languageOptions[langIndex].on('click', function (e) { setTimeout(function () { JotForm.setCalendar("9", false, { "days": { "monday": true, "tuesday": true, "wednesday": true, "thursday": true, "friday": true, "saturday": true, "sunday": true }, "future": true, "past": false, "custom": false, "ranges": false, "start": "", "end": "", "countSelectedDaysOnly": false }); }, 0); });
            }
            JotForm.onTranslationsFetch(function () { JotForm.setCalendar("9", false, { "days": { "monday": true, "tuesday": true, "wednesday": true, "thursday": true, "friday": true, "saturday": true, "sunday": true }, "future": true, "past": false, "custom": false, "ranges": false, "start": "", "end": "", "countSelectedDaysOnly": false }); });

            JotForm.calendarMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            if (!JotForm.calenderViewMonths) JotForm.calenderViewMonths = {}; JotForm.calenderViewMonths[26] = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            if (!JotForm.calenderViewDays) JotForm.calenderViewDays = {}; JotForm.calenderViewDays[26] = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            JotForm.calendarDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            JotForm.calendarOther = { "today": "Today" };
            var languageOptions = document.querySelectorAll('#langList li');
            for (var langIndex = 0; langIndex < languageOptions.length; langIndex++) {
                languageOptions[langIndex].on('click', function (e) { setTimeout(function () { JotForm.setCalendar("26", false, { "days": { "monday": true, "tuesday": true, "wednesday": true, "thursday": true, "friday": true, "saturday": true, "sunday": true }, "future": true, "past": true, "custom": false, "ranges": false, "start": "", "end": "", "countSelectedDaysOnly": false }); }, 0); });
            }
            JotForm.onTranslationsFetch(function () { JotForm.setCalendar("26", false, { "days": { "monday": true, "tuesday": true, "wednesday": true, "thursday": true, "friday": true, "saturday": true, "sunday": true }, "future": true, "past": true, "custom": false, "ranges": false, "start": "", "end": "", "countSelectedDaysOnly": false }); });
            JotForm.displayLocalTime("input_22_hourSelect", "input_22_minuteSelect", "input_22_ampm", "input_22_timeInput", true);
            JotForm.setPhoneMaskingValidator('input_41_full', '\u0028\u0023\u0023\u0023\u0029 \u0023\u0023\u0023\u002d\u0023\u0023\u0023\u0023');
            JotForm.setPhoneMaskingValidator('input_6_full', '\u0028\u0023\u0023\u0023\u0029 \u0023\u0023\u0023\u002d\u0023\u0023\u0023\u0023');
            JotForm.setPhoneMaskingValidator('input_5_full', '\u0028\u0023\u0023\u0023\u0029 \u0023\u0023\u0023\u002d\u0023\u0023\u0023\u0023');
            if (window.JotForm && JotForm.accessible) $('input_27').setAttribute('tabindex', 0);
            JotForm.alterTexts({ "ageVerificationError": "You must be older than {minAge} years old to submit this form.", "alphabetic": "This field can only contain letters", "alphanumeric": "This field can only contain letters and numbers.", "ccDonationMinLimitError": "Minimum amount is {minAmount} {currency}", "ccInvalidCVC": "CVC number is invalid.", "ccInvalidExpireDate": "Expire date is invalid.", "ccInvalidNumber": "Credit Card Number is invalid.", "ccMissingDetails": "Please fill up the Credit Card details.", "ccMissingDonation": "Please enter numeric values for donation amount.", "ccMissingProduct": "Please select at least one product.", "characterLimitError": "Too many Characters.  The limit is", "characterMinLimitError": "Too few characters. The minimum is", "confirmClearForm": "Are you sure you want to clear the form?", "confirmEmail": "E-mail does not match", "currency": "This field can only contain currency values.", "cyrillic": "This field can only contain cyrillic characters", "dateInvalid": "This date is not valid. The date format is {format}", "dateInvalidSeparate": "This date is not valid. Enter a valid {element}.", "dateLimited": "This date is unavailable.", "disallowDecimals": "Please enter a whole number.", "email": "Enter a valid e-mail address", "fillMask": "Field value must fill mask.", "freeEmailError": "Free email accounts are not allowed", "generalError": "There are errors on the form. Please fix them before continuing.", "generalPageError": "There are errors on this page. Please fix them before continuing.", "gradingScoreError": "Score total should only be less than or equal to", "incompleteFields": "There are incomplete required fields. Please complete them.", "inputCarretErrorA": "Input should not be less than the minimum value:", "inputCarretErrorB": "Input should not be greater than the maximum value:", "lessThan": "Your score should be less than or equal to", "maxDigitsError": "The maximum digits allowed is", "maxSelectionsError": "The maximum number of selections allowed is ", "minSelectionsError": "The minimum required number of selections is ", "multipleFileUploads_emptyError": "{file} is empty, please select files again without it.", "multipleFileUploads_fileLimitError": "Only {fileLimit} file uploads allowed.", "multipleFileUploads_minSizeError": "{file} is too small, minimum file size is {minSizeLimit}.", "multipleFileUploads_onLeave": "The files are being uploaded, if you leave now the upload will be cancelled.", "multipleFileUploads_sizeError": "{file} is too large, maximum file size is {sizeLimit}.", "multipleFileUploads_typeError": "{file} has invalid extension. Only {extensions} are allowed.", "nextButtonText": "Next", "numeric": "This field can only contain numeric values", "pastDatesDisallowed": "Date must not be in the past.", "pleaseWait": "Please wait...", "prevButtonText": "Previous", "progressMiddleText": "of", "required": "This field is required.", "requireEveryCell": "Every cell is required.", "requireEveryRow": "Every row is required.", "requireOne": "At least one field required.", "reviewBackText": "Back to Form", "reviewSubmitText": "Review and Submit", "seeAllText": "See All", "submissionLimit": "Sorry! Only one entry is allowed.  Multiple submissions are disabled for this form.", "submitButtonText": "Submit", "uploadExtensions": "You can only upload following files:", "uploadFilesize": "File size cannot be bigger than:", "uploadFilesizemin": "File size cannot be smaller than:", "url": "This field can only contain a valid URL", "wordLimitError": "Too many words. The limit is", "wordMinLimitError": "Too few words.  The minimum is" });
            /*INIT-END*/
        });

        setTimeout(function () {
            JotForm.paymentExtrasOnTheFly([null, { "name": "hotelGuest", "qid": "1", "text": "Hotel Guest Registration Form", "type": "control_head" }, { "name": "submit2", "qid": "2", "text": "Submit", "type": "control_button" }, { "name": "name", "qid": "3", "text": "Name", "type": "control_fullname" }, { "name": "email", "qid": "4", "subLabel": "example@example.com", "text": "Email", "type": "control_email" }, { "name": "mobileNumber", "qid": "5", "text": "Mobile", "type": "control_phone" }, { "name": "homePhone", "qid": "6", "text": "Home", "type": "control_phone" }, { "name": "input7", "qid": "7", "text": "Booking Information", "type": "control_text" }, { "name": "checkinDate", "qid": "8", "text": "Check-in Date", "type": "control_datetime" }, { "name": "checkoutDate", "qid": "9", "text": "Check-out Date", "type": "control_datetime" }, { "name": "nights", "qid": "10", "text": "Nights", "type": "control_calculation" }, { "name": "leasePocket", "qid": "11", "text": "Lease Pocket Wifi ($5)", "type": "control_radio" }, null, { "name": "address", "qid": "13", "text": "Address", "type": "control_address" }, { "name": "roomType", "qid": "14", "text": "Room Type", "type": "control_dropdown" }, { "name": "totalAmount", "qid": "15", "text": "Total Amount", "type": "control_calculation" }, null, { "name": "smokingRoom", "qid": "17", "text": "Smoking", "type": "control_dropdown" }, { "name": "input18", "qid": "18", "text": "The submission of this form makes a reservation for the type of room selected in the form. Any changes prior the scheduled occupancy should be communicated to us at least 24 hours prior, which may be subject to availability of request.\nCheck-in time shall be at 2:00PM and checkout time shall be at 12:00NN.", "type": "control_text" }, null, null, null, { "name": "pickupTime", "qid": "22", "text": "Pick-up Time", "type": "control_time" }, null, null, { "mde": "No", "name": "pickupLocation", "qid": "25", "text": "Pick-up Location", "type": "control_textarea", "wysiwyg": "Disable" }, { "name": "pickupDate", "qid": "26", "text": "Pick-up Date", "type": "control_datetime" }, { "mde": "No", "name": "notesspecialRequirements", "qid": "27", "text": "Notes", "type": "control_textarea", "wysiwyg": "Disable" }, null, null, null, null, { "name": "ofGuests", "qid": "32", "text": "#of Guests", "type": "control_number" }, { "name": "numberOf", "qid": "33", "text": "Number of Adults", "type": "control_number" }, { "name": "typeA", "qid": "34", "text": "Masked Input", "type": "control_widget" }, null, null, null, null, null, null, { "name": "homePhone", "qid": "41", "text": "Home", "type": "control_phone" }, { "name": "email", "qid": "42", "subLabel": "example@example.com", "text": "Email", "type": "control_email" }, { "name": "address", "qid": "43", "text": "Address", "type": "control_address" }, { "name": "leasePocket", "qid": "44", "text": "Lease Pocket Wifi ($5)", "type": "control_radio" }, { "name": " Shuttle", "qid": "45", "text": "Shuttle Service", "type": "control_radio" }, { "mde": "No", "name": "pickupLocation", "qid": "46", "text": "Pick-up Location", "type": "control_textarea", "wysiwyg": "Disable" }, { "name": "nights", "qid": "47", "text": "Nights", "type": "control_calculation" }, { "name": "totalAmount", "qid": "48", "text": "Total Amount", "type": "control_calculation" }]);
        }, 20); 
    </script>
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/stylebuilder/static/form-common.css?v=d8ebb05
" />
    <style type="text/css">
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }

            .form-section {
                display: inline !important
            }

            .form-pagebreak {
                display: none !important
            }

            .form-section-closed {
                height: auto !important
            }

            .page-section {
                position: initial !important
            }
        }
    </style>
    <link type="text/css" rel="stylesheet"
        href="https://cdn02.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.55270&themeRevisionID=5f30e2a790832f3e96009402" />
    <link type="text/css" rel="stylesheet"
        href="https://cdn03.jotfor.ms/css/styles/payment/payment_styles.css?3.3.55270" />
    <link type="text/css" rel="stylesheet"
        href="https://cdn01.jotfor.ms/css/styles/payment/payment_feature.css?3.3.55270" />
    <style type="text/css" id="form-designer-style">
        /* Injected CSS Code */

        /* Begining of advanced designer */

        /* 17 - INPUT WIDTHS */
        /*  20 - FORM PADDING */
        .form-section {

            padding: 0px 38px;
        }

        /* Heights */
        /* 11 - LINE PADDING */
        /* LABEL STYLE */
        /* 12 - ROUNDED INPUTS */
        .form-radio-item,
        .form-checkbox-item {
            padding-bottom: 0px;
        }

        .form-radio-item:last-child,
        .form-checkbox-item:last-child {
            padding-bottom: 0;
        }

        .form-single-column .form-checkbox-item,
        .form-single-column .form-radio-item {
            width: 100%;
        }

        .form-checkbox-item .editor-container div,
        .form-radio-item .editor-container div {
            position: relative;
        }

        .form-checkbox-item .editor-container div:before,
        .form-radio-item .editor-container div:before {
            display: inline-block;
            vertical-align: middle;
            left: 0;
            width: 20px;
            height: 20px;
        }

        .form-checkbox-item input,
        .form-radio-item input {
            margin-top: 2px;
        }

        .form-checkbox:checked+label:before,
        .form-checkbox:checked+span:before {
            background-color: #2e69ff;
            border-color: #2e69ff;
        }

        .form-radio:checked+label:before,
        .form-radio:checked+span:before {
            border-color: #2e69ff;
        }

        .form-radio:checked+label:after,
        .form-radio:checked+span:after {
            background-color: #2e69ff;
        }

        .form-checkbox:hover+label:before,
        .form-checkbox:hover+span:before,
        .form-radio:hover+label:before,
        .form-radio:hover+span:before {
            border-color: rgba(46, 105, 255, 0.5);
            box-shadow: 0 0 0 2px rgba(46, 105, 255, 0.25);
        }

        .form-checkbox:focus+label:before,
        .form-checkbox:focus+span:before,
        .form-radio:focus+label:before,
        .form-radio:focus+span:before {
            border-color: #2e69ff;
            box-shadow: 0 0 0 3px rgba(46, 105, 255, 0.25);
        }

        .submit-button {
            font-size: 16px;
            font-weight: normal;
            font-family: inherit;
            border: none;
            border-width: 0px;
            border-style: solid;
        }

        .submit-button {
            min-width: 180px;
        }

        li[data-type="control_button"] .form-submit-button {
            color: #ffffff;
            background-color: #2c3345;
            background-image: none;
            box-shadow: none;
            text-shadow: none;
        }

        li[data-type="control_button"] .form-submit-button:hover {
            background-color: #040507;
        }

        li[data-type="control_button"] button.jf-form-buttons.form-sacl-button,
        li[data-type="control_button"] button.jf-form-buttons.form-submit-print {
            color: #2c3345;
            border-color: #2c3345;
            background-image: none;
            background-color: #fff;
        }

        li[data-type="control_button"] button.jf-form-buttons.form-sacl-button:hover,
        li[data-type="control_button"] button.jf-form-buttons.form-submit-print:hover {
            background-color: #040507;
            color: #fff;
        }

        li[data-type="control_button"] button.jf-form-buttons.form-pagebreak-back {
            background-image: none;
            background-color: #040507;
            box-shadow: none;
            text-shadow: none;
        }

        li[data-type="control_button"] button.jf-form-buttons.form-pagebreak-back:hover {
            background-color: #000000;
            color: #fff;
        }

        .form-all .form-pagebreak-back,
        .form-all .form-pagebreak-next {
            font-family: "Inter", sans-serif;
            font-size: 16px;
            font-weight: normal;
        }

        .form-all .form-pagebreak-back,
        .form-all .form-pagebreak-next {
            min-width: 128px;
        }

        li[data-type="control_image"] div {
            text-align: left;
        }

        li[data-type="control_image"] img {
            border: none;
            border-width: 0px !important;
            border-style: solid !important;
            border-color: false !important;
        }

        .supernova {
            height: 100%;
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center top;
            background-repeat: repeat;
        }

        .supernova {
            background-image: none;
            background-image: url("https://www.jotform.com/uploads/seyma/form_files/apartment-architecture-bed-bedroom-271668.5dc2e4fcd9bd13.39184855.5f439d96dd5190.29642959.jpg");
        }

        #stage {
            background-image: none;
            background-image: url("https://www.jotform.com/uploads/seyma/form_files/apartment-architecture-bed-bedroom-271668.5dc2e4fcd9bd13.39184855.5f439d96dd5190.29642959.jpg");
        }

        /* | */
        .form-all {
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center top;
            background-repeat: repeat;
        }

        .form-header-group {
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center top;
        }

        .header-large h1.form-header {
            font-size: 2em;
        }

        .header-large h2.form-header {
            font-size: 1.5em;
        }

        .header-large h3.form-header {
            font-size: 1.17em;
        }

        .header-large h1+.form-subHeader {
            font-size: 1em;
        }

        .header-large h2+.form-subHeader {
            font-size: .875em;
        }

        .header-large h3+.form-subHeader {
            font-size: .75em;
        }

        .header-default h1.form-header {
            font-size: 2em;
        }

        .header-default h2.form-header {
            font-size: 1.5em;
        }

        .header-default h3.form-header {
            font-size: 1.17em;
        }

        .header-default h1+.form-subHeader {
            font-size: 1em;
        }

        .header-default h2+.form-subHeader {
            font-size: .875em;
        }

        .header-default h3+.form-subHeader {
            font-size: .75em;
        }

        .header-small h1.form-header {
            font-size: 2em;
        }

        .header-small h2.form-header {
            font-size: 1.5em;
        }

        .header-small h3.form-header {
            font-size: 1.17em;
        }

        .header-small h1+.form-subHeader {
            font-size: 1em;
        }

        .header-small h2+.form-subHeader {
            font-size: .875em;
        }

        .header-small h3+.form-subHeader {
            font-size: .75em;
        }

        .form-header-group {
            text-align: left;
        }

        .form-header-group {
            font-family: "false", sans-serif;
        }

        div.form-header-group.header-large,
        div.form-header-group.hasImage {
            margin: 0px -38px;
        }

        div.form-header-group.header-large,
        div.form-header-group.hasImage {
            padding: 0px 0px;
        }

        .form-header-group .form-header,
        .form-header-group .form-subHeader {
            color: #2c3345;
        }

        .form-header-group {
            background-color: ;
        }

        .form-header-group {
            border-bottom: none;
        }

        .form-line-error {
            -webkit-transition-property: none;
            -moz-transition-property: none;
            -ms-transition-property: none;
            -o-transition-property: none;
            transition-property: none;
            -webkit-transition-duration: 0.3s;
            -moz-transition-duration: 0.3s;
            -ms-transition-duration: 0.3s;
            -o-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-timing-function: ease;
            -moz-transition-timing-function: ease;
            -ms-transition-timing-function: ease;
            -o-transition-timing-function: ease;
            transition-timing-function: ease;
            background-color: #fff4f4;
        }

        .form-line-error .form-error-message {
            background-color: #f23a3c;
            clear: both;
            float: none;
        }

        .form-line-error .form-error-message .form-error-arrow {
            border-bottom-color: #f23a3c;
        }

        .form-line-error input:not(#coupon-input),
        .form-line-error textarea,
        .form-line-error .form-validation-error {
            border: 1px solid #f23a3c;
            box-shadow: 0 0 3px #f23a3c;
        }

        .form-line-error {
            -webkit-transition-property: none;
            -moz-transition-property: none;
            -ms-transition-property: none;
            -o-transition-property: none;
            transition-property: none;
            -webkit-transition-duration: 0.3s;
            -moz-transition-duration: 0.3s;
            -ms-transition-duration: 0.3s;
            -o-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-timing-function: ease;
            -moz-transition-timing-function: ease;
            -ms-transition-timing-function: ease;
            -o-transition-timing-function: ease;
            transition-timing-function: ease;
            background-color: #fff4f4;
        }

        .form-header-group .form-header,
        .form-header-group .form-subHeader {
            color: #2c3345;
        }

        .form-line-active {
            background-color: #ffffe0;
        }

        /* 29 - FORM COLUMNS */

        /*PREFERENCES STYLE*/
        .form-all {
            font-family: Inter, sans-serif;
            margin-left: 5%;
        }

        .form-label.form-label-auto {

            display: block;
            float: none;
            text-align: left;
            width: 100%;

        }

        .form-line {
            margin-top: 12px;
            margin-bottom: 12px;
            padding-top: 0;
            padding-bottom: 0;
        }

        .form-all {
            max-width: 752px;
            width: 100%;
        }

        .form-label.form-label-left,
        .form-label.form-label-right,
        .form-label.form-label-left.form-label-auto,
        .form-label.form-label-right.form-label-auto {
            width: 230px;
        }

        .form-all {
            font-size: 16px
        }

        .supernova .form-all,
        .form-all {
            background-color: #fff;
        }

        .form-all {
            color: #2C3345;
        }

        .form-header-group .form-header {
            color: rgb(44, 51, 69);
        }

        .form-header-group .form-subHeader {
            color: #2C3345;
        }

        .form-label-top,
        .form-label-left,
        .form-label-right,
        .form-html,
        .form-checkbox-item label,
        .form-radio-item label,
        span.FITB .qb-checkbox-label,
        span.FITB .qb-radiobox-label,
        span.FITB .form-radio label,
        span.FITB .form-checkbox label,
        [data-blotid][data-type=checkbox] [data-labelid],
        [data-blotid][data-type=radiobox] [data-labelid],
        span.FITB-inptCont[data-type=checkbox] label,
        span.FITB-inptCont[data-type=radiobox] label {
            color: #2C3345;
        }

        .form-sub-label {
            color: #464d5f;
        }

        .supernova {
            background-color: #accfce;
        }

        .supernova body {
            background: transparent;
        }

        .form-textbox,
        .form-textarea,
        .form-dropdown,
        .form-radio-other-input,
        .form-checkbox-other-input,
        .form-captcha input,
        .form-spinner input {
            background-color: #fff;
        }


        .supernova {
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center top;
        }

        .supernova,
        #stage {
            background-image: none;
        }

        .form-all {
            background-image: none;
        }

        /*PREFERENCES STYLE*/
        /*__INSPECT_SEPERATOR__*/

        /* Injected CSS Code */

        .form_container {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }
    </style>








    <!-- <div class="header">
    <img src="images/room1.png" alt="Luxury Rooms">

    <div class="details">
        <div class="title">Luxury Rooms</div>
        <div class="rate">Room Only Rate<br>Jul 4 - Jul 5, 2024</div>
    </div>
</div> -->
    <!-- <div class="container"> -->
    <div class="form-container">

        <!-- <form action="guest_details.php" method="POST"> -->
        <script src="https://cdn02.jotfor.ms/static/prototype.forms.js?v=3.3.55271" type="text/javascript"></script>
        <script src="https://cdn03.jotfor.ms/static/jotform.forms.js?v=3.3.55271" type="text/javascript"></script>
        <script src="https://cdn01.jotfor.ms/js/vendor/maskedinput_5.0.9.min.js?v=3.3.55271"
            type="text/javascript"></script>
        <script src="https://cdn02.jotfor.ms/js/punycode-1.4.1.min.js?v=3.3.55271" type="text/javascript"
            defer></script>
        <!-- <script src="https://cdn01.jotfor.ms/s/umd/4d521032be2/for-form-branding-footer.js?v=3.3.55271"
        <!-- type="text/javascript" defer></script> -->
        <script src="https://cdn03.jotfor.ms/js/vendor/smoothscroll.min.js?v=3.3.55271" type="text/javascript"></script>
        <script src="https://cdn01.jotfor.ms/js/errorNavigation.js?v=3.3.55271" type="text/javascript"></script>
        <script type="text/javascript">	JotForm.newDefaultTheme = true;
            JotForm.extendsNewTheme = false;
            JotForm.singleProduct = false;
            JotForm.newPaymentUIForNewCreatedForms = false;
            JotForm.texts = { "confirmEmail": "E-mail does not match", "pleaseWait": "Please wait...", "validateEmail": "You need to validate this e-mail", "confirmClearForm": "Are you sure you want to clear the form", "lessThan": "Your score should be less than or equal to", "incompleteFields": "There are incomplete required fields. Please complete them.", "required": "This field is required.", "requireOne": "At least one field required.", "requireEveryRow": "Every row is required.", "requireEveryCell": "Every cell is required.", "email": "Enter a valid e-mail address", "alphabetic": "This field can only contain letters", "numeric": "This field can only contain numeric values", "alphanumeric": "This field can only contain letters and numbers.", "cyrillic": "This field can only contain cyrillic characters", "url": "This field can only contain a valid URL", "currency": "This field can only contain currency values.", "fillMask": "Field value must fill mask.", "uploadExtensions": "You can only upload following files:", "noUploadExtensions": "File has no extension file type (e.g. .txt, .png, .jpeg)", "uploadFilesize": "File size cannot be bigger than:", "uploadFilesizemin": "File size cannot be smaller than:", "gradingScoreError": "Score total should only be less than or equal to", "inputCarretErrorA": "Input should not be less than the minimum value:", "inputCarretErrorB": "Input should not be greater than the maximum value:", "maxDigitsError": "The maximum digits allowed is", "minCharactersError": "The number of characters should not be less than the minimum value:", "maxCharactersError": "The number of characters should not be more than the maximum value:", "freeEmailError": "Free email accounts are not allowed", "minSelectionsError": "The minimum required number of selections is ", "maxSelectionsError": "The maximum number of selections allowed is ", "pastDatesDisallowed": "Date must not be in the past.", "dateLimited": "This date is unavailable.", "dateInvalid": "This date is not valid. The date format is {format}", "dateInvalidSeparate": "This date is not valid. Enter a valid {element}.", "ageVerificationError": "You must be older than {minAge} years old to submit this form.", "multipleFileUploads_typeError": "{file} has invalid extension. Only {extensions} are allowed.", "multipleFileUploads_sizeError": "{file} is too large, maximum file size is {sizeLimit}.", "multipleFileUploads_minSizeError": "{file} is too small, minimum file size is {minSizeLimit}.", "multipleFileUploads_emptyError": "{file} is empty, please select files again without it.", "multipleFileUploads_uploadFailed": "File upload failed, please remove it and upload the file again.", "multipleFileUploads_onLeave": "The files are being uploaded, if you leave now the upload will be cancelled.", "multipleFileUploads_fileLimitError": "Only {fileLimit} file uploads allowed.", "dragAndDropFilesHere_infoMessage": "Drag and drop files here", "chooseAFile_infoMessage": "Choose a file", "maxFileSize_infoMessage": "Max. file size", "generalError": "There are errors on the form. Please fix them before continuing.", "generalPageError": "There are errors on this page. Please fix them before continuing.", "wordLimitError": "Too many words. The limit is", "wordMinLimitError": "Too few words.  The minimum is", "characterLimitError": "Too many Characters.  The limit is", "characterMinLimitError": "Too few characters. The minimum is", "ccInvalidNumber": "Credit Card Number is invalid.", "ccInvalidCVC": "CVC number is invalid.", "ccInvalidExpireDate": "Expire date is invalid.", "ccInvalidExpireMonth": "Expiration month is invalid.", "ccInvalidExpireYear": "Expiration year is invalid.", "ccMissingDetails": "Please fill up the credit card details.", "ccMissingProduct": "Please select at least one product.", "ccMissingDonation": "Please enter numeric values for donation amount.", "disallowDecimals": "Please enter a whole number.", "restrictedDomain": "This domain is not allowed", "ccDonationMinLimitError": "Minimum amount is {minAmount} {currency}", "requiredLegend": "All fields marked with * are required and must be filled.", "geoPermissionTitle": "Permission Denied", "geoPermissionDesc": "Check your browser's privacy settings.", "geoNotAvailableTitle": "Position Unavailable", "geoNotAvailableDesc": "Location provider not available. Please enter the address manually.", "geoTimeoutTitle": "Timeout", "geoTimeoutDesc": "Please check your internet connection and try again.", "selectedTime": "Selected Time", "formerSelectedTime": "Former Time", "cancelAppointment": "Cancel Appointment", "cancelSelection": "Cancel Selection", "noSlotsAvailable": "No slots available", "slotUnavailable": "{time} on {date} has been selected is unavailable. Please select another slot.", "multipleError": "There are {count} errors on this page. Please correct them before moving on.", "oneError": "There is {count} error on this page. Please correct it before moving on.", "doneMessage": "Well done! All errors are fixed.", "invalidTime": "Enter a valid time", "doneButton": "Done", "reviewSubmitText": "Review and Submit", "nextButtonText": "Next", "prevButtonText": "Previous", "seeErrorsButton": "See Errors", "notEnoughStock": "Not enough stock for the current selection", "notEnoughStock_remainedItems": "Not enough stock for the current selection ({count} items left)", "soldOut": "Sold Out", "justSoldOut": "Just Sold Out", "selectionSoldOut": "Selection Sold Out", "subProductItemsLeft": "({count} items left)", "startButtonText": "START", "submitButtonText": "Submit", "submissionLimit": "Sorry! Only one entry is allowed. <br> Multiple submissions are disabled for this form.", "reviewBackText": "Back to Form", "seeAllText": "See All", "progressMiddleText": "of", "fieldError": "field has an error.", "error": "Error" };
            JotForm.newPaymentUI = true;
            JotForm.originalLanguage = "en";
            JotForm.replaceTagTest = true;
            JotForm.clearFieldOnHide = "disable";
            JotForm.submitError = "jumpToFirstError";
            // window.addEventListener('DOMContentLoaded', function () { window.brandingFooter.init({ "formID": 241931150460447, "campaign": "powered_by_jotform_le", "isCardForm": false, "isLegacyForm": true, "formLanguage": "en" }) }); JotForm.isFullSource = true;

            JotForm.init(function () {
                /*INIT-START*/
                JotForm.setPhoneMaskingValidator('input_5_full', '\u0028\u0023\u0023\u0023\u0029 \u0023\u0023\u0023\u002d\u0023\u0023\u0023\u0023');
                JotForm.alterTexts({ "ageVerificationError": "You must be older than {minAge} years old to submit this form.", "alphabetic": "This field can only contain letters", "alphanumeric": "This field can only contain letters and numbers.", "ccDonationMinLimitError": "Minimum amount is {minAmount} {currency}", "ccInvalidCVC": "CVC number is invalid.", "ccInvalidExpireDate": "Expire date is invalid.", "ccInvalidNumber": "Credit Card Number is invalid.", "ccMissingDetails": "Please fill up the Credit Card details.", "ccMissingDonation": "Please enter numeric values for donation amount.", "ccMissingProduct": "Please select at least one product.", "characterLimitError": "Too many Characters.  The limit is", "characterMinLimitError": "Too few characters. The minimum is", "confirmClearForm": "Are you sure you want to clear the form?", "confirmEmail": "E-mail does not match", "currency": "This field can only contain currency values.", "cyrillic": "This field can only contain cyrillic characters", "dateInvalid": "This date is not valid. The date format is {format}", "dateInvalidSeparate": "This date is not valid. Enter a valid {element}.", "dateLimited": "This date is unavailable.", "disallowDecimals": "Please enter a whole number.", "email": "Enter a valid e-mail address", "fillMask": "Field value must fill mask.", "freeEmailError": "Free email accounts are not allowed", "generalError": "There are errors on the form. Please fix them before continuing.", "generalPageError": "There are errors on this page. Please fix them before continuing.", "gradingScoreError": "Score total should only be less than or equal to", "incompleteFields": "There are incomplete required fields. Please complete them.", "inputCarretErrorA": "Input should not be less than the minimum value:", "inputCarretErrorB": "Input should not be greater than the maximum value:", "lessThan": "Your score should be less than or equal to", "maxDigitsError": "The maximum digits allowed is", "maxSelectionsError": "The maximum number of selections allowed is ", "minSelectionsError": "The minimum required number of selections is ", "multipleFileUploads_emptyError": "{file} is empty, please select files again without it.", "multipleFileUploads_fileLimitError": "Only {fileLimit} file uploads allowed.", "multipleFileUploads_minSizeError": "{file} is too small, minimum file size is {minSizeLimit}.", "multipleFileUploads_onLeave": "The files are being uploaded, if you leave now the upload will be cancelled.", "multipleFileUploads_sizeError": "{file} is too large, maximum file size is {sizeLimit}.", "multipleFileUploads_typeError": "{file} has invalid extension. Only {extensions} are allowed.", "nextButtonText": "Next", "numeric": "This field can only contain numeric values", "pastDatesDisallowed": "Date must not be in the past.", "pleaseWait": "Please wait...", "prevButtonText": "Previous", "progressMiddleText": "of", "required": "This field is required.", "requireEveryCell": "Every cell is required.", "requireEveryRow": "Every row is required.", "requireOne": "At least one field required.", "reviewBackText": "Back to Form", "reviewSubmitText": "Review and Submit", "seeAllText": "See All", "submissionLimit": "Sorry! Only one entry is allowed.  Multiple submissions are disabled for this form.", "submitButtonText": "Submit", "uploadExtensions": "You can only upload following files:", "uploadFilesize": "File size cannot be bigger than:", "uploadFilesizemin": "File size cannot be smaller than:", "url": "This field can only contain a valid URL", "wordLimitError": "Too many words. The limit is", "wordMinLimitError": "Too few words.  The minimum is" });
                /*INIT-END*/
            });

            setTimeout(function () {
                JotForm.paymentExtrasOnTheFly([null, { "name": "hotelGuest", "qid": "1", "text": "", "type": "control_head" }, { "name": "submit2", "qid": "2", "text": "Submit", "type": "control_button" }, { "name": "name", "qid": "3", "text": "Name", "type": "control_fullname" }, { "name": "email", "qid": "4", "subLabel": "example@example.com", "text": "Email", "type": "control_email" }, { "name": "mobileNumber", "qid": "5", "text": "Mobile", "type": "control_phone" }, null, { "name": "input7", "qid": "7", "text": "Address Information", "type": "control_text" }, null, null, null, null, null, { "name": "address", "qid": "13", "text": "", "type": "control_address" }, null, null, null, null, { "name": "input18", "qid": "18", "text": "The submission of this form makes a reservation for the type of room selected in the form. Any changes prior the scheduled occupancy should be communicated to us at least 24 hours prior, which may be subject to availability of request.\nCheck-in time shall be at 2:00PM and checkout time shall be at 12:00NN.", "type": "control_text" }, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, { "description": "", "name": "country", "qid": "50", "subLabel": "", "text": "Country", "type": "control_dropdown" }]);
            }, 20); 
        </script>
        <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/stylebuilder/static/form-common.css?v=d8ebb05
" />
        <style type="text/css">
            @media print {
                * {
                    -webkit-print-color-adjust: exact !important;
                    color-adjust: exact !important;
                }

                .form-section {
                    display: inline !important
                }

                .form-pagebreak {
                    display: none !important
                }

                .form-section-closed {
                    height: auto !important
                }

                .page-section {
                    position: initial !important
                }
            }
        </style>
        <link type="text/css" rel="stylesheet"
            href="https://cdn02.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.55271&themeRevisionID=5f30e2a790832f3e96009402" />
        <link type="text/css" rel="stylesheet"
            href="https://cdn03.jotfor.ms/css/styles/payment/payment_styles.css?3.3.55271" />
        <link type="text/css" rel="stylesheet"
            href="https://cdn01.jotfor.ms/css/styles/payment/payment_feature.css?3.3.55271" />
        <style type="text/css" id="form-designer-style">
            /* Injected CSS Code */

            /* Begining of advanced designer */

            /* 17 - INPUT WIDTHS */
            /*  20 - FORM PADDING */
            .form-section {
                /* padding: 0px 38px; */
            }

            /* Heights */
            /* 11 - LINE PADDING */
            /* LABEL STYLE */
            /* 12 - ROUNDED INPUTS */
            .form-radio-item,
            .form-checkbox-item {
                padding-bottom: 0px;
            }

            .form-radio-item:last-child,
            .form-checkbox-item:last-child {
                padding-bottom: 0;
            }

            .form-single-column .form-checkbox-item,
            .form-single-column .form-radio-item {
                width: 100%;
            }

            .form-checkbox-item .editor-container div,
            .form-radio-item .editor-container div {
                position: relative;
            }

            .form-checkbox-item .editor-container div:before,
            .form-radio-item .editor-container div:before {
                display: inline-block;
                vertical-align: middle;
                left: 0;
                width: 20px;
                height: 20px;
            }

            .form-checkbox-item input,
            .form-radio-item input {
                margin-top: 2px;
            }

            .form-checkbox:checked+label:before,
            .form-checkbox:checked+span:before {
                background-color: #2e69ff;
                border-color: #2e69ff;
            }

            .form-radio:checked+label:before,
            .form-radio:checked+span:before {
                border-color: #2e69ff;
            }

            .form-radio:checked+label:after,
            .form-radio:checked+span:after {
                background-color: #2e69ff;
            }

            .form-checkbox:hover+label:before,
            .form-checkbox:hover+span:before,
            .form-radio:hover+label:before,
            .form-radio:hover+span:before {
                border-color: rgba(46, 105, 255, 0.5);
                box-shadow: 0 0 0 2px rgba(46, 105, 255, 0.25);
            }

            .form-checkbox:focus+label:before,
            .form-checkbox:focus+span:before,
            .form-radio:focus+label:before,
            .form-radio:focus+span:before {
                border-color: #2e69ff;
                box-shadow: 0 0 0 3px rgba(46, 105, 255, 0.25);
            }

            .submit-button {
                font-size: 16px;
                font-weight: normal;
                font-family: inherit;
                border: none;
                border-width: 0px;
                border-style: solid;
            }

            .submit-button {
                min-width: 180px;
            }

            li[data-type="control_button"] .form-submit-button {
                color: #ffffff;
                background-color: #2c3345;
                background-image: none;
                box-shadow: none;
                text-shadow: none;
            }

            li[data-type="control_button"] .form-submit-button:hover {
                background-color: #040507;
            }

            li[data-type="control_button"] button.jf-form-buttons.form-sacl-button,
            li[data-type="control_button"] button.jf-form-buttons.form-submit-print {
                color: #2c3345;
                border-color: #2c3345;
                background-image: none;
                background-color: #fff;
            }

            li[data-type="control_button"] button.jf-form-buttons.form-sacl-button:hover,
            li[data-type="control_button"] button.jf-form-buttons.form-submit-print:hover {
                background-color: #040507;
                color: #fff;
            }

            li[data-type="control_button"] button.jf-form-buttons.form-pagebreak-back {
                background-image: none;
                background-color: #040507;
                box-shadow: none;
                text-shadow: none;
            }

            li[data-type="control_button"] button.jf-form-buttons.form-pagebreak-back:hover {
                background-color: #000000;
                color: #fff;
            }

            .form-all .form-pagebreak-back,
            .form-all .form-pagebreak-next {
                font-family: "Inter", sans-serif;
                font-size: 16px;
                font-weight: normal;
            }

            .form-all .form-pagebreak-back,
            .form-all .form-pagebreak-next {
                min-width: 128px;
            }

            li[data-type="control_image"] div {
                text-align: left;
            }

            li[data-type="control_image"] img {
                border: none;
                border-width: 0px !important;
                border-style: solid !important;
                border-color: false !important;
            }

            .supernova {
                height: 100%;
                background-repeat: no-repeat;
                background-attachment: scroll;
                background-position: center top;
                background-repeat: repeat;
            }

            .supernova {
                background-image: none;
                background-image: url("https://www.jotform.com/uploads/seyma/form_files/apartment-architecture-bed-bedroom-271668.5dc2e4fcd9bd13.39184855.5f439d96dd5190.29642959.jpg");
            }

            #stage {
                background-image: none;
                background-image: url("https://www.jotform.com/uploads/seyma/form_files/apartment-architecture-bed-bedroom-271668.5dc2e4fcd9bd13.39184855.5f439d96dd5190.29642959.jpg");
            }

            /* | */
            .form-all {
                background-repeat: no-repeat;
                background-attachment: scroll;
                background-position: center top;
                background-repeat: repeat;
            }

            .form-header-group {
                background-repeat: no-repeat;
                background-attachment: scroll;
                background-position: center top;
            }

            .header-large h1.form-header {
                font-size: 2em;
            }

            .header-large h2.form-header {
                font-size: 1.5em;
            }

            .header-large h3.form-header {
                font-size: 1.17em;
            }

            .header-large h1+.form-subHeader {
                font-size: 1em;
            }

            .header-large h2+.form-subHeader {
                font-size: .875em;
            }

            .header-large h3+.form-subHeader {
                font-size: .75em;
            }

            .header-default h1.form-header {
                font-size: 2em;
            }

            .header-default h2.form-header {
                font-size: 1.5em;
            }

            .header-default h3.form-header {
                font-size: 1.17em;
            }

            .header-default h1+.form-subHeader {
                font-size: 1em;
            }

            .header-default h2+.form-subHeader {
                font-size: .875em;
            }

            .header-default h3+.form-subHeader {
                font-size: .75em;
            }

            .header-small h1.form-header {
                font-size: 2em;
            }

            .header-small h2.form-header {
                font-size: 1.5em;
            }

            .header-small h3.form-header {
                font-size: 1.17em;
            }

            .header-small h1+.form-subHeader {
                font-size: 1em;
            }

            .header-small h2+.form-subHeader {
                font-size: .875em;
            }

            .header-small h3+.form-subHeader {
                font-size: .75em;
            }

            .form-header-group {
                text-align: left;
            }

            .form-header-group {
                font-family: "false", sans-serif;
            }

            div.form-header-group.header-large,
            div.form-header-group.hasImage {
                margin: 0px -38px;
            }

            div.form-header-group.header-large,
            div.form-header-group.hasImage {
                padding: 0px 0px;
            }

            .form-header-group .form-header,
            .form-header-group .form-subHeader {
                color: #2c3345;
            }

            .form-header-group {
                background-color: ;
            }

            .form-header-group {
                border-bottom: none;
            }

            .form-line-error {
                -webkit-transition-property: none;
                -moz-transition-property: none;
                -ms-transition-property: none;
                -o-transition-property: none;
                transition-property: none;
                -webkit-transition-duration: 0.3s;
                -moz-transition-duration: 0.3s;
                -ms-transition-duration: 0.3s;
                -o-transition-duration: 0.3s;
                transition-duration: 0.3s;
                -webkit-transition-timing-function: ease;
                -moz-transition-timing-function: ease;
                -ms-transition-timing-function: ease;
                -o-transition-timing-function: ease;
                transition-timing-function: ease;
                background-color: #fff4f4;
            }

            .form-line-error .form-error-message {
                background-color: #f23a3c;
                clear: both;
                float: none;
            }

            .form-line-error .form-error-message .form-error-arrow {
                border-bottom-color: #f23a3c;
            }

            .form-line-error input:not(#coupon-input),
            .form-line-error textarea,
            .form-line-error .form-validation-error {
                border: 1px solid #f23a3c;
                box-shadow: 0 0 3px #f23a3c;
            }

            .form-line-error {
                -webkit-transition-property: none;
                -moz-transition-property: none;
                -ms-transition-property: none;
                -o-transition-property: none;
                transition-property: none;
                -webkit-transition-duration: 0.3s;
                -moz-transition-duration: 0.3s;
                -ms-transition-duration: 0.3s;
                -o-transition-duration: 0.3s;
                transition-duration: 0.3s;
                -webkit-transition-timing-function: ease;
                -moz-transition-timing-function: ease;
                -ms-transition-timing-function: ease;
                -o-transition-timing-function: ease;
                transition-timing-function: ease;
                background-color: #fff4f4;
            }

            .form-header-group .form-header,
            .form-header-group .form-subHeader {
                color: #2c3345;
            }

            .form-line-active {
                background-color: #ffffe0;
            }

            /* 29 - FORM COLUMNS */

            /*PREFERENCES STYLE*/
            .form-all {
                font-family: Inter, sans-serif;
            }

            .form-label.form-label-auto {

                display: block;
                float: none;
                text-align: left;
                width: 100%;

            }

            .form-line {
                margin-top: 12px;
                margin-bottom: 12px;
                padding-top: 0;
                padding-bottom: 0;
            }

            .form-all {
                max-width: 752px;
                width: 100%;
            }

            .form-label.form-label-left,
            .form-label.form-label-right,
            .form-label.form-label-left.form-label-auto,
            .form-label.form-label-right.form-label-auto {
                width: 230px;
            }

            .form-all {
                font-size: 16px
            }

            .supernova .form-all,
            .form-all {
                background-color: #fff;
            }

            .form-all {
                color: #2C3345;
            }

            .form-header-group .form-header {
                color: rgb(44, 51, 69);
            }

            .form-header-group .form-subHeader {
                color: #2C3345;
            }

            .form-label-top,
            .form-label-left,
            .form-label-right,
            .form-html,
            .form-checkbox-item label,
            .form-radio-item label,
            span.FITB .qb-checkbox-label,
            span.FITB .qb-radiobox-label,
            span.FITB .form-radio label,
            span.FITB .form-checkbox label,
            [data-blotid][data-type=checkbox] [data-labelid],
            [data-blotid][data-type=radiobox] [data-labelid],
            span.FITB-inptCont[data-type=checkbox] label,
            span.FITB-inptCont[data-type=radiobox] label {
                color: #2C3345;
            }

            .form-sub-label {
                color: #464d5f;
            }

            .supernova {
                background-color: #accfce;
            }

            .supernova body {
                background: transparent;
            }

            .form-textbox,
            .form-textarea,
            .form-dropdown,
            .form-radio-other-input,
            .form-checkbox-other-input,
            .form-captcha input,
            .form-spinner input {
                background-color: #fff;
            }


            .supernova {
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
                background-position: center top;
            }

            .supernova,
            #stage {
                background-image: none;
            }

            .form-all {
                background-image: none;
            }

            /*PREFERENCES STYLE*/
            /*__INSPECT_SEPERATOR__*/

            /* Injected CSS Code */
        </style>

        <form class="jotform-form" onsubmit="return typeof testSubmitFunction !== 'undefined' && testSubmitFunction();"
            action="guest_details.php" method="post" name="form_241931150460447" id="241931150460447"
            accept-charset="utf-8" autocomplete="on">

            <input type="hidden" name="formID" value="241931150460447" />
            <input type="hidden" id="JWTContainer" value="" />
            <input type="hidden" id="cardinalOrderNumber" value="" />
            <input type="hidden" id="jsExecutionTracker" name="jsExecutionTracker" value="build-date-1720759248258" />
            <input type="hidden" id="submitSource" name="submitSource" value="unknown" />
            <input type="hidden" id="buildDate" name="buildDate" value="1720759248258" />
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>">
            <div role="main" class="form-all">
                <ul class="form-section page-section">
                    <li id="cid_1" class="form-input-wide" data-type="control_head">
                        <div style="display:table;width:100%">
                            <div class="form-header-group hasImage header-default" data-imagealign="Top">
                                <!-- <div class="header-logo"><img src="https://www.jotform.com/uploads/ugurg/form_files/catchabreak.65b115fe8b8dc3.01177570.png" alt="" width="751" class="header-logo-top" /></div> -->


                                <div class="header-text httac htvam">
                                    <h2 id="header_1" class="form-header" data-component="header" aria-hidden="true">
                                        Guest Details
                                        
                                        <!-- <p>Room Type: <?php echo $type; ?></p>
                                        <p>Price: ₹<?php echo $price; ?> per night</p> -->
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="form-line jf-required" data-type="control_fullname" id="name" data-compound-hint=",">
                        <label class="form-label form-label-top form-label-extended form-label-auto" id="label_3"
                            for="prefix" aria-hidden="false"> Name<span class="form-required">*</span> </label>
                        <div id="cid_3" class="form-input-wide jf-required" data-layout="full">
                            <div data-wrapper-react="true" class="extended">
                                <span class="form-sub-label-container" style="vertical-align:top"
                                    data-input-type="prefix">
                                    <input type="text" id="prefix" name="prefix" class="form-textbox"
                                        data-defaultvalue="" autoComplete="section-input_3 honorific-prefix" size="4"
                                        data-component="prefix" aria-labelledby="label_3 sublabel_3_prefix"
                                        required="required" value="" />
                                    <label class="form-sub-label" for="prefix" id="sublabel_3_prefix"
                                        style="min-height:13px">Prefix</label>
                                </span>
                                <span class="form-sub-label-container" style="vertical-align:top"
                                    data-input-type="first">
                                    <input type="text" id="name" name="name" class="form-textbox validate[required]"
                                        data-defaultvalue="" autoComplete="section-input_3 given-name" size="10"
                                        data-component="first" aria-labelledby="label_3 sublabel_3_first"
                                        required="required" value="" />
                                    <label class="form-sub-label" for="first_3" id="sublabel_3_first"
                                        style="min-height:13px">First Name</label>
                                </span>
                                <span class="form-sub-label-container" style="vertical-align:top"
                                    data-input-type="last">
                                    <input type="text" id="surname" name="surname"
                                        class="form-textbox validate[required]" data-defaultvalue=""
                                        autoComplete="section-input_3 family-name" size="15" data-component="last"
                                        aria-labelledby="label_3 sublabel_3_last" required="required" value="" />
                                    <label class="form-sub-label" for="last_3" id="sublabel_3_last"
                                        style="min-height:13px">Last Name</label>
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-1 jf-required" data-type="control_phone" id="mobile">
                        <label class="form-label form-label-top" id="label_mobile" for="mobile"> Mobile<span
                                class="form-required">*</span> </label>
                        <div id="cid_5" class="form-input-wide jf-required" data-layout="half">
                            <span class="form-sub-label-container" style="vertical-align:top">
                                <input type="tel" id="mobile" name="mobile" data-type="mask-number"
                                    class="mask-phone-number form-textbox validate[required, Fill Mask]"
                                    data-defaultvalue="" autoComplete="section-input_5 tel-national" style="width:310px"
                                    data-masked="true" placeholder="(000) 000-0000" data-component="phone"
                                    aria-labelledby="label_mobile" required="yes" value="" />
                            </span>
                        </div>
                    </li>
                    <li class="form-line form-line-column form-col-2" data-type="control_email" id="email">
                        <label class="form-label form-label-top" id="label_4" for="email" aria-hidden="false"> Email
                        </label>
                        <div id="cid_4" class="form-input-wide" data-layout="half">
                            <span class="form-sub-label-container" style="vertical-align:top">
                                <input type="email" id="email" name="email" class="form-textbox validate[Email]"
                                    data-defaultvalue="" autoComplete="section-input_4 email" style="width:310px"
                                    size="310" data-component="email" aria-labelledby="label_4 sublabel_input_4"
                                    value="" />
                                <label class="form-sub-label" for="email" id="sublabel_4_email"
                                    style="min-height:13px">example@example.com</label>
                            </span>
                        </div>
                    </li>
                    <li class="form-line" data-type="control_text" id="id_7">
                        <div id="cid_7" class="form-input-wide" data-layout="full">
                            <div id="text_7" class="form-html" data-component="text" tabindex="0">
                                <p><span style="font-size: 18pt;"><strong>Address Information</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li class="form-line" data-type="control_dropdown" id="country">
                        <label class="form-label form-label-top form-label-auto" id="label_country" for="country"
                            aria-hidden="false"> Country </label>
                        <div id="cid_50" class="form-input-wide" data-layout="half">
                            <select class="form-dropdown" id="country" name="country" style="width:310px"
                                data-component="dropdown" aria-label="country">
                                <option value="">Please Select</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                                <option value="Canada">Canada</option>
                            </select>
                        </div>
                    </li>
                    <li class="form-line" data-type="control_address" id="address1">
                        <label class="form-label form-label-top form-label-auto" id="label_13" for="address1"
                            aria-hidden="true"></label>
                        <div id="cid_13" class="form-input-wide" data-layout="full">
                            <div summary="" class="form-address-table jsTest-addressField">
                                <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                                    <span class="form-address-line form-address-street-line jsTest-address-lineField">
                                        <span class="form-sub-label-container" style="vertical-align:top">
                                            <input type="text" id="address1" name="address1"
                                                class="form-textbox form-address-line" data-defaultvalue=""
                                                autoComplete="section-input_13 address-line2"
                                                data-component="address_line_2"
                                                aria-labelledby="label_13 sublabel_13_addr_line2" value="" />
                                            <label class="form-sub-label" for="address1" id="sublabel_13_addr_line2"
                                                style="min-height:13px">Address1</label>
                                        </span>
                                    </span>
                                </div>
                                <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                                    <span class="form-address-line form-address-city-line jsTest-address-lineField">
                                        <span class="form-sub-label-container" style="vertical-align:top">
                                            <input type="text" id="city" name="city"
                                                class="form-textbox form-address-city" data-defaultvalue=""
                                                autoComplete="section-input_13 address-level2" data-component="city"
                                                aria-labelledby="label_13 sublabel_13_city" value="" />
                                            <label class="form-sub-label" for="city" id="sublabel_13_city"
                                                style="min-height:13px">City</label>
                                        </span>
                                    </span>
                                    <span class="form-address-line form-address-state-line jsTest-address-lineField">
                                        <span class="form-sub-label-container" style="vertical-align:top">
                                            <input type="text" id="state" name="state"
                                                class="form-textbox form-address-state" data-defaultvalue=""
                                                autoComplete="section-input_13 address-level1" data-component="state"
                                                aria-labelledby="label_13 sublabel_13_state" value="" />
                                            <label class="form-sub-label" for="state" id="sublabel_13_state"
                                                style="min-height:13px">State / Province</label>
                                        </span>
                                    </span>
                                </div>
                                <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                                    <span class="form-address-line form-address-zip-line jsTest-address-lineField">
                                        <span class="form-sub-label-container" style="vertical-align:top">
                                            <input type="text" id="zip" name="zip"
                                                class="form-textbox form-address-postal" data-defaultvalue=""
                                                autoComplete="section-input_13 postal-code" data-component="zip"
                                                aria-labelledby="label_13 sublabel_13_postal" value="" />
                                            <label class="form-sub-label" for="zip" id="sublabel_13_postal"
                                                style="min-height:13px">Postal / Zip Code</label>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="form-line" data-type="control_text" id="id_18">
                        <div id="cid_18" class="form-input-wide" data-layout="full">
                            <div id="text_18" class="form-html" data-component="text" tabindex="0">
                                <p>The submission of this form makes a reservation for the type of room selected in the
                                    form. Any changes prior the scheduled occupancy should be communicated to us at
                                    least 24 hours prior, which may be subject to availability of request.</p>
                                <p>Check-in time shall be at 2:00PM and checkout time shall be at 12:00NN.</p>
                            </div>
                        </div>
                    </li>
                    <li class="form-line" data-type="control_button" id="id_2">
                        <div id="cid_2" class="form-input-wide" data-layout="full">
                            <div data-align="auto"
                                class="form-buttons-wrapper form-buttons-auto jsTest-button-wrapperField">
                                <button id="input_2" type="submit"
                                    class="form-submit-button submit-button jf-form-buttons jsTest-submitField"
                                    data-component="button" data-content="" onclick="payment/paymentindex.html">Submit &
                                    Proceed to
                                    Pay</button>
                            </div>
                        </div>
                    </li>
                    <li style="display:none">Should be Empty: <input type="text" name="website" value=""
                            type="hidden" />
                    </li>
                </ul>
            </div>
        </form>

        <script>
            // JotForm.showJotFormPowered = "new_footer";
        </script>
        <script>
            JotForm.poweredByText = "Powered by Jotform";
        </script><input type="hidden" class="simple_spc" id="simple_spc" name="simple_spc" value="241931150460447" />
        <script type="text/javascript">
            var all_spc = document.querySelectorAll("form[id='241931150460447'] .si" + "mple" + "_spc");
            for (var i = 0; i < all_spc.length; i++) {
                all_spc[i].value = "241931150460447-241931150460447";
            }
        </script>
        </form>
        <script type="text/javascript">JotForm.ownerView = true;</script>
        <script type="text/javascript">JotForm.isNewSACL = true;</script>
        <hr>

        <!-- <h2>Card Details</h2>
    <div class="form-group">
        <label for="card-number">Card Number <span class="required">*</span></label>
        <input type="text" id="card-number" name="card-number" required>

        <label for="expiry-date">Expiry Date <span class="required">*</span></label>
        <input type="text" id="expiry-date" name="expiry-date" required>
    </div>
    <div class="form-group">
        <label for="cvv">CVV <span class="required">*</span></label>
        <input type="text" id="cvv" name="cvv" required>


        <label for="name">Name on Card <span class="required">*</span></label>
        <input type="text" id="name" name="name" required>
    </div>

    <button type="submit" value="submit">Submit</button> -->
        </form>



        <?php
        include 'includes/dbconnection.php';
        $query = "SELECT guests,checkin,checkout from bookings  where booking_id=(SELECT MAX(booking_id) FROM bookings)";
        $result = $conn->query($query);
        // $query = "SELECT guests,checkin,checkout from bookings  where booking_id=(SELECT MAX(booking_id) FROM bookings)";
        // $result = $conn->query($query);
        

        while ($row = $result->fetch_assoc()) {
            $guests = $row['guests'];
            $checkin = $row['checkin'];
            $checkout = $row['checkout'];

            ?>


            <div class="your-stay">
                <h2>Your Stay</h2>
                <p>Check-in<br>After 2:00 PM</p>
                <p>Check-out<br>Before 12:00 PM</p>
                <p><?php echo $row["checkin"]; ?> to <?php echo $row["checkout"]; ?><br><?php echo $row["guests"]; ?> Guests
                </p>
                <p>Room Type: <?php echo $type; ?></p>
                <p>Price: ₹<?php echo $price; ?> per night</p>
                <p>Taxes and Fees<br>28%</p>
                <?php
                $total = $price + (0.28 * $price);
                ?>
                <p>Total: ₹<?php echo $total; ?><br>(INR tax included)</p>
            </div>
            <?php 
             
            //  $query3 = "insert into guests(TotalCost) values('$total')";
            //  $result = $conn->query($query3);
            ?>

        </div>
        </div>


        <!-- Your Stay details -->
        <p>

        </p>
        </div>

        <!-- <div class="doo"> -->
        <br><br><br>

        <!-- Footer -->


        <!-- scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script>

        </script>
        <script>
            window.addEventListener('scroll', function () {
                const navbar = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        </script>
    </body>

    </html>
    <?php
        }
        ?>