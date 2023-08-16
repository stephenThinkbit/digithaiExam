<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __(isset($booking) ? 'Edit '.$booking->id : 'Add booking') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form
        method="post"
        action="{{ isset($booking) ? route('booking.update' , ['booking' => $booking->id]) : route('booking.store') }}"
        class="mt-6 space-y-6"
    >
        @csrf
        @method(isset($booking) ? 'patch' : 'post')

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
                :value="old('end_date',  isset($booking) ? $booking->start_date : '')"
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
                :value="old('end_date',  isset($booking) ? $booking->end_date : '')"
                required
                autocomplete="end_date"
            />

            <x-form.error :messages="$errors->get('end_date')" />
        </div>

        <div class="space-y-2">
            <x-form.label
                for="image_path"
                :value="__('Tour')"
            />
            
            <select name="tour_id" id="nf-tour_id" class="px-4 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
            focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
            dark:text-gray-300 dark:focus:ring-offset-dark-eval-1 block w-full">
                @if(isset($tours))
                    @foreach($tours as $value)
                    <option value="{{ $value['id'] }}" {{ isset($booking) ? $booking->tour_id == $value['id'] ? 'selected' : '' : '' }} > {{ $value['name'] }} </option>
                    @endforeach
                @endif                       
            </select>

            <x-form.error :messages="$errors->get('image_path')" />
        </div>

        <div class="flex items-center gap-4">
            <x-button>
                {{ __('Save') }}
            </x-button>
            <x-button href="{{ route('booking') }}">
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