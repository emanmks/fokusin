@extends('template/base')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<a href="{{ URL::to('project/create') }}" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="Buat Project Baru"><i class="fa fa-plus"></i> Project Baru</a>
			<a href="{{ URL::to('project') }}" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="top" title="Lihat List Project"><i class="fa fa-list"></i> List Project</a>
		</div>
	</div>

	<div class="clear-fix"><br/></div>

	<!--<div class="row">
		<div class="col-md-12">
			<input type="text" class="form-control" placeholder="Cari Tugas">
		</div>
	</div>-->

	<div class="row">
		<div class="col-md-12">
			@if($tasks->count() > 0)
				<h4 class="text-danger">Sebanyak {{ $tasks->count() }} Tugas menunggu untuk dituntaskan!!</h4>
			@else
				<h4 class="text-primary">Tidak Ada Tugas! Ayo Buat Project Baru!!</h4>
			@endif
			@foreach($tasks as $task)
				<div id="item-{{ $task->id }}">
					<h4 class="list-activity">
						<input type="hidden" id="task_{{ $task->id }}" value="{{ $task->name }}">
						<span id="task-{{ $task->id }}">{{ $task->name }}</span>&nbsp;
						<a href="{{ URL::to('classification') }}/{{ $task->classification->id }}" class="text-primary" data-toggle="tooltip" data-placement="top" title="List Tugas">{{ '@'.$task->classification->name }}</a>&nbsp;
						<a href="{{ URL::to('project') }}/{{ $task->classification->project->id }}" class="text-success" data-toggle="tooltip" data-placement="top" title="Detail Project">#{{ $task->classification->project->name }}</a>
					</h4>
					<a href="#" onclick="showFormUpdateTask({{ $task->id }})" class="text-primary" data-toggle="tooltip" data-placement="top" title="Koreksi"><i class="fa fa-edit"></i></a>&nbsp;
					<a href="#" onclick="doit({{ $task->id }})" class="text-muted" data-toggle="tooltip" data-placement="top" title="Kerjakan Sekarang!"><i class="fa fa-rocket"></i></a>&nbsp;
					<a href="#" onclick="destroy({{ $task->id }})" class="text-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>&nbsp;
					<a href="#" onclick="done({{ $task->id }})" class="text-info" id="done-{{ $task->id }}" data-toggle="tooltip" data-placement="top" title="Selesai"><i class="fa fa-check"></i></a>&nbsp;
					<a href="#" onclick="undone({{ $task->id }})" class="text-danger" id="undone-{{ $task->id }}" data-toggle="tooltip" data-placement="top" title="Belum Selesai"><i class="fa fa-close"></i></a>

					<hr/>
				</div>
			@endforeach
		</div>
	</div>

	<!-- Form Update Task [modal]
	===================================== -->
	<div id="formUpdateTask" class="modal fade" tabindex="-1" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h3 id="myModalLabel">Update Tugas</h3>
	            </div>

	            <div class="modal-body">
	                <form class="form-horizontal" role="form">
	                    <div class="form-group">
	                        <label class="col-lg-3 control-label" for="updated_task">Tugas</label>
	                        <div class="col-lg-7">
	                        	<input type="hidden" name="task_id" value="0">
	                            <textarea name="updated_task" class="form-control"></textarea>
	                        </div>
	                    </div>
	                </form>
	            </div>

	            <div class="modal-footer">
	                <button type="clear" class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
	                <button type="submit" class="btn btn-primary" onClick="updateTask()" data-dismiss="modal" aria-hidden="true">Simpan</button>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- End of Update Task [modal] -->

<script type="text/javascript">
	$(function(){
		$('.mytooltip').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        });

		$('[id^=undone-]').hide();
	})

	function showFormUpdateTask(id)
	{
		$('#formUpdateTask').modal('show');
		$('[name=task_id]').val(id);
		$('[name=updated_task]').val($('#task_'+id).val());
	}

	function updateTask()
	{
		var id = $('[name=task_id]').val();
		var name = $('[name=updated_task]').val();

		if(id != 0 && name != '')
		{
			$.ajax({
				url:"{{ URL::to('activity') }}/"+id,
				type:"PUT",
				data:{name:name},
				success:function(){
					window.location = "{{ URL::to('/') }}";
				}
			});
		}
	}

	function destroy(id)
	{
		if(confirm("Are You Sure??!")){
				$.ajax({
					url:"{{ URL::to('activity') }}/"+id,
					type:"DELETE",
					success:function(){
						$('#item-'+id).remove();
					}
				});
			}
	}

	function done(id)
	{
		$.ajax({
			url:"{{ URL::to('activity') }}/"+id+"/done",
			type:"PUT",
			success:function(){
				$('#task-'+id).css('text-decoration','line-through');
				$('#done-'+id).hide();
				$('#undone-'+id).show();
			}
		});
	}

	function undone(id)
	{
		$.ajax({
			url:"{{ URL::to('activity') }}/"+id+"/undone",
			type:"PUT",
			success:function(){
				$('#task-'+id).css('text-decoration','none');
				$('#done-'+id).show();
				$('#undone-'+id).hide();
			}
		});
		
	}
</script>
	
@stop