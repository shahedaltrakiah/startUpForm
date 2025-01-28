@extends('layouts.adminHeader')

@section('adminContent')

<div class="content-header">
    <h1>Form Responses</h1>
    <div class="search-bar">
        <input type="text" class="search-input" placeholder="Search responses...">
        <button class="btn-icon" onclick="searchResponses()">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>

<div class="container">
<table class="table table-bordered">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Founded</th>
                <th>Website</th>
                <th>Team Size</th>
                <th>Founder Info</th>
                <th>Product Description</th>
                <th>Target Market</th>
                <th>Funding Stage</th>
                <th>Funding Needs</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
</div>



@endsection