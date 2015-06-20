@extends('template/base')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>
				#{{ $project->name }}
			</h1>
			<strong>
				@foreach($project->classifications as $classification)
					<a href="{{ URL::to('classification') }}/{{ $classification->id }}" class="text-info" id="class-{{ $classification->id }}" data-toggle="tooltip" data-placement="top" title="Lihat Tugas">
						{{ '@'.$classification->name }}
					</a>
					<a href="#" onclick="destroyClass({{ $classification->id }})" class="text-danger" id="trash-{{ $classification->id }}" data-toggle="tooltip" data-placement="top" title="Hapus Klasifikasi"><i class="fa fa-trash"></i></a>
					&nbsp;
				@endforeach
			</strong>
			<p class="lead">
		    	{{ $project->description }}
		    	<a href="{{ URL::to('project') }}/{{ $project->id }}/edit" data-toggle="tooltip" data-placement="top" title="Update Project"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
    			<a href="{{ URL::to('project') }}/{{ $project->id }}/edit" data-toggle="tooltip" data-placement="top" title="Hapus/Stop Project"><i class="fa fa-trash-o text-danger"></i></a>
		    </p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a href="{{ URL::to('project') }}" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="List Project"><i class="fa fa-list"></i> List Project</a>
			<button class="btn btn-primary btn-flat" onclick="showFormCreateClassification()" data-toggle="tooltip" data-placement="top" title="Buat Klasifikasi Tugas"><i class="fa fa-plus"></i> Klasifikasikan Tugas</button>
			<button class="btn btn-info btn-flat" onclick="showFormCreateTask()" data-toggle="tooltip" data-placement="top" title="Tambahkan Tugas Baru"><i class="fa fa-plus"></i> Tugas Baru</button>
		</div>
	</div>

	<div class="clear-fix"><br/></div>

	<div class="row">
		<div class="col-md-12">
			@foreach($project->tasks as $task)
				<div id="item-{{ $task->id }}">
					<h4 class="list-activity">
						<input type="hidden" id="task_{{ $task->id }}" value="{{ $task->name }}">
						<span id="task-{{ $task->id }}">{{ $task->name }}</span>&nbsp;
						<a href="{{ URL::to('classification') }}/{{ $task->classification->id }}" class="text-primary">{{ '@'.$task->classification->name }}</a>&nbsp;
						<a href="{{ URL::to('project') }}/{{ $task->classification->project->id }}" class="text-success">#{{ $task->classification->project->name }}</a>

						@if($task->done == 1)
							<script type="text/javascript">
								$("#task-{{ $task->id }}").css('text-decoration','line-through');
							</script>
						@else
							<script type="text/javascript">
								$("#task-{{ $task->id }}").css('text-decoration','none');
							</script>
						@endif
					</h4>
					@if($task->done == 0)
						<a href="#" onclick="showFormUpdateTask({{ $task->id }})" class="text-primary"><i class="fa fa-edit"></i></a>
					@endif
					<a href="#" onclick="doit({{ $task->id }})" class="text-muted"><i class="fa fa-rocket"></i></a>
					<a href="#" onclick="destroy({{ $task->id }})" class="text-danger"><i class="fa fa-trash-o"></i></a>
					@if($task->done == 0)
						<a href="#" onclick="done({{ $task->id }})" class="text-info" id="done-{{ $task->id }}"><i class="fa fa-check"></i></a>
						<a href="#" onclick="undone({{ $task->id }})" class="text-danger" id="undone-{{ $task->id }}"><i class="fa fa-close"></i></a>
						<script type="text/javascript">
							$("#undone-{{ $task->id }}").hide();
						</script>
					@else
						<a href="#" onclick="done({{ $task->id }})" class="text-info" id="done-{{ $task->id }}"><i class="fa fa-check"></i></a>
						<a href="#" onclick="undone({{ $task->id }})" class="text-danger" id="undone-{{ $task->id }}"><i class="fa fa-close"></i></a>
						<script type="text/javascript">
							$("#done-{{ $task->id }}").hide();
						</script>
					@endif

					<hr/>
				</div>
			@endforeach
		</div>
	</div>

	<!-- Form Add Classifiaction [modal]
	===================================== -->
	<div id="formCreateClassification" class="modal fade" tabindex="-1" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h3 id="myModalLabel">Klasifikasikan Tugas</h3>
	            </div>

	            <div class="modal-body">
	                <form class="form-horizontal" role="form">
	                    <div class="form-group">
	                        <label class="col-lg-3 control-label" for="classification">Klasifikasi Baru</label>
	                        <div class="col-lg-7">
	                        	<input name="project_id" value="{{ $project->id }}" type="hidden">
	                            <input name="classification" type="text" class="form-control">
	                        </div>
	                    </div>
	                </form>
	            </div>

	            <div class="modal-footer">
	                <button type="clear" class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
	                <button type="submit" class="btn btn-primary" onClick="createClassification()" data-dismiss="modal" aria-hidden="true">Simpan</button>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- End of Add Classification [modal] -->

	<!-- Form Add Task [modal]
	===================================== -->
	<div id="formCreateTask" class="modal fade" tabindex="-1" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h3 id="myModalLabel">Tugas Baru</h3>
	            </div>

	            <div class="modal-body">
	                <form class="form-horizontal" role="form">
	                    <div class="form-group">
	                        <label class="col-lg-3 control-label" for="class">Klasifikasi</label>
	                        <div class="col-lg-7">
	                            <select name="class" class="form-control">
	                            	<option value="0">--Pilih</option>
	                            	@foreach($project->classifications as $classification)
	                            		<option value="{{ $classification->id }}">{{ $classification->name }}</option>
	                            	@endforeach
	                            </select>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-lg-3 control-label" for="name">Tugas</label>
	                        <div class="col-lg-7">
	                            <input name="name" type="text" class="form-control">
	                        </div>
	                    </div>
	                </form>
	            </div>

	            <div class="modal-footer">
	                <button type="clear" class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
	                <button type="submit" class="btn btn-primary" onClick="createTask()" data-dismiss="modal" aria-hidden="true">Simpan</button>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- End of Add Task [modal] -->

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

		});

		function showFormCreateClassification()
		{
			$('#formCreateClassification').modal('show');
		}

		function showFormCreateTask()
		{
			$('#formCreateTask').modal('show');
		}

		function showFormUpdateTask(id)
		{
			$('#formUpdateTask').modal('show');
			$('[name=task_id]').val(id);
			$('[name=updated_task]').val($('#task_'+id).val());
		}

		function createClassification()
		{
			var name = $('[name=classification]').val();
			var project_id = $('[name=project_id]').val();

			if(name != '')
			{
				$.ajax({
					url:"{{ URL::to('classification') }}",
					type:"POST",
					data:{project_id:project_id, name:name},
					success:function(){
						window.location = "{{ URL::to('project') }}/"+project_id;
					}
				});
			}
		}

		function createTask()
		{
			var name = $('[name=name]').val();
			var classification_id = $('[name=class]').val();
			var project_id = $('[name=project_id]').val();

			if(classification_id != 0 && name != '')
			{
				$.ajax({
					url:"{{ URL::to('activity') }}",
					type:"POST",
					data:{classification_id:classification_id, name:name},
					success:function(){
						window.location = "{{ URL::to('project') }}/"+project_id;
					}
				});
			}
		}

		function updateTask()
		{
			var id = $('[name=task_id]').val();
			var name = $('[name=updated_task]').val();
			var project_id = $('[name=project_id]').val();

			if(id != 0 && name != '')
			{
				$.ajax({
					url:"{{ URL::to('activity') }}/"+id,
					type:"PUT",
					data:{name:name},
					success:function(){
						window.location = "{{ URL::to('project') }}/"+project_id;
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

		function destroyClass(id)
		{
			if(confirm("Are You Sure??!")){
				$.ajax({
					url:"{{ URL::to('classification') }}/"+id,
					type:"DELETE",
					success:function(response){
						if(response.success == 1){
							$('#class-'+id).remove();
							$('#trash-'+id).remove();
						}
						else{
							window.alert("Sorry! It can't Remove. It Has at least 1 Task");
						}
					}
				});
			}
		}
	</script>
@stop