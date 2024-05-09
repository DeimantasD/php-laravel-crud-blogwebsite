<x-layout>

  

  <div class="register-form">
    <h1 class="register-heading">Register a new account</h1>

    <form action="{{route('register')}}" method="post">
      
      @csrf
      {{-- Username --}}
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="input" value="{{old('username')}}">
        @error('username')
            <p class="error">{{$message}}</p>
        @enderror
      </div>

      {{-- Email --}}
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="input" value="{{old('email')}}">
        @error('email')
            <p class="error">{{$message}}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="input">
        @error('password')
            <p class="error">{{$message}}</p>
        @enderror
      </div>

      {{-- Confirm Password --}}
      <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" class="input">
      </div>
      {{-- Submit Button --}}
      <button class="submit-button">Register</button>
    </form>

  </div>
</x-layout>