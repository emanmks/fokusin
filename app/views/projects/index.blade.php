@extends('template/base')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<a href="{{ URL::to('project/create') }}" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="Mulai Project Baru"><i class="fa fa-plus"></i> Project Baru</a>
		</div>
	</div>

	<div class="clear-fix"><br/></div>

	<div class="row">
		<div class="col-md-12">
			@foreach($projects as $project)
				<div id="item-{{ $project->id }}">
					<h4 class="list-activity">
						<a href="{{ URL::to('project') }}/{{ $project->id }}" class="text-success" data-toggle="tooltip" data-placement="top" title="Detail Project">#{{ $project->name }}</a>
						<span class="text-warning">#{{ date('d-m-Y', strtotime($project->deadline)) }}</span>
    					<span class="text-info">#{{ $project->tasks->count() }} In {{ $project->classifications->count() }}</span>
    					<sub><a href="#" onclick="destroy({{ $project->id }})" data-toggle="tooltip" data-placement="top" title="Batalkan / Stop Project"><i class="fa fa-trash-o text-danger"></i></a></sub>
					</h4>
					<strong>
						@foreach($project->classifications as $classification)
							<a href="{{ URL::to('classification') }}/{{ $classification->id }}" class="text-info" data-toggle="tooltip" data-placement="top" title="Lihat Tugas">{{ '@'.$classification->name }}</a>&nbsp;
						@endforeach
					</strong>

					<hr/>
				</div>
			@endforeach
		</div>
	</div>

	<script type="text/javascript">
		$(function(){

		})

		function destroy(id){

			if(confirm("Yakin akan menghentikan Project ini?! Semua hal terkait Project ini juga akan dihapus")){

				$.ajax({
					url:"{{ URL::to('project') }}/"+id,
					type:"DELETE",
					success:function(){
						window.location = "{{ URL::to('project') }}";
					}
				});

			}

		}
	</script>
@stop