<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width"/>
</head>
<body style="width: 100% !important; min-width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; color: #1E2023; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0; padding: 0;">
    <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; height: 100%; width: 100%; color: #1E2023; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;">
	    <tr style="vertical-align: top; text-align: left; padding: 0;">
	    	<td align="center" valign="top" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: center; color: #1E2023; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;">
                <center style="width: 100%; min-width: 580px;">
    				<div style="background-color: #1E2023; height: 50px;">
    					<div style="height: 50px; max-width: 800px; margin: 0 auto;">
    						<div style="width: 200px; height: 50px; float: left; padding-right: 20px; color: white;">
    							<h2>{{strtoupper(config('app.name'))}}</h2>
    						</div>
    						<div style="height: 50px; line-height: 50px; padding-right: 20px; text-align: right; float: right;">
    							<span style="color: #ffffff; text-transform: uppercase; font-weight: bold; font-size: 11px;">NEW ACCOUNT</span>
    						</div>
    					</div>
    				</div>
					<div style="height: 6px; background-color: #1E2023; background-image: url('http://icons.wxug.com/i/o/email/rainbow.png'); background-repeat: no-repeat; background-size: 100% 6px;">
							
					</div>
					<div style="max-width: 800px; margin: 30px auto 0 auto; padding: 0 10px; text-align: center;">
						<h2>Welcome, {{ $data->full_name }}.</h2>
                        <br/>
						<p style="color: #1E2023; font-weight: bold; line-height: 21px; font-size: 18px; margin: 0 0 10px; padding: 0;">Thank you for joining {{strtolower(config('app.name'))}}!</p>
						<p>Follow this URL to activate your account:</p>
						<p><a href="{{ $data->link_activation }}" style="border-style: transparent; border-width: 0; cursor: pointer; font-weight: bold; line-height: normal; margin: 0 0 0; position: relative; text-decoration: none; text-align: center; -webkit-appearance: none; border-radius: 5px; display: inline-block; padding-top: 0.4375rem; padding-right: 0.875rem; padding-bottom: 0.5rem; padding-left: 0.875rem; font-size: 0.9375rem; border-color: #009bcf; color: #FFF; transition: background-color 300ms ease-out; background-color: #149AC6; background-image: -webkit-linear-gradient(#2EB3E0, #149AC6); background-image: linear-gradient(#2EB3E0, #149AC6); border-radius: 5px;">Activation Your Account</a></p>

						<p style="font-size: small;">Or, you can copy and paste this URL in your browser:</p>
						<p><a href="{{ $data->link_activation }}" style="font-size: 12px; color: #398a24; text-decoration: none;">{{ $data->link_activation }}</a></p>

						<div style="padding-top: 20px; margin-top: 40px; border-top: 1px solid #d7d7d7;">
                            <center>
								<p style="text-align: center; font-weight: bold; color: #1E2023; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;">{{strtoupper(config('app.name'))}} Features</p>
                                <p style="text-align: center;">
                                    <a href="{{ url('/') }}/" style="color: #398a24; text-decoration: none;">Search addresses</a> |
                                    <a href="{{ url('/') }}/maps" style="color: #398a24; text-decoration: none;">Search on Maps</a> |
                                    <a href="{{ url('/') }}/explore" style="color: #398a24; text-decoration: none;">Explore</a>
                                </p>
                            </center>
						</div>
					</div>
                </center>
            </td>
        </tr>
    </table>
    <p style="text-align: center; ">--</p>
    <p style="text-align: center; ">
        <a href="{{ url('/') }}/" style="color: #398a24; text-decoration: none;">diachi.best</a> | HaUI | &nbsp;296 Cau Dien, Bac Tu Liem, Ha Noi, Viet Nam
    </p>
</body>
</html>
