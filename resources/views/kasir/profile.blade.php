@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Update Password</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <form method="POST" action="{{ route('profile.update-password') }}">
        @csrf
        @method('PUT')
        
        <div>
            <label>Password Saat Ini</label>
            <input type="password" name="current_password" required>
            @error('current_password') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <div>
            <label>Password Baru</label>
            <input type="password" name="new_password" required>
        </div>
        
        <div>
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" required>
        </div>
        
        <button type="submit">Update Password</button>
    </form>
</div>
@endsection