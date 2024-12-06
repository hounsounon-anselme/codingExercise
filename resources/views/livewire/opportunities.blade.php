<div class="container-sm mt-3">
    <!-- Main title -->
    <div class="card shadow-sm  w-50 mx-auto">
        <div class="card-body">
            <h4 class="card-title text-center text-primary">Coding exercise</h4>

            <div class="row mb-3 align-items-center">
                <!-- Items per page selection -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="perPage" class="form-label h5">Items per page:</label>
                        <select wire:model="perPage" wire:change="updatePagination" id="perPage" class="form-select">
                            @foreach($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Search field with autocomplete -->
                <div class="col-md-6">
                    <label for="search" class="form-label h6">Search:</label>
                    <input type="text" id="search" wire:model.live.debounce.100ms="search" placeholder="Search items..."
                        class="form-control" />
                </div>
            </div>

            <!-- List of items with sorting -->
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th wire:click="sortBy('name')" class="cursor-pointer">
                                Name
                                @if ($sortField === 'name')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination links -->
            <div class="mt-4 text-center">
                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>