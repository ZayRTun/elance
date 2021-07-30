@extends ('layouts.app')

@section ('content')
    <create-job :draft-id='{{$id}}'></create-job>
    {{-- <edit-draft :draftId={{$draftId}}></edit-draft> --}}
@endsection
