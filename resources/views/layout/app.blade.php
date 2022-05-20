@extends('layout.master')

@section('body')
    <div class="page">
        <div class="page-main">
            @include('layout.sections.header.navbar')
            @include('layout.sections.sidebar.left-sidebar')
            @include('layout.sections.wrapper.wrapper')
            @include('layout.sections.footer.footer')
            <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
        </div>
    </div>
@endsection
