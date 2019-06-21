@extends('layouts.app')

@section('content')



<!-- Side bar-->
<div class="container">
<nav class="sidenav" id="navbar">
		<a href="#" id="hidebtn">&#9776</a>
		<ul>

			<li><a href="/api/create">Add Record</a><li>
			<li><a href="#">Users</a><li>
			<li><a href="/api/work" onclick="show()" >Records</a><li>
			
		</ul>
		
</nav>
<a href="#" id="showbtn">&#9776</a>

<!-- Side bar ends-->   


<div class="limiter" id="records">

		<div class="container-table100">
			<div class="wrap-table100">
			
				<div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">User name</th>
									<th class="cell100 column2">Date</th>
									<th class="cell100 column3">Duration in Hours</th>
									<th class="cell100 column3">Edit Record</th>
									<th class="cell100 column3">Delete Record</th>
									
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
                            @if(count($works) > 0)
                                @foreach($works as $work)
								<tr class="row100 body">
									<td class="cell100 column1">{{$work->description}}</td>
									<td class="cell100 column2">{{$work->created_at}}</td>
									<td class="cell100 column3">{{$work->duration}}</td>
									<td class="column100 column4" data-column="column4">
									
									
									<a href="/api/work/{{$work->id}}/edit" class="btn btn-primary">

					                            Edit Record
                            		</a>

										      <form id="delete-form" action="{{ route('store.work', [$work->id]) }}"
										                method="POST" style="display: none;">

										                <input type="hidden" name="_method" value="delete">
										                {{ csrf_field() }}
										      </form>
								</td>

								<td class="column100 column4" data-column="column4">
									<a href="{{ route('work_delete',['id' =>  $work->id]) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a>



								</td>
								</tr>
                                @endforeach
                                @else

                                <p> No Work Details</p>
                           
                                @endif
							</tbody>
						</table>
					</div>
				</div>

				
						
					
			</div>
		</div>
	</div>

 

</div>
	 <!-- Menu Toggle Script -->
  <script>
    function show() {
		document.getElementById('records').style.display='flex';
	}
  </script>

@endsection 