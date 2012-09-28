<?= $this->Html->script('chat', array( 'inline' => false, 'once' => true ) ) ?>
<div class="row-fluid">
	<div class="span3">
		<div class="left-menu-wrapper well" style="max-width: 340px;padding: 8px 0;">
			<ul class="nav nav-list">
				<li class="nav-header">Chat Rooms</li>
				<?php foreach ($rooms as $room_link): ?>
					<? $active = ($room['Room']['id'] == $room_link["Room"]["id"])? "active" : ""; ?>
					<li class="<?= $active ?>">
						<?= $this->Html->link($room_link["Room"]["name"], array('action' => 'view', $room_link["Room"]["id"])); ?>
					</li>
				<? endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="span6">
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
	</div>
	<div class="span3">
		<?= $this->Form->create('Message', array('action' => 'add')); ?>
		<?php
			echo $this->Form->hidden('room_id', array("value" => $room['Room']['id']));
			echo $this->Form->input('user', array("placeholder" => "Name", "label" => false));
			echo $this->Form->input('message', array("placeholder" => "Your message", "label" => false));
		?>
		<?= $this->Form->end(array("label" => "Send", "class" => "btn btn-primary")); ?>
	</div>
</div>