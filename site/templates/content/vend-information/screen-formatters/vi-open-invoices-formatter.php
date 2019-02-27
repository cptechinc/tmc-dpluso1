<?php 
	$tableformatter = $page->screenformatterfactory->generate_screenformatter('vi-open-invoices');

	if ($input->requestMethod() == "POST") {
		$tableformatter->generate_formatterfrominput($input);
		$action = $input->post->text('action');

		switch ($action) {
			case 'preview':
				$page->body = $config->paths->content."vend-information/vi-formatted-screen.php";

				if ($config->ajax) {
					include $page->body;
				} else {
					include $config->paths->content.'common/include-blank-page.php';
				}
				break;
			case 'save-formatter':
				$maxid = get_maxtableformatterid($user->loginid, 'vi-open-invoices');
				$page->body = $tableformatter->save_andrespond();
				include $config->paths->content.'common/include-json-page.php';
				break;
		}
	} else {
		$page->body = $config->paths->content."vend-information/screen-formatters/forms/vi-default.php";
		$config->scripts->append(hash_templatefile('scripts/table-formatter.js'));
		include $config->paths->content.'common/include-page.php';
	}
