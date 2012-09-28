<?= $this->Html->script( array( 'vendors/jquery-1.8.2.min', 'chat' ), array( 'inline' => false, 'once' => true ) ) ?>
<div id="messages" class="index">
	<div id = "messages-database">
		<?php foreach ($room['Message'] as $message): ?>
			<div class="chat-message" message = <?= h($message['id']); ?> >
				<b><?= $message['created']; ?> <?= h($message['user']); ?>:</b>
				<?= h($message['message']); ?>
			</div>
		<?php endforeach; ?>
	</div>
	<? 
		$last_message = 0;
		if( count($room['Message']) > 0 ){
			$last_message = $room['Message'][count($room['Message'])-1]['id'];
		}
	?>
	<div id = "messages-appended" last-database-message = <?= $last_message ?> ></div>
</div>
<div class="actions">
<?= $this->Form->create('Message', array('action' => 'add')); ?>
	<fieldset>
		<legend><?= __('Add Message'); ?></legend>
		<?php
			echo $this->Form->hidden('room_id', array("value" => $room['Room']['id']));
			echo $this->Form->input('user');
			echo $this->Form->input('message');
		?>
	</fieldset>
	<?= $this->Form->end(__('Submit')); ?>
</div>