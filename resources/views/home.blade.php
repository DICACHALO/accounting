@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                @include('report.info')
           </div>
       </div>   
            <div class="col-sm-4">  
                @include('report.form')
            </div>

            <div class="col-sm-4">  
                @include('report.reportday')
            </div>

        </div>

        </div>
    </div>           
</div>
    
@endsection