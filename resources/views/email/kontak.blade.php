<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Form Kontak</title>
</head>
<body style="margin:0; padding:0; background-color:#f9fafb; font-family:'Poppins',sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background-color:#f9fafb; padding:40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" role="presentation" style="background-color:white; border-radius:16px; overflow:hidden; box-shadow:0 6px 18px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background:linear-gradient(135deg,#f97316,#fb923c); padding:20px 0; text-align:center;">
                            <h1 style="color:white; font-size:20px; margin:10px 0 0 0; font-weight:600;">
                                Pesan Baru dari Website SMK PGRI 3
                            </h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px 40px;">
                            <h2 style="font-size:20px; color:#111827; margin-bottom:15px;">📩 Detail Pesan</h2>
                            
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:15px; color:#374151;">
                                <tr>
                                    <td style="padding:6px 0; width:120px; color:#6b7280; font-weight:500;">👤 Dari</td>
                                    <td style="font-weight:600;">{{ $data['nama'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0; color:#6b7280; font-weight:500;">📧 Email</td>
                                    <td><a href="mailto:{{ $data['email'] }}" style="color:#2563eb; text-decoration:none;">{{ $data['email'] }}</a></td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0; color:#6b7280; font-weight:500;">🏷️ Subjek</td>
                                    <td>{{ $data['subjek'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0; color:#6b7280; font-weight:500;">📅 Dikirim</td>
                                    <td>{{ $data['waktu'] }}</td>
                                </tr>
                            </table>

                            <div style="margin-top:25px; padding:20px; background-color:#f3f4f6; border-radius:12px;">
                                <p style="font-weight:600; color:#111827; margin:0 0 8px;">💬 Pesan:</p>
                                <p style="color:#374151; white-space:pre-line; margin:0;">{{ $data['pesan'] }}</p>
                            </div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f9fafb; text-align:center; padding:15px; font-size:13px; color:#6b7280; border-top:1px solid #e5e7eb;">
                            Pesan ini dikirim melalui formulir <strong>Kontak Kami</strong> di website <strong>SMK PGRI 3 MALANG</strong>.<br>
                            &copy; {{ date('Y') }} SMK PGRI 3 MALANG. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
