<div class="card mb-4">

    <div class="card-header">
        Личные данные
    </div>

    <div class="card-body">

        <form
            action="{{ route('profile.update') }}"
            method="POST"
        >
            @csrf
            @method('PATCH')

            <div class="mb-3">

                <label class="form-label">
                    Имя
                </label>

                <input
                    type="text"
                    name="first_name"
                    class="form-control"
                    value="{{ old('first_name', $user->first_name) }}"
                >

                @error('first_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Фамилия
                </label>

                <input
                    type="text"
                    name="last_name"
                    class="form-control"
                    value="{{ old('last_name', $user->last_name) }}"
                >

                @error('last_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Дата рождения
                </label>

                <input
                    type="date"
                    name="birth_date"
                    class="form-control"
                    value="{{ old('birth_date', optional($user->birth_date)->format('Y-m-d')) }}"
                >

                @error('birth_date')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Телефон
                </label>

                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    value="{{ old('phone', $user->phone) }}"
                >

                @error('phone')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}"
                >

                @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <button class="btn btn-primary">
                Сохранить изменения
            </button>

        </form>

    </div>

</div>
