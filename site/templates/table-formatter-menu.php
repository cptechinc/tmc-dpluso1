<?php include('./_head.php'); ?>
	<div class="jumbotron pagetitle">
		<div class="container">
			<h1><?= $page->get('pagetitle|headline|title') ; ?></h1>
		</div>
	</div>
	<div class="container page">
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Table Formatters</div>
                    <ul class="list-group">
                        <?php foreach ($page->children() as $section) : ?>
                            <li class="list-group-item list-group-item-primary"><?= $section->title; ?></li>
                            <?php foreach ($section->children() as $formatter) : ?>
                                <a href="<?= $formatter->url; ?>" class="list-group-item"><?= $formatter->title; ?></a>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
	</div>
	<?php $setequalheights = array('.featured-item .panel-body', '.featured-item .panel-header'); ?>
<?php include('./_foot.php'); // include footer markup ?>
