<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Bookings') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xl">
                <x-button href="{{ route('booking.create') }}">
                    {{ __('Create Booking') }}
                </x-button>
                {{-- @include('profile.partials.update-profile-information-form') --}}
                
                {{-- <div class="container">
                        <x-button href="{{ route('tour.create') }}">
                            {{ __('Create Tour') }}
                        </x-button>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="text-center text-muted my-8 mb-1">No Data Found</div>
                            </tbody>
                        </table>
                </div> --}}




                    <!-- Table-->
                    @if (count($bookings) >= 1)
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="voucherTable">
                                <thead class="table-light">
                                    <tr class="text--green fs-15">
                                        <th class="fw-medium column-sortable sort {{ $request->sort == 'name' ? $request->sort_direction : ''}}" data-form="#searchForm" data-sort="name" data-direction="{{ $request->sort == 'name' && $request->sort_direction == 'asc' ? 'desc' : 'asc' }}">Booking ID</th>
                                        <th class="fw-medium column-sortable sort {{ $request->sort == 'name' ? $request->sort_direction : ''}}" data-form="#searchForm" data-sort="name" data-direction="{{ $request->sort == 'name' && $request->sort_direction == 'asc' ? 'desc' : 'asc' }}">Tour</th>
                                        <th class="fw-medium column-sortable sort {{ $request->sort == 'code' ? $request->sort_direction : ''}}" data-form="#searchForm" data-sort="code" data-direction="{{ $request->sort == 'code' && $request->sort_direction == 'asc' ? 'desc' : 'asc' }}">Start Date</th>
                                        <th class="fw-medium column-sortable sort {{ $request->sort == 'validityPeriod' ? $request->sort_direction : ''}}" data-form="#searchForm" data-sort="validityPeriod" data-direction="{{ $request->sort == 'validityPeriod' && $request->sort_direction == 'asc' ? 'desc' : 'asc' }}">End Date</th>
                                        <th class="fw-medium text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($bookings as $booking)
                                        <tr class="table__row--medium cursor-pointer text--black fw-normal fs-14" >
                                            <td class="name table__cell--large text-truncate">{{ $booking->id }}</td>
                                            <td class="code">{{ $booking->getTour()->pluck('name')->first() }}</td>
                                            <td class="code">{{ $booking->start_date }}</td>
                                            <td class="code">{{ $booking->end_date }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div>
                                                        <x-button href="{{ route('booking.edit', ['booking' => $booking->id]) }}">
                                                            {{ __('Edit') }}
                                                        </x-button>
                                                        <x-button href="{{ route('booking.delete', ['booking' => $booking->id]) }}">
                                                            {{ __('Delete') }}
                                                        </x-button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- end table -->
                        {{ $bookings->links() }}

                        {{-- <div class="d-flex justify-content-end mt-10 mr-5">
                            <nav class="nav-pagination-links">
                                <ul class="pagination">
                                    @foreach ( $meta['links'] as $link )
                                        @if ($link['label'] === 'pagination.previous')
                                            <li class="page-item @if ($link['active'] === true) active @endif"><a class="page-link" href="{{ $link['url'] }}">&laquo;</a></li>
                                        @elseif ($link['label'] === 'pagination.next')
                                            <li class="page-item @if ($link['active'] === true) active @endif"><a class="page-link" href="{{ $link['url'] }}">&raquo;</a></li>
                                        @else
                                            <li class="page-item @if ($link['active'] === true) active @endif"><a class="page-link" href="{{ $link['url'] }} @if ($filter !== ""){{ $filter }} @endif">{{ $link['label'] }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </nav>
                        </div> --}}
                    @else
                        <div class="text-center text-muted my-4 mb-3">No Data Found</div>
                    @endif
                

            </div>
        </div>
    </div>
</x-app-layout>
