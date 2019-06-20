@extends('layouts.app')

@section('content')

<h2 style="text-align:center">Work Details</h2>


    


<div class="limiter">
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

@endsection