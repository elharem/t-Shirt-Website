@extends('layouts.admin')
@section('title', 'Éditer ' . $product->name)

@section('content')
<h1 class="text-4xl font-display mb-6">Éditer le produit</h1>
<div class="card p-6">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.products._form')
    </form>
</div>
@endsection
