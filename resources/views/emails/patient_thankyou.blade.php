<!DOCTYPE html>
<html>

<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f9; padding:20px 0;">
        <tr>
            <td align="center">

                <!-- Main Container -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td
                            style="background-color:#ff7a2d; padding:20px; text-align:center; color:#ffffff; font-size:22px; font-weight:bold;">
                            Thank You for Contacting Us
                        </td>
                    </tr>

                    <!-- Body Content -->
                    <tr>
                        <td style="padding:30px; color:#333333; font-size:15px; line-height:1.6;">

                            <p style="margin:0 0 15px 0;">Dear <strong>{{ $data['name'] }}</strong>,</p>

                            <p style="margin:0 0 15px 0;">
                                Thank you for reaching out to us. We have successfully received your inquiry.
                                Our team will review your request and get back to you shortly.
                            </p>

                            <!-- Divider -->
                            <hr style="border:none; border-top:1px solid #eeeeee; margin:25px 0;">

                            <p style="margin:0 0 15px 0; font-weight:bold; color:#ff7a2d;">Your Submitted Details:</p>

                            <!-- Details Table -->
                            <table width="100%" cellpadding="8" cellspacing="0"
                                style="border-collapse:collapse; font-size:14px;">
                                <tr>
                                    <td
                                        style="background:#f9f9f9; border:1px solid #eeeeee; width:30%; font-weight:bold;">
                                        Name</td>
                                    <td style="border:1px solid #eeeeee;">{{ $data['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="background:#f9f9f9; border:1px solid #eeeeee; font-weight:bold;">Mobile
                                    </td>
                                    <td style="border:1px solid #eeeeee;">{{ $data['mobile'] }}</td>
                                </tr>
                                <tr>
                                    <td style="background:#f9f9f9; border:1px solid #eeeeee; font-weight:bold;">
                                        Department</td>
                                    <td style="border:1px solid #eeeeee;">{{ $data['department'] }}</td>
                                </tr>
                                <tr>
                                    <td style="background:#f9f9f9; border:1px solid #eeeeee; font-weight:bold;">Message
                                    </td>
                                    <td style="border:1px solid #eeeeee;">{{ $data['message'] }}</td>
                                </tr>
                            </table>

                            <p style="margin:25px 0 0 0;">
                                If you have any urgent queries, feel free to contact us anytime.
                            </p>

                            <p style="margin:25px 0 0 0;">
                                Regards,<br>
                                <strong>Labix Diagnostics Team</strong>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f4f6f9; text-align:center; padding:15px; font-size:12px; color:#888888;">
                            © {{ date('Y') }} Labix Diagnostics. All rights reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
