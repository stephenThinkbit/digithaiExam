<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __(isset($tour) ? 'Edit '.$tour->name : 'Add Tour') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form
        method="post"
        action="{{ isset($tour) ? route('tour.update' , ['tour' => $tour->id]) : route('tour.store') }}"
        class="mt-6 space-y-6"
        enctype="multipart/form-data"
    >
        @csrf
        @method(isset($tour) ? 'patch' : 'post')

        <div class="space-y-2">
            <x-form.label
                for="name"
                :value="__('Name')"
            />

            <x-form.input
                id="name"
                name="name"
                type="text"
                class="block w-full"
                :value="old('name', isset($tour) ? $tour->name : '')"
                required
                autofocus
                autocomplete="name"
                hidden
            />

            <x-form.error :messages="$errors->get('name')" />
        </div>

        <div class="space-y-2">
            <x-form.label
                for="start_date"
                :value="__('Start Date')"
            />

            <x-form.input
                id="end_date"
                name="start_date"
                type="date"
                class="block w-full"
                :value="old('end_date',  isset($tour) ? $tour->start_date : '')"
                required
                autocomplete="end_date"
            />

            <x-form.error :messages="$errors->get('start_date')" />
        </div>

        <div class="space-y-2">
            <x-form.label
                for="end_date"
                :value="__('End Date')"
            />

            <x-form.input
                id="end_date"
                name="end_date"
                type="date"
                class="block w-full"
                :value="old('end_date',  isset($tour) ? $tour->end_date : '')"
                required
                autocomplete="end_date"
            />

            <x-form.error :messages="$errors->get('end_date')" />
        </div>

        <div class="space-y-2">
            <x-form.label
                for="image_path"
                :value="__('Logo')"
            />

            <x-form.input
                id="image_path"
                name="image_path"
                type="file"
                class="block w-full"
                :value="old('image_path',  isset($tour) ? $tour->image_path : '')"
                autocomplete="image_path"
            />

            <x-form.error :messages="$errors->get('image_path')" />
        </div>

        <div class="flex items-center gap-4">
            <x-button>
                {{ __('Save') }}
            </x-button>
            <x-button href="{{ route('tour') }}">
                {{ __('Cancel') }}
            </x-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
<script>
    $( document ).ready(function() {
        $('#datetimepicker1').datepicker({
            format: "mm/dd/yy",
            weekStart: 0,
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true, 
            orientation: "auto"
        });
    });
</script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>