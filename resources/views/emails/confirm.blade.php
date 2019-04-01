@extends('/emails/plantilla-base')

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>*|MC:SUBJECT|*</title>

	<style type="text/css">
		p {
			margin: 10px 0;
			padding: 0;
		}

		table {
			border-collapse: collapse;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			display: block;
			margin: 0;
			padding: 0;
		}

		img,
		a img {
			border: 0;
			height: auto;
			outline: none;
			text-decoration: none;
		}

		body,
		#bodyTable,
		#bodyCell {
			height: 100%;
			margin: 0;
			padding: 0;
			width: 100%;
		}

		.mcnPreviewText {
			display: none !important;
		}

		#outlook a {
			padding: 0;
		}

		img {
			-ms-interpolation-mode: bicubic;
		}

		table {
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
		}

		.ReadMsgBody {
			width: 100%;
		}

		.ExternalClass {
			width: 100%;
		}

		p,
		a,
		li,
		td,
		blockquote {
			mso-line-height-rule: exactly;
		}

		a[href^=tel],
		a[href^=sms] {
			color: inherit;
			cursor: default;
			text-decoration: none;
		}

		p,
		a,
		li,
		td,
		body,
		table,
		blockquote {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		.ExternalClass,
		.ExternalClass p,
		.ExternalClass td,
		.ExternalClass div,
		.ExternalClass span,
		.ExternalClass font {
			line-height: 100%;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		.templateContainer {
			max-width: 600px !important;
		}

		a.mcnButton {
			display: block;
		}

		.mcnImage {
			vertical-align: bottom;
		}

		.mcnTextContent {
			word-break: break-word;
		}

		.mcnTextContent img {
			height: auto !important;
		}

		.mcnDividerBlock {
			table-layout: fixed !important;
		}

		h1 {
			color: #222222;
			font-family: Helvetica;
			font-size: 40px;
			font-style: normal;
			font-weight: bold;
			line-height: 150%;
			letter-spacing: normal;
			text-align: left;
		}

		h2 {
			color: #222222;
			font-family: Helvetica;
			font-size: 28px;
			font-style: normal;
			font-weight: bold;
			line-height: 150%;
			letter-spacing: normal;
			text-align: left;
		}

		h3 {
			color: #444444;
			font-family: Helvetica;
			font-size: 22px;
			font-style: normal;
			font-weight: bold;
			line-height: 150%;
			letter-spacing: normal;
			text-align: left;
		}

		h4 {
			color: #999999;
			font-family: Georgia;
			font-size: 20px;
			font-style: italic;
			font-weight: normal;
			line-height: 125%;
			letter-spacing: normal;
			text-align: left;
		}

		#templateHeader {
			background-color: #ffffff;
			background-image: url("https://gallery.mailchimp.com/0e06dd41a307a784b61d835ff/images/5b7778af-d38e-4fb7-9644-83889fe8dd1a.jpg");
			background-repeat: no-repeat;
			background-position: center;
			background-size: contain;
			border-top: 0;
			border-bottom: 0;
			padding-top: 65px;
			padding-bottom: 65px;
		}

		.headerContainer {
			background-color: #transparent;
			background-image: none;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			border-top: 0;
			border-bottom: 0;
			padding-top: 0;
			padding-bottom: 0;
		}

		.headerContainer .mcnTextContent,
		.headerContainer .mcnTextContent p {
			color: #808080;
			font-family: Helvetica;
			font-size: 16px;
			line-height: 150%;
			text-align: left;
		}

		.headerContainer .mcnTextContent a,
		.headerContainer .mcnTextContent p a {
			color: #00ADD8;
			font-weight: normal;
			text-decoration: underline;
		}

		#templateBody {
			background-color: #ffffff;
			background-image: none;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			border-top: 0;
			border-bottom: 0;
			padding-top: 12px;
			padding-bottom: 92px;
		}

		.bodyContainer {
			background-color: #transparent;
			background-image: none;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			border-top: 0;
			border-bottom: 0;
			padding-top: 0;
			padding-bottom: 0;
		}

		.bodyContainer .mcnTextContent,
		.bodyContainer .mcnTextContent p {
			color: #808080;
			font-family: Helvetica;
			font-size: 16px;
			line-height: 150%;
			text-align: left;
		}

		.bodyContainer .mcnTextContent a,
		.bodyContainer .mcnTextContent p a {
			color: #00ADD8;
			font-weight: normal;
			text-decoration: underline;
		}

		#templateFooter {
			background-color: #333333;
			background-image: none;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			border-top: 0;
			border-bottom: 0;
			padding-top: 0px;
			padding-bottom: 0px;
		}

		.footerContainer {
			background-color: transparent;
			background-image: none;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			border-top: 0;
			border-bottom: 0;
			padding-top: 0;
			padding-bottom: 0;
		}

		.footerContainer .mcnTextContent,
		.footerContainer .mcnTextContent p {
			color: #FFFFFF;
			font-family: Helvetica;
			font-size: 12px;
			line-height: 150%;
			text-align: center;
		}

		.footerContainer .mcnTextContent a,
		.footerContainer .mcnTextContent p a {
			color: #FFFFFF;
			font-weight: normal;
			text-decoration: underline;
		}

		@media only screen and (min-width:768px) {
			.templateContainer {
				width: 600px !important;
			}

		}

		@media only screen and (max-width: 480px) {
			body,
			table,
			td,
			p,
			a,
			li,
			blockquote {
				-webkit-text-size-adjust: none !important;
			}

		}

		@media only screen and (max-width: 480px) {
			body {
				width: 100% !important;
				min-width: 100% !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnImage {
				width: 100% !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnCartContainer,
			.mcnCaptionTopContent,
			.mcnRecContentContainer,
			.mcnCaptionBottomContent,
			.mcnTextContentContainer,
			.mcnBoxedTextContentContainer,
			.mcnImageGroupContentContainer,
			.mcnCaptionLeftTextContentContainer,
			.mcnCaptionRightTextContentContainer,
			.mcnCaptionLeftImageContentContainer,
			.mcnCaptionRightImageContentContainer,
			.mcnImageCardLeftTextContentContainer,
			.mcnImageCardRightTextContentContainer {
				max-width: 100% !important;
				width: 100% !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnBoxedTextContentContainer {
				min-width: 100% !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnImageGroupContent {
				padding: 9px !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnCaptionLeftContentOuter .mcnTextContent,
			.mcnCaptionRightContentOuter .mcnTextContent {
				padding-top: 9px !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnImageCardTopImageContent,
			.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent {
				padding-top: 18px !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnImageCardBottomImageContent {
				padding-bottom: 9px !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnImageGroupBlockInner {
				padding-top: 0 !important;
				padding-bottom: 0 !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnImageGroupBlockOuter {
				padding-top: 9px !important;
				padding-bottom: 9px !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnTextContent,
			.mcnBoxedTextContentColumn {
				padding-right: 18px !important;
				padding-left: 18px !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnImageCardLeftImageContent,
			.mcnImageCardRightImageContent {
				padding-right: 18px !important;
				padding-bottom: 0 !important;
				padding-left: 18px !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcpreview-image-uploader {
				display: none !important;
				width: 100% !important;
			}

		}

		@media only screen and (max-width: 480px) {
			h1 {
				font-size: 30px !important;
				line-height: 125% !important;
			}

		}

		@media only screen and (max-width: 480px) {
			h2 {
				font-size: 26px !important;
				line-height: 125% !important;
			}

		}

		@media only screen and (max-width: 480px) {
			h3 {
				font-size: 20px !important;
				line-height: 150% !important;
			}

		}

		@media only screen and (max-width: 480px) {
			h4 {
				font-size: 18px !important;
				line-height: 150% !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.mcnBoxedTextContentContainer .mcnTextContent,
			.mcnBoxedTextContentContainer .mcnTextContent p {
				font-size: 14px !important;
				line-height: 150% !important;
			}

		}

		@media only screen and (max-width: 480px) {
			.headerContainer .mcnTextContent,
			.headerContainer .mcnTextContent p {
				font-size: 16px !important;
				line-height: 150% !important;
			}

		}

		@media only screen and (max-width: 480px) {

			.bodyContainer .mcnTextContent,
			.bodyContainer .mcnTextContent p {
				font-size: 16px !important;
				line-height: 150% !important;
			}

		}

		@media only screen and (max-width: 480px) {

			.footerContainer .mcnTextContent,
			.footerContainer .mcnTextContent p {
				font-size: 14px !important;
				line-height: 150% !important;
			}

		}
	</style>
</head>

<body>

	<span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;">*|MC_PREVIEW_TEXT|*</span>

	<center>
		<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
			<tr>
				<td align="center" valign="top" id="bodyCell">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td align="center" valign="top" id="templateHeader" data-template-container>
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
									<tr>
										<td valign="top" class="headerContainer"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" id="templateBody" data-template-container>
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
									<tr>
										<td valign="top" class="bodyContainer">
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
												<tbody class="mcnTextBlockOuter">
													<tr>
														<td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">

															<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
																<tbody>
																	<tr>

																		<td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">

																			<h2 class="null" style="text-align: center;">
																				<span style="color:#696969">
																					<span style="font-size:18px">
																						<span style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif">
																							<strong>Califica nuestro servicio</strong>
																						</span>
																					</span>
																				</span>
																			</h2>

																			<div style="text-align: left;">Hola, {{$name}} Gracias por usar SAT. Por favor haz click en el botón calificar para ayudarnos a mejorar nuestro servicio.</div>

																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;">
												<tbody class="mcnButtonBlockOuter">
													<tr>
														<td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top" align="center" class="mcnButtonBlockInner">
															<table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 3px;background-color: #DB3C4D;">
																<tbody>
																	<tr>
																		<td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial; font-size: 16px; padding: 15px;">
																			<a class="mcnButton " title="Calificar" href="{{$feedback}}" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Calificar</a>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" id="templateFooter" data-template-container>
								<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
									<tr>
										<td valign="top" class="footerContainer"></td>
									</tr>
								</table>

							</td>
						</tr>
					</table>

				</td>
			</tr>
		</table>
	</center>
</body>

</html>
