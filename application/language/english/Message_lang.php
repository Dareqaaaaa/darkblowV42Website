<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

$lang = array(
    'STR_WARNING_1' => 'Username Cannot Be Empty.',
    'STR_WARNING_2' => 'Select Your Hint Question.',
    'STR_WARNING_3' => 'Hint Answer Cannot Be Empty.',
    'STR_WARNING_4' => 'Password Cannot Be Empty.',
    'STR_WARNING_5' => 'New Email Cannot Be Same Like Old Email.',
    'STR_WARNING_6' => 'Confirm Email Doesnt Matches With New Email.',
    'STR_WARNING_7' => 'Old Password Cannot Be Empty.',
    'STR_WARNING_8' => 'New Password Cannot Be Empty',
    'STR_WARNING_9' => 'Confirmation Password Cannot Be Empty.',
    'STR_WARNING_10' => 'Hint Question Cannot Be Empty.',
    'STR_WARNING_11' => 'Code Cannot Be Empty.',
    'STR_WARNING_12' => 'Voucher Code Cannot Be Empty.',
    'STR_WARNING_13' => 'Email Cannot Be Empty.',
    'STR_WARNING_14' => 'Confirmation Password Doesnt Matches',
    'STR_WARNING_15' => 'You Need To Login For Bought This Item.',
    'STR_WARNING_16' => 'Invalid Download Data.',
    'STR_WARNING_17' => 'Invalid Attendance Event.',
    'STR_WARNING_18' => 'Invalid Package.',
    'STR_WARNING_19' => 'Invalid Data.',
    'STR_WARNING_20' => 'Please Check Your Username First.',
    'STR_WARNING_21' => 'Please Select Your Item First.',
    'STR_WARNING_22' => 'Please Enter Your Item Price.',
    'STR_WARNING_23' => 'Your Browser Does Not Support Javascript.',
    'STR_WARNING_24' => 'Please Confirm Your Email First.',
    'STR_INFO_1' => 'Generate New Request Token...',
    'STR_INFO_2' => 'This Feature Is Unavailable Right Now.',
    'STR_INFO_3' => 'No Trade Items Found.',
    'STR_INFO_4' => 'No Data Found.',
    'STR_INFO_5' => 'No Client Data Found.',
    'STR_INFO_6' => 'No Launcher Data Found.',
    'STR_INFO_7' => 'No Support App Data Found.',
    'STR_INFO_8' => 'Processing...',
    'STR_INFO_9' => 'Cannot Delete Permanent Item.',
    'STR_INFO_10' => 'Redirecting To Download Page...',
    'STR_INFO_11' => 'Username Available.',
    'STR_INFO_12' => 'Register Disabled By Server.',
    'STR_INFO_13' => 'Register Disabled By Server.',
    'STR_INFO_14' => 'Successfully Registered. But Failed To Send Activation Email.',
    'STR_INFO_15' => 'You Only Can Buy This Item With Permanent Duration.',
    'STR_ERROR_1' => 'Failed To Send Request.',
    'STR_ERROR_2' => 'Failed To Login.',
    'STR_ERROR_3' => 'Failed To Send Verification Email.',
    'STR_ERROR_4' => 'Failed To Update Email.',
    'STR_ERROR_5' => 'Failed To Change Password.',
    'STR_ERROR_6' => 'Failed To Create New Hint.',
    'STR_ERROR_7' => 'Failed To Exchange Tickets.',
    'STR_ERROR_8' => 'Failed To Delete This Item.',
    'STR_ERROR_9' => 'Failed To Get Your Hint.',
    'STR_ERROR_10' => 'Failed To Submit The Code.',
    'STR_ERROR_11' => 'Failed To Submit Voucher',
    'STR_ERROR_12' => 'Failed To Register Your Account.',
    'STR_ERROR_13' => 'Failed To Check Username.',
    'STR_ERROR_14' => 'Failed To Submit Your Item.',
    'STR_ERROR_15' => 'Failed To Bought This Item.',
    'STR_ERROR_16' => 'Failed To Buy This Item.',
    'STR_ERROR_17' => 'Failed To Generate Download Link.',
    'STR_ERROR_18' => 'Failed To Logged In.',
    'STR_ERROR_19' => 'Failed To Resend Email Verification.',
    'STR_ERROR_20' => 'Failed To Change Email.',
    'STR_ERROR_21' => 'Failed To Submit New Hint',
    'STR_ERROR_22' => 'Failed To Redeem The Code.',
    'STR_ERROR_23' => 'Failed To Submit Voucher.',
    'STR_ERROR_24' => 'Failed To Check Nickname.',
    'STR_ERROR_25' => 'Failed To Register.',
    'STR_ERROR_26' => 'Failed To Reach Server.',
    'STR_ERROR_27' => 'Failed To Submit Your Item.',
    'STR_ERROR_28' => 'Failed To Logout.',
    'STR_ERROR_29' => 'Failed Change Email.',
    'STR_ERROR_30' => 'New Password Cannot Be Same Like Old Password.',
    'STR_ERROR_31' => 'Failed To Change Password.',
    'STR_ERROR_32' => 'Invalid Old Password.',
    'STR_ERROR_33' => 'Failed To Create Hint.',
    'STR_ERROR_34' => 'Invalid Password.',
    'STR_ERROR_35' => 'Invalid Download Data.',
    'STR_ERROR_36' => 'Failed To Delete This Item.',
    'STR_ERROR_37' => 'Your Account Has Been Blocked. Login Failed.',
    'STR_ERROR_38' => 'Invalid Username or Password.',
    'STR_ERROR_39' => 'Failed To Get Your Hint.',
    'STR_ERROR_40' => 'This Code Already Used.',
    'STR_ERROR_41' => 'Sorry, This Reward Is Cash, And We Under Development.',
    'STR_ERROR_42' => 'Code Doesnt Exists.',
    'STR_ERROR_43' => 'Username Already Registered.',
    'STR_ERROR_44' => 'Failed To Get Register Events.',
    'STR_ERROR_45' => 'Failed To Verify Your Account.',
    'STR_ERROR_46' => 'You Cannot Trade This Item.',
    'STR_ERROR_47' => 'You Already Trade This Item.',
    'STR_ERROR_48' => 'Failed To Post New Item.',
    'STR_ERROR_49' => 'You Dont Have This Item.',
    'STR_ERROR_50' => 'You Cannot Buy Your Own Item.',
    'STR_ERROR_51' => 'Your Webcoin Not Enough For Buy This Item.',
    'STR_ERROR_52' => 'Failed To Buy This Item. You Already Have & Used This Item.',
    'STR_ERROR_53' => 'Failed To Fetch Your Account.',
    'STR_ERROR_54' => 'This Item Not Available.',
    'STR_ERROR_55' => 'Invalid Voucher Code.',
    'STR_ERROR_56' => 'Cannot Find This Webshop Item.',
    'STR_ERROR_57' => 'Your Webcoin Not Enough For Buying This Item.',
    'STR_ERROR_58' => 'Invalid Item Duration. Do You Change It From Inspect Element?',
    'STR_ERROR_59' => 'You Already Have This Item With Permanent Duration.',
    'STR_ERROR_60' => 'Invalid Account. Do You Execute This From Another Method? Like Postman? Or Anything Else?',
    'STR_ERROR_61' => 'Cannot Find This Webshop Item.',
    'STR_FATAL_ERROR_1' => 'Failed To Buy This Item. Please Contact DEV / GM For Detail Information.',
    'STR_SUCCESS_1' => 'Successfully Update Email Address.',
    'STR_SUCCESS_2' => 'Successfully Change Email.',
    'STR_SUCCESS_3' => 'Successfully Change Password.',
    'STR_SUCCESS_4' => 'Successfully Create Hint.',
    'STR_SUCCESS_5' => 'Successfully Delete This Item.',
    'STR_SUCCESS_6' => 'Successfully Logged In. Welcome ',
    'STR_SUCCESS_7' => 'Your Hint : ',
    'STR_SUCCESS_8' => 'Congratulations ',
    'STR_SUCCESS_9' => ' You Received ',
    'STR_SUCCESS_10' => 'Successfully Registered.',
    'STR_SUCCESS_11' => 'Successfully Registered. Please Check Your Email For Activated Your Account.',
    'STR_SUCCESS_12' => 'Successfully Verify Your Account. You Can Play The Game Now.',
    'STR_SUCCESS_13' => 'Successfully Post New Item.',
    'STR_SUCCESS_14' => 'Successfully Buy This Item. Please Check Your Inventory.',
    'STR_SUCCESS_15' => ' New Items, ',
    'STR_SUCCESS_16' => ' Cash, ',
    'STR_SUCCESS_17' => ' Webcoin. Failed ',
    'STR_SUCCESS_18' => 'Successfully Bought This Item.',
);

// This Code Generated Automatically By EyeTracker Snippets. //
