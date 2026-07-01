<div class="card mb-4">

    <div class="card-header">
        Смена пароля
    </div>

    <div class="card-body">

        <form
            action="{{ route('profile.password.update') }}"
            method="POST"
        >
            @csrf
            @method('PATCH')

            <div class="mb-3">

                <label class="form-label">
                    Текущий пароль
                </label>

                <input
                    type="password"
                    name="current_password"
                    class="form-control"
                >

                @error('current_password')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Новый пароль
                </label>

                <input
                    type="password"
                    name="new_password"
                    class="form-control"
                >

                @error('new_password')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Подтверждение пароля
                </label>

                <input
                    type="password"
                    name="new_password_confirmation"
                    class="form-control"
                >

            </div>

            <button class="btn btn-warning">
                Изменить пароль
            </button>

        </form>

    </div>

</div>
