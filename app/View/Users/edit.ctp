<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('group_id');
		// echo $this->Form->input('age'); // Este dato es calculado antes de guardar (ver controller)
		$options = array(
			'label' => 'Fecha de nacimiento', // Etiqueta
			'dateFormat'    => 'DMY',	// Formato a como lo usamos en español
			'minYear'       => date('Y') - 100, // Configuramos para que aparezcan desde el año actual hasta 100 años menos
			'maxYear'       => date('Y'),		// Aparecerá hasta el año actual como máximo
			'empty'         => array( // Etiquetas para el selects (empty options)
				'day'       => 'Día',
				'month'     => 'Mes',
				'year'      => 'Año'
			)
		);
		echo $this->Form->input('date_of_birth', $options); // Ahora la fecha de nacimiento tiene nuestra configuración
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
