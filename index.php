<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="abstract" content="Personal and professional portfolio of Kevin Steinhardt">
	<meta name="author" content="Kevin Steinhardt">
	<meta name="copyright" content="Creative Commons Attribution 3.0">
	<meta name="keywords" content="Kevin Steinhardt, Steinhardt, Netherlands, Haarlem, Amsterdam, Nederland, graphic designer, graficus, radio, broadcasting" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Kevin Steinhardt</title>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-1839657-9']);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
</script>
</head>

<body>
	<div id="page">
		<div id="header"></div>
		<nav>
			<?php
				$files = scandir('pages');
				array_shift($files);

				if (!empty($files)) {
					$html = '<ul>';
					foreach ($files as $value) {
						$value = str_replace('.markdown', '', $value);
						$link = $value;
						$pieces = explode('-', $value);
						$value = $pieces[1];
						if ($value == 'Projects') {
							$html .= '<li><a href="/" title="'.$value.'">'.$value.'</a></li>';
						} else {
							$html .= '<li><a href="'.strtolower($link).'" title="'.$value.'">'.$value.'</a></li>';
						}
					}
					$html .= '</ul>';

					echo $html;
				}
			?>
		</nav>
		<div id="container">
			<?php
				include ('markdownandleftabit.php');

				if (!isset($_GET['page'])) {
					$page = '01-Projects.markdown';
				} else {
					$page = $_GET['page'].'.markdown';
				}

				echo Markdown(file_get_contents('pages/'.$page));
			?>
			<p id="tagline">Hosted begrudgingly on a Windows server.</p>
		</div>
</body>
</html>
