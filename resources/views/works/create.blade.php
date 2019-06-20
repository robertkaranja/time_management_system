@extends('layouts.app')

@section('content')

    <div class="col-md-9 col-lg-9 pull-left">
        <h1 style="text-align: center; color: indigo;">Post Work Details</h1>

        <!-- Example row of columns -->
        <div class="row col-sm-12 col-md-12 col-lg-12" >

            <form method="post" action="{{route('store.work') }}" enctype="multipart/data">
                {{ csrf_field() }}


                <div class="form-group">
                    <label for="work-name">Work Type<span class="required">*</span></label>

                    <input placeholder="Work Type"
                           id="description"
                           required
                           name="description"
                           spellcheck="false"
                           class="form-control"

                    />

                </div>

                <div class="form-group">
                    <label for="duration">Duration<span class="required">*</span></label>

                    <input placeholder="Enter Duration in Hours"
                           id="duration"
                           required
                           name="duration"
                           spellcheck="false"
                           class="form-control"

                    />

                </div>

                <input type="submit" class="btn btn-primary" value="submit"/>

            </form>

        </div>
    </div>

@endsection 