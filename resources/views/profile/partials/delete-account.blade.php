<div class="card border-danger">

    <div class="card-header bg-danger text-white">
        Удаление аккаунта
    </div>

    <div class="card-body">

        <p class="text-danger mb-3">
            После удаления аккаунта будут безвозвратно удалены ваши данные, резюме,
            компании, вакансии и связанные записи.
        </p>

        <form
            action="{{ route('profile.destroy') }}"
            method="POST"
            onsubmit="return confirm('Вы действительно хотите удалить аккаунт? Это действие нельзя отменить.')"
        >
            @csrf
            @method('DELETE')

            <div class="mb-3">

                <label class="form-label">
                    Подтвердите пароль
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                >

                @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <button class="btn btn-danger">
                Удалить аккаунт
            </button>

        </form>

    </div>

</div>
