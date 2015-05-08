<div class="tarefas index">
	<h2><?php echo __('Tarefas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th> <?php echo __('ID') ?> </th>
			<th> <?php echo __('Título') ?>  </th>
			<th> <?php echo __('Descrição') ?>  </th>
			<th> <?php echo __('Prioridade') ?>  </th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($Tarefas as $tarefa): ?>
	<tr>
		<td class="id"><?php echo h($tarefa['Tarefa']['id']); ?>&nbsp;</td>
		<td><?php echo h($tarefa['Tarefa']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($tarefa['Tarefa']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($tarefa['Tarefa']['prioridade']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tarefa['Tarefa']['id']));  ?>
			<a href="#" class="openDialogDeletar" type='button'>Deletar</a>
		</td>
	</tr>
<?php endforeach; 	?>
	</tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tarefa'), array('action' => 'add')); ?></li>
	</ul>
</div>

<div id="dialogExcluir" title="Excluir Tarefa">
  <p> Certeza que deseja excluir a tarefa?</p>
  <button class="btn btn-success" id="deletar" > Confirmar</button>
  <button class="btn btn-success" onclick="$('#dialogExcluir').dialog('close');"> Cancelar</button>
</div>

<script>

	var idDeletar;

	$("div#dialogExcluir").dialog ({
		autoOpen : false
	});

	$(".openDialogDeletar").click (function (event)    // Open button Treatment
	{
		idDeletar = $(this).closest("tr").find("td.id").text().trim();
		$("#dialogExcluir").dialog ("open");
	});
	
$(function(){

	$("button#deletar").click(function(){
		var id = idDeletar;
		console.log(id);
		$.ajax({
			type: "DELETE",
			url: "http://127.0.0.1/projects/test/tarefas/".concat(id,".json"),
			data: JSON.stringify({
				'id':id
			}),
			success: function() {
				$("#dialogExcluir").dialog ("close");
				setTimeout(function(){// wait for 5 secs(2)
					window.location.reload(); // then reload the page.(3)
				}, 1000); 
			},
			error: function() {
				console.log("failure");
			}
		});
    });

});
</script>