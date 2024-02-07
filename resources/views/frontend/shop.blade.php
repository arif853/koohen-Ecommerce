@extends('layouts.home')

@section('title','Shop')
@section('main')


{{-- @foreach ($groupedCategories as $parentcategory)
<span class="text-success">{{$parentcategory}}</span><br><br>
@foreach ($parentcategory as $category)
    {{$category}}
@endforeach

@endforeach --}}

{{-- @foreach($groupedCategories as $parentCategory => $children)
<h2>{{ $parentCategory }}</h2>

@if(count($children) > 0)
    <ul style="margin-left: 10px">
        @foreach($children as $child)
            <li> child:-{{ $child->category_name }}</li>
            @if(isset($child->children) && count($child->children) > 0)
            <ul style="margin-left: 15px">
                @foreach ($child->children as  $child)
                <li> child of child:- {{$child->category_name}}</li>
                @endforeach
            </ul>
            @endif
        @endforeach
    </ul>
@endif
@endforeach --}}
</main>
@endsection
