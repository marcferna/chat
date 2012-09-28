<div class="rooms index">
	<h2><?php echo __('Rooms'); ?></h2>
	<?php foreach ($rooms as $room): ?>
		<div class="well">
			<div class="row-fluid">
				<div class="span10">
					<h2><?= h($room['Room']['name']); ?></h2>
					<?= count($room['Message']); ?> messages in this room
				</div>
				<div class="span2">
					<?= $this->Html->link("Join Chat", array('action' => 'view', $room['Room']['id']), array("class" => "join btn btn-primary btn-large")); ?>

				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
