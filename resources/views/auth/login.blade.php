<x-layout>
    
    
    <div class="login-form">
        <h1 class="login-heading">Login to your account</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
    
            {{-- Email --}}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}"
                    class="input-field">
    
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
    
            {{-- Password --}}
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="input-field">
    
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
    
            {{-- Remember checkbox --}}
            <div class="form-group">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
    
            @error('failed')
                <p class="error">{{ $message }}</p>
            @enderror
    
            {{-- Submit Button --}}
            <button class="submit-button">Login</button>
        </form>
    </div>
</x-layout>