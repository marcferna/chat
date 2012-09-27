<?php echo $this->Html->script( array( 'vendors/jquery-1.8.2.min', 'chat' ), array( 'inline' => false, 'once' => true ) ) ?>

<div id="messages" class="index">
	<div id = "messages-database">
		<?php foreach ($messages as $message): ?>
			<div class="chat-message" message = <?php echo h($message['Message']['id']); ?> >
				<b><?php echo h($message['Message']['user']); ?>:</b>
				<?php echo h($message['Message']['message']); ?>
			</div>
		<?php endforeach; ?>
	</div>
	<div id = "messages-appended" last-database-message = <?= $messages[count($messages)-1]['Message']['id']; ?> ></div>
</div>

<div class="actions">
<?php echo $this->Form->create('Message', array('action' => 'add')); ?>
	<fieldset>
		<legend><?php echo __('Add Message'); ?></legend>
		<?php
			echo $this->Form->hidden('room_id', array("value" => 1));
			echo $this->Form->input('user');
			echo $this->Form->input('message');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
