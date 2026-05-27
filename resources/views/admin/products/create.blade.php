@extends('layouts.admin')
@section('title', 'Nouveau produit')

@section('content')
<h1 class="text-4xl font-display mb-6">Nouveau produit</h1>
<div class="card p-6">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.products._form')
    </form>
</div>
@endsection
