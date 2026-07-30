<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website enquiry</title>
</head>
<body style="margin:0; padding:0; background:#f4ede3; font-family:Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4ede3; padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px; background:#fffdfa; border-radius:14px; overflow:hidden; border:1px solid #e6dbca;">
                    <tr>
                        <td style="background:linear-gradient(135deg,#b3202c,#8d1922); background-color:#b3202c; padding:26px 28px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <p style="margin:0; color:#ffffff; font-size:17px; font-weight:bold;">Shree Saurashtra Nagrik</p>
                                        <p style="margin:2px 0 0; color:rgba(255,255,255,.85); font-size:12px;">Sharafi Sahakari Mandali Ltd.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:28px;">
                            <p style="margin:0 0 4px; font-size:11px; font-weight:bold; letter-spacing:.08em; text-transform:uppercase; color:#b3202c;">New website enquiry</p>
                            <h1 style="margin:0 0 20px; font-size:20px; color:#201a13;">{{ $data['subject'] }}</h1>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                <tr>
                                    <td style="padding:10px 0; border-bottom:1px solid #e6dbca; font-size:13px; color:#6f6250; width:100px; vertical-align:top;">Name</td>
                                    <td style="padding:10px 0; border-bottom:1px solid #e6dbca; font-size:14px; color:#201a13; font-weight:bold;">{{ $data['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0; border-bottom:1px solid #e6dbca; font-size:13px; color:#6f6250; vertical-align:top;">Email</td>
                                    <td style="padding:10px 0; border-bottom:1px solid #e6dbca; font-size:14px;">
                                        <a href="mailto:{{ $data['email'] }}" style="color:#b3202c; text-decoration:none;">{{ $data['email'] }}</a>
                                    </td>
                                </tr>
                                @if (! empty($data['phone']))
                                    <tr>
                                        <td style="padding:10px 0; border-bottom:1px solid #e6dbca; font-size:13px; color:#6f6250; vertical-align:top;">Phone</td>
                                        <td style="padding:10px 0; border-bottom:1px solid #e6dbca; font-size:14px;">
                                            <a href="tel:{{ preg_replace('/\D+/', '', $data['phone']) }}" style="color:#201a13; text-decoration:none;">{{ $data['phone'] }}</a>
                                        </td>
                                    </tr>
                                @endif
                            </table>

                            <p style="margin:22px 0 8px; font-size:13px; color:#6f6250;">Message</p>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="background:#f4ede3; border-radius:10px; padding:16px 18px; font-size:14px; line-height:1.6; color:#201a13; white-space:pre-line;">{{ $data['message'] }}</td>
                                </tr>
                            </table>

                            <table role="presentation" cellpadding="0" cellspacing="0" style="margin-top:24px;">
                                <tr>
                                    <td style="background:#b3202c; border-radius:999px;">
                                        <a href="mailto:{{ $data['email'] }}?subject=Re:%20{{ urlencode($data['subject']) }}"
                                           style="display:inline-block; padding:11px 22px; font-size:13px; font-weight:bold; color:#ffffff; text-decoration:none;">
                                            Reply to {{ $data['name'] }}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:16px 28px; background:#f4ede3; border-top:1px solid #e6dbca;">
                            <p style="margin:0; font-size:11px; color:#6f6250;">Sent automatically from the "Contact Us" form at {{ config('app.url') }}.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
