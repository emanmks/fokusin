@extends('template/base')

@section('content')
	
	{{ HTML::style('assets/css/datepicker/datepicker.css') }}
	{{ HTML::style('assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}

	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-primary btn-flat" onclick="update()"><i class="fa fa-floppy-o"></i> Simpan</button>
		</div>
	</div>

	<div class="clear-fix"><br/></div>

	<div class="row">
		<div class="col-md-12">
			<label for="name">Nama Project</label>
			<input type="hidden" name="id" value="{{ $project->id }}">
			<input type="text" class="form-control" name="name" value="{{ $project->name }}">

			<br/>

			<label for="deadline">Deadline</label>
			<input type="text" class="form-control" name="deadline" value="{{ date('Y-m-d', strtotime($project->deadline)) }}">

			<br/>

			<label for="description">Informasi</label>
			<textarea class="textarea form-control" name="description" rows="10">{{ $project->description }}</textarea>
		</div>
	</div>

	{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}

	<script type="text/javascript">
		$(function(){
			$('[name=deadline]').datepicker({format:"yyyy-mm-dd"});
			$('.textarea').wysihtml5();
		})

		function update()
		{
			var id = $('[name=id]').val();
			var name = $('[name=name]').val();
			var deadline = $('[name=deadline]').val();
			var description = $('[name=description]').val();

			if(name != '' && deadline != '')
			{
				$.ajax({
					url:"{{ URL::to('project') }}/"+id,
					type:"PUT",
					data:{name:name, deadline:deadline, description:description},
					success:function(){
						window.location = "{{ URL::to('project') }}/"+id;
					}
				});
			}
		}
	</script>
@stop