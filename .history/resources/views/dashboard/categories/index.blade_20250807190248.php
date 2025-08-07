@extends('layouts.dashboard.master')


@section('title', 'categories')

@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

   
    <div class="card">
        <h5 class="card-header">Table Basic</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Sub Sub Category</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                   @foreach ($categories as $category)
                       
                   @endforeach
                  
                </tbody>
            </table>
        </div>
    </div>
@endsection
