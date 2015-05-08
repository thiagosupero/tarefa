<div class="tarefas form">
	<fieldset>
		<legend><?php echo __('Edit Tarefa'); ?></legend>
		<form class="tarefaForm">
			<h2>Título</h2>
			<input type="text" name="titulo" class="titulo" />
			<h2>Descrição</h2>
			<input type="text" name="descricao"/>
			<h2>Prioridade</h2>
			<input type="number" name="prioridade"/>
			<button class="btn btn-success" id="submit" onclick="return false;"> Salvar</button>
		</form>
	</fieldset>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Tarefas'), array('action' => 'index')); ?></li>
	</ul>
</div>
<script>
 $(function() {
	$("button#submit").click(function(){
		var titulo = $(("input[name=titulo]")).val();
		var descricao = $(("input[name=descricao]")).val();
		var prioridade = $(("input[name=prioridade]")).val();
		var id = window.location.pathname.substr(window.location.pathname.lastIndexOf('/') + 1);
		$.ajax({
			type: "PUT",
			url: "http://127.0.0.1/projects/test/tarefas/".concat(id,".json"),
			data: JSON.stringify({
				'id':id,
				'titulo':titulo,
				'descricao':descricao,
				'prioridade':prioridade
			}),
			success: function() {
				console.log("sucesso");
			},
			error: function() {
				console.log("failure");
			},
			dataType: "json"
		});
	});
 });
</script>
